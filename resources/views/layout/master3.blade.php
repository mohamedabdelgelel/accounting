<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BY The Way | Dashboard</title>
    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets_pro/plugins/fontawesome-free/css/all.min.css">
    <!-- App CSS Files -->
    <link rel="stylesheet" href="/assets_pro/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets_pro/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets_pro/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/assets_pro/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/assets_pro/css/adminlte.min.css">
    <!-- RTL CSS File -->
    <link rel="stylesheet" href="/assets_pro/css/rtl.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-xl navbar-light navbar-white">
        <div class="container">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-lg"></i></a>
            <button class="navbar-toggler order-3" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="nav-icon fas fa-tachometer-alt mr-1"></i>السندات</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li ><a class="dropdown-item" href="{{url('admin/catch_view')}}">عرض سند قبض </a></li>
                            <li><a  class="dropdown-item"href="{{url('admin/catch')}}">  إضافة سند قبض     </a></li>
                            <li ><a class="dropdown-item" href="{{url('admin/cashing_view')}}">عرض سند صرف </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/cashing')}}">  إضافة سند صرف      </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="nav-icon fas fa-file-invoice mr-1"></i>القيود</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li ><a class="dropdown-item" href="{{url('admin/daily')}}">قيود اليومية
                                </a></li>
                            <li><a  class="dropdown-item"href="{{url('admin/new')}}">  ادخال قيد جديد     </a></li>
                            <li ><a class="dropdown-item" href="{{url('admin/upload')}}">ادخال قيود اكسيل </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/statement')}}"> كشف حساب      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/review')}}"> ميزان المراجعة      </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="nav-icon fas fa-file-invoice mr-1"></i>الفواتير</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li ><a class="dropdown-item" href="{{url('admin/purchase')}}">فواتير الشراء
                                </a></li>
                            <li><a  class="dropdown-item"href="{{url('admin/purchase/create')}}"> اضافة فاتورة شراء     </a></li>
                            <li ><a class="dropdown-item" href="{{url('admin/view/purchaseReturn')}}">فواتير مردود الشراء</a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/purchaseReturn')}}"> اضافة فاتورة مردود شراء      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/view/sell')}}">فواتير بيع      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/sell')}}"> اضافة فاتورة بيع      </a></li>

                            <li ><a  class="dropdown-item" href="{{url('admin/view/sellReturn')}}">فواتير مردود بيع      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/sellReturn')}}"> اضافة فاتورة مردود بيع      </a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="nav-icon fas fa-file-alt mr-1"></i>الموظفين</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li ><a class="dropdown-item" href="{{url('admin/employees')}}">قائمة الموظفين
                                </a></li>
                            <li><a  class="dropdown-item"href="{{url('admin/employees/create')}}"> اضافة موظف     </a></li>
                            <li ><a class="dropdown-item" href="{{url('admin/attendance')}}">قائمة الغياب</a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/createAttendance')}}"> اضافة غياب      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/holiday')}}">قائمة الاجازات      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/createHoliday')}}"> اضافة اجازة      </a></li>

                            <li ><a  class="dropdown-item" href="{{url('admin/count')}}">قائمة السلف      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/createCount')}}"> اضافة سلفة      </a></li>

                            <li ><a  class="dropdown-item" href="{{url('admin/warning')}}">قائمة الانذارات      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/createWarning')}}"> اضافة انذار      </a></li>

                            <li ><a  class="dropdown-item" href="{{url('admin/additional')}}">قائمة الاضافي      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/createadditional')}}"> اضافة اضافي      </a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="nav-icon fas fa-store mr-1"></i>المخازن</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                            <li ><a  class="dropdown-item" href="{{url('admin/store')}}">قائمة المخازن      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/supplier')}}"> قائمة الموردين      </a></li>

                            <li ><a  class="dropdown-item" href="{{url('admin/classification')}}">قائمة التصنيفات      </a></li>
                            <li ><a  class="dropdown-item" href="{{url('admin/products')}}">قائمة المنتجات</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
            <!-- End Navbar Links -->
            <!-- User Account -->
            <ul class="order-1 order-xl-3 navbar-nav navbar-no-expand ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown" style="display: none;">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <li class="nav-item dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/assets_pro/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">مرحبا</span>
                        <span class="hidden-xs"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-item dropdown-header user-header bg-blue" style="display:none;"><img src="/assets_pro/img/user2-160x160.jpg" class="img-circle" alt="User Image">
<p>
User Name - Web Developer
<small>Member since Nov. 2021</small>
</p></span>
                        <a href="#" class="dropdown-item" style="display:none;"><i class="fas fa-user mr-2"></i>الملف الشخصى</a>
                        <a href="#" class="dropdown-item" style="display:none;"><i class="fas fa-cogs mr-2"></i>الاعدادات</a>
                        <a href="#" class="dropdown-item" style="display:none;"><i class="fas fa-list-ul mr-2"></i>Profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="logout')  ?>" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i>خروج</a>
                    </div>
                </li>
                <!-- End User Profile -->
            </ul>
            <!-- End User Account -->
        </div>
    </nav>
    <!-- End Navbar --><!-- End Navbar -->
    <!-- Main Sidebar -->
    <aside class="main-sidebar sidebar-light-primary py-4 elevation-4">
        <!-- Brand Logo -->
        <a href="index.html" class="brand-link"><img src="" alt="Everest Logo" class="brand-image"></a>
        <!-- End Brand Logo -->
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar " data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item mb-4">
                        <a href="#" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>لوحة التحكم</p></a>
                    </li>

                    <li class="nav-item mb-4">
                        <a href="{{url('admin/main')}}" class="nav-link"><i class="nav-icon fas fa-th"></i><p>قائمة الحسابات الرئيسية</p></a>
                    </li>




                    <li class="nav-item mb-4">
                        <a href="{{url('admin/account')}}" class="nav-link"><i class="nav-icon fas fa-file-invoice"></i><p> قائمة الحسابات</p></a>
                    </li>

                    <li class="nav-item mb-4">
                        <a href="{{url('admin/users')}}" class="nav-link"><i class="nav-icon fas fa-file-invoice-dollar"></i><p>قائمة المستخدمين</p></a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="{{url('admin/years')}}" class="nav-link"><i class="nav-icon fas fa-file-invoice-dollar"></i><p>قائمة السنوات المالية</p></a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="{{url('admin/branches')}}" class="nav-link"><i class="nav-icon fas fa-file-invoice-dollar"></i><p>قائمة الفروع</p></a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="{{url('admin/revenues')}}" class="nav-link"><i class="nav-icon fas fa-file-invoice-dollar"></i><p>قائمة الايرادات</p></a>
                    </li>
                    <li class="nav-item mb-4">
                        <a href="{{url('admin/report')}}" class="nav-link"><i class="nav-icon fas fa-file-invoice-dollar"></i><p>تقرير</p></a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar Menu -->
        </div>
        <!-- End Sidebar -->
    </aside>
    <!-- End Main Sidebar -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        .modal-dialog{    max-width: 1000px;}
        .toast-message{
            padding:10px;
            top: 12px;
            left: 50%;
            padding:10px;
            margin-left: -150px;
        }
        .toast-top-full-width {
            top: 12px;
            left: 50%;
            padding:10px;
            margin-left: -150px;
        }
    </style>
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            //"allowHtml": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,

            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <!-- Styles -->
    <style type="text/css">

        body {background: whitesmoke;text-align: center;}
    </style>
    @yield('content')
    <footer class="main-footer text-center">
        <strong>جميع الحقوق محفوظة &copy; 2021 <a href="#">By The Way</a>.</strong>
    </footer>

</div>



<!-- App JS Files -->
<script src="/assets_pro/plugins/jquery/jquery.min.js"></script>
<script src="/assets_pro/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<script src="/assets_pro/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets_pro/plugins/chart.js/Chart.min.js"></script>
<script src="/assets_pro/plugins/flot/jquery.flot.js"></script>
<script src="/assets_pro/plugins/flot/plugins/jquery.flot.resize.js"></script>
<script src="/assets_pro/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/assets_pro/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets_pro/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/assets_pro/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Main JS File -->
<script src="/assets_pro/js/adminlte.min.js"></script>
<script type='text/javascript'>
    // here you retrieve datas from PHP and use them as global from your external

</script>
<script src="/assets_pro/js/main.js"></script>

<script>
    /* Calendar Date */
    $('#add-item-date').datepicker({autoclose: true})
    $('#add-item-date').datepicker("setDate", new Date());
    $('#add-item-start').datepicker({autoclose: true})
    $('#add-item-start').datepicker("setDate", new Date());
    $('#add-item-end').datepicker({autoclose: true})
    $('#add-item-end').datepicker("setDate", new Date());
    $('#sal-invo-date').datepicker("setDate", new Date());
    $('#sal-report-date').datepicker({autoclose: true})
    $('#sal-report-date').datepicker("setDate", new Date());
    $('#sal-report-start').datepicker({autoclose: true})
    $('#sal-report-start').datepicker("setDate", new Date());
    $('#sal-report-end').datepicker({autoclose: true})
    $('#sal-report-end').datepicker("setDate", new Date());
    $('#pur-invo-date').datepicker({autoclose: true})
    $('#pur-invo-date').datepicker("setDate", new Date());
    $('#pur-report-date').datepicker({autoclose: true})
    $('#pur-report-date').datepicker("setDate", new Date());
    $('#pur-report-start').datepicker({autoclose: true})
    $('#pur-report-start').datepicker("setDate", new Date());
    $('#pur-report-end').datepicker({autoclose: true})
    $('#pur-report-end').datepicker("setDate", new Date());
    $('#bond-con-date').datepicker({autoclose: true})
    $('#bond-con-date').datepicker("setDate", new Date());
    $('#add-emloyee-date').datepicker({autoclose: true})
    $('#add-emloyee-date').datepicker("setDate", new Date());
    $('#working-start-date').datepicker({autoclose: true})
    $('#working-start-date').datepicker("setDate", new Date());
    $('#vac-request-date').datepicker({autoclose: true})
    $('#vac-request-date').datepicker("setDate", new Date());
    $('#vac-start-date').datepicker({autoclose: true})
    $('#vac-start-date').datepicker("setDate", new Date());
    $('#attend-report-date').datepicker({autoclose: true})
    $('#attend-report-date').datepicker("setDate", new Date());
    $('#deduction-date').datepicker({autoclose: true})
    $('#deduction-date').datepicker("setDate", new Date());
    $('#advance-date').datepicker({autoclose: true})
    $('#advance-date').datepicker("setDate", new Date());
    /* End Calendar Date */
    /* Add Item */
    var item_i = $('#add-item-table tr').length;
    $('#add-item-table').on('keyup', '.item-lst', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            html = '<tr>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="itemname_' + item_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="itemnumber_' + item_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="itemgroup_' + item_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="itemprice_' + item_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="itemquantity_' + item_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs item-lst" name="itemorder_' + item_i + '"></td>';
            html += '<td class="p-0"><button type="button" class="btn btn-rounded border-radius-left-0 btn-danger w-100">حذف</button></td>';
            html += '</tr>';
            $('#add-item-table').append(html);
            $(this).focus().select();
            item_i++;
            e.preventDefault();
            return false;
        }
    });
    $('#add-item-table').on('keydown', '.inputs', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            var index = $('.inputs').index(this) + 1;
            $('.inputs').eq(index).focus();
            e.preventDefault();
            return false;
        }
    });
    $('#add-item-table').on('click', '.btn-danger', function() {
        $(this).closest('tr').remove();
    });
    /* End Add Item */
    /* Add Bond Conversion */
    var bond_i = $('#bond-con-table tr').length;
    $('#bond-con-table').on('keyup', '.bond-lst', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            html = '<tr>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="proid_' + bond_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="pronumber_' + bond_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="proname_' + bond_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs bond-lst" name="proquantity_' + bond_i + '"></td>';
            html += '<td class="p-0"><button type="button" class="btn btn-rounded border-radius-left-0 btn-danger w-100">حذف</button></td>';
            html += '</tr>';
            $('#bond-con-table').append(html);
            $(this).focus().select();
            bond_i++;
        }
    });
    $('#bond-con-table').on('keydown', '.inputs', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            var index = $('.inputs').index(this) + 1;
            $('.inputs').eq(index).focus();
        }
    });
    $('#bond-con-table').on('click', '.btn-danger', function() {
        $(this).closest('tr').remove();
    });
    /* End Add Bond Conversion */
    /* Add Sales Invoice */
    var sal_i = $('#sal-invo tr').length;
    $('#sal-invo').on('keyup', '.sal-lst', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            html = '<tr>';
            html += '<td><input class="item_input form-control bg-transparent border-0 inputs" list="datalistOptions" name="item[]"  onchange="code_acc()" class="item_input" id="item_input" placeholder=" اسم الصنف" required><datalist id="datalistOptions" class="datalistOptions mapped1"><option data-value="8" value="tess"></option></datalist><input type="hidden" name="item[]" id="item_input_hidden" class="item_input_hidden"></td>';
            html += '<td><input id="code_item" class="code_item form-control bg-transparent border-0 inputs" placeholder="رمز الصنف"></td>';
            html += '<td><select id="units" class="mapped2 form-control bg-transparent border-0 inputs" name="unit[]" ><option>_______</option><option value="cartoon" >كرتون</option><option value="box" >علبة</option><option value="grain" >حبة</option></select></td>';
            html += '<td>\n\
<input type="text" class="form-control bg-transparent border-0 inputs" type="number" name="price[]" step="any" required></td>';
            html += '<td>\n\
<input type="text" class="form-control bg-transparent border-0 inputs sal-lst"  type="number" name="number[]"></td>';
            html += '<td class="p-0"><button type="button" class="btn btn-rounded border-radius-left-0 btn-danger w-100">حذف</button></td>';
            html += '</tr>';
            $('#sal-invo').append(html);
            $(this).focus().select();
            sal_i++;
        }
    });
    $('#sal-invo').on('keydown', '.inputs', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            var index = $('.inputs').index(this) + 1;
            $('.inputs').eq(index).focus();
        }
    });
    $('#sal-invo').on('click', '.btn-danger', function() {
        $(this).closest('tr').remove();
    });
    /* End Add Sales Invoice */
    /* Add Purchases Invoice */
    var pur_i = $('#pur-invo tr').length;
    $('#pur-invo').on('keyup', '.pur-lst', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            html = '<tr>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="pur_itemid_' + pur_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="pur_itemnumber_' + pur_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="pur_itemname_' + pur_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="pur_itemquantity_' + pur_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="pur_itemunit_' + pur_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" name="pur_itemprice_' + pur_i + '"></td>';
            html += '<td><input type="text" class="form-control bg-transparent border-0 inputs pur-lst" name="pur_itemtotal_' + pur_i + '"></td>';
            html += '<td class="p-0"><button type="button" class="btn btn-rounded border-radius-left-0 btn-danger">حذف</button></td>';
            html += '</tr>';
            $('#pur-invo').append(html);
            $(this).focus().select();
            pur_i++;
        }
    });
    $('#pur-invo').on('keydown', '.inputs', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            var index = $('.inputs').index(this) + 1;
            $('.inputs').eq(index).focus();
        }
    });
    $('#pur-invo').on('click', '.btn-danger', function() {
        $(this).closest('tr').remove();
    });
    /* End Add Purchases Invoice */
    $(function () {
        /* ChartJS
        * -------
        * Here we will create a few charts using ChartJS
        */

//--------------
//- AREA CHART -
//--------------

// Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label               : 'Digital Goods',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label               : 'Electronics',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        var areaChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines : {
                        display : false,
                    }
                }],
                yAxes: [{
                    gridLines : {
                        display : false,
                    }
                }]
            }
        }

// This will get the first returned node in the jQuery collection.
        var areaChart       = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })



//-------------
//- DONUT CHART -
//-------------
// Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
            labels: [
                'Chrome',
                'IE',
                'FireFox',
                'Safari',
                'Opera',
                'Navigator',
            ],
            datasets: [
                {
                    data: [700,500,400,600,300,100],
                    backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }
            ]
        }
        var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
        }
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })



//-------------
//- BAR CHART -
//-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
        }

        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
        /*
        * Flot Interactive Chart
        * -----------------------
        */
// We use an inline data source in the example, usually data would
// be fetched from a server
        var data        = [],
            totalPoints = 100

        function getRandomData() {

            if (data.length > 0) {
                data = data.slice(1)
            }

// Do a random walk
            while (data.length < totalPoints) {

                var prev = data.length > 0 ? data[data.length - 1] : 50,
                    y    = prev + Math.random() * 10 - 5

                if (y < 0) {
                    y = 0
                } else if (y > 100) {
                    y = 100
                }

                data.push(y)
            }

// Zip the generated y values with the x values
            var res = []
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res
        }

        var interactive_plot = $.plot('#interactive', [
                {
                    data: getRandomData(),
                }
            ],
            {
                grid: {
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor: '#f3f3f3'
                },
                series: {
                    color: '#3c8dbc',
                    lines: {
                        lineWidth: 2,
                        show: true,
                        fill: true,
                    },
                },
                yaxis: {
                    min: 0,
                    max: 100,
                    show: true
                },
                xaxis: {
                    show: true
                }
            }
        )

        var updateInterval = 500 //Fetch data ever x milliseconds
        var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
        function update() {

            interactive_plot.setData([getRandomData()])

// Since the axes don't change, we don't need to call plot.setupGrid()
            interactive_plot.draw()
            if (realtime === 'on') {
                setTimeout(update, updateInterval)
            }
        }

//INITIALIZE REALTIME DATA FETCHING
        if (realtime === 'on') {
            update()
        }
//REALTIME TOGGLE
        $('#realtime .btn').click(function () {
            if ($(this).data('toggle') === 'on') {
                realtime = 'on'
            }
            else {
                realtime = 'off'
            }
            update()
        })
        /*
        * END INTERACTIVE CHART
        */


        /*
        * LINE CHART
        * ----------
        */
//LINE randomly generated data

        var sin = [],
            cos = []
        for (var i = 0; i < 14; i += 0.5) {
            sin.push([i, Math.sin(i)])
            cos.push([i, Math.cos(i)])
        }
        var line_data1 = {
            data : sin,
            color: '#3c8dbc'
        }
        var line_data2 = {
            data : cos,
            color: '#00c0ef'
        }
        $.plot('#line-chart', [line_data1, line_data2], {
            grid  : {
                hoverable  : true,
                borderColor: '#f3f3f3',
                borderWidth: 1,
                tickColor  : '#f3f3f3'
            },
            series: {
                shadowSize: 0,
                lines     : {
                    show: true
                },
                points    : {
                    show: true
                }
            },
            lines : {
                fill : false,
                color: ['#3c8dbc', '#f56954']
            },
            yaxis : {
                show: true
            },
            xaxis : {
                show: true
            }
        })
//Initialize tooltip on hover
        $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
            position: 'absolute',
            display : 'none',
            opacity : 0.8
        }).appendTo('body')
        $('#line-chart').bind('plothover', function (event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2)

                $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
                    .css({
                        top : item.pageY + 5,
                        left: item.pageX + 5
                    })
                    .fadeIn(200)
            } else {
                $('#line-chart-tooltip').hide()
            }

        })
        /* END LINE CHART */

        /* jQueryKnob */

        $('.knob').knob({
            /*change : function (value) {
            //console.log("change : " + value);
            },
            release : function (value) {
            console.log("release : " + value);
            },
            cancel : function () {
            console.log("cancel : " + this.value);
            },*/
            draw: function () {

// "tron" case
                if (this.$.data('skin') == 'tron') {

                    var a   = this.angle(this.cv)  // Angle
                        ,
                        sa  = this.startAngle          // Previous start angle
                        ,
                        sat = this.startAngle         // Start angle
                        ,
                        ea                            // Previous end angle
                        ,
                        eat = sat + a                 // End angle
                        ,
                        r   = true

                    this.g.lineWidth = this.lineWidth

                    this.o.cursor
                    && (sat = eat - 0.3)
                    && (eat = eat + 0.3)

                    if (this.o.displayPrevious) {
                        ea = this.startAngle + this.angle(this.value)
                        this.o.cursor
                        && (sa = ea - 0.3)
                        && (ea = ea + 0.3)
                        this.g.beginPath()
                        this.g.strokeStyle = this.previousColor
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                        this.g.stroke()
                    }

                    this.g.beginPath()
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                    this.g.stroke()

                    this.g.lineWidth = 2
                    this.g.beginPath()
                    this.g.strokeStyle = this.o.fgColor
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
                    this.g.stroke()

                    return false
                }
            }
        })
        /* END JQUERY KNOB */

    })
</script>
</body>
</html>
