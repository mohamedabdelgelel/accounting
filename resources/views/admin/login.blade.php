<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>By The Way | Log in</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendor/fontawesome-free/css/all.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <!-- RTL CSS File -->
    <link rel="stylesheet" href="/assets/css/rtl.css">
</head>
<body class="hold-transition login-page">
<div class="container">
    <div class="row justify-content-center">
        <!-- Login Box -->
        <div class="login-box col-xl-8 col-lg-12 col-md-7">
            <!-- Login Card -->
            <div class="card bg-transparent">
                <div class="card-body login-card-body">
                    <!-- Owner Box -->
                    <div class="row justify-content-center pb-5">

                        <div class="col-md-3"><img src="/assets/img/owner.jpg" alt="By The Way" class="brand-image"></div>
                    </div>
                    <!-- End Owner Box -->
                    <!-- Login Logo -->
                    <div class="row justify-content-center pb-5">
                        <div class="login-logo col-12">
                            <a href="#"><img src="/assets/img/by-the-way-logo.jpg" alt="By The Way" class="brand-image"></a>
                        </div>
                    </div>
                    <!-- End Login Logo -->
                    <!-- Login Form -->
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-12 col-md-8 text-center">

                            <form   method="post" action="{{url('/admin/postLogin')}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>



                                <button type="submit" class="btn btn-primary btn-block btn-rounded">تسجيل الدخول</button>
                            </form>

                        </div>
                    </div>
                    <!-- End Login Form -->

                </div>
            </div>
            <!-- End Login Card -->
        </div>
        <!-- End Login Box -->
    </div>
</div>
<!-- App JS Files -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Main JS File -->
<script src="/assets/js/main.js"></script>
</body>
</html>
