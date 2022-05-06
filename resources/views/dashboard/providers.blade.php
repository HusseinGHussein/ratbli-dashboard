@foreach($providers as $provider)
<!--begin::Item-->
<div class="d-flex align-items-center mb-10">
    <!--begin::Symbol-->
    <div class="symbol symbol-40 symbol-light-success mr-5">
        <img src="{{ $provider->pic }}" class="" alt=""/>
    </div>
    <!--end::Symbol-->

    <!--begin::Text-->
    <div class="d-flex flex-column flex-grow-1 font-weight-bold">
        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">{{ $provider->user_name }}</a>
    </div>
    <!--end::Text-->

    <!--begin::Dropdown-->
    <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
        <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ki ki-bold-more-hor"></i>
        </a>
        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
            <!--begin::Navigation-->
            <ul class="navi navi-hover">
                <li class="navi-header font-weight-bold py-4">
                    <span class="font-size-lg">الاحصائيات:</span>
                </li>
                <li class="navi-separator mb-3 opacity-70"></li>
                <li class="navi-item">
                    <a href="#" class="navi-link">
                        <span class="navi-text">
                            <span class="label label-xl label-inline label-light-success">{{ numberFormatShort($provider->views) }} مشاهدة</span>
                        </span>
                    </a>
                </li>
                <li class="navi-item">
                    <a href="#" class="navi-link">
                        <span class="navi-text">
                            <span class="label label-xl label-inline label-light-info">{{ numberFormatShort($provider->completed) }} طلب مكتمل</span>
                        </span>
                    </a>
                </li>
                <li class="navi-item">
                    <a href="#" class="navi-link">
                        <span class="navi-text">
                            <span class="label label-xl label-inline label-light-danger">{{ numberFormatShort($provider->rejected) }} طلب ملغي</span>
                        </span>
                    </a>
                </li>
            </ul>
            <!--end::Navigation-->
        </div>
    </div>
    <!--end::Dropdown-->
</div>
<!--end::Item-->
@endforeach