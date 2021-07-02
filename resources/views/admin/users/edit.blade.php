@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل المستخدم</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="{{route('users.update',$driver->id)}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text" name="name"value="{{$driver->name}}"  required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>البريد الالكتروني</label>
                                        <input type="email" name="email"value="{{$driver->email}}"  required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>كلمة المرور</label>
                                        <input type="text" name="password"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>صلاحيات المستخدم</label>

                                        <input type="checkbox" class="form-control"  @foreach($permissions as $per) @if($per->name=="المحاسبة") checked @endif @endforeach name="per_name[]" value="المحاسبة">
                                        <label>المحاسبة</label>
                                        <input type="checkbox" class="form-control"   @foreach($permissions as $per)@if($per->name=="سند قبض") checked @endif @endforeach name="per_name[]" value="سند قبض">
                                        <label>سند قبض</label>
                                        <input type="checkbox" class="form-control"   @foreach($permissions as $per)@if($per->name=="صرف") checked @endif @endforeach name="per_name[]" value="صرف">
                                        <label>صرف</label>
                                        <input type="checkbox" class="form-control"   @foreach($permissions as $per)@if($per->name=="قيود يومية") checked @endif @endforeach name="per_name[]" value="قيود يومية">
                                        <label>قيود يومية</label>
                                        <input type="checkbox" class="form-control"  @foreach($permissions as $per) @if($per->name=="ميزان المراجعه") checked @endif @endforeach hname="per_name[]" value="ميزان المراجعه">
                                        <label>ميزان المراجعه</label>
                                        <input type="checkbox" class="form-control"  @foreach($permissions as $per) @if($per->name=="مشتريات") checked @endif @endforeach name="per_name[]" value="مشتريات">
                                        <label>مشتريات</label>
                                        <input type="checkbox" class="form-control"  @foreach($permissions as $per) @if($per->name=="فاتورة المشتريات") checked @endif @endforeach name="per_name[]" value="فاتورة المشتريات">
                                        <label>فاتورة المشتريات</label>
                                        <input type="checkbox" class="form-control"   @foreach($permissions as $per)@if($per->name=="مردود المشتريات") checked @endif @endforeach name="per_name[]" value="مردود المشتريات">
                                        <label>مردود المشتريات</label>
                                        <input type="checkbox" class="form-control"  @foreach($permissions as $per) @if($per->name=="المخزون") checked @endif @endforeach name="per_name[]" value="المخزون">
                                        <label>المخزون</label>
                                        <input type="checkbox" class="form-control"   @foreach($permissions as $per)@if($per->name=="انشاءالاصناف") checked @endif @endforeach name="per_name[]" value="انشاءالاصناف">
                                        <label>انشاءالاصناف</label>
                                        <input type="checkbox" class="form-control"   @foreach($permissions as $per)@if($per->name=="انشاءالمجموعات") checked @endif @endforeach name="per_name[]" value="انشاءالمجموعات">
                                        <label>انشاءالمجموعات</label>
                                        <input type="checkbox" class="form-control"  @foreach($permissions as $per)@if($per->name=="التقارير") checked @endif @endforeach  name="per_name[]" value="التقارير">
                                        <label>التقارير</label>
                                        <input type="checkbox" class="form-control"  @foreach($permissions as $per) @if($per->name=="كاشير") checked @endif @endforeach name="per_name[]" value="كاشير">
                                        <label>كاشير</label>


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
