<div class="row row-paddingless mt-5 mb-10">
    <!--begin::Item-->
    <div class="col">
        <div class="d-flex align-items-center mr-2">
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
                <div class="font-size-h4 text-dark-75 font-weight-bolder">{{ numberFormatShort($orders->orderItems_count) }}</div>
                <div class="font-size-sm text-muted font-weight-bold mt-1">عدد الطلبات</div>
            </div>
            <!--end::Title-->
        </div>
    </div>
    <!--end::Item-->

    <!--begin::Item-->
    <div class="col">
        <div class="d-flex align-items-center mr-2">
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
                <div class="font-size-h4 text-dark-75 font-weight-bolder">{{ numberFormatShort($orders->orderItems_total) }} SAR</div>
                <div class="font-size-sm text-muted font-weight-bold mt-1">قيمة الطلبات</div>
            </div>
            <!--end::Title-->
        </div>
    </div>
    <!--end::Widget Item-->
</div>

<div class="row row-paddingless">
    <!--begin::Item-->
    <div class="col">
        <div class="d-flex align-items-center mr-2">
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
                <div class="font-size-h4 text-dark-75 font-weight-bolder">{{ $avgProductsPerOrder }}</div>
                <div class="font-size-sm text-muted font-weight-bold mt-1">متوسط عدد المنتجات للطلب</div>
            </div>
            <!--end::Title-->
        </div>
    </div>
    <!--end::Item-->

    <!--begin::Item-->
    <div class="col">
        <div class="d-flex align-items-center mr-2">
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
                <div class="font-size-h4 text-dark-75 font-weight-bolder">{{ round($orders->avg_order_total, 2) }} SAR</div>
                <div class="font-size-sm text-muted font-weight-bold mt-1">متوسط قيمة الطلب</div>
            </div>
            <!--end::Title-->
        </div>
    </div>
    <!--end::Item-->
</div>