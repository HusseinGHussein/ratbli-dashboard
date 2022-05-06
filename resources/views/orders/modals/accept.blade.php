<div class="modal fade" id="acceptOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acceptOrderModalLabel">قبول الطلب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="acceptOrderForm">
                    @csrf
                    <input type="hidden" id="orderItemId">
                    <div class="form-group">
                        <label for="delivery">المسئول عن التوصيل:</label>
                        <select name="delivery" class="form-control form-control-solid" id="delivery">
                            <option value="Ratbli">مزود الخدمة</option>
                            <option value="Jiibli">جب لي</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold"  id="acceptOrderBtn">حفظ</button>
                <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>