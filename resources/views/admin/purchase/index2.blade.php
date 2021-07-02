@extends('layout.master2')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('.myform').submit(function() {
            if (confirm('هل ان متأكد من حذف بيان الحساب؟')) {

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
                <h3 class="content-header-title font-theme ls-0">فواتير مردود الشراء
                </h3>
            </div>
            <div class="content-header-right col-md-4 col-12 mb-2">
                <a href="{{url('admin/purchaseReturn')}}" class="btn btn-primary" ><i class="icon-plus"></i> إضافة </a>
            </div>
            <div class="content-header-right col-md-4 col-12 mb-2">
                <button type="button"  data-toggle="modal" data-target="#subscription" href="#" class="btn btn-primary" data-tooltip="tooltip" data-placement="top" title="" >بحث</button>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-block">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-head-fixed text-nowrap table-striped-td table-sm-td text-center">
                                <thead>
                                <tr>
                                    <th>رقم الفاتورة</th>
                                    <th>التاريخ</th>
                                    <th>رقم القيد</th>

                                    <th>القيمة</th>
                                    <th>الخصم</th>
                                    <th>الضريبة</th>
                                    <th>الصافى</th>
                                    <th>حذف</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($drivers as $drive)
                                <tr>
                                    <td>{{$drive->id}}</td>
                                    <td>{{$drive->date}}</td>
                                    <td>{{$drive->registration_number}}</td>

                                    <td>{{$drive->total - $drive->tax + $drive->discount}}</td>
                                    <td>{{$drive->discount}}</td>
                                    <td>{{$drive->tax}}</td>
                                    <td>{{$drive->total}}</td>
                                    <td>

                                        <form class="myform"  id="{{$drive->id}}"  method="post"  action="{{'purchase/delete/'.$drive->id}}">
                                            @csrf

                                            {!! method_field('Delete') !!} <button class="btn btn-icon btn-sm btn-danger" style="float: none;">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                <span><strong>حذف</strong></span>
                                            </button>
                                        </form>
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

<div class="modal fade text-left" id="subscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="    width: 600px;
">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35">{{__('بحث')}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="subscription_form" action="{{url('admin/getPurshaseReturn')}}"  novalidate method="GET">
                <div class="">
                    <fieldset class="form-group control-group floating-label-form-group control-group">
                        <center>  <label for="subscribe_end_date">{{__('اسم العميل')}}</label></center>
                        <input type="text" name="client"   class="form-control date"
                               placeholder="{{__('اسم العميل')}}">
                    </fieldset>
                    <br>
                    <fieldset class="form-group control-group floating-label-form-group control-group">
                        <center>  <label for="subscribe_end_date">{{__('رقم الفاتورة')}}</label></center>
                        <input type="number"  name="id"   class="form-control date"
                               placeholder="{{__('رقم الفاتورة')}}">
                    </fieldset>

                    <br>
                    <fieldset class="form-group control-group floating-label-form-group control-group">
                        <center>  <label for="subscribe_end_date">{{__('تاريخ الفاتورة')}}</label></center>
                        <input type="date" name="date" class="form-control date"
                               placeholder="{{__('تاريخ الفاتورة')}}">
                    </fieldset>

                    <br>
                    <fieldset class="form-group control-group floating-label-form-group control-group">
                        <center>  <label for="subscribe_end_date">{{__('مبلغ الفاتورة')}}</label></center>
                        <input type="number" step="0.1" name="total" class="form-control date"
                               placeholder="{{__('مبلغ الفاتورة')}}">
                    </fieldset>

                    <br>
                    <fieldset class="form-group control-group floating-label-form-group control-group">
                        <center> <label for="subscribe_paid_status">اسم المورد</label></center>
                        <select  name="supplier_id"  class="form-control">
                            <option selected disabled>اختار المورد</option>
                            @foreach($suppliers as $country)
                                <option value="{{$country->id}}"
                                >{{$country->name}}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    <br>
                    <fieldset class="form-group control-group floating-label-form-group control-group">
                        <center> <label for="subscribe_paid_status">اسم المخزن</label></center>
                        <select  name="store_id"  class="form-control">
                            <option selected disabled>اختار المخزن</option>
                            @foreach($stores as $country)
                                <option value="{{$country->id}}"
                                >{{$country->name}}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    <br>

                    <fieldset class="form-group control-group floating-label-form-group control-group">
                        <center>  <label for="subscribe_end_date">{{__('امر التحصيل')}}</label></center>
                        <input type="text" name="order"   class="form-control date"
                               placeholder="{{__(' امر التحصيل')}}">
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-outline-blue btn-sm" value="{{__('بحث')}}">
                    <input type="reset" class="btn btn-outline-secondary btn-sm" data-dismiss="modal"
                           value="{{__('اغلاق')}}">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
