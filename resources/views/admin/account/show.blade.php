@extends('layout.master2')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2">
                    <h3 class="content-header-title font-theme ls-0">الاتوبيس</h3>
                </div>
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-block">
                        <div class="card-body pt-3">
                            <div class="row" id="printable">
                                <div class="col-md-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th width="150">رقم الاتوبيس</th>
                                            <td>{{$trip->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">الموديل</th>

                                            <td>{{$trip->model}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">الماركة</th>
                                            <td>{{$trip->marka}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">السنة</th>
                                            <td>{{$trip->year}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">السعه</th>
                                            <td>{{$trip->size}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">رقم اللوحة</th>
                                            <td>{{$trip->plat_number}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">رقم الماتور</th>
                                            <td>{{$trip->mator_number}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">الكيلموميترات</th>
                                            <td>{{$trip->kilometers}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>

                                        <tr>
                                            <th width="150">تاريخ بداية الرخصة</th>
                                            <td>{{$trip->start_license}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">تاريخ انتهاء الرخصة</th>
                                            <td>{{$trip->end_license}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">تاريخ بداية التامين</th>
                                            <td>{{$trip->start_insurance}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">تاريخ انتهاء التامين</th>
                                            <td>{{$trip->end_insurance}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">الرخصة وش</th>
                                            <td>
                                                <img style="width: 100px; height: 100px;" src="{{URL::asset('storage/app/public/attachment/' . $trip->license_image)}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="150">الرخصة ضهر</th>
                                            <td>
                                                <img style="width: 100px; height: 100px;" src="{{URL::asset('storage/app/public/attachment/' . $trip->lisence_image2)}}">
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
{{--                                <div class="col-md-12 d-print-none">--}}
{{--                                    <button type="button" class="btn btn-cyan btn-icon-text print my-2"><i class="icon-printer"></i> طباعة</button>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection