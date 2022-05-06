@extends('layouts.app')

@section('title', 'الرئيسية')

@section('subheader')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
   <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-1">
         <!--begin::Page Heading-->
         <div class="d-flex align-items-baseline flex-wrap mr-5">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold my-1 mr-5">
               الرئيسية                	            
            </h5>
            <!--end::Page Title-->
         </div>
         <!--end::Page Heading-->
      </div>
      <!--end::Info-->
   </div>
</div>
<!--end::Subheader-->
@endsection

@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b">
    <div class="card-body">
        <!--begin::Details-->
        <div class="d-flex mb-9">
            <!--begin: Pic-->
            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                <div class="symbol symbol-50 symbol-lg-120">
                    <img src="{{ $provider->pic }}" alt="image"/>
                </div>

                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                    <span class="font-size-h3 symbol-label font-weight-boldest">{{ $provider->user_name }}</span>
                </div>
            </div>
            <!--end::Pic-->

            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between flex-wrap mt-1">
                    <div class="d-flex mr-3">
                        <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $provider->user_name }}</a>
                        <a href="#"><i class="flaticon2-correct text-success font-size-h5"></i></a>
                    </div>
                </div>
                <!--end::Title-->

                <!--begin::Content-->
                <div class="d-flex flex-wrap justify-content-between mt-1">
                    <div class="d-flex flex-column flex-grow-1 pr-8">
                        <div class="d-flex flex-wrap mb-4" dir="rtl">
                            <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-new-email ml-2 font-size-lg"></i>{{ $provider->email }}</a>
                            <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i class="flaticon2-phone ml-2 font-size-lg"></i>{{ $provider->phone }} </a>
                        </div>

                        <div class="my-lg-0 my-3">
                            <a href="{{ route('users.edit', $provider) }}" class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-3">تعديل</a>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap align-items-center py-2">
                        <div class="d-flex align-items-center mr-10">
                            <div class="mr-6">
                                <div class="font-weight-bold mb-2">تاريخ التسجيل</div>
                                <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{ date('M, Y d', strtotime($provider->created_at)) }}</span>
                            </div>
                            <div class="mr-6">
                                <div class="font-weight-bold mb-2">التوصيل</div>
                                <span class="btn btn-sm btn-text btn-light-success text-uppercase font-weight-bold">{{ $provider->charge_cost }}</span>
                            </div>
                            <div class="mr-6">
                                <div class="font-weight-bold mb-2">التوصيل السريع</div>
                                <span class="btn btn-sm btn-text btn-light-info text-uppercase font-weight-bold">{{ $provider->express_charge_cost }}</span>
                            </div>
                            <div class="mr-6">
                                <div class="font-weight-bold mb-2">خاضع للضريبة</div>
                                <span class="btn btn-sm btn-text btn-light-dark text-uppercase font-weight-bold">{{ ($provider->is_vat) ? 'نعم' : 'لا' }}</span>
                            </div>
                            <div class="mr-6">
                                <div class="font-weight-bold mb-2">موصي به</div>
                                <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{ ($provider->is_recommended) ? 'نعم' : 'لا' }}</span>
                            </div>
                            <div class="">
                                <div class="font-weight-bold mb-2">دعاية</div>
                                <span class="btn btn-sm btn-text btn-light-warning text-uppercase font-weight-bold">{{ ($provider->is_sponsored) ? 'نعم' : 'لا' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->

        <div class="separator separator-solid"></div>

        <!--begin::Items-->
        <div class="d-flex align-items-center flex-wrap mt-8">
            <!--begin::Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                <span class="mr-4">
                    <i class="flaticon-coins display-4 text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">الأرباح</span>
                    <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">SAR</span>---</span>
                </div>
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                <span class="mr-4">
                    <i class="la la-money display-4 text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">نسبة رتب لي</span>
                    <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">SAR</span>---</span>
                </div>
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                <span class="mr-4">
                    <i class="flaticon-business display-4 text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">المنتجات</span>
                    <span class="font-weight-bolder font-size-h5">{{ $provider->products_count }}</span>
                </div>
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                <span class="mr-4">
                    <i class="flaticon-cart display-4 text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">الطلبات</span>
                    <span class="font-weight-bolder font-size-h5">{{ $provider->orders_count }}</span>
                </div>
            </div>
            <!--end::Item-->
        </div>
        <!--begin::Items-->
    </div>
</div>
<!--end::Card-->
@endsection
