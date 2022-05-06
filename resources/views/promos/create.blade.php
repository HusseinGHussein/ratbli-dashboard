@extends('layouts.app')

@section('title', 'إضافة كود خصم')

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
               إضافة كود خصم
            </h5>
            <!--end::Page Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
               <li class="breadcrumb-item">
                  <a href="{{ url('/') }}" class="text-muted">
                    الرئيسية
                  </a>
               </li>
               <li class="breadcrumb-item">
                  <a href="{{ route('promos.index') }}" class="text-muted">
                    أكواد الخصم
                  </a>
               </li>
               <li class="breadcrumb-item">
                  <a href="" class="text-muted">
                    إضافة كود خصم
                  </a>
               </li>
            </ul>
            <!--end::Breadcrumb-->
         </div>
         <!--end::Page Heading-->
      </div>
      <!--end::Info-->
      <!--begin::Toolbar-->
      <div class="d-flex align-items-center">
        <button type="submit" form="kt_form" class="btn btn-light-primary font-weight-bold btn-sm px-4 font-size-base ml-2" id="kt_btn"><i class="la la-save"></i>حفظ</button>
        <a href="{{ route('promos.index') }}" class="btn btn-light-dark font-weight-bold btn-sm px-4 font-size-base ml-2">عودة</a>
      </div>
      <!--end::Toolbar-->
   </div>
</div>
<!--end::Subheader-->
@endsection

@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <!--begin::Card header-->
    <div class="card-header card-header-tabs-line nav-tabs-line-3x">
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                <!--begin::Item-->
                <li class="nav-item mr-3">
                    <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                        <span class="nav-icon"><span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span></span>
                        <span class="nav-text font-size-lg">البيانات الاساسية</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="nav-item mr-3">
                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
                        <span class="nav-icon"><span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"/>
        <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span></span>
                        <span class="nav-text font-size-lg">الأقسام</span>
                    </a>
                </li>
                <!--end::Item-->
            </ul>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body px-0">
        <form class="form" id="kt_form" action="{{ route('promos.store') }}" method="POST">
            @csrf
            <div class="tab-content">
                <!--begin::Tab-->
                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7 my-2">
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">كود الخصم</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="كود الخصم"/>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">تاريخ البداية</label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <div class="input-group date" id="kt_datetimepicker_1" data-target-input="nearest">
                                        <input type="text" name="start_date" class="form-control datetimepicker-input" placeholder="تاريخ البداية" data-target="#kt_datetimepicker_1"/>
                                        <div class="input-group-append" data-target="#kt_datetimepicker_1" data-toggle="datetimepicker">
                                            <span class="input-group-text">
                                                <i class="ki ki-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">تاريخ النهاية</label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <div class="input-group date" id="kt_datetimepicker_2" data-target-input="nearest">
                                        <input type="text" name="end_date" class="form-control datetimepicker-input" placeholder="تاريخ النهاية" data-target="#kt_datetimepicker_2"/>
                                        <div class="input-group-append" data-target="#kt_datetimepicker_2" data-toggle="datetimepicker">
                                            <span class="input-group-text">
                                                <i class="ki ki-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">النوع</label>
                                <div class="col-9 col-form-label">
                                    <div class="radio-inline">
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                            <input type="radio" name="type" value="percentage" checked="checked" @if(old('type') == 'percentage') checked="checked" @endif/>
                                            <span></span>
                                            نسبة
                                        </label>
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                            <input type="radio" name="type" value="value" @if(old('type') == 'value') checked="checked" @endif />
                                            <span></span>
                                            قيمة
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">القيمة</label>
                                <div class="col-9">
                                    <input name="value" class="form-control form-control-lg form-control-solid @error('value') is-invalid @enderror" type="number" value="{{ old('value') }}" placeholder="قيمة / نسبة الخصم"/>
                                    @error('value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">خصم قيمة التوصيل</label>
                                <div class="col-9 col-form-label">
                                    <div class="radio-inline">
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                            <input type="radio" name="with_delivery" value="1" @if(old('with_delivery') == 1) checked="checked" @endif/>
                                            <span></span>
                                            نعم
                                        </label>
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                            <input type="radio" name="with_delivery" value="0" checked="checked" @if(old('with_delivery') == 0) checked="checked" @endif />
                                            <span></span>
                                            لا
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">أقل قيمة للطلب</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input name="min_discount" type="number" class="form-control form-control-lg form-control-solid @error('min_discount') is-invalid @enderror" value="{{ old('min_discount') }}" placeholder="أقل قيمة للطلب" />
                                        <div class="input-group-append"><span class="input-group-text">SAR</span></div>
                                        @error('min_discount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">الحد الأقصي للخصم</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input name="max_discount" type="number" class="form-control form-control-lg form-control-solid @error('max_discount') is-invalid @enderror" value="{{ old('max_discount') }}" placeholder="الحد الأقصي للخصم" />
                                        <div class="input-group-append"><span class="input-group-text">SAR</span></div>
                                        @error('max_discount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">إجمالي كود الخصم</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input name="max_limit" type="number" class="form-control form-control-lg form-control-solid @error('max_limit') is-invalid @enderror" value="{{ old('max_limit') }}" placeholder="إجمالي كود الخصم" />
                                        <div class="input-group-append"><span class="input-group-text">SAR</span></div>
                                        @error('max_limit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-3 col-form-label text-lg-right text-left">الحالة</label>
                                <div class="col-3">
                                    <span class="switch switch-icon">
                                        <label>
                                            <input type="checkbox" checked="checked" name="status"/>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <!--end::Group-->
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Tab-->

                <!--begin::Tab-->
                <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7">
                            <div class="my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-form-label col-3 text-lg-right text-left">الأقسام</label>
                                    <div class="col-9 col-form-label">
                                        <div class="checkbox-list">
                                            @foreach($categories as $category)
                                            <label class="checkbox">
                                                <input type="checkbox" name="category_id[]" {{ (is_array(old('category_id')) && in_array($category->id, old('category_id'))) ? 'checked' : '' }} value="{{ $category->id }}">
                                                <span></span>
                                                {{ $category->name }}
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Tab-->
            </div>
        </form>
    </div>
    <!--begin::Card body-->
</div>
<!--end::Card-->
@endsection

@section('scripts')
<script>
    $('#kt_datetimepicker_1, #kt_datetimepicker_2').datetimepicker();

    let kt_btn = document.querySelector('#kt_btn');
    let kt_form = document.querySelector('#kt_form');

    kt_form.addEventListener('submit', function (event) {
        event.preventDefault();

        let formData = new FormData(this);
        let searchParams = new URLSearchParams();

        for (let pair of formData) {
            searchParams.append(pair[0], pair[1]);
        }

        showSpinner();

        fetch(this.action, {
            headers: {
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            credentials: "same-origin",
            method: this.method,
            body: searchParams
        }).then(response => response.json()).then(data => {
            hideSpinner();

            if (! data.success) {
                displayValidationErrors(data.errors);
            } else {
                Swal.fire("", data.message, "success");
                this.reset();
            }
        })
        .catch(function (error) {
            console.error(error);
        })
    });

    function showSpinner() {
        kt_btn.classList.add('spinner', 'spinner-white', 'spinner-left');
    }

    function hideSpinner() {
        kt_btn.classList.remove('spinner', 'spinner-white', 'spinner-left');
    }

    function displayValidationErrors(errors) {
        let errorList = '';
        errors.forEach(value => {
            errorList += '<strong><li>'+value+'</li></strong>';
        });

        swal.fire({
            html: '<ul class="list-unstyled mb-0">'+errorList+'</ul>',
            icon: 'error',
            confirmButtonColor: '#626ed4'
        })
    }
</script>
@endsection
