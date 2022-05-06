@extends('layouts.app')

@section('subheader')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
   <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-1">
         <!--begin::Page Heading-->
         <div class="d-flex align-items-baseline flex-wrap mr-5">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
               لوحة المعلومات
            </h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

            <span class="text-muted font-weight-bold mr-4">عرض الاحصائيات</span>
            <!--end::Actions-->
         </div>
         <!--end::Page Heading-->
      </div>
      <!--end::Info-->
   </div>
</div>
<!--end::Subheader-->
@endsection

@section('content')
<!--begin::Row-->
<div class="row">
    <div class="col-xl-4">
        <!--begin::Mixed Widget 1-->
        <div class="card card-custom bg-danger gutter-b card-stretch">
            <!--begin::Header-->
            <div class="card-header border-0 bg-danger py-5">
                <h3 class="card-title font-weight-bolder text-white">رتبلي الان</h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body p-0 position-relative overflow-hidden">
                <!--begin::Stats-->
                <div class="card-spacer  bg-danger">
                    <!--begin::Row-->
                    <div class="row m-0">
                        <div class="col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                            <span class="svg-icon svg-icon-2x svg-icon-warning d-block my-2">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-warning font-size-h2 mb-0 mt-2 d-block">{{ numberFormatShort($usersCount->users) }}</span>
                            <a href="{{ route('users.index') }}" class="text-warning font-weight-bold font-size-lg">
                            المستخدمين
                            </a>
                        </div>
                        <div class="col bg-white px-6 py-8 rounded-xl mb-7">
                            <span class="svg-icon svg-icon-2x svg-icon-info d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="card-title font-weight-bolder text-info font-size-h2 mb-0 mt-2 d-block">{{ numberFormatShort($counts['orderItems']['allOrders']) }}</span>
                            <a href="{{ route('orders.index') }}" class="text-info font-weight-bold font-size-lg mt-2">
                            الطلبات
                            </a>
                        </div>
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row m-0">
                        <div class="col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                            <span class="svg-icon svg-icon-2x svg-icon-success d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
                                        <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="card-title font-weight-bolder text-success font-size-h2 mb-0 mt-2 d-block">{{ numberFormatShort($usersCount->providers) }}</span>
                            <a href="{{ route('providers.index') }}" class="text-success font-weight-bold font-size-lg mt-2">
                            مزودي الخدمة
                            </a>
                        </div>
                        <div class="col bg-white px-6 py-8 rounded-xl mb-7">
                            <span class="svg-icon svg-icon-2x svg-icon-danger d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="card-title font-weight-bolder text-danger font-size-h2 mb-0 mt-2 d-block">{{ numberFormatShort($productsTotalPrice) }}</span>
                            <a href="#" class="text-danger font-weight-bold font-size-lg mt-2">
                            إجمالي المنتجات
                            </a>
                        </div>
                    </div>
                    <!--end::Row-->

                    <!--begin::Row-->
                    <div class="row m-0">
                        <div class="col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
                            <span class="svg-icon svg-icon-2x svg-icon-dark d-block my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="card-title font-weight-bolder text-dark font-size-h2 mb-0 mt-2 d-block">{{ numberFormatShort($weeklyIncome) }}</span>
                            <a href="#" class="text-dark font-weight-bold font-size-lg mt-2">
                            الربح الأسبوعي
                            </a>
                        </div>
                        <div class="col bg-white px-6 py-8 rounded-xl mb-7">
                            <span class="svg-icon svg-icon-2x svg-icon-primary d-block my-2">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-primary font-size-h2 mb-0 mt-2 d-block">+{{ $newUsers }}</span>
                            <a href="#" class="text-primary font-weight-bold font-size-lg mt-2">
                            مستخدمين جدد
                            </a>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 1-->
    </div>

    <div class="col-xl-4">
        <div class="card card-custom card-stretch card-stretch-half gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <div class="card-title font-weight-bolder">
                    <div class="card-label">
                        مبيعات رتبلي
                        <div class="font-size-sm text-muted mt-2">{{ numberFormatShort($counts['orderItems']['completed']) }} طلب</div>
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="radio-inline mr-5 mt-5">
                        <label class="btn btn-clean  btn-sm font-weight-bold font-size-base mr-1">
                            <input type="radio" name="filterOrders" value="day" checked style="display: none">
                            <span></span>
                            اليوم
                        </label>
                        <label class="btn btn-clean  btn-sm font-weight-bold font-size-base mr-1">
                            <input type="radio" name="filterOrders" value="month" style="display: none">
                            <span></span>
                            الشهر
                        </label>
                        <label class="btn btn-clean  btn-sm font-weight-bold font-size-base mr-1">
                            <input type="radio" name="filterOrders" value="year" style="display: none">
                            <span></span>
                            السنة
                        </label>
                    </div>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body p-0 d-flex flex-column" style="position: relative;">
                <!--begin::Items-->
                <div class="flex-grow-1 card-spacer" id="orders">

                </div>
                <!--end::Items-->
            </div>
        </div>

        <div class="card card-custom card-stretch card-stretch-half gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <div class="card-title font-weight-bolder">
                    <div class="card-label">
                        المنتجات
                    </div>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body p-0 d-flex flex-column" style="position: relative;">
                <!--begin::Items-->
                <div class="flex-grow-1 card-spacer">
                    <div class="row row-paddingless mt-5 mb-10">
                        <!--begin::Item-->
                        <div class="col">
                            <a href="{{ route('list-products') }}" target="_blank" class="d-flex align-items-center mr-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
                                    <div class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-info">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Title-->
                                <div>
                                    <div class="font-size-h4 text-dark-75 font-weight-bolder">{{ numberFormatShort($productsCount['allProducts']) }}</div>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">عدد المنتجات</div>
                                </div>
                                <!--end::Title-->
                            </a>
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="col">
                            <a href="{{ route('list-products', ['status' => 1]) }}" target="_blank"  class="d-flex align-items-center mr-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                                    <div class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-danger">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Title-->
                                <div>
                                    <div class="font-size-h4 text-dark-75 font-weight-bolder">{{ numberFormatShort($productsCount['activated']) }}</div>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">المنتجات المفعلة</div>
                                </div>
                                <!--end::Title-->
                            </a>
                        </div>
                        <!--end::Widget Item-->
                    </div>

                    <div class="row row-paddingless">
                        <!--begin::Item-->
                        <div class="col">
                            <a href="{{ route('list-products', ['status' => 2]) }}" target="_blank" class="d-flex align-items-center mr-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light-success mr-4 flex-shrink-0">
                                    <div class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-success">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Title-->
                                <div>
                                    <div class="font-size-h4 text-dark-75 font-weight-bolder">{{ numberFormatShort($productsCount['deactivated']) }}</div>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">المنتجات الموقوفة</div>
                                </div>
                                <!--end::Title-->
                            </a>
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="col">
                            <a href="{{ route('list-products', ['status' => 0]) }}" target="_blank" class="d-flex align-items-center mr-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light-primary mr-4 flex-shrink-0">
                                    <div class="symbol-label">
                                        <span class="svg-icon svg-icon-lg svg-icon-primary">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"></rect>
                                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Title-->
                                <div>
                                    <div class="font-size-h4 text-dark-75 font-weight-bolder">{{ numberFormatShort($productsCount['waiting']) }}</div>
                                    <div class="font-size-sm text-muted font-weight-bold mt-1">المنتجات قيد التفعيل</div>
                                </div>
                                <!--end::Title-->
                            </a>
                        </div>
                        <!--end::Item-->
                    </div>
                </div>
                <!--end::Items-->
            </div>
        </div>
    </div>

	<div class="col-xl-4">
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">أحدث التقييمات</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">أكثر من +{{ $feedbackCount }} تقييم</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0 pb-3">
                <div class="tab-content">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-left text-uppercase">
                                    <th style="min-width: 250px" class="pl-7"><span class="text-dark-75">المنتج</span></th>
                                    <th style="min-width: 100px">العميل</th>
                                    <th style="min-width: 100px">الطلب</th>
                                    <th style="min-width: 120px">تقييم المنتج</th>
                                    <th style="min-width: 120px">تقييم التوصيل</th>
                                    <th style="min-width: 350px">الملاحظات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestFeedback as $feedback)
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 symbol-light mr-4">
                                                    <img src="{{ $feedback->product->img }}" alt=""/>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $feedback->product->name }}</a>
                                                    <span class="text-muted font-weight-bold d-block">{{ $feedback->product->category->name }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                {{ ($feedback->user->user_name) ?? '(بدون اسم)' }}
                                            </span>
                                            <span class="text-muted font-weight-bold">
                                                {{ $feedback->user->phone }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                {{ $feedback->order_id }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($feedback->rate > 0)
                                            @for ($i = 1; $i <= $feedback->rate; $i++)
                                                <span class="svg-icon svg-icon-warning svg-icon-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @endfor
                                            @endif
                                        </td>
                                        <td>
                                            @if($feedback->delivery_rate > 0)
                                            @for ($i = 1; $i <= $feedback->delivery_rate; $i++)
                                                <span class="svg-icon svg-icon-warning svg-icon-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @endfor
                                            @else
                                            ---
                                            @endif
                                        </td>
                                        <td class="pr-0">
                                            {{ $feedback->notes_product }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Body-->
        </div>
	</div>
</div>
<!--en::Row-->
<!--begin::Row-->
<div class="row">
    <div class="col-xl-2">
        <!--begin::Stats Widget 25-->
        <div class="card card-custom bg-light-warning card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <a href="{{ route('order-items.index', ['status' => 1]) }}">
                    <span class="svg-icon svg-icon-warning svg-icon-2x">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Waiting.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ numberFormatShort($counts['orderItems']['waiting'] + $counts['orderItems']['selectPayment']) }}</span>
                    <span class="font-weight-bold text-muted  font-size-sm">قيد الانتظار</span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 25-->
    </div>

    <div class="col-xl-2">
        <!--begin::Stats Widget 25-->
        <div class="card card-custom bg-light-success card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <a href="{{ route('order-items.index', ['status' => 3]) }}">
                    <span class="svg-icon svg-icon-success svg-icon-2x">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                <path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ numberFormatShort($counts['orderItems']['accepted']) }}</span>
                    <span class="font-weight-bold text-muted  font-size-sm">مقبولة</span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 25-->
    </div>

    <div class="col-xl-2">
        <!--begin::Stats Widget 25-->
        <div class="card card-custom bg-light-danger card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <a href="{{ route('order-items.index', ['status' => 4]) }}">
                    <span class="svg-icon svg-icon-danger svg-icon-2x">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ numberFormatShort($counts['orderItems']['rejected']) }}</span>
                    <span class="font-weight-bold text-muted  font-size-sm">مرفوضة</span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 25-->
    </div>

    <div class="col-xl-2">
        <!--begin::Stats Widget 25-->
        <div class="card card-custom bg-light-info card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <a href="{{ route('order-items.index', ['status' => 5]) }}">
                    <span class="svg-icon svg-icon-info svg-icon-2x">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Time-schedule.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
                                <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ numberFormatShort($counts['orderItems']['preparing']) }}</span>
                    <span class="font-weight-bold text-muted  font-size-sm">جاري التحضير</span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 25-->
    </div>

    <div class="col-xl-2">
        <!--begin::Stats Widget 25-->
        <div class="card card-custom bg-light-dark card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <a href="{{ route('order-items.index', ['status' => 6]) }}">
                    <span class="svg-icon svg-icon-dark svg-icon-2x">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Wood-horse.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M6.98113892,21.5 L7.61810208,21.5 C7.84357761,21.5 8.04115745,21.3490893 8.10048399,21.1315587 L9.37729932,16.4497595 C9.44617559,16.1972133 9.69816937,16.0405293 9.95512991,16.0904778 C11.3596584,16.3634926 12.3746151,16.5 13,16.5 C13.646503,16.5 15.0010968,16.3541177 17.0637814,16.0623532 L17.0637875,16.0623965 C17.3131816,16.0271199 17.5498754,16.1828763 17.6161485,16.4258779 L18.899516,21.1315587 C18.9588425,21.3490893 19.1564224,21.5 19.3818979,21.5 L20.0384026,21.5 C20.2990829,21.5 20.5160222,21.2997228 20.5368102,21.0398726 L21.1544815,13.3189809 C21.3306498,11.1168774 19.6883048,9.18890717 17.4862013,9.01273889 C17.3800862,9.00424968 17.2736745,9 17.1672204,9 L13,9 C12.0256112,6.96792142 11.1922779,5.63458808 10.5,5 C10.1827335,4.70917234 8.36084967,3.94216891 5.03434861,2.69898968 L5.03438003,2.69890562 C4.87913228,2.64088647 4.7062453,2.71970582 4.64822614,2.87495357 C4.62696245,2.93185098 4.62346541,2.99386164 4.63819725,3.05278899 L4.92939183,4.21785549 C4.97292798,4.39200007 4.919759,4.57611822 4.79008912,4.70024499 C4.13636504,5.32602378 3.70633533,5.75927545 3.5,6 C3.28507393,6.25074708 2.97597493,7.00745907 2.57270301,8.27013596 L2.5727779,8.27015988 C2.52651585,8.4150101 2.54869436,8.57304154 2.6330412,8.69956179 L3.23554277,9.60331416 C3.38359021,9.82538532 3.67995409,9.89202755 3.9088158,9.75471052 L4.75,9.25 C5.15859127,9.00484524 5.68855714,9.13733671 5.9337119,9.54592798 C6.00837879,9.67037279 6.05044776,9.81164184 6.05602542,9.95666096 L6.48150833,21.0192166 C6.49183398,21.2876836 6.71247339,21.5 6.98113892,21.5 Z" fill="#000000"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ numberFormatShort($counts['orderItems']['delivering']) }}</span>
                    <span class="font-weight-bold text-muted  font-size-sm">خارج للتوصيل</span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 25-->
    </div>

    <div class="col-xl-2">
        <!--begin::Stats Widget 25-->
        <div class="card card-custom bg-light-primary card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <a href="{{ route('order-items.index', ['status' => 7]) }}">
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Dislike.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M2.70963455,10 L2.70963455,19 L3.86223328,19.3841996 C5.08583091,19.7920655 6.36718132,20 7.65696647,20 L11.2502228,20 C12.6802659,20 13.9115103,18.990621 14.1919649,17.5883484 L14.9411635,13.8423552 C15.2660994,12.217676 14.2124491,10.6372006 12.5877699,10.3122648 C12.3285558,10.260422 12.0636265,10.2430672 11.7998644,10.2606513 L8.20963455,10.5 L8.57383093,6.49383981 C8.6423241,5.74041495 8.08707726,5.07411874 7.3336524,5.00562558 C7.29241938,5.00187712 7.25103761,5 7.20963455,5 L7.20963455,5 C6.27903894,5 5.4166784,5.48826024 4.93789092,6.28623939 L2.70963455,10 Z" fill="#000000" transform="translate(8.854817, 12.500000) scale(-1, 1) translate(-8.854817, -12.500000) "/>
                                <rect fill="#000000" opacity="0.3" transform="translate(19.500000, 14.500000) scale(-1, 1) translate(-19.500000, -14.500000) " x="17" y="9" width="5" height="11" rx="1"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ numberFormatShort($counts['orderItems']['completed']) }}</span>
                    <span class="font-weight-bold text-muted  font-size-sm">مكتملة</span>
                </a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 25-->
    </div>
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row">
	<div class="col-lg-8">
		<!--begin::Advance Table Widget 4-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">تحليل المنتجات لكل قسم</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">أكثر من <span dir="ltr">+{{ $productsCount['allProducts'] }}</span> منتج</span>
                </h3>
                <div class="card-toolbar">
                    <div class="radio-inline mr-5 mt-5">
                        <label class="radio radio-info">
                            <input type="radio" name="filterProducts" value="1" checked>
                            <span></span>
                            الأكثر مشاهدة
                        </label>
                        <label class="radio radio-info">
                            <input type="radio" name="filterProducts" value="2">
                            <span></span>
                            الأكثر مبيعا
                        </label>
                        <label class="radio radio-info">
                            <input type="radio" name="filterProducts" value="3">
                            <span></span>
                            الأكثر إلغاءاً
                        </label>
                    </div>
                    <select class="form-control form-control-sm text-info font-weight-bold mr-4 border-0 bg-light-info mt-5" name="category" style="width: 250px;">
                        <option value="all">عرض الكل</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-0 pb-3">
                <div class="tab-content">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr class="text-left text-uppercase">
                                    <th style="min-width: 250px" class="pl-7"><span class="text-dark-75">المنتج</span></th>
                                    <th style="min-width: 130px">القسم</th>
                                    <th style="min-width: 100px">السعر</th>
                                    <th style="min-width: 100px">المشاهدات</th>
                                    <th style="min-width: 100px">الطلبات</th>
                                    <th style="min-width: 100px">الإلغاء</th>
                                </tr>
                            </thead>
                            <tbody id="products">

                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Advance Table Widget 4-->
    </div>

	<div class="col-lg-4">
		<!--begin::List Widget 3-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bolder text-dark">مزودي الخدمات</h3>
                <div class="card-toolbar">
                    <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" name="filterProviders" style="width: 150px;">
                        <option value="1">الأكثر مشاهدة</option>
                        <option value="2">الأكثر مبيعا</option>
                        <option value="3">الأكثر إلغاءاً</option>
                    </select>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-2" id="providers">

            </div>
            <!--end::Body-->
        </div>
        <!--end::List Widget 3-->
	</div>
</div>
<!--end::Row-->
@endsection

@section('scripts')
    <script>
        function getProducts()
        {
            $.ajax({
                    type: 'GET',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'HTML',
                    url: "{{ route('dashboard.products') }}",
                    data: {
                        filterProducts: $("input[name='filterProducts']:checked").val(),
                        category: $("select[name='category']").val()
                    },
                    beforeSend: function(){
                        //
                    },
                    success: function(data) {
                        $('#products').html(data);
                    },
                    error: function(data){

                    }

                });
        }

        $("input[name='filterProducts']").click(function(){
            getProducts();
        });

        $("select[name='category']").change(function () {
            getProducts();
        });

        getProducts();

        function getProviders()
        {
            $.ajax({
                    type: 'GET',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'HTML',
                    url: "{{ route('dashboard.providers') }}",
                    data: {
                        filterProviders: $("select[name='filterProviders']").val()
                    },
                    beforeSend: function(){
                        //
                    },
                    success: function(data) {
                        $('#providers').html(data);
                    },
                    error: function(data){

                    }

                });
        }

        $("select[name='filterProviders']").change(function(){
            getProviders();
        });

        getProviders();

        function getOrders()
        {
            $.ajax({
                    type: 'GET',
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'HTML',
                    url: "{{ route('dashboard.orders') }}",
                    data: {
                        filterOrders: $("input[name='filterOrders']:checked").val()
                    },
                    beforeSend: function(){
                        //
                    },
                    success: function(data) {
                        $('#orders').html(data);
                    },
                    error: function(data){

                    }

                });
        }

        $("input[name='filterOrders']").click(function(){
            getOrders();
        });

        getOrders();

        "use strict";

        // Class definition
        var KTWidgets = function() {
            var _initMixedWidget17 = function() {
                var element = document.getElementById("OrdersChart");
                var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'warning';
                var height = parseInt(KTUtil.css(element, 'height'));

                if (!element) {
                    return;
                }

                var options = {
                    series: [{
                        name: 'إجمالي الطلبات',
                        data: @json($ordersChartTotal)
                    }],
                    chart: {
                        type: 'area',
                        height: height,
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        },
                        sparkline: {
                            enabled: true
                        }
                    },
                    plotOptions: {},
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    fill: {
                        type: 'solid',
                        opacity: 1
                    },
                    stroke: {
                        curve: 'smooth',
                        show: true,
                        width: 3,
                        colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
                    },
                    xaxis: {
                        categories: @json($ordersChart->pluck('month')),
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            show: false,
                            style: {
                                colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                                fontSize: '12px',
                                fontFamily: KTApp.getSettings()['font-family']
                            }
                        },
                        crosshairs: {
                            show: false,
                            position: 'front',
                            stroke: {
                                color: KTApp.getSettings()['colors']['gray']['gray-300'],
                                width: 1,
                                dashArray: 3
                            }
                        },
                        tooltip: {
                            enabled: true,
                            formatter: undefined,
                            offsetY: 0,
                            style: {
                                fontSize: '12px',
                                fontFamily: KTApp.getSettings()['font-family']
                            }
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 60,
                        labels: {
                            show: false,
                            style: {
                                colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                                fontSize: '12px',
                                fontFamily: KTApp.getSettings()['font-family']
                            }
                        }
                    },
                    states: {
                        normal: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        },
                        y: {
                            formatter: function(val) {
                                return + val + " SAR"
                            }
                        }
                    },
                    colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
                    markers: {
                        colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
                        strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
                        strokeWidth: 3
                    }
                };

                var chart = new ApexCharts(element, options);
                chart.render();
            }

            var _initChartsWidget1 = function() {
                var element = document.getElementById("kt_charts_widget_1_chart");

                if (!element) {
                    return;
                }

                var options = {
                    series: [{
                        name: 'الربح اليومي',
                        data: @json($weeklyIncomeChart->pluck('total'))
                    }],
                    chart: {
                        type: 'bar',
                        height: 350,
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: ['30%'],
                            endingShape: 'rounded'
                        },
                    },
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: @json($weeklyIncomeChart->pluck('day')),
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            style: {
                                colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                                fontSize: '12px',
                                fontFamily: KTApp.getSettings()['font-family']
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                                fontSize: '12px',
                                fontFamily: KTApp.getSettings()['font-family']
                            }
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    states: {
                        normal: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        },
                        y: {
                            formatter: function(val) {
                                return val + " SAR"
                            }
                        }
                    },
                    colors: [KTApp.getSettings()['colors']['theme']['base']['success'], KTApp.getSettings()['colors']['gray']['gray-300']],
                    grid: {
                        borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: true
                            }
                        }
                    }
                };

                var chart = new ApexCharts(element, options);
                chart.render();
            }

            return {
                init: function() {
                    _initMixedWidget17();
                    _initChartsWidget1();
                }
            }
        }();

        // Webpack support
        if (typeof module !== 'undefined') {
            module.exports = KTWidgets;
        }

        jQuery(document).ready(function() {
            KTWidgets.init();
        });
    </script>
@endsection
