@extends('layouts.app')

@section('title', 'الفاتورة')

@section('content')
<!-- begin::Card-->
<div class="card card-custom overflow-hidden">
    <div class="card-body p-0">
        <!-- begin: Invoice-->
        <!-- begin: Invoice header-->
        <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url({{ asset('assets/media/bg/bg-6.jpg') }});">
            <div class="col-md-9">
                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                    <h1 class="display-4 text-white font-weight-boldest mb-10">الفاتورة</h1>
                    <div class="d-flex flex-column align-items-md-end px-0">
                        <!--begin::Logo-->
                        <a href="#" class="mb-5">
                            <img src="{{ asset('assets/media/logos/logo.png') }}" alt="" style="height: 45px"/>
                        </a>
                        <!--end::Logo-->
                        <span class="text-white d-flex flex-column align-items-md-end opacity-70">

                        </span>
                    </div>
                </div>
                <div class="border-bottom w-100 opacity-20"></div>
                <div class="d-flex justify-content-between text-white pt-6">
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolde mb-2r">التاريخ</span>
                        <span class="opacity-70">{{ date('M d, Y') }}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">رقم الفاتورة</span>
                        <span class="opacity-70">{{ $order->order_id }}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">بيانات العميل</span>
                        <span class="opacity-70">{{ $order->user->user_name }}<br/><span dir="ltr">{{ $order->user->phone }}</span><br/>{{ $order->orderItems()->first()->address }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Invoice header-->

        <!-- begin: Invoice body-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pl-0 font-weight-bold text-muted">المنتج</th>
                                <th class="pl-0 font-weight-bold text-muted">الحالة</th>
                                <th class="pl-0 font-weight-bold text-muted">مزود الخدمة</th>
                                <th class="pl-0 font-weight-bold text-muted">تاريخ التوصيل</th>
                                <th class="pl-0 font-weight-bold text-muted">السعر</th>
                                <th class="pl-0 font-weight-bold text-muted">العدد</th>
                                <th class="pl-0 font-weight-bold text-muted">إجمالي السعر</th>
                                <th class="pl-0 font-weight-bold text-muted">الضريبة</th>
                                <th class="pl-0 font-weight-bold text-muted">الخصم</th>
                                <th class="pl-0 font-weight-bold text-muted">الاجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice as $invoiceItem)
                                <tr @if($invoiceItem['status'] == 4) class="bg-danger" @endif>
                                    <td>{{ $invoiceItem['product'] }}</td>
                                    <td>{{ $invoiceItem['orderStatus'] }}</td>
                                    <td>{{ $invoiceItem['provider'] }}</td>
                                    <td>{{ $invoiceItem['date'] }}</td>
                                    <td>{{ $invoiceItem['price'] }}</td>
                                    <td>{{ $invoiceItem['amount'] }}</td>
                                    <td>{{ $invoiceItem['totalPrice'] }}</td>
                                    <td>{{ $invoiceItem['vat'] }}</td>
                                    <td>{{ number_format($invoiceItem['discount'], 2) }}</td>
                                    <td @if($invoiceItem['status'] != 4) class="text-danger" @endif>{{ number_format(($invoiceItem['totalPrice'] + $invoiceItem['vat']) - $invoiceItem['discount'], 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="8"></td>
                                <td>الإجمالي</td>
                                <td class="text-danger">{{ number_format($total, 2) }} SAR</td>
                            </tr>
                            <tr>
                                <td colspan="8"></td>
                                <td>مصاريف التوصيل</td>
                                <td class="text-danger">{{ $totalDelivery }} SAR</td>
                            </tr>
                            <tr>
                                <td colspan="8"></td>
                                <td>الإجمالي</td>
                                <td class="text-danger">{{ number_format($total + $totalDelivery, 2) }} SAR</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end: Invoice body-->

        <!-- begin: Invoice footer-->
        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                    <div class="d-flex flex-column mb-10 mb-md-0">
                        <div class="font-weight-bolder font-size-lg mb-3">الفاتورة</div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="mr-15 font-weight-bold">الإجمالي:</span>
                            <span class="text-right">{{ number_format($total + $totalDelivery, 2) }}</span></span>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="mr-15 font-weight-bold">كود الخصم:</span>
                            <span class="text-right">{{ ($order->promo) ? $order->promo->name : '(لا يوجد)' }}</span></span>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="mr-15 font-weight-bold">الخصم:</span>
                            <span class="text-right">{{ number_format($totalDiscount, 2) }}</span></span>
                        </div>
                    </div>
                    <div class="d-flex flex-column text-md-right">
                        <span class="font-size-lg font-weight-bolder mb-1">الإجمالي</span>
                        <span class="font-size-h2 font-weight-boldest text-danger mb-1">{{ number_format($total + $totalDelivery, 2) }} SAR</span>
                        <span>شامل الضريبة</span>
                    </div>
                </div>

            </div>
        </div>
        <!-- end: Invoice footer-->

        <!-- begin: Invoice action-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
                    <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
                </div>
            </div>
        </div>
        <!-- end: Invoice action-->

        <!-- end: Invoice-->
    </div>
</div>
<!-- end::Card-->
@endsection

@section('scripts')

@endsection