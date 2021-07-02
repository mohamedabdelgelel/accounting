@extends('layout.master2')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title font-theme ls-0">إضافة سند صرف</h3>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @else
                @endif
                <div class="card-block">
                    <div class="card-body">
                        <form method="post" action="/admin/cache" enctype="multipart/form-data">
                            @csrf()
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>التاريخ</label>
                                        <input type="date" value="{{date('Y-m-d')}}" name="date"required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم السند</label>
                                        <input type="text" name="statement" value="@if($transaction){{$transaction->id+1}} @else 1 @endif" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> الحساب</label>
                                <select name="account_id" required class="form-control  bg-gray-light autocomplete_txt">
                                    <option value="" disabled="" selected="">اختار الحساب</option>

                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المبلغ</label>
                                        <input type="number" step=".001" name="money" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ملاحظات</label>
                                        <input type="text" name="notes" required class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><i class="icon-plus"></i> إضافة</button>
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
<script src="/assets/vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
@endsection
