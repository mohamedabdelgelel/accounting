@extends('layout.master2')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('.myform').submit(function() {
            if (confirm('هل ان متأكد من حذف سلف الموظف؟')) {

                return true;
            }
            else
            {
                return false;
            }

            // your code here
        });
    });
</script>
@section('content')
<!-- ////////////////////////////////////////////////////////////////////////////-->



<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2">
                <center>
               <h3 class="content-header-title font-theme ls-0">قائمة سلف الموظف</h3>
                </center>
            </div>
            <div class="content-header-right col-md-4 col-12 mb-2">
                <a href="{{url('admin/createCount')}}" class="btn btn-primary" ><i class="icon-plus"></i> إضافة </a>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                <tr>
                                    <th>تسلسل</th>
                                    <th>الموظف</th>
                                    <th>المبلغ</th>
                                    <th>عدد شهور الخصم</th>
                                    <th>شهر بداية الخصم</th>

                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendance as $driver)
                                <tr>
                                    <td>{{$driver->id}}</td>
                                    <td>{{$driver->employee->name}}</td>
                                    <td>{{$driver->money}}</td>
                                    <td>{{$driver->num_of_months}}</td>
                                    <td>{{$driver->discount_date}}</td>

                                    <td>
{{--                                        <a href="edit-driver.html" class="btn btn-icon btn-sm btn-success"><i class="ft-edit"></i></a>--}}
{{--                                        <a href="#" class="btn btn-icon btn-sm btn-danger"><i class="ft-trash-2"></i></a>--}}


                                            <a href="{{url('admin/deleteCount/'.$driver->id)}}" class="btn btn-icon btn-sm btn-danger">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                <span><strong>حذف</strong></span>
                                            </a>
                                            <a href="{{url('admin/editCount/'.$driver->id)}}" class="btn btn-success a-btn-slide-text">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                <span><strong>تعديل</strong></span>
                                            </a>

                                    </td>
                                </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


@endsection
