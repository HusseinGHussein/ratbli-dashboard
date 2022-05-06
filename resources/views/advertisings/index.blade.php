@extends('layouts.app')

@section('title', 'الدعاية')

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
               الدعاية
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
                    الدعاية
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
        <a href="{{ route('advertisings.create') }}" class="btn btn-light-primary font-weight-bold btn-sm px-4 font-size-base ml-2">إضافة دعاية</a>
      </div>
      <!--end::Toolbar-->
   </div>
</div>
<!--end::Subheader-->
@endsection

@section('content')
<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label">
        الدعاية
        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع الدعاية</span>
      </h3>
    </div>
  </div>
  <div class="card-body">
    <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
      <!--begin: Datatable -->
      <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="dataTable">
          <thead>
              <tr>
                  <th>#</th>
                  <th>نوع الدعاية</th>
                  <th>الهدف</th>
                  <th>تاريخ البدء</th>
                  <th>تاريخ الانتهاء</th>
                  <th>مبلغ الدعاية</th>
                  <th>القائم بالدعاية</th>
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
            url: "{{ route('advertisings.index') }}",
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
            { data: "advertisingType", name: "advertisingType", orderable: false, searchable: false},
            { data: "goal", name: "goal"},
            { data: "start_date", name: "start_date", searchable: false},
            { data: "end_date", name: "end_date", searchable: false},
            { data: "amount", name: "amount"},
            { data: "advertiser", name: "advertiser"},
            { data: "actions", searchable: false, orderable: false,
              render: function(data){
                return htmlDecode(data);
              }
            }
          ]
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