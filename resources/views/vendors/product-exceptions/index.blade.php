@extends('layouts.app')

@section('title', 'تحديد أيام خارج الخدمة')

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
                    تحديد أيام خارج الخدمة
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
        <span class="d-block text-muted pt-2 font-size-sm">تحديد أيام خارج الخدمة</span>
      </h3>
    </div>
  </div>
  <div class="card-body">
		<!--begin: Search Form-->
		<form class="kt-form kt-form--fit mb-15" id="kt_form">
			<div class="row mb-6">
				<div class="col-lg-3  mb-lg-0 mb-6">
					<label>تاريخ غير متاح:</label>
					<div class="input-daterange input-group" id="kt_datepicker">
						<input type="text" class="form-control datatable-input" name="start_date" id="startDate" placeholder="من" data-col-index="0"/>
						<div class="input-group-append">
							<span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
						</div>
						<input type="text" class="form-control datatable-input" name="end_date" id="endDate" placeholder="إلي" data-col-index="1"/>
					</div>
                </div>

			</div>

			<div class="row mt-8">
				<div class="col-lg-12">
					<button  type="button" class="btn btn-primary btn-primary--icon" id="kt_save">حفظ</button>
				</div>
			</div>
		</form>
    <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
      <!--begin: Datatable -->
      <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="dataTable">
          <thead>
              <tr>
                <th>#</th>
                <th>التاريخ</th>
                <th>التحكم</th>
              </tr>
          </thead>
      </table>
      <!--end: Datatable -->
    </div>
  </div>
</div>
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
            url: "{{ route('provider.products.product-exceptions.index', $product) }}",
            type: "GET",
            data: function (query) { 
              //
            }
          },
          language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Arabic.json"
           },
          columns: [
            { data: "id", name: "id" },
            { data: "date", name: "date" },
            { data: "actions", searchable: false, orderable: false,
              render: function(data){
                return htmlDecode(data);
              }
            }
          ]
        });

        $('#kt_datepicker').datepicker({
          todayHighlight: true,
          format: 'yyyy-mm-dd',
          orientation: "bottom right",
          templates: {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>',
          },
        });

        $('#kt_save').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('provider.products.product-exceptions.store', $product) }}",
                method: 'post',
                data: {
                    start_date: $('#startDate').val(),
                    end_date: $('#endDate').val()
                },
                beforeSend: function(){
                    $('#kt_save').attr("disabled", true).text('جاري الحفظ...');
                },
                success: function(result) {
                    if(result.errors) {
                        let errorList = '';
                        $.each(result.errors, function(key, value) {
                            errorList += '<strong><li>'+value+'</li></strong>';
                        });

                        Swal.fire(
                            {
                                html: '<ul class="list-unstyled mb-0">'+errorList+'</ul>',
                                type: 'error',
                                confirmButtonColor: '#626ed4'
                            }
                        )
                    } else {
                        $('#kt_form').trigger("reset");
                        swal.fire("تم الحفظ بنجاح", "", "success");
                        $('#dataTable').DataTable().draw(true);
                    }
                    $('#kt_save').attr("disabled", false).text('حفظ');
                }
            });
        });

        $('body').on('click', '.deleteDate', function () {
            var url = $(this).data('url');
            swal.fire({
                title: 'هل أنت متأكد من عملية الحذف؟',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا',
                reverseButtons: true
            }).then(function(result){
                if (result.value) {
                  $.ajax({
                      url: url,
                      method: 'DELETE',
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      data: {},
                      beforeSend: function(){
                          //
                      },
                      success: function(result) {
                        swal.fire("تم الحذف بنجاح", "", "success");
                        $('#dataTable').DataTable().draw(true);
                      }
                  });
                } 
            });
        });

      });

    </script>
@endsection
