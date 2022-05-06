@extends('layouts.app')

@section('title', 'المنتجات')

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
               المنتجات
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
                  <a href="" class="text-muted">
                    المنتجات
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
<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label">
        المنتجات
        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع المنتجات</span>
      </h3>
    </div>
  </div>
  <div class="card-body">
		<!--begin: Search Form-->
		<form class="kt-form kt-form--fit mb-15" id="kt_form">
			<div class="row mb-6">
				<div class="col-lg-3  mb-lg-0 mb-6">
					<label>الحالة:</label>
					<select class="form-control datatable-input" name="status" id="status" data-col-index="0">
                        <option value="">عرض الكل</option>
                        <option value="0" @if(request()->has('status') && request()->get('status') != '' && request()->get('status') == 0) selected @endif>في انتظار التفعيل</option>
                        <option value="1" @if(request()->has('status') && request()->get('status') != '' && request()->get('status') == 1) selected @endif>مفعل</option>
                        <option value="2" @if(request()->has('status') && request()->get('status') != '' && request()->get('status') == 2) selected @endif>معطل</option>
                    </select>
                </div>

			</div>

			<div class="row mt-8">
				<div class="col-lg-12">
					<button  type="button" class="btn btn-primary btn-primary--icon" id="kt_search">
						<span>
							<i class="la la-search"></i>
							<span>بحث</span>
						</span>
					</button>
					&nbsp;&nbsp;
					<button type="button" class="btn btn-secondary btn-secondary--icon" id="kt_reset">
						<span>
							<i class="la la-close"></i>
							<span>إلغاء</span>
						</span>
					</button>
				</div>
			</div>
		</form>
    <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
      <!--begin: Datatable -->
      <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="dataTable">
          <thead>
              <tr>
                <th>#</th>
                <th>المنتج</th>
                <th>القسم</th>
                <th>السعر</th>
                <th>الحالة</th>
                <th>المتاح</th>
                <th>الحد الأدني للطلب</th>
                <th>المشاهدات</th>
                <th>التحكم</th>
              </tr>
          </thead>
      </table>
      <!--end: Datatable -->
    </div>
  </div>
</div>

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
            url: "{{ url('list-products') }}",
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