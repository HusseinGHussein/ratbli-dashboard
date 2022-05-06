@extends('layouts.app')

@section('title', 'إضافة منتج جديد')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection

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
               إضافة منتج جديد
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
                  <a href="{{ route('provider.products.index') }}" class="text-muted">
                    المنتجات
                  </a>
               </li>
               <li class="breadcrumb-item">
                  <a href="" class="text-muted">
                    إضافة منتج جديد
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
        <a href="{{ route('provider.products.index') }}" class="btn btn-light-dark font-weight-bold btn-sm px-4 font-size-base ml-2">عودة</a>
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
                        <span class="nav-text font-size-lg">مقدم الخدمة</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="nav-item mr-3">
                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
                        <span class="nav-icon"><span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"/>
        <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span></span>
                        <span class="nav-text font-size-lg">الصور</span>
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
        <form class="form" id="kt_form" action="{{ route('provider.products.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label class="col-form-label col-3 text-lg-right text-left">الاسم (العربية)</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="الاسم (العربية)"/>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">الاسم (الانجليزية)</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('name_en') is-invalid @enderror" type="text" name="name_en" value="{{ old('name_en') }}" placeholder="الاسم (الانجليزية)"/>
                                    @error('name_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">الوصف (العربية)</label>
                                <div class="col-9">
                                    <textarea name="desc" class="form-control form-control-solid @error('desc') is-invalid @enderror" rows="3">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">الوصف (الانجليزية)</label>
                                <div class="col-9">
                                    <textarea name="desc_en" class="form-control form-control-solid @error('desc_en') is-invalid @enderror" rows="3">{{ old('desc_en') }}</textarea>
                                    @error('desc_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">السعر</label>
                                <div class="col-9">
                                    <input name="price" class="form-control form-control-lg form-control-solid @error('price') is-invalid @enderror" type="number" value="{{ old('price') }}" placeholder="السعر"/>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">الحد الأدني للطلب</label>
                                <div class="col-9">
                                    <input name="min_quantity" class="form-control form-control-lg form-control-solid @error('min_quantity') is-invalid @enderror" type="number" value="{{ old('min_quantity') }}" placeholder="الحد الأدني للطلب"/>
                                    @error('min_quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">القسم</label>
                                <div class="col-9">
                                    <select class="form-control form-control-solid @error('category_id') is-invalid @enderror" name="category_id">
                                        <option></option>
                                        @foreach($provider->categories as $category)
                                            <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">الوسوم</label>
                                <div class="col-9">
                                    <select class="form-control form-control-solid select2 @error('sections') is-invalid @enderror" id="kt_select2_1" name="sections[]" multiple>
                                        <option></option>
                                        @foreach($provider->sections as $section)
                                            <option value="{{ $section->id }}" @if(is_array(old('sections')) && in_array($section->id, old('sections'))) selected @endif>{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sections')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">متطلبات التشغيل</label>
                                <div class="col-9">
                                    <textarea name="requirement" class="form-control form-control-solid @error('requirement') is-invalid @enderror" rows="3">{{ old('requirement') }}</textarea>
                                    @error('requirement')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-3 col-form-label text-lg-right text-left">توصيل سريع</label>
                                <div class="col-3">
                                    <span class="switch switch-icon">
                                        <label>
                                            <input type="checkbox" name="is_express" id="isExpress"/>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row" id="expressDeliveryTimeContainer">
                                <label class="col-form-label col-3 text-lg-right text-left">زمن التوصيل</label>
                                <div class="col-9">
                                    <input name="express_delivery_time" class="form-control form-control-lg form-control-solid @error('express_delivery_time') is-invalid @enderror" id="expressDeliveryTime" type="number" value="{{ old('express_delivery_time') }}" placeholder="زمن التوصيل"/>
                                    @error('express_delivery_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                                <label class="col-form-label col-3 text-lg-right text-left">مقدم الخدمة </label>
                                <div class="col-9">
                                    <select class="form-control form-control-solid @error('gender') is-invalid @enderror" id="genderSelector" name="gender">
                                        <option value="-1">اختر..</option>
                                        <option value="0">رجال</option>
                                        <option value="1">نساء</option>
                                        <option value="2">رجال ونساء</option>
                                        <option value="3">لا يحتاج مقدمي خدمة</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">مقدم الخدمة</label>
                                <div class="col-9">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="table-active">
                                                <th>اليوم / الفترة</th>
                                                <th>صباحا</th>
                                                <th>ظهرا</th>
                                                <th>ليلا</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($weekDays as $k => $v)
                                            <tr class="table-info">
                                                <td class="hour" rowspan="6"><span>{{$v}}</span></td>
                                                <td class="colsman gendercols">رجال</td>
                                                <td class="colsman gendercols">رجال</td>
                                                <td class="colsman gendercols">رجال</td>
                                            </tr>
                                            <tr>
                                                <td class="colsman gendercols"><input type="number" min='0' name="quantity[{{$k}}][1][1]" class="form-control gendercolsinput" value="0" /></td>
                                                <td class="colsman gendercols"><input type="number" min='0' name="quantity[{{$k}}][1][2]" class="form-control gendercolsinput" value="0" /> </td>
                                                <td class="colsman gendercols"><input type="number" min='0' name="quantity[{{$k}}][1][3]" class="form-control gendercolsinput" value="0"/></td>
                                            </tr>
                                            <tr class="table-info">
                                                <td class="colswoman gendercols">نساء</td>
                                                <td class="colswoman gendercols">نساء</td>
                                                <td class="colswoman gendercols">نساء</td>
                                            </tr>
                                            <tr>
                                                <td class="colswoman gendercols"><input type="number" min='0' name="quantity[{{$k}}][2][1]" class="form-control gendercolsinput" value="0" /></td>
                                                <td class="colswoman gendercols"><input type="number" min='0' name="quantity[{{$k}}][2][2]" class="form-control gendercolsinput" value="0" /> </td>
                                                <td class="colswoman gendercols"><input type="number" min='0' name="quantity[{{$k}}][2][3]" class="form-control gendercolsinput" value="0" /></td>
                                            </tr>
                                            <tr class="table-info">
                                                <td class="colscount gendercols"></td>
                                                <td class="colscount gendercols"></td>
                                                <td class="colscount gendercols"></td>
                                            </tr>
                                            <tr>
                                                <td class="colscount gendercols"><input type="number" min='0' name="quantity[{{$k}}][3][1]" class="form-control gendercolsinput" value="0" /></td>
                                                <td class="colscount gendercols"><input type="number" min='0' name="quantity[{{$k}}][3][2]" class="form-control gendercolsinput" value="0" /> </td>
                                                <td class="colscount gendercols"><input type="number" min='0' name="quantity[{{$k}}][3][3]" class="form-control gendercolsinput" value="0" /></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end::Group-->
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Tab-->

                <!--begin::Tab-->
                <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7">
                            <div class="my-2">
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">الصورة الرئيسية</label>
                                    <div class="col">
                                        <div id="croppie"></div>
                                        <input type="hidden" class="form-control" name="image">
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <div class="col">
                                        <input type="file" class="form-control form-control-solid @error('image') is-invalid @enderror" id="image">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-light-info font-weight-bold" id="uploadImage" disabled>Upload</button>
                                    </div>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group row">
                                    <div class="col">
                                        <div id="preview-crop-image"></div>
                                    </div>
                                </div>
                                <!--end::Group-->

                                <!--begin::Group-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">المزيد من الصور</label>
                                    <div class="col">
                                        <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                                            <div class="dropzone-msg dz-message needsclick">
                                                <h3 class="dropzone-msg-title">.أفلت الملفات هنا أو انقر للتحميل</h3>
                                                <span class="dropzone-msg-desc">تحميل ما يصل إلى 10 ملفات</span>
                                            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

<script>
    $('#kt_select2_1').select2();

    expressDeliveryTimeToggle();

    $("#isExpress").click(function(){
        expressDeliveryTimeToggle();
    })

    function expressDeliveryTimeToggle(){
        if($("#isExpress").is(':checked')) {
            $("#expressDeliveryTimeContainer").slideDown(200);
        }
        else{
            $("#expressDeliveryTimeContainer").slideUp(200);
            $("#expressDeliveryTime").val('');
        }
    }

    $(function(){
        showGenderOnPeriodes($("#genderSelector").val());

        $("#genderSelector").change(function () {
            showGenderOnPeriodes($(this).val());
        })

        function showGenderOnPeriodes(genderType){
            console.log(genderType)
            switch(genderType){
                case "-1":
                    $(".colsman , .colswoman").show();
                    break;
                case "2":
                    $(".colsman , .colswoman").show();
                    $(".colscount").hide();
                    $(".gendercolsinput").val("0");
                    break;
                case "0":
                    $(".gendercols").hide();
                    $(".colsman").show();
                    $(".gendercolsinput").val("0")
                    break;
                case "1":
                    $(".gendercols").hide();
                    $(".colswoman").show();
                    $(".gendercolsinput").val("0")
                    break;
                case "3":
                    $(".gendercols").hide();
                    $(".colscount").show();
                    $(".gendercolsinput").val("0");
                    break;
            }
        }

    });

    //var avatar1 = new KTImageInput('kt_image_1');

    var resize = $('#croppie').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: {
            width: 476.875,
            height: 196.875,
            type: 'square'
        },
        boundary: {
            width: 600,
            height: 250
        },
        enableOrientation: true
    });

    $('#image').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            resize.croppie('bind',{
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadImage').attr("disabled", false);
    });

    $('#uploadImage').on('click', function (ev) {
        resize.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (img) {
            $.ajax({
            url: "{{ url('/base64-upload') }}",
            type: "POST",
            data: {"file":img},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            beforeSend: function(){
                $('#uploadImage').attr("disabled", true).text('Uploading...');
            },
            success: function (data) {
                html = '<img src="' + img + '" />';
                $("#preview-crop-image").html(html);
                //$('form').append('<input type="hidden" name="image" value="' + data.path + '">')
                $('input[name="image"]').val(data.fileName);
                $('#image').val('');
                $('#uploadImage').attr("disabled", true).text('Upload');
            }
            });
        });
    });

    var uploadedImageMap = {};

    $('#kt_dropzone_2').dropzone({
        url: "{{ url('/upload') }}",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        paramName: "file",
        maxFiles: 10,
        maxFilesize: 3, // MB
        acceptedFiles: ".jpeg,.jpg,.png,.svg",
        addRemoveLinks: true,
        transformFile: function(file, done) {

            var myDropZone = this;

            // Create the image editor overlay
            var editor = document.createElement('div');
            editor.style.position = 'fixed';
            editor.style.left = 0;
            editor.style.right = 0;
            editor.style.top = 0;
            editor.style.bottom = 0;
            editor.style.zIndex = 9999;
            editor.style.backgroundColor = '#000';
            document.body.appendChild(editor);

            // Create the confirm button
            var confirm = document.createElement('button');
            confirm.style.position = 'absolute';
            confirm.style.left = '10px';
            confirm.style.top = '10px';
            confirm.style.zIndex = 9999;
            confirm.textContent = 'Confirm';
            confirm.classList.add("btn");
            confirm.classList.add("btn-success");
            confirm.addEventListener('click', function() {

                // Get the output file data from Croppie
                croppie.result({
                    type:'blob'
                }).then(function(blob) {

                    // Update the image thumbnail with the new image data
                    myDropZone.createThumbnail(
                        blob,
                        myDropZone.options.thumbnailWidth,
                        myDropZone.options.thumbnailHeight,
                        myDropZone.options.thumbnailMethod,
                        false,
                        function(dataURL) {

                            // Update the Dropzone file thumbnail
                            myDropZone.emit('thumbnail', file, dataURL);

                            // Return modified file to dropzone
                            done(blob);
                        }
                    );

                });

                // Remove the editor from view
                editor.parentNode.removeChild(editor);

            });
            editor.appendChild(confirm);

            // Create the croppie editor
            var croppie = new Croppie(editor, {
                viewport: { width: 476.875, height: 196.875 }
            });

            // Load the image to Croppie
            croppie.bind({
                url: URL.createObjectURL(file)
            });

        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="images[]" value="' + response.fileName + '">')
            uploadedImageMap[file.name] = response.fileName
        }
    });

    $('#kt_btn').on('click', function() {
        var $this = $(this);
        $this.attr("disabled", true).addClass('spinner spinner-white spinner-left');
        document.getElementById('kt_form').submit();
    });
</script>
@endsection