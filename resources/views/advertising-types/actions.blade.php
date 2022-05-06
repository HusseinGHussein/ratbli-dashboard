<button type="button" class="btn btn-sm btn-clean showLogs" data-id="{{ $row->id }}" data-type="advertisingType" title="الحركات"><i class="flaticon-list"></i></button>
<a href="{{ route('advertising-types.edit', $row->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="تعديل">
    <i class="la la-edit"></i>
</a>