<button type="button" class="btn btn-sm btn-clean showLogs" data-id="{{ $row->id }}" data-type="promo" title="الحركات"><i class="flaticon-list"></i></button>
<form method="POST" action="{{ url('activate-promo', ['id' => $row->id]) }}" style="display: inline-block">
    @csrf
    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{ ($row->status == 1) ? 'تعطيل' : 'تفعيل' }}"><i class="flaticon2-reload"></i></button>
</form>
<a href="{{ route('promos.edit', $row->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="تعديل">
    <i class="la la-edit"></i>
</a>