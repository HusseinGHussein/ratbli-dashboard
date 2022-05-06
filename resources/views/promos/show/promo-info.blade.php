<div class="kt-widget__head">
    <div class="kt-widget__media">
        <img src="{{ asset('uploads/sale.svg') }}" alt="image">
    </div>
    <div class="kt-widget__content">
        <div class="kt-widget__section">
            <a href="javascript:void(0)" class="kt-widget__username">
                {{ $promo->name }}
                <i class="flaticon2-correct kt-font-success"></i>
            </a>
        </div>
    </div>
</div>
<div class="kt-widget__body">
    <div class="kt-widget__content">
        <div class="kt-widget__info">
            <span class="kt-widget__label">النوع:</span>
            <a href="javascript:void(0)" class="kt-widget__data">{{ ($promo->type == 'value') ? 'قيمة' : 'نسبة' }}</a>
        </div>
        <div class="kt-widget__info">
            <span class="kt-widget__label">قيمة / نسبة الخصم:</span>
            <a href="javascript:void(0)" class="kt-widget__data">{{ $promo->value }}</a>
        </div>
        <div class="kt-widget__info">
            <span class="kt-widget__label">خصم قية التوصيل:</span>
            <a href="javascript:void(0)" class="kt-widget__data">{{ ($promo->with_delivery) ? 'نعم' : 'لا' }}</a>
        </div>
        <div class="kt-widget__info">
            <span class="kt-widget__label">الحد الأقصي للخصم:</span>
            <a href="javascript:void(0)" class="kt-widget__data">{{ $promo->max_discount }}</a>
        </div>
    </div>
</div>