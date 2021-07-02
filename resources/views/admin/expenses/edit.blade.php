@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل مصروف</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="{{route('expenses.update',$driver->id)}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الفروع</label>
                                        <select name="branch_id"  id="country" required onchange="updateSelectCountry()"  class="form-control">
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}"
                                                @if($driver->branch_id) selected @endif>{{$branch->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الحسابات</label>
                                        <select name="account_id" required id="c_clinicProvinces"   class="form-control">
                                            @foreach($selected as $branch)
                                                <option value="{{$branch->id}}"
                                                        @if($driver->account_id==$branch->id) selected @endif>{{$branch->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المصروف</label>
                                        <input type="text"  value="{{$driver->expense}}" name="expense"  required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>التاريخ</label>
                                        <input type="date" value="{{$driver->date}}" name="date"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> رقم الفاتورة</label>
                                        <input type="number" name="number"  value="{{$driver->number}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المبلغ </label>
                                        <input type="number" step="0.1" name="amount" value="{{$driver->amount}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الضريبة</label>
                                        <input type="number" step="0.1"  name="tax" value="{{$driver->tax}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>التفاصيل</label>
                                        <textarea name="description"  class="form-control" >{!! $driver->description !!}</textarea>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <button type="submit"  class="btn btn-primary"><i class="icon-check"></i> حفظ</button>
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
    function updateSelectCountry() {
        var country = $('#country').val();
        var option = '<option selected="true" value="" disabled="disabled">Choose City</option>';
        $.ajax({
            url: 'http://accountant.3codeit.com/updateSelectCountry/' + country,
            type: 'get',
            success: function (data) {
                if (data == 0) {
                    // toastr.warning('no cities for this country');
                    $('#c_clinicProvinces').empty();
                    $('#c_clinicProvinces').append(option);

                } else {
                    $('#c_clinicProvinces').empty();
                    for (var x = 0; x < data.length; x++) {
                        option += '<option value="' + data[x].id + '">' + data[x].name + '</option>';

                    }
                    $('#c_clinicProvinces').append(option);

                }
            }
        });
    }
</script>
@endsection
