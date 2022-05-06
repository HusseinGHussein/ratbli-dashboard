<!--begin::User-->
<div class="d-flex align-items-center">
    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
        <div class="symbol-label" style="background-image:url({{ $product->img }})"></div>
        <i class="symbol-badge bg-success"></i>
    </div>
    <div>
        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
            {{ $product->name }}
        </a>
        <div class="text-muted">
            {{ $product->category->name }}
        </div>
        <div class="mt-2">
            <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1" dir="ltr">{{ $product->price }} SAR</a>
            <a href="#" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">{{ $product->views }} مشاهدة</a>
            @if($product->is_recommended)
            <a href="#" class="btn btn-sm btn-warning font-weight-bold py-2 px-3 px-xxl-5 my-1">موصي به</a>
            @endif
        </div>
    </div>
</div>
<!--end::User-->

<!--begin::Contact-->
<div class="pt-6">
    {{ $product->desc }}
</div>
<!--end::Contact-->
