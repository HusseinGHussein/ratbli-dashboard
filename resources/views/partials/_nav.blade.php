<!--begin::Header Nav-->
<ul class="menu-nav ">
    @if(auth()->user()->is_admin)
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('/')) ? 'menu-item-active' : '' }}">
        <a  href="{{ url('/') }}" class="menu-link"><span class="menu-text">الرئيسية</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('users*')) ? 'menu-item-active' : '' }}">
        <a  href="{{ route('users.index') }}" class="menu-link"><span class="menu-text">الأعضاء</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('providers*')) ? 'menu-item-active' : '' }}">
        <a  href="{{ route('providers.index') }}" class="menu-link"><span class="menu-text">مزودي الخدمات</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('orders*')) ? 'menu-item-active' : '' }}">
        <a  href="{{ route('orders.index') }}" class="menu-link"><span class="menu-text">الطلبات</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('promos*')) ? 'menu-item-active' : '' }}">
        <a  href="{{ route('promos.index') }}" class="menu-link"><span class="menu-text">أكواد الخصم</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('packages*')) ? 'menu-item-active' : '' }}">
        <a  href="{{ route('packages.index') }}" class="menu-link"><span class="menu-text">باقات الخصم</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('vouchers*')) ? 'menu-item-active' : '' }}">
        <a  href="{{ route('vouchers.index') }}" class="menu-link"><span class="menu-text">قسائم الشراء</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('advertising-types*') || request()->is('advertisings*')) ? 'menu-item-active' : '' }}"  data-menu-toggle="click" aria-haspopup="true">
        <a  href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">الدعاية</span><i class="menu-arrow"></i></a>
        <div class="menu-submenu menu-submenu-classic menu-submenu-left" >
        <ul class="menu-subnav">
            <li class="menu-item"  aria-haspopup="true">
                <a  href="{{ route('advertising-types.index') }}" class="menu-link">
                    <span class="menu-icon">
                    <i class="flaticon-speech-bubble"></i>
                    </span>
                    <span class="menu-text">أنواع الدعاية</span>
                </a>
            </li>
            <li class="menu-item"  aria-haspopup="true">
                <a  href="{{ route('advertisings.index') }}" class="menu-link">
                    <span class="menu-icon">
                    <i class="flaticon-speech-bubble"></i>
                    </span>
                    <span class="menu-text">الدعاية</span>
                </a>
            </li>
        </ul>
        </div>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('categories*') || request()->is('nations*')) ? 'menu-item-active' : '' }}"  data-menu-toggle="click" aria-haspopup="true">
        <a  href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">الاعدادات</span><i class="menu-arrow"></i></a>
        <div class="menu-submenu menu-submenu-classic menu-submenu-left" >
        <ul class="menu-subnav">
            <li class="menu-item"  aria-haspopup="true">
                <a  href="{{ route('categories.index') }}" class="menu-link ">
                    <span class="menu-icon">
                    <i class="flaticon-cogwheel"></i>
                    </span>
                    <span class="menu-text">الأقسام</span>
                </a>
            </li>
            <li class="menu-item"  aria-haspopup="true">
                <a  href="{{ route('nations.index') }}" class="menu-link ">
                    <span class="menu-icon">
                    <i class="flaticon-cogwheel"></i>
                    </span>
                    <span class="menu-text">الدول</span>
                </a>
            </li>
            <li class="menu-item"  aria-haspopup="true">
                <a  href="#" class="menu-link ">
                    <span class="menu-icon">
                    <i class="flaticon-cogwheel"></i>
                    </span>
                    <span class="menu-text">الحسابات البنكية</span>
                </a>
            </li>
            <li class="menu-item"  aria-haspopup="true">
                <a  href="#" class="menu-link ">
                    <span class="menu-icon">
                    <i class="flaticon-cogwheel"></i>
                    </span>
                    <span class="menu-text">إعدادات عامة</span>
                </a>
            </li>
        </ul>
        </div>
    </li>
    @endif
    @if(auth()->user()->is_vendor)
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('provider')) ? 'menu-item-active' : '' }}">
        <a  href="{{ url('/provider') }}" class="menu-link"><span class="menu-text">الرئيسية</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('provider/orders*')) ? 'menu-item-active' : '' }}">
        <a  href="{{ route('provider.orders.index') }}" class="menu-link"><span class="menu-text">الطلبات</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('provider/products*')) ? 'menu-item-active' : '' }}">
        <a  href="{{ route('provider.products.index') }}" class="menu-link"><span class="menu-text">المنتجات</span></a>
    </li>
    <li class="menu-item  menu-item-submenu menu-item-rel {{ (request()->is('provider/sections*')) ? 'menu-item-active' : '' }}">
        <a  href="{{ route('provider.sections.index') }}" class="menu-link"><span class="menu-text">الأقسام</span></a>
    </li>
    @endif
</ul>
<!--end::Header Nav-->