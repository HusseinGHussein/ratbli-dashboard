	<!--begin::Form-->
    <div class="card-body">
        <input type="hidden" id="sectionId" value="{{ $section->id }}">
        <div class="form-group">
            <label>اسم القسم</label>
            <input type="name" class="form-control" id="nameEdit" value="{{ $section->name }}"  placeholder="اسم القسم"/>
        </div>
        <div class="form-group">
            <label for="status">الحالة</label>
            <select class="form-control" id="statusEdit" name="status">
                <option value="1" @if($section->status == 1) selected @endif>مفعل</option>
                <option value="0" @if($section->status == 0) selected @endif>معطل</option>
            </select>
        </div>
    </div>
	<!--end::Form-->