<div class="modal fade" id="orderItemsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderItemsModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover responsive no-wrap dataTable dtr-inline collapsed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>المنتج</th>
                            <th>مزود الخدمة</th>
                            <th>الكمية</th>
                            <th>التاريخ</th>
                            <th>الفترة</th>
                            <th>الحالة</th>
                            <th>الملاحظات</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                    <tbody id="orderItems">
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>