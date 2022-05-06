@extends('layouts.app')

@section('title', 'إضافة عضو جديد')

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
               إضافة عضو جديد	                	            
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
                  <a href="{{ route('users.index') }}" class="text-muted">
                    الأعضاء
                  </a>
               </li>
               <li class="breadcrumb-item">
                  <a href="" class="text-muted">
                    إضافة عضو جديد
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
        <a href="{{ route('users.index') }}" class="btn btn-light-dark font-weight-bold btn-sm px-4 font-size-base ml-2">عودة</a>
      </div>
      <!--end::Toolbar-->
   </div>
</div>
<!--end::Subheader-->
@endsection

@section('content')
    @if (request()->get('type') == 1)
        @include('users.create.admin')
    @elseif(request()->get('type') == 2)
        @include('users.create.provider')
    @else
        @include('users.create.user')
    @endif
@endsection

@section('scripts')
    <script>
        var avatar1 = new KTImageInput('kt_image_1');

        $('#kt_btn').on('click', function() {
            var $this = $(this);
            $this.attr("disabled", true).addClass('spinner spinner-white spinner-left');
            document.getElementById('kt_form').submit();
        });

        $(document).ready(function() {
            $('select[name="nation_id"]').on('change', function() {
                var nation_id = $(this).val();
                if(nation_id) {
                    $.ajax({
                        url: '/nations/'+nation_id+'/cities',
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="city_id"]').empty();
                }
            });
        });
    </script>
@endsection