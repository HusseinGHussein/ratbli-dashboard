<button type="button" class="btn btn-sm btn-clean showLogs" data-id="{{ $row->id }}" data-type="product" title="الحركات"><i class="flaticon-list"></i></button>
<form method="POST" action="{{ url('change-product-status', ['id' => $row->id]) }}" style="display: inline-block">
    @csrf
    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{ $statusAction }}"><i class="flaticon2-reload"></i></button>
</form>
<a href="{{ route('products.edit', $row) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="تعديل">
    <i class="la la-edit"></i>
</a>
