<button type="button" class="btn btn-sm btn-clean showLogs" data-id="{{ $row->id }}" data-type="product" title="الحركات"><i class="flaticon-list"></i></button>
<form method="POST" action="{{ url('provider/activate-product', ['id' => $row->id]) }}" style="display: inline-block">
    @csrf
    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="{{ ($row->is_hidden == 0) ? 'تعطيل' : 'تفعيل' }}"><i class="flaticon2-reload"></i></button>
</form>
<a href="{{ route('provider.products.product-exceptions.index', $row) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="تحديد أيام خارج الخدمة"><i class="flaticon-calendar-with-a-clock-time-tools"></i></a>
<a href="{{ route('provider.products.edit', $row) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="تعديل">
    <i class="la la-edit"></i>
</a>