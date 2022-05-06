<meta charset="utf-8"/>
<title>Ratb.li | @yield('title', 'الرئيسية')</title>
<meta name="description" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
<link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/style.bundle.rtl.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<link href="{{ asset('assets/css/themes/layout/header/base/light.rtl.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/themes/layout/header/menu/light.rtl.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/themes/layout/brand/light.rtl.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/themes/layout/aside/dark.rtl.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
<!--end::Layout Themes-->
<style>
    body {
        font-family: 'Tajawal', sans-serif;
    }
</style>
@yield('styles')
<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}"/>