@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل الموظف</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text"value="{{$driver->name}}" readonly name="name"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>البريد الالكتروني</label>
                                        <input type="email"value="{{$driver->email}}" readonly name="email" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم المحمول</label>
                                        <input type="text"value="{{$driver->mobile}}" readonly required name="mobile"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="text"value="{{$driver->phone}}" readonly required name="phone"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم المحمول</label>
                                        <input type="text"value="{{$driver->mobile}}" readonly required name="mobile"class="form-control">
                                    </div>
                                </div> <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم البطاقة</label>
                                        <input type="text" value="{{$driver->national_id}}" readonly readonly required name="national_id"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تاريخ الميلاد </label>
                                        <input type="date" value="{{$driver->birthdate}}" readonly  name="birthdate"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>	ساعات العمل الاضافي</label>
                                        <input type="text"  value="{{$driver->working_hours}}" readonly name="working_hours"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الجنسية</label>
                                        <input type="text" value="{{$driver->national}}" readonly name="national"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الراتب</label>
                                        <input type="text" value="{{$driver->salary}}" readonly name="salary"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الفرع</label>
                                        <input type="text"  value="{{$driver->branch}}" readonly name="branch"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الحالة الاجتماعية</label>
                                        <input type="text"value="{{$driver->social_status}}" readonly name="social_status"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الفرع</label>
                                        <input type="text" value="{{$driver->branch}}"  readonly name="branch"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الادارة</label>
                                        <input type="text"  value="{{$driver->manges}}" readonly name="manges"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المستوي العلمي</label>
                                        <input type="text" value="{{$driver->education_status}}" readonly name="education_status"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الوظيفة</label>
                                        <input type="text" value="{{$driver->job}}" readonly name="job"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>تاريخ التخرج</label>
                                        <input type="date" value="{{$driver->graduation_date}}" readonly name="graduation_date"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المدير المباشر</label>
                                        <input type="text" value="{{$driver->head_manger}}" readonly name="head_manger"required class="form-control">
                                    </div>
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
