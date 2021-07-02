@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل اجازة الموظف</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="{{url('updateHoliday/'.$attendance->id)}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الموظفين</label>
                                        <select name="employee_id" class="form-control">
                                            @foreach($employees as $emp)
                                                <option value="{{$emp->id}}"@if($emp->id==$attendance->employee_id) selected @endif>{{$emp->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>بداية الاجازه</label>
                                        <input type="date" name="from" value="{{$attendance->from}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>نهاية الاجازه</label>
                                        <input type="date" name="to"  value="{{$attendance->to}}"  required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>نوع الاجازة</label>
                                        <select name="type" class="form-control">
                                            <option value="لاتخصم" @if($attendance->type=="لاتخصم")selected @endif>بدون الخصم</option>
                                            <option value="تخصم" @if($attendance->type=="تخصم")selected @endif>مع الخصم</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اعتماد المدير المباشر</label>
                                        <input type="text" name="ahead_manger"  value="{{$attendance->ahead_manger}}"  required class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>السبب</label>
                                        <textarea class="form-control" name="reason">{!! $attendance->reason !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="icon-check"></i> حفظ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
