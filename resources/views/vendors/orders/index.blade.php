@extends('layouts.app')

@section('title', 'إدارة الطلبات')

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
               إدارة الطلبات	                	            
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
                    إدارة الطلبات
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
        إدارة الطلبات
        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع الطلبات</span>
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
                <th>رقم الطلب</th>
                <th>الحالة</th>
                <th>العميل</th>
                <th>طريقة الدفع</th>
                <th>المنتج</th>
                <th>الكمية</th>
                <th>التاريخ</th>
                <th>الفترة</th>
                <th>التحكم</th>
              </tr>
          </thead>
      </table>
      <!--end: Datatable -->
    </div>
  </div>
</div>

@include('users.show.user')
@include('promos.show.promo')
@include('orders.modals.accept')
@include('orders.modals.refuse')
@include('orders.modals.trackings')
@include('products.show.product')

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js?v=7.0.6') }}"></script>
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
            url: "{{ route('provider.orders.index') }}",
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
            { data: "order_id", name: "order_id" },
            { data: "status", name: "status", orderable: false, searchable: false,
              render: function(data){
                return htmlDecode(data);
              }
            },
            { data: "user", name: "user", orderable: false, searchable: false,
              render: function(data){
                return htmlDecode(data);
              }
            },
            { data: "paymentType", name: "paymentType", orderable: false, searchable: false,
              render: function(data){
                return htmlDecode(data);
              }
            },
            { data: "product", name: "product", orderable: false, searchable: false,
              render: function(data){
                return htmlDecode(data);
              }
            },
            { data: "amount", name: "amount", orderable: false, searchable: false },
            { data: "date", name: "date", orderable: false, searchable: false },
            { data: "time", name: "time", orderable: false, searchable: false },
            { data: "actions",  orderable: false, searchable: false,
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

        //Show promo code modal
        $('body').on('click', '.showPromoCodeModal', function () {
          var promo = $(this).data('id');
          $.get("/promos"+'/'+promo, function (data) {
            $('#promoCode').html(data); 
            $('#promoCodeModal').modal('show');
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

        //Show accept order modal
        $('body').on('click', '.acceptOrder', function () {
          var orderItem = $(this).data('id');
          $.get("/order-items" +'/' + orderItem +'/edit', function (data) {
            $('#acceptOrderModal').modal('show');
            $('#orderItemId').val(data.id);
            $('#delivery').val(data.delivery);
          })
        });

        //Show refuse order modal
        $('body').on('click', '.refuseOrder', function () {
          var orderItem = $(this).data('id');
          $.get("/order-items" +'/' + orderItem +'/edit', function (data) {
            $('#refuseOrderModal').modal('show');
            $('#orderItemId').val(data.id);
            $('#refuseType').val(data.refuse_type);
            $('#refuseReason').val(data.refuse_reason);
          })
        });

        //Accept order
        $('#acceptOrderBtn').click(function(e) {
            e.preventDefault();

            var orderItemId = $('#orderItemId').val();

            $.ajax({
                url: '/orders/'+orderItemId+'/accept',
                method: 'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $('#acceptOrderForm').serialize(),
                beforeSend: function(){
                    $('#acceptOrderBtn').attr("disabled", true).addClass('kt-spinner kt-spinner--left kt-spinner--sm kt-spinner--light');
                },
                success: function(result) {
                    if(result.errors) {
                        let errorList = '';
                        $.each(result.errors, function(key, value) {
                            errorList += '<strong><li>'+value+'</li></strong>';
                        });

                        swal.fire(
                            {
                                html: '<ul class="list-unstyled mb-0">'+errorList+'</ul>',
                                type: 'error',
                                confirmButtonColor: '#626ed4'
                            }
                        )
                    } else {
                        $('#acceptOrderModal').modal('hide');
                        swal.fire("تم قبول الطلب", "", "info");
                        /*$.get("/orders"+'/'+result.orderId+'/order-items', function (data) {
                          $('#orderItems').html(data);
                        })*/
                        $('#dataTable').DataTable().draw(true);
                    }

                    $('#acceptOrderBtn').removeAttr('disabled').removeClass('kt-spinner kt-spinner--left kt-spinner--sm kt-spinner--light');
                }
            });
        });

        //Refuse order
        $('#refuseOrderBtn').click(function(e) {
            e.preventDefault();

            var orderItemId = $('#orderItemId').val();

            $.ajax({
                url: '/orders/'+orderItemId+'/refuse',
                method: 'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $('#refuseOrderForm').serialize(),
                beforeSend: function(){
                    $('#refuseOrderBtn').attr("disabled", true).addClass('kt-spinner kt-spinner--left kt-spinner--sm kt-spinner--light');
                },
                success: function(result) {
                    if(result.errors) {
                        let errorList = '';
                        $.each(result.errors, function(key, value) {
                            errorList += '<strong><li>'+value+'</li></strong>';
                        });

                        swal.fire(
                            {
                                html: '<ul class="list-unstyled mb-0">'+errorList+'</ul>',
                                type: 'error',
                                confirmButtonColor: '#626ed4'
                            }
                        )
                    } else {
                        $('#refuseOrderModal').modal('hide');
                        swal.fire("تم رفض الطلب", "", "info");
                        /*$.get("/orders"+'/'+result.orderId+'/order-items', function (data) {
                          $('#orderItems').html(data);
                        })*/
                        $('#dataTable').DataTable().draw(true);
                    }

                    $('#refuseOrderBtn').removeAttr('disabled').removeClass('kt-spinner kt-spinner--left kt-spinner--sm kt-spinner--light');
                }
            });
        });

        //In waiting order
        $('body').on('click', '.inWaitingOrder', function () {
            var orderItemId = $(this).data('id');
            swal.fire({
                title: 'تغيير حالة الطلب الى قيد الانتظار؟',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا',
                reverseButtons: true
            }).then(function(result){
                if (result.value) {
                  $.ajax({
                      url: '/orders/'+orderItemId+'/in-waiting',
                      method: 'POST',
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      data: {},
                      beforeSend: function(){
                          //
                      },
                      success: function(result) {
                        swal.fire("تم تغيير حالة الطلب الى قيد الانتظار", "", "info");
                        /*$.get("/orders"+'/'+result.orderId+'/order-items', function (data) {
                          $('#orderItems').html(data);
                        })*/
                        $('#dataTable').DataTable().draw(true);
                      }
                  });
                } 
            });
        });

        // Prepare order
        $('body').on('click', '.prepareOrder', function () {
            var orderItemId = $(this).data('id');
            swal.fire({
                title: 'تغيير حالة الطلب الى جاري التحضير؟',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا',
                reverseButtons: true
            }).then(function(result){
                if (result.value) {
                  $.ajax({
                      url: '/orders/'+orderItemId+'/prepare',
                      method: 'POST',
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      data: {},
                      beforeSend: function(){
                          //
                      },
                      success: function(result) {
                        swal.fire("تم تغيير حالة الطلب الى جاري التحضير", "", "info");
                        /*$.get("/orders"+'/'+result.orderId+'/order-items', function (data) {
                          $('#orderItems').html(data);
                        })*/
                        $('#dataTable').DataTable().draw(true);
                      }
                  });
                } 
            });
        });

        //Ready for delivery order
        $('body').on('click', '.readyForDeliveryOrder', function () {
            var orderItemId = $(this).data('id');
            swal.fire({
                title: 'تغيير حالة الطلب الى خارج للتوصيل؟',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا',
                reverseButtons: true
            }).then(function(result){
                if (result.value) {
                  $.ajax({
                      url: '/orders/'+orderItemId+'/ready-for-delivery',
                      method: 'POST',
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      data: {},
                      beforeSend: function(){
                          //
                      },
                      success: function(result) {
                        swal.fire("تم تغيير حالة الطلب الى خارج للتوصيل", "", "info");
                        /*$.get("/orders"+'/'+result.orderId+'/order-items', function (data) {
                          $('#orderItems').html(data);
                        })*/
                        $('#dataTable').DataTable().draw(true);
                      }
                  });
                } 
            });
        });

        //Complete order
        $('body').on('click', '.completeOrder', function () {
            var orderItemId = $(this).data('id');
            swal.fire({
                title: 'تغيير حالة الطلب الى مكتمل؟',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا',
                reverseButtons: true
            }).then(function(result){
                if (result.value) {
                  $.ajax({
                      url: '/orders/'+orderItemId+'/complete',
                      method: 'POST',
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      data: {},
                      beforeSend: function(){
                          //
                      },
                      success: function(result) {
                        swal.fire("تم تغيير حالة الطلب الى مكتمل", "", "info");
                        /*$.get("/orders"+'/'+result.orderId+'/order-items', function (data) {
                          $('#orderItems').html(data);
                        })*/
                        $('#dataTable').DataTable().draw(true);
                      }
                  });
                } 
            });
        });

        //Show track order modal
        $('body').on('click', '.trackOrder', function () {
          var orderItemId = $(this).data('id');
          $.get("/order-trackings"+'/'+orderItemId, function (data) {
            $('#trackings').html(data);
            $('#trackOrderModal').modal('show');
          })
        });

      });
    </script>
@endsection