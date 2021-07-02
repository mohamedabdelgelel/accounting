@extends('layout.master2')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('.myform').submit(function() {
            if (confirm('هل ان متأكد من حذف الموظف؟')) {

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
                <h3 class="content-header-title font-theme ls-0">قائمة الموظفين</h3>
                </center>
            </div>
            <div class="content-header-right col-md-4 col-12 mb-2">
                <a href="{{url('admin/employees/create')}}" class="btn btn-primary" ><i class="icon-plus"></i> إضافة </a>
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
                                    <th>الاسم</th>
                                    <th>البريد</th>
                                    <th>رقم المحمول</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drivers as $driver)
                                <tr>
                                    <td>{{$driver->id}}</td>
                                    <td><a href="{{(route('employees.show',$driver->id))}}">{{$driver->name}}</a></td>
                                    <td>{{$driver->email}}</td>
                                    <td>{{$driver->mobile}}</td>

                                    <td>
{{--                                        <a href="edit-driver.html" class="btn btn-icon btn-sm btn-success"><i class="ft-edit"></i></a>--}}
{{--                                        <a href="#" class="btn btn-icon btn-sm btn-danger"><i class="ft-trash-2"></i></a>--}}

                                        <form class="myform"  id="{{$driver->id}}"  method="post"  action="{{(route('employees.destroy',$driver->id))}}">
                                            @csrf
                                            <a href="{{(route('employees.edit',$driver->id))}}" class="btn btn-success a-btn-slide-text">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                <span><strong>تعديل</strong></span>
                                            </a>
                                            {!! method_field('Delete') !!} <button class="btn btn-icon btn-sm btn-danger" style="float: none;">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                <span><strong>حذف</strong></span>
                                            </button></form>
                                        <a href="{{url('admin/createAttendance/'.$driver->id)}}" class="btn btn-success a-btn-slide-text">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            <span><strong>اضافة غياب</strong></span>
                                        </a>
                                        <a href="{{url('admin/attendance/'.$driver->id)}}" class="btn btn-success a-btn-slide-text">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            <span><strong>غياب الموظف</strong></span>
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
