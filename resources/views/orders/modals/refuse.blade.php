<div class="modal fade" id="refuseOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="refuseOrderModalLabel">رفض الطلب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="refuseOrderForm">
                    @csrf
                    <input type="hidden" id="orderItemId">
                    <div class="form-group">
                        <label for="refuse_type">نوع الرفض:</label>
                        <select name="refuse_type" class="form-control form-control-solid" id="refuseType">
                            <option value="1">رفض من قبل مزود الخدمة</option>
                            <option value="2">رفض من قبل العميل</option>
                            <option value="3">أخرى</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="refuseReason">سبب الرفض:</label>
                        <textarea name="refuse_reason" class="form-control form-control-solid" id="refuseReason" placeholder="سبب الرفض"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" id="refuseOrderBtn">حفظ</button>
                <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>