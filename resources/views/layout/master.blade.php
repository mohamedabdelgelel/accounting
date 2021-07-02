<!DOCTYPE html>
<html class="loading" data-textdirection="rtl">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>لوحة التحكم</title>
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/custom-rtl.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/vertical-menu.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style-rtl.css">


    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow font-theme">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="{{url('/admin/dashboard')}}"><img class="brand-logo" src="/assets/images/logo-sm.png" alt="logo">
                        <h3 class="brand-text font-theme">لوحة التحكم</h3></a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="ابحث هنا...">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="/assets/images/user.png" alt="avatar"><i></i></span><span class="user-name">اسم المستخدم</span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="ft-user"></i> ملفي الشخصي</a>
                            <a class="dropdown-item" href="#"><i class="ft-settings"></i> الإعدادات</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('logout')}}"><i class="ft-power"></i> خروج</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->


<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main font-theme" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                <a href="{{url('admin/dashboard')}}"><i class="icon-home"></i><span class="menu-title">الرئيسية</span></a>
            </li>

            <li class="nav-item">
                <a href="{{url('admin/statement')}}"><i class="icon-home"></i><span class="menu-title">كشف حساب</span></a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/catch')}}"><i class="icon-home"></i><span class="menu-title">سند القبض</span></a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/cashing')}}"><i class="icon-home"></i><span class="menu-title">سند الصرف</span></a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/upload')}}"><i class="icon-home"></i><span class="menu-title">ادخال قيود</span></a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/daily')}}"><i class="icon-home"></i><span class="menu-title">القيود اليومية</span></a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/review')}}"><i class="icon-home"></i><span class="menu-title">ميزان المراجعة</span></a>
            </li>
            <li class="nav-item has-sub">
                <a href="#"><i class="icon-speedometer"></i><span class="menu-title">الحسابات الرئيسية</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('admin/main')}}">  قائمة الحسابات الرئيسية</a></li>
                    <li><a href="{{url('admin/main/create')}}">إضافة حساب</a></li>
                </ul>
            </li>
            <li class="nav-item has-sub">
                <a href="#"><i class="icon-speedometer"></i><span class="menu-title">الحسابات</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('admin/account')}}">قائمة الحسابات</a></li>
                    <li><a href="{{url('admin/account/create')}}">إضافة حساب</a></li>
                </ul>
            </li>


        </ul>
    </div>
</div>
@yield('content')
<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">جميع الحقوق محفوظة  &copy; 2020.</span></p>
</footer>


<!-- BEGIN VENDOR JS-->
<script src="/assets/js/vendors.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="/assets/js/app-menu.js"></script>
<script src="/assets/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="/assets/js/jquery.print.min.js"></script>
<script src="/assets/js/jquery.print-custom.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />


<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $('table').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
<!-- END ROBUST JS-->
</body>
</html>
