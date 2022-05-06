<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Nation;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\LoggerHelper;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

class UserController extends Controller
{
    protected $loggerHelper;

    public function __construct(LoggerHelper $loggerHelper)
    {
        $this->loggerHelper = $loggerHelper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->expectsJson()) {
            return UserService::dataTable();
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! request()->has('type')) {
            abort(404);
        } else {
            if (! in_array(request()->get('type'), [1, 2, 3])) {
                abort(404);
            }
        }

        $categories = Category::published()->get();
        $nations = Nation::active()->get();

        return view('users.create', compact('categories', 'nations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = new User;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->address = $request->address;
            $user->v_code = mt_rand(1000, 9999);
            $user->verified = $request->verified;
            $user->blocked = 0;
            $user->cat_id = 0;
            $user->type = 0;
            $user->communication = 0;
            $user->token = '';
            $user->country = '';
            $user->nation_id = $request->nation_id;
            $user->city_id = $request->city_id;
            $user->is_admin = ($request->get('type') == 1) ? 1 : 0;
            $user->is_vendor = ($request->get('type') == 2) ? 1 : 0;

            if ($request->get('type') == 2) {
                $user->charge_cost = $request->charge_cost;
                $user->express_charge_cost = $request->express_charge_cost;
                $user->is_vat = $request->is_vat;
                $user->is_recommended = $request->is_recommended;
                $user->is_sponsored = $request->is_sponsored;
            }

            if ($request->hasFile('pic')) {
                $path = $request->file('pic')->storePublicly('avatars/' . $request->user()->id,'s3');
                $user->pic = Storage::disk('s3')->url($path);
            }

            $user->save();

            if($request->get('type') == 2) {
                $user->categories()->sync($request->categories);
            }

            $this->loggerHelper->store('user', $user->id, "تم إنشاء المستخدم {$user->user_name} رقم {$user->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('users.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show.user-info', compact('user'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $categories = Category::published()->get();
        $nations = Nation::active()->get();
        $userCategories = $user->categories()->pluck('user_id')->all();

        return view('users.edit', compact('categories', 'nations', 'user', 'userCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Users\UpdateUserRequest $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();

        try {
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->verified = $request->verified;
            $user->nation_id = $request->nation_id;
            $user->city_id = $request->city_id;
            $user->lat = $request->lat;
            $user->lng = $request->lng;

            if ($request->has('password') and $request->password != '') {
                $user->password = Hash::make($request->password);
            }

            if ($user->is_vendor == 1) {
                $user->charge_cost = $request->charge_cost;
                $user->express_charge_cost = $request->express_charge_cost;
                $user->is_vat = $request->is_vat;
                $user->is_recommended = $request->is_recommended;
                $user->is_sponsored = $request->is_sponsored;
            }

            if ($request->hasFile('pic')) {
                $path = $request->file('pic')->storePublicly('avatars/' . $request->user()->id, 's3');
                $user->pic = Storage::disk('s3')->url($path);
            }

            $user->save();

            if ($user->is_vendor == 1) {
                $user->categories()->sync($request->categories);
            }

            $this->loggerHelper->store('user', $user->id, "تم تعديل المستخدم {$user->user_name} رقم {$user->id}");

            DB::commit();

            flash('تم الحفظ بنجاح!', 'success');

            return redirect()->route('users.index');
        } catch (Exception $exception) {
            DB::rollBack();

            flash($exception->getMessage(), 'danger');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
