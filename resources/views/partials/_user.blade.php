<!-- begin::User Panel-->
<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
    <h3 class="font-weight-bold m-0">
        الصفحة الشخصية
    </h3>
    <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
    <i class="ki ki-close icon-xs text-muted"></i>
    </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
    <!--begin::Header-->
    <div class="d-flex align-items-center mt-5">
        <div class="symbol symbol-100 mr-5">
            <div class="symbol-label" style="background-image:url({{ asset(Auth::user()->pic) }})"></div>
            <i class="symbol-badge bg-success"></i>
        </div>
        <div class="d-flex flex-column">
            <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
            {{ Auth::user()->user_name }}
            </a>
            <div class="text-muted mt-1" dir="ltr">
                {{ Auth::user()->phone }}
            </div>
            <div class="navi mt-2">
                <a href="#" class="navi-item">
                <span class="navi-link p-0 pb-2">
                    <span class="navi-icon mr-1">
                        <span class="svg-icon svg-icon-lg svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
                            </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                    <span class="navi-text text-muted text-hover-primary">{{ Auth::user()->email }}</span>
                </span>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">تسجيل الخروج</button>
                </form>
            </div>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Separator-->
    <div class="separator separator-dashed mt-8 mb-5"></div>
    <!--end::Separator-->
    <!--begin::Nav-->
    <div class="navi navi-spacer-x-0 p-0">
        <!--begin::Item-->
        <a href="#" class="navi-item">
            <div class="navi-link">
                <div class="symbol symbol-40 bg-light mr-3">
                <div class="symbol-label">
                    <span class="svg-icon svg-icon-md svg-icon-success">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"/>
                            <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                </div>
                <div class="navi-text">
                <div class="font-weight-bold">
                    الصفحة الشخصية
                </div>
                <div class="text-muted">
                    إعدادات الحساب
                </div>
                </div>
            </div>
        </a>
        <!--end:Item-->
        <!--begin::Item-->
        <a href="#"  class="navi-item">
            <div class="navi-link">
                <div class="symbol symbol-40 bg-light mr-3">
                <div class="symbol-label">
                    <span class="svg-icon svg-icon-md svg-icon-danger">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Files/Selected-file.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                            <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                </div>
                <div class="navi-text">
                <div class="font-weight-bold">
                    النشاط
                </div>
                <div class="text-muted">
                    النشاط والتنبيهات
                </div>
                </div>
            </div>
        </a>
        <!--end:Item-->
    </div>
    <!--end::Nav-->
    <!--begin::Separator-->
    <div class="separator separator-dashed my-7"></div>
    <!--end::Separator-->
    <!--begin::Notifications-->
    <div>
        <!--begin:Heading-->
        <h5 class="mb-5">
            أحدث التنبيهات
        </h5>
        <!--end:Heading-->
        <!--begin::Item-->
        <div class="d-flex align-items-center bg-light-warning rounded p-5 gutter-b">
            <span class="svg-icon svg-icon-warning mr-5">
                <span class="svg-icon svg-icon-lg">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/>
                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                    </g>
                </svg>
                <!--end::Svg Icon-->
                </span>
            </span>
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Another purpose persuade</a>
                <span class="text-muted font-size-sm">Due in 2 Days</span>
            </div>
            <span class="font-weight-bolder text-warning py-1 font-size-lg">+28%</span>
        </div>
        <!--end::Item-->
        <!--begin::Item-->
        <div class="d-flex align-items-center bg-light-success rounded p-5 gutter-b">
            <span class="svg-icon svg-icon-success mr-5">
                <span class="svg-icon svg-icon-lg">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                    </g>
                </svg>
                <!--end::Svg Icon-->
                </span>
            </span>
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Would be to people</a>
                <span class="text-muted font-size-sm">Due in 2 Days</span>
            </div>
            <span class="font-weight-bolder text-success py-1 font-size-lg">+50%</span>
        </div>
        <!--end::Item-->
    </div>
    <!--end::Notifications-->
    </div>
    <!--end::Content-->
</div>
<!-- end::User Panel-->