@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل سلف الموظف</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="{{url('updateCount/'.$attendance->id)}}" method="post" enctype="multipart/form-data">
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
                                        <label>المبلغ</label>
                                        <input type="number" step="0.1" name="money" value="{{$attendance->money}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>عدد شهور الخصم</label>
                                        <input type="number" name="num_of_months"  value="{{$attendance->num_of_months}}"  required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>شهر بداية الخصم</label>
                                        <input type="date" name="discount_date"  value="{{$attendance->discount_date}}"  required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اعتماد المدير المباشر</label>
                                        <input type="text" name="head_manger" value="{{$attendance->head_manger}}"   required class="form-control">
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
