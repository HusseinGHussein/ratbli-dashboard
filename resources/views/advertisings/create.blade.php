@extends('layouts.app')

@section('title', 'إضافة دعاية')

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
               إضافة دعاية	                	            
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
                  <a href="{{ route('advertisings.index') }}" class="text-muted">
                    الدعاية
                  </a>
               </li>
               <li class="breadcrumb-item">
                  <a href="" class="text-muted">
                    إضافة دعاية
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
        <button type="button" class="btn btn-light-primary font-weight-bold btn-sm px-4 font-size-base ml-2" id="kt_btn"><i class="la la-save"></i>حفظ</button>
        <a href="{{ route('advertisings.index') }}" class="btn btn-light-dark font-weight-bold btn-sm px-4 font-size-base ml-2">عودة</a>
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
            </ul>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body px-0">
        <form class="form" id="kt_form" action="{{ route('advertisings.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label class="col-form-label col-3 text-lg-right text-left">نوع الدعاية</label>
                                <div class="col-9">
                                    <select class="form-control form-control-solid @error('type_id') is-invalid @enderror" name="type_id">
                                        <option></option>
                                        @foreach($advertisingTypes as $advertisingType)
                                            <option value="{{ $advertisingType->id }}" @if(old('type_id') == $advertisingType->id) selected @endif>{{ $advertisingType->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">الهدف من الدعاية</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('goal') is-invalid @enderror" type="text" name="goal" value="{{ old('goal') }}" placeholder="الهدف من الدعاية"/>
                                    @error('goal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">تاريخ البدء</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('start_date') is-invalid @enderror" type="date" name="start_date" value="{{ old('start_date') }}"/>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">تاريخ الانتهاء</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('end_date') is-invalid @enderror" type="date" name="end_date" value="{{ old('end_date') }}"/>
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">القائم بالدعاية</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('advertiser') is-invalid @enderror" type="text" name="advertiser" value="{{ old('advertiser') }}" placeholder="القائم بالدعاية"/>
                                    @error('advertiser')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">القيمة</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('amount') is-invalid @enderror" type="number" name="amount" value="{{ old('amount') }}" placeholder="القيمة"/>
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
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
    $('#kt_btn').on('click', function() {
        var $this = $(this);
        $this.attr("disabled", true).addClass('spinner spinner-white spinner-left');
        document.getElementById('kt_form').submit();
    });
</script>
@endsection