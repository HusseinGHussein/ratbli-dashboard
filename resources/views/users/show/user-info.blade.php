<!--begin::User-->
<div class="d-flex align-items-center">
    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
        <div class="symbol-label" style="background-image:url({{ $user->pic }})"></div>
        <i class="symbol-badge bg-success"></i>
    </div>
    <div>
        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
            {{ ($user->user_name) ? $user->user_name : '(بدون اسم)' }}
        </a>
        <div class="text-muted">
            عميل
        </div>
        <div class="mt-2">
            @if($user->email)
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $user->email }}" target="_blank" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1"><i class="flaticon-email"></i></a>
            @endif
            <a href="https://api.whatsapp.com/send?phone={{ $user->phone }}" target="_blank" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1"><i class="flaticon-whatsapp"></i></a>
        </div>
    </div>
</div>
<!--end::User-->

<!--begin::Contact-->
<div class="pt-8 pb-6">
    <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="font-weight-bold mr-2">البريد الالكتروني:</span>
        <a href="#" class="text-muted text-hover-primary">{{ ($user->email) ? $user->email : '...' }}</a>
    </div>
    <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="font-weight-bold mr-2">رقم الجوال:</span>
        <span class="text-muted" dir="ltr">{{ $user->phone }}</span>
    </div>
</div>
<!--end::Contact-->
