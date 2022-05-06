<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label">
        المنتجات
        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع المنتجات</span>
      </h3>
    </div>

    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
      <a href="{{ route('providers.products.create', $provider) }}" class="btn btn-light-primary font-weight-bold btn-sm px-4 font-size-base ml-2">إضافة منتج</a>
    </div>
    <!--end::Toolbar-->
  </div>
  <div class="card-body">
		<!--begin: Search Form-->
		<form class="kt-form kt-form--fit mb-15" id="kt_form">
			<div class="row mb-6">
				<div class="col-lg-3  mb-lg-0 mb-6">
					<label>الحالة:</label>
					<select class="form-control datatable-input" name="status" id="status" data-col-index="0">
              <option value="">عرض الكل</option>
              <option value="0">في انتظار التفعيل</option>
              <option value="1">مفعل</option>
              <option value="2">معطل</option>
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