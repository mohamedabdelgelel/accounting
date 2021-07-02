@extends('layout.master2')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header bg-primary py-5">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- All Info Boxes -->
                <div class="row mt-n5">
                    <!-- Info Box1 -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-icon bg-purple rounded-circle p-3"><i class="fas fa-user-friends"></i></span>
                                <span class="info-box-number">2,500,455</span>
                                <span class="info-box-text text-bold">Today's visitor</span>
                                <span class="info-box-text">Last update at 8:00pm</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Info Box1 -->
                    <!-- Info Box2 -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-icon bg-green rounded-circle p-3"><i class="fas fa-city"></i></span>
                                <span class="info-box-number">41,410</span>
                                <span class="info-box-text text-bold">Properties List</span>
                                <span class="info-box-text">Last update at 8:00pm</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Info Box2 -->
                    <!-- Info Box3 -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-icon bg-pink rounded-circle p-3"><i class="fas fa-user-tie"></i></span>
                                <span class="info-box-number">2,500,455</span>
                                <span class="info-box-text text-bold">Total Vendors</span>
                                <span class="info-box-text">Last update at 8:00pm</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Info Box3 -->
                    <!-- Info Box4 -->
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-icon bg-danger rounded-circle p-3"><i class="fas fa-hand-holding-usd"></i></span>
                                <span class="info-box-number">41,410</span>
                                <span class="info-box-text text-bold">Today's Profit</span>
                                <span class="info-box-text">Last update at 8:00pm</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Info Box4 -->
                </div>
                <!-- End All Info Boxes -->
            </div>
        </section>
        <!-- End Main Content -->
        <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
@endsection
