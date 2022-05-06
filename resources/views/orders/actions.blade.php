<button type="button" class="btn btn-sm btn-clean showOrderItemsModal" data-id="{{ $row->id }}" title="مشاهدة"><i class="flaticon2-document"></i></button>
<a href="{{ route('orders.invoice', $row->id) }}" class="btn btn-sm btn-clean" title="الفاتورة" target="_blank"><i class="flaticon2-list"></i></a>
