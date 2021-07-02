@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">ادخال منتجات</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @else
                    @endif
                        @if(Session::has('error'))
                            <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @else
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="card-body">
                        <form method="post" action="/uploadProducts" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ملف الاكسيل</label>
                                        <input type="file" name="select_file"  accept=".xlsx,.csv" required class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <button type="submit" class="btn-primary"><i class="icon-plus"></i> إضافة</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
