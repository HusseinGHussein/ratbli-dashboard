@foreach ($products as $product)
<tr>
    <td class="pl-0 py-8">
        <div class="d-flex align-items-center">
            <div class="symbol symbol-50 symbol-light mr-4">
                <img src="{{ $product->img }}" class="" alt=""/>
            </div>
            <div>
                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $product->name }}</a>
                <span class="text-muted font-weight-bold d-block">{{ $product->provider->user_name }}</span>
            </div>
        </div>
    </td>
    <td>
        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
            {{ $product->category->name }}
        </span>
    </td>
    <td>
        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
            {{ $product->price }} SAR
        </span>
    </td>
    <td>
        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
            {{ numberFormatShort($product->views) }}
        </span>
    </td>
    <td>
        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
            {{ numberFormatShort($product->completed) }}
        </span>
    </td>
    <td>
        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
            {{ numberFormatShort($product->rejected) }}
        </span>
    </td>
</tr>
@endforeach