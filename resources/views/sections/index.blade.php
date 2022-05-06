@extends('layouts.app')

@section('title', 'الأقسام')

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
               الأقسام
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
                    الأقسام
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
        الأقسام
        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع الأقسام</span>
      </h3>
    </div>
  </div>
  <div class="card-body">
    <div class="row mb-6">
        <div class="col-lg-3 mb-lg-0 mb-6">
            <label>اسم القسم:</label>
            <input type="text" class="form-control datatable-input" name="name" id="name" placeholder="اسم القسم" data-col-index="0"/>
        </div>
        <div class="col-lg-3  mb-lg-0 mb-6">
            <label>الحالة:</label>
            <select class="form-control datatable-input" name="status" id="status" data-col-index="1">
                <option value="1" selected>مفعل</option>
                <option value="0">معطل</option>
            </select>
        </div>
    </div>

    <div class="row mt-8 mb-8">
        <div class="col-lg-12">
            <button  type="button" class="btn btn-primary btn-primary--icon" id="kt_save">حفظ</button>
            <button type="button" class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                <span>
                    <i class="la la-close"></i>
                    <span>إلغاء</span>
                </span>
            </button>
        </div>
    </div>
    <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
      <!--begin: Datatable -->
      <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="dataTable">
          <thead>
              <tr>
                <th>#</th>
                <th>القسم</th>
                <th>الحالة</th>
                <th>التحكم</th>
              </tr>
          </thead>
      </table>
      <!--end: Datatable -->
    </div>
  </div>
</div>

@include('sections.show.section')

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
            url: "{{ route('providers.sections.index', $provider) }}",
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
            { data: "name", name: "name" },
            { data: "status", name: "status", searchable: false, orderable: false,
              render: function(data){
                return htmlDecode(data);
              }
            },
            { data: "actions", searchable: false, orderable: false,
              render: function(data){
                return htmlDecode(data);
              }
            }
          ]
        });

        function resetForm()
        {
            $('#name').val('');
            $('#status').prop('selectedIndex', 0);
        }

        $('#kt_save').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('providers.sections.store', $provider) }}",
                method: 'post',
                data: {
                    name: $('#name').val(),
                    status: $('#status').val()
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
                        swal.fire("تم الحفظ بنجاح", "", "success");
                        resetForm();
                        $('#dataTable').DataTable().draw(true);
                    }
                    $('#kt_save').attr("disabled", false).text('حفظ');
                }
            });
        });

        $('#kt_reset').click(function(e) {
            resetForm();
        });

        $('body').on('click', '.showEditSectionModal', function () {
          var section = $(this).data('id');
          $.get("/sections"+'/'+section, function (data) {
            $('#sectionEditForm').html(data);
            $('#sectionEditModal').modal('show');
          })
        });

        $('#kt_update').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/sections/"+$('#sectionId').val(),
                method: 'PUT',
                data: {
                    name: $('#nameEdit').val(),
                    status: $('#statusEdit').val()
                },
                beforeSend: function(){
                    $('#kt_update').attr("disabled", true).text('جاري الحفظ...');
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
                        swal.fire("تم الحفظ بنجاح", "", "success");
                        $('#dataTable').DataTable().draw(true);
                        $('#sectionEditModal').modal('hide');
                    }
                    $('#kt_update').attr("disabled", false).text('حفظ');
                }
            });
        });
      });
    </script>
@endsection
