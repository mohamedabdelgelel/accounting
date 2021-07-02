@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">تعديل ايراد</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <form action="{{route('revenues.update',$driver->id)}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branches</label>
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
                                        <label>Accounts</label>
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
                                        <label>Date</label>
                                        <input type="date" value="{{$driver->date}}" name="date"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Net Sales</label>
                                        <input type="text" name="net_sales"  value="{{$driver->net_sales}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vat is</label>
                                        <input type="text" name="vat" value="{{$driver->vat}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Salled</label>
                                        <input type="text" name="total_sales" value="{{$driver->date}}" required class="form-control">
                                    </div>
                                </div>  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Master Card</label>
                                        <input type="text" name="master_card" value="{{$driver->master_card}}" required class="form-control">
                                    </div>
                                </div>  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Spain</label>
                                        <input type="text" name="span" value="{{$driver->span}}" required class="form-control">
                                    </div>
                                </div>  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Visa</label>
                                        <input type="text" name="visa" value="{{$driver->visa}}" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>STC</label>
                                        <input type="text" name="stc" value="{{$driver->stc}}" required class="form-control">
                                    </div>
                                </div>  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Wassel</label>
                                        <input type="text" name="wassel"required value="{{$driver->wassel}}"  class="form-control">
                                    </div>
                                </div>  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>To You</label>
                                        <input type="text" name="to_you" value="{{$driver->to_you}}" required class="form-control">
                                    </div>
                                </div>  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hunger Sta Shion</label>
                                        <input type="text" name="hunger" value="{{$driver->hunger}}" required class="form-control">
                                    </div>
                                </div>  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Atm</label>
                                        <input type="text" name="total_atm"value="{{$driver->total_atm}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Royality fee</label>
                                        <input type="text" name="fee" value="{{$driver->fee}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Markiting</label>
                                        <input type="text" name="markiting" value="{{$driver->markiting}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total fee</label>
                                        <input type="text" name="total_fee"value="{{$driver->total_fee}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Advanced</label>
                                        <input type="text" name="advansed"value="{{$driver->advansed}}" required class="form-control">
                                    </div>
                                </div><div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cash Saled of day</label>
                                        <input type="text" name="cash_day" value="{{$driver->cash_day}}" required class="form-control">
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
