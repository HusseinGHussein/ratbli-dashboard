<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    const MOST_VIEWED = 1;
    const MOST_ORDERED = 2;
    const MOST_CANCELLED = 3;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productsCount = Product::count();
        $categories = Category::where('id', '>', 14)->get();

        $counts['orderItems'] = OrderItem::whereHas('order', function ($query) {
            return $query->whereHas('user', function ($query) {
                $query->where('is_test', '=', 0);
            });
        })->select(
            DB::raw('count(*) as allOrders'),
            DB::raw('count(case when status = 1 then 1 end) as waiting'),
            DB::raw('count(case when status = 2 then 1 end) as selectPayment'),
            DB::raw('count(case when status = 3 then 1 end) as accepted'),
            DB::raw('count(case when status = 4 then 1 end) as rejected'),
            DB::raw('count(case when status = 5 then 1 end) as preparing'),
            DB::raw('count(case when status = 6 then 1 end) as delivering'),
            DB::raw('count(case when status = 7 then 1 end) as completed')
        )->where('created_at', '>', '2018-04-23')->first()->toArray();

        $usersCount = User::select(DB::raw('count(if(users.is_admin=0 and is_vendor=0 and is_test=0,1, NULL)) as users'),
            DB::raw('count(if(users.is_vendor=1,1, NULL)) as providers'))->first();

        $productsCount = Product::select(
            DB::raw('count(*) as allProducts'),
            DB::raw('sum(case when status = 0 then 1 else 0 end) as waiting'),
            DB::raw('sum(case when status = 1 then 1 else 0 end) as activated'),
            DB::raw('sum(case when status = 2 then 1 else 0 end) as deactivated')
        )->first()->toArray();

        $productsTotalPrice = Product::sum('price');

        $ordersStats = OrderItem::select(
            DB::raw('COUNT(*) as orders_count'),
            DB::raw('MONTHNAME(created_at) as month')
        )->groupBy('month')
        ->whereYear('created_at', '=', date('Y'))
        ->get();

        $ordersChart = OrderItem::select(
            DB::raw('SUM(total) as orders_total'),
            DB::raw('MONTHNAME(created_at) as month')
        )->groupBy('month')
        ->where('status', '=', 7)
        ->whereYear('created_at', '=', date('Y'))
        ->get();

        $ordersChartTotal = $ordersChart->pluck('orders_total')->map(function ($item) {
            return numberFormatShort($item);
        });

        $weeklyIncome = OrderItem::where('created_at', '>', Carbon::now()->startOfWeek())
            ->where('created_at', '<', Carbon::now()->endOfWeek())
            ->where('status', '=', 7)
            ->sum('total');

        $weeklyIncomeChart = OrderItem::select(
            DB::raw('DAYNAME(created_at) as day'),
            DB::raw('SUM(total) as total')
        )->groupBy('day')
        ->where('created_at', '>', Carbon::now()->startOfWeek())
        ->where('created_at', '<', Carbon::now()->endOfWeek())
        ->where('status', '=', 7)
        ->get();

        $newUsers = User::where([
            ['is_admin', '=', 0],
            ['is_vendor', '=', 0],
            ['is_test', '=', 0],
        ])->whereMonth('created_at', '=', date('m'))
        ->whereYear('created_at', '=', date('Y'))
        ->count();

        $latestFeedback = Feedback::query()
            ->with(['user', 'product.category'])
            ->whereHas('user', function ($query){
                return $query->where('is_test', 0);
            })
            ->latest()
            ->take(6)
            ->get();

        $feedbackCount = Feedback::count();

        return view('home', compact('productsCount', 'categories', 'counts', 'usersCount', 'productsCount', 'ordersStats', 'ordersChart', 'weeklyIncome', 'weeklyIncomeChart', 'newUsers', 'ordersChartTotal', 'productsTotalPrice', 'latestFeedback', 'feedbackCount'));
    }

    public function products(Request $request)
    {
        $filterProducts = static::MOST_VIEWED;

        $products = Product::select(
            'products.id',
            'products.name',
            'products.img',
            'products.views',
            'products.user_id',
            'products.price',
            'products.cat_id',
            DB::raw('count(if(order_items.status=4,1, NULL)) as rejected'),
            DB::raw('count(if(order_items.status=7,1, NULL)) as completed')
        )
        ->with(['provider:id,user_name', 'category:id,name'])
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->join('order_product', 'order_product.id', '=', 'order_items.order_id')
        ->join('users', 'users.id', '=', 'order_product.user_id')
        ->where('order_items.created_at', '>', '2018-04-23')
        ->where('users.is_test', '=', 0);

        if ($request->has('filterProducts') && in_array($request->filterProducts, [1, 2, 3])) {
            $filterProducts = $request->filterProducts;
        }

        switch ($filterProducts) {
            case static::MOST_VIEWED:
                $products = $products->orderBy('products.views', 'DESC');
                break;

            case static::MOST_ORDERED:
                $products = $products->orderBy('completed', 'DESC');
                break;

            case static::MOST_CANCELLED:
                $products = $products->orderBy('rejected', 'DESC');
                break;

            default:
                $products = $products->orderBy('products.views', 'DESC');
                break;
        }

        if ($request->has('category') && $request->category != 'all') {
            $products = $products->where('products.cat_id', $request->category);
        }

        $products = $products->groupBy('products.id')->take(5)->get();

        return view('dashboard.products', compact('products'))->render();
    }

    public function providers(Request $request)
    {
        $filterProviders = static::MOST_VIEWED;

        $providers = OrderItem::select('users.id', 'users.user_name', 'users.pic',
            DB::raw('SUM(products.views) as views'),
            DB::raw('count(if(order_items.status=4,1, NULL)) as rejected'),
            DB::raw('count(if(order_items.status=7,1, NULL)) as completed'))
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->join('users', 'users.id', '=', 'products.user_id')
        ->where('order_items.created_at', '>', '2018-04-23')
        ->where('users.is_test', '=', 0);

        if ($request->has('filterProviders') && in_array($request->filterProviders, [1, 2, 3])) {
            $filterProviders = $request->filterProviders;
        }

        switch ($filterProviders) {
            case static::MOST_VIEWED:
                $providers = $providers->orderBy('views', 'DESC');
                break;

            case static::MOST_ORDERED:
                $providers = $providers->orderBy('completed', 'DESC');
                break;

            case static::MOST_CANCELLED:
                $providers = $providers->orderBy('rejected', 'DESC');
                break;

            default:
                $providers = $providers->orderBy('views', 'DESC');
                break;
        }

        $providers = $providers->groupBy('products.user_id')->take(8)->get();

        return view('dashboard.providers', compact('providers'))->render();
    }

    public function orders(Request $request)
    {
        $filterOrders = 'day';

        $orders = OrderItem::select(
            DB::raw('COUNT(*) as orderItems_count'),
            DB::raw('SUM(order_items.total) as orderItems_total'),
            DB::raw('AVG(order_items.total) as avg_order_total')
        )
        ->join('order_product', 'order_product.id', '=', 'order_items.order_id')
        ->join('users', 'users.id', '=', 'order_product.user_id')
        ->where('users.is_test', '=', 0)
            //->where('order_items.created_at', '>', '2018-04-23')
            ->where('order_items.status', '=', 7);

        if ($request->has('filterOrders') && in_array($request->filterOrders, ['day', 'month', 'year'])) {
            $filterOrders = $request->filterOrders;
        }

        switch ($filterOrders) {
            case 'day':
                $avgProductsPerOrder = (Order::whereDate('created_at', '=', date('Y-m-d'))->count() == 0) ? 0 : round(OrderItem::whereDate('created_at', '=', date('Y-m-d'))->count() / Order::whereDate('created_at', '=', date('Y-m-d'))->count(), 2);

                $orders = $orders->whereDate('order_items.created_at', '=', date('Y-m-d'));
                break;

            case 'month':
                $avgProductsPerOrder = (Order::whereMonth('created_at', '=', date('m'))
                    ->whereYear('created_at', '=', date('Y'))->count() == 0) ? 0 :  round(OrderItem::whereMonth('created_at', '=', date('m'))
                    ->whereYear('created_at', '=', date('Y'))->count() / Order::whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))->count(), 2);

                $orders = $orders->whereMonth('order_items.created_at', '=', date('m'))
                    ->whereYear('order_items.created_at', '=', date('Y'));
                break;

            case 'year':
                $avgProductsPerOrder = (Order::whereYear('created_at', '=', date('Y'))->count() == 0) ? 0 :  round(OrderItem::whereYear('created_at', '=', date('Y'))->count() / Order::whereYear('created_at', '=', date('Y'))->count(), 2);

                $orders = $orders->whereYear('order_items.created_at', '=', date('Y'));
                break;

            default:
                $avgProductsPerOrder = (Order::whereDate('created_at', '=', date('Y-m-d'))->count() == 0) ? 0 :  round(OrderItem::whereDate('created_at', '=', date('Y-m-d'))->count() / Order::whereDate('created_at', '=', date('Y-m-d'))->count(), 2);
                break;
        }

        $orders = $orders->first();

        return view('dashboard.orders', compact('orders', 'avgProductsPerOrder'))->render();
    }
}
