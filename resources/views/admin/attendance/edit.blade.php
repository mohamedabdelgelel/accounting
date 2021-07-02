@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل غياب الموظف</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="{{url('updateAttendance/'.$attendance->id)}}" method="post" enctype="multipart/form-data">
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
                                        <label>الراتب الاساسي</label>
                                        <input type="number" step="0.1" value="{{$attendance->basic_salary}}" name="basic_salary"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>عدد الايام</label>
                                        <input type="number" id="days" name="num_days" value="{{$attendance->num_days}}" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>قيمة اليوم</label>
                                        <input type="number" onkeyup="changeday()" id="day_value" step="0.1" value="{{$attendance->day_value}}"   name="day_value"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاجمالي</label>
                                        <input type="number" readonly id="total" step="0.1" value="{{$attendance->total}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ملاحظات</label>
                                        <textarea name="notes" class="form-control">{!! $attendance->notes !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit"class="btn btn-primary"><i class="icon-check"></i> حفظ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function changeday()
    {
        var x=$('#day_value').val()*$('#days').val();
        $('#total').val(x);
    }
</script>
@endsection
