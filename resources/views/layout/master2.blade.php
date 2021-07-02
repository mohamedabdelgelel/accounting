<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BY The Way | Dashboard</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendor/fontawesome-free/css/all.min.css">
    <!-- App CSS Files -->
    <link rel="stylesheet" href="/assets/vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/vendor/datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/assets/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <!-- RTL CSS File -->
    <link rel="stylesheet" href="/assets/css/rtl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<style>
    .form-control
    {
        height: 35px !important;

    }
    #DataTables_Table_0_filter
    {
        float: left;
    }
</style>
<body class="hold-transition sidebar-mini sdasdas layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-xl navbar-light bg-primary">
        <!-- Navbar Links -->
        <ul class="navbar-nav" style="margin-right: 50px;">

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                   class="nav-link dropdown-toggle">                    <span class="hidden-xs" style="color: white">السندات</span>
                </a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li ><a class="dropdown-item" href="{{url('admin/catch_view')}}">عرض سند قبض </a></li>
                    <li><a  class="dropdown-item"href="{{url('admin/catch')}}">  إضافة سند قبض     </a></li>
                    <li ><a class="dropdown-item" href="{{url('admin/cashing_view')}}">عرض سند صرف </a></li>
                    <li ><a  class="dropdown-item" href="{{url('admin/cashing')}}">  إضافة سند صرف      </a></li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                   class="nav-link dropdown-toggle">                    <span class="hidden-xs" style="color: white">القيود</span>
                </a>
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
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                   class="nav-link dropdown-toggle">                    <span class="hidden-xs" style="color: white">الفواتير</span>
                </a>
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
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                   class="nav-link dropdown-toggle">                    <span class="hidden-xs" style="color: white">الموظفين</span>
                </a>
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


        </ul>
        <!-- End Navbar Links -->
        <!-- Search Form -->

        <!-- End Search Form -->
        <!-- User Account -->
        <ul class="navbar-nav ml-auto">
            <!-- User Profile -->
            <li class="nav-item dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/assets/img/user1-128x128.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs">اسم المستخدم</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-item dropdown-header user-header bg-blue"><img src="/assets/img/user1-128x128.jpg"
                                                                     class="img-circle" alt="User Image">
<p>
User Name - Web Developer
<small>Member since Nov. 2021</small>
</p></span>
                    <a href="#" class="dropdown-item"><i class="fas fa-user mr-2"></i>الملف الشخصى</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-cogs mr-2"></i>الاعدادات</a>
                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i>خروج</a>
                </div>
            </li>
            <!-- End User Profile -->
        </ul>
        <!-- End User Account -->
    </nav>
    <!-- End Navbar -->
    <!-- Main Sidebar -->
    <aside class="main-sidebar sidebar-light-primary py-4 elevation-4">
        <!-- Brand Logo -->
        <a href="index.html" class="brand-link text-center"><img src="/assets/img/by-the-way-logo.png"
                                                                 alt="By The Way Logo" class="brand-image"></a>
        <!-- End Brand Logo -->
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar User Panel -->

            <!-- End Sidebar User Panel -->
            <!-- Sidebar Menu -->
            <nav class="mt-2">


                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false" >







                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>الحسابات الرئيسية<i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a class="nav-link" href="{{url('admin/main')}}"><i class="far fa-circle nav-icon"></i><p>قائمة الحسابات الرئيسية</p> </a></li>
                            <li class="nav-item"><a  class="nav-link"href="{{url('admin/main/create')}}"><i class="far fa-circle nav-icon"></i><p>  إضافة حساب </p>     </a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>الحسابات <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a  class="nav-link" href="{{url('admin/account')}}"><i class="far fa-circle nav-icon"></i><p>  قائمة الحسابات</p> </a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/account/create')}}"><i class="far fa-circle nav-icon"></i><p>إضافة حساب</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>المخازن <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a  class="nav-link" href="{{url('admin/store')}}"><i class="far fa-circle nav-icon"></i><p>  قائمة المخازن</p> </a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/store/create')}}"><i class="far fa-circle nav-icon"></i><p>إضافة مخزن</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>الموردين <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a  class="nav-link" href="{{url('admin/supplier')}}"><i class="far fa-circle nav-icon"></i><p>  قائمة الموردين</p> </a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/supplier/create')}}"><i class="far fa-circle nav-icon"></i><p>إضافة مورد</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>التصنيفات <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a  class="nav-link" href="{{url('admin/classification')}}"><i class="far fa-circle nav-icon"></i><p>  قائمة التصنيفات</p> </a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/classification/create')}}"><i class="far fa-circle nav-icon"></i><p>إضافة تصنيف</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>المنتجات <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a  class="nav-link" href="{{url('admin/products')}}"><i class="far fa-circle nav-icon"></i><p>  قائمة المنتجات</p> </a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/products/create')}}"><i class="far fa-circle nav-icon"></i><p>إضافة منتج</p></a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/upload/products')}}"><i class="far fa-circle nav-icon"></i><p>ادخال منتجات اكسيل</p></a></li>

                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>المستخدمين <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a  class="nav-link" href="{{url('admin/users')}}"><i class="far fa-circle nav-icon"></i><p>  قائمة المستخدمين</p> </a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/users/create')}}"><i class="far fa-circle nav-icon"></i><p>إضافة مستخدم</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>السنوات المالية <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a  class="nav-link" href="{{url('admin/years')}}"><i class="far fa-circle nav-icon"></i><p>  قائمة السنوات المالية </p> </a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/years/create')}}"><i class="far fa-circle nav-icon"></i><p>إضافة سنة مالية</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>الفروع <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a  class="nav-link" href="{{url('admin/branches')}}"><i class="far fa-circle nav-icon"></i><p>  قائمة الفروع </p> </a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/branches/create')}}"><i class="far fa-circle nav-icon"></i><p>إضافة فرع</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i>
                            <p>الايرادات <i class="fas fa-angle-left right"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a  class="nav-link" href="{{url('admin/revenues')}}"><i class="far fa-circle nav-icon"></i><p>  قائمة الايرادات </p> </a></li>
                            <li class="nav-item"><a   class="nav-link" href="{{url('admin/revenues/create')}}"><i class="far fa-circle nav-icon"></i><p>إضافة ايراد</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{url('admin/report')}}" class="nav-link"><i
                                    class="nav-icon fas fa-file-alt"></i>
                            <p>تقرير</p></a></li>

                </ul>
            </nav>
            <!-- End Sidebar Menu -->
        </div>
        <!-- End Sidebar -->
    </aside>
    <!-- End Main Sidebar -->
    <!-- Content Wrapper -->
@yield('content')


<!-- End Content Wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer bg-primary">
        <strong>جميع الحقوق محفوظة &copy; 2021 <a href="index.html">By The Way</a>.</strong>
    </footer>
    <!-- End Main Footer -->
</div>
<!-- App JS Files -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/datepicker/bootstrap-datepicker.min.js"></script>
<script src="/assets/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Main JS File -->
<script src="/assets/js/main.js"></script>
<script src="/assets/js/custom.js"></script>


<script src="/assets/js/jquery.print.min.js"></script>
<script src="/assets/js/jquery.print-custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
      integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous"/>


<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        // pdfMake.fonts = {
        //     Roboto: {
        //         normal: 'DroidKufi-Regular.ttf Roboto-Regular.ttf',
        //         bold: 'DroidKufi-Regular.ttf Roboto-Regular.ttf',
        //         italics: 'DroidKufi-Regular.ttf,oboto-Regular.ttf',
        //         bolditalics: 'DroidKufi-Regular.ttf'
        //     }
        // }

        $('.datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'print'
            ]
        });
    });
    // $(document).ready(function () {
    //     $('select').selectize({
    //         sortField: 'text'
    //     });
    // });
</script>

</body>
</html>