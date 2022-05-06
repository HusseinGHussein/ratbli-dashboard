<!--begin::Row-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Advance Table Widget 3-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">أحدث الطلبات</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">عرض أحدث 10 طلبات</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('order-items.index', ['provider' => $provider->id]) }}" target="_blank" class="btn btn-success font-weight-bolder font-size-sm">عرض كل الطلبات</a>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-0 pb-3">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="pl-7"><span class="text-dark-75">#</span></th>
                                <th>رقم الطلب</th>
                                <th>الحالة</th>
                                <th>العميل</th>
                                <th>طريقة الدفع</th>
                                <th>المنتج</th>
                                <th>الكمية</th>
                                <th>التاريخ</th>
                                <th>الفترة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $orderItem)
                            <tr>
                                <td class="pl-7 py-8">
                                    <div class="d-flex align-items-center">
                                    {{ $orderItem->id }}
                                    </div>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                    {{ $orderItem->order->order_id }}
                                    </span>
                                </td>
                                <td>
                                    <span class="label label-lg label-light-{{ $orderItem->orderStatus->class }} label-inline">{{ $orderItem->orderStatus->name }}</span>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="showUserInfoModal" data-id="{{ $orderItem->order->user->id }}">
                                    {{ ($orderItem->order->user->user_name) ? $orderItem->order->user->user_name : '(بدون اسم)' }}
                                    </a>
                                </td>
                                <td>
                                    {!! formatPaymentType($orderItem->order->payment_type) !!}
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="showProductInfoModal" data-id="{{ $orderItem->product->id }}">
                                    {{ $orderItem->product->name }}
                                    </a>
                                </td>
                                <td>{{ $orderItem->amount }}</td>
                                <td>{{ $orderItem->date }}</td>
                                <td>{{ (getStringBetween($orderItem->notes, '<', '>')) ? getStringBetween($orderItem->notes, '<', '>') : $orderItem->time }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">لا توجد أي طلبات</td>
                            </tr>
                            @endforelse
                    </tbody>
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Advance Table Widget 3-->
    </div>
</div>
<!--end::Row-->