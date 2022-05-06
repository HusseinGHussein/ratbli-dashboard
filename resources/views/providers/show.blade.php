@extends('layouts.app')

@section('title', 'مشاهدة مزود خدمة')

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
               مشاهدة مزود خدمة
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
                  <a href="{{ route('providers.index') }}" class="text-muted">
                    مزودي الخدمات
                  </a>
               </li>
               <li class="breadcrumb-item">
                  <a href="" class="text-muted">
                    مشاهدة مزود خدمة
                  </a>
               </li>
            </ul>
            <!--end::Breadcrumb-->
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

            <!--begin::Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                <span class="mr-4">
                    <i class="flaticon-map display-4 text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">الأقسام الداخلية</span>
                    <a href="{{ route('providers.sections.index', $provider) }}" target="_blank" class="text-primary font-weight-bolder">مشاهدة</a>
                </div>
            </div>
            <!--end::Item-->
        </div>
        <!--begin::Items-->
    </div>
</div>
<!--end::Card-->

@include('providers.orders.latest')

@include('providers.products.index')

@include('users.show.user')

@include('products.show.product')

@include('logs.logs')

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6') }}" type="text/javascript"></script>
    <script type="text/javascript">
      function htmlDecode(data){
        var txt=document.createElement('textarea');
        txt.innerHTML=data;
        return txt.value
      }
    </script>

    <script type="text/javascript">
      $(document).ready( function () {
       $('#dataTable').DataTable({
          responsive: true,
          processing: true,
          serverSide: true,
          ajax: {
            url: "{{ route('providers.products.index', $provider->id) }}",
            type: "GET",
            data: function (query) {
              query.status = $('#status').val()
            }
          },
          language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"
           },
          columns: [
            { data: "id", name: "id" },
            { data: "name", name: "name",
              render: function(data){
                return htmlDecode(data);
              }
            },
            { data: "category", name: "category", searchable: false, orderable: false },
            { data: "price", name: "price" },
            { data: "status", name: "status", searchable: false, orderable: false,
              render: function(data){
                return htmlDecode(data);
              }
            },
            { data: "max_num", name: "max_num", searchable: false, orderable: false },
            { data: "min_quantity", name: "min_quantity", searchable: false, orderable: false },
            { data: "views", name: "views", searchable: false, orderable: false },
            { data: "actions", searchable: false, orderable: false,
              render: function(data){
                return htmlDecode(data);
              }
            }
          ]
        });

        //Show user info modal
        $('body').on('click', '.showUserInfoModal', function () {
          var user = $(this).data('id');
          $.get("/users"+'/'+user, function (data) {
            $('#userInfo').html(data);
            $('#userInfoModal').modal('show');
          })
        });

        //Show product info modal
        $('body').on('click', '.showProductInfoModal', function () {
          var product = $(this).data('id');
          $.get("/products"+'/'+product, function (data) {
            $('#productInfo').html(data);
            $('#productInfoModal').modal('show');
          })
        });

        $('#kt_search').on('click', function() {
          $('#dataTable').DataTable().draw(true);
        });

        $('#kt_reset').click(function(e) {
          $('#kt_form')[0].reset();
          $('#dataTable').DataTable().draw(true);
        });

        //logs
        $('body').on('click', '.showLogs', function () {
          var itemId = $(this).data('id');
          var type = $(this).data('type');
          $.get("/logs/"+type+"/"+itemId, function (data) {
            $('#logs').html(data);
            $('#logModal').modal('show');
          })
        });

      });

    </script>
@endsection
