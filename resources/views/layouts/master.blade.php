<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description"
        content="نظام إدارة فواتيرك - يوفر لك إدارة سهلة وفعالة لفواتيرك مع واجهة مستخدم سلسة ومميزة.">
    <meta name="Author" content="مهندس: عبدالرحمن عبدالله باجعمان">
    <meta name="Keywords"
        content="نظام فواتير, إدارة فواتير, برنامج فواتير, فواتير إلكترونية, فواتير العملاء, فواتير المبيعات, إدارة مالية, إدارة الأعمال, تطبيق فواتير, نظام محاسبي, تقارير فواتير, فواتير مصرفية, واجهة مستخدم فواتير" />
    @include('layouts.head')

</head>

<body class="main-body app sidebar-mini">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ URL::asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->
    @include('layouts.main-sidebar')
    <!-- main-content -->
    <div class="main-content app-content">
        @include('layouts.main-header')
        <!-- container -->
        <div class="container-fluid">
            @yield('page-header')
            @yield('content')
            @include('layouts.sidebar')
            @include('layouts.models')
            @include('layouts.footer')
            @include('layouts.footer-scripts')

            <script src="{{ asset('assets/js/alert.js') }}"></script>
</body>

</html>
