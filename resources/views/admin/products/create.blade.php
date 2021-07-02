@extends('layout.master2')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">


            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-block">
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @else
                        @endif
                        <div class="card-body">

                            <form action="{{route('products.store')}}" method="post">
                                @csrf()

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-2 order-md-1 order-2">
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">اسم الصنف</label>
                                                <div class="col-sm-8"><input type="text" name="name" class="form-control bg-gray-light"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">اسم المخزن</label>
                                                <div class="col-sm-8">
                                                    <select name="store_id">
                                                        @foreach($stores as $store)
                                                            <option value="{{$store->id}}">{{$store->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">المورد</label>
                                                <div class="col-sm-8">
                                                    <select name="supplier_id">
                                                        @foreach($suppliers as $store)
                                                            <option value="{{$store->id}}">{{$store->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">المجموعة</label>
                                                <div class="col-sm-8">
                                                    <select name="classificaiton_id">
                                                        @foreach($classifications as $store)
                                                            <option value="{{$store->id}}">{{$store->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2 text-center order-md-1 order-1">
                                            <img src="/assets/img/by-the-way-logo.png" alt="By The Way Logo" class="brand-image mb-4">
                                            <h5 class="modal-title">إضافة مواد</h5>
                                        </div>
                                        <div class="col-md-4 mb-2 order-md-1 order-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">الحد الادنى</label>
                                                <div class="col-sm-8"><input type="number" step="0.1" name="min_price" class="form-control bg-gray-light"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">الحد الاعلى</label>
                                                <div class="col-sm-8"><input type="number" step="0.1" name="max_price" class="form-control bg-gray-light"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">نظام التسعير</label>
                                                <div class="col-sm-8"><input type="text" name="price_system" class="form-control bg-gray-light"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card shadow-none">
                                                <div class="card-header d-flex p-0 bg-orange border-0">
                                                    <!-- Tab Links -->
                                                    <ul class="nav nav-tabs m-auto">
                                                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">باكو \وحدة</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">علبة</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">كارتونة</a></li>
                                                    </ul>
                                                    <!-- End Tab Links -->
                                                </div>
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <!-- Tab1 Content -->
                                                        <div class="tab-pane active" id="tab_1">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">النوع</label>
                                                                        <div class="col-sm-7"><input name="type_0" type="text" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">الوحدة</label>
                                                                        <div class="col-sm-7"><input type="text" name="unit_0" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">سعر الشراء</label>
                                                                        <div class="col-sm-7"><input type="number" name="price_0" step="0.1" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">نسبة الخصم المسموح به</label>
                                                                        <div class="col-sm-7"><input type="text" name="dicount_0" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">حد الطلب</label>
                                                                        <div class="col-sm-7"><input type="text" name="order_0" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">الرصيد الحالى</label>
                                                                        <div class="col-sm-7"><input type="number" name="current_price_0" step="0.1" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">باكود 1</label>
                                                                        <div class="col-sm-7"><input type="text" name="bacode1_0" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">سعر البيع</label>
                                                                        <div class="col-sm-7"><input type="text"  name="bacode2_0"class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Tab1 Content -->
                                                        <!-- Tab2 Content -->
                                                        <div class="tab-pane fade" id="tab_2">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">النوع</label>
                                                                        <div class="col-sm-7"><input name="type_2" type="text" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">الوحدة</label>
                                                                        <div class="col-sm-7"><input type="text" name="unit_2" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">سعر الشراء</label>
                                                                        <div class="col-sm-7"><input type="number" name="price_2" step="0.1" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">نسبة الخصم المسموح به</label>
                                                                        <div class="col-sm-7"><input type="text" name="dicount_2" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">حد الطلب</label>
                                                                        <div class="col-sm-7"><input type="text" name="order_2" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">الرصيد الحالى</label>
                                                                        <div class="col-sm-7"><input type="number" name="current_price_2" step="0.1" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">باكود </label>
                                                                        <div class="col-sm-7"><input type="text" name="bacode1_2" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">سعر البيع</label>
                                                                        <div class="col-sm-7"><input type="text"  name="bacode2_2"class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Tab2 Content -->
                                                        <!-- Tab3 Content -->
                                                        <div class="tab-pane fade" id="tab_3">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">النوع</label>
                                                                        <div class="col-sm-7"><input name="type_3" type="text" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">الوحدة</label>
                                                                        <div class="col-sm-7"><input type="text" name="unit_3" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">سعر الشراء</label>
                                                                        <div class="col-sm-7"><input type="number" name="price_3" step="0.1" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">نسبة الخصم المسموح به</label>
                                                                        <div class="col-sm-7"><input type="text" name="dicount_3" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">حد الطلب</label>
                                                                        <div class="col-sm-7"><input type="text" name="order_3" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">الرصيد الحالى</label>
                                                                        <div class="col-sm-7"><input type="number" name="current_price_3" step="0.1" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">باكود 1</label>
                                                                        <div class="col-sm-7"><input type="text" name="bacode1_3" class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-sm-4 rounded-pill bg-orange text-center mx-2">سعر البيع</label>
                                                                        <div class="col-sm-7"><input type="text"  name="bacode2_3"class="form-control bg-gray-light"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Tab3 Content -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save mr-2"></i>حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->


        <script src="/assets/vendor/jquery/jquery.min.js"></script>

        <script>
            var AddMultiAutoField = (function(){
                var rowcount, html, tableBody, rowId;
                rowcount = $("#add-table tbody tr").length+1;
                tableBody = $("#add-table tbody");

                function formHtml(code) {
                    rowId = $("#add-table tbody tr").attr('id').split('_')[0];

                    if (code == 13 && rowId == 'invoicerow') {
                        html = '<tr id="invoicerow_'+rowcount+'">';
                        html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" id="id_'+rowcount+'" name="id[]"></td>';
                        html += '<td><input type="text" data-type="code" class="form-control bg-transparent border-0 inputs autocomplete_txt" id="code_'+rowcount+'" name="code[]" autocomplete="off"></td>';
                        html += '<td><input type="text" data-type="name" class="form-control bg-transparent border-0 inputs autocomplete_txt" id="name_'+rowcount+'" name="name[]" autocomplete="off"></td>';
                        html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" id="quantity_'+rowcount+'" name="quantity[]"></td>';
                        html += '<td><input type="text" data-type="unit" class="form-control bg-transparent border-0 inputs autocomplete_txt" id="unit_'+rowcount+'" name="unit[]" autocomplete="off"></td>';
                        html += '<td><input type="text" data-type="price" class="form-control bg-transparent border-0 inputs autocomplete_txt" id="price_'+rowcount+'" name="price[]" autocomplete="off"></td>';
                        html += '<td><input type="text" class="form-control bg-transparent border-0 inputs sal-lst" id="total_'+rowcount+'" name="total[]"></td>';
                        html += '<td class="p-0"><button type="button" class="btn btn-rounded border-radius-left-0 btn-danger">حذف</button></td>';
                        html += '</tr>';
                        rowcount++;
                        return html;
                    }


                }

                function getFieldNo(type){
                    var fieldNo;
                    switch (type) {
                        case 'name':
                            fieldNo = 0;
                            break;
                        case 'code':
                            fieldNo = 1;
                            break;
                        case 'unit':
                            fieldNo = 2;
                            break;
                        case 'price':
                            fieldNo = 3;
                            break;
                        default:
                            break;
                    }
                    return fieldNo;
                }
                function handleMultiAutocomplete() {
                    var type, fieldNo, currentEle;
                    type = $(this).data('type');
                    fieldNo = getFieldNo(type);
                    currentEle = $(this);

                    if(typeof fieldNo === 'undefined') {
                        return false;
                    }

                    currentEle.autocomplete({
                        source: function (data, cb) {
                            var result;
                            result = [
                                {
                                    label: 'There is matching record found for '+data.term,
                                    value: ''
                                }
                            ];
                            if (multiple.length) {
                                var result = $.map(multiple, function (obj) {
                                    var arr = obj.split("|");
                                    return { label: arr[fieldNo], value: arr[fieldNo], data: obj };
                                });
                            }
                            data.term, cb($.ui.autocomplete.filter(result, data.term));
                        },
                        autoFocus: true,
                        minLength: 1,
                        select: function( event, ui ) {
                            var resArr, rowNo;


                            rowNo = getId(currentEle);
                            resArr = ui.item.data.split("|");

                            $('#name_'+rowNo).val(resArr[0]);
                            $('#code_'+rowNo).val(resArr[1]);
                            $('#unit_'+rowNo).val(resArr[2]);
                            $('#price_'+rowNo).val(resArr[3]);
                        }
                    });
                }

                function getId(element){
                    var id, idArr;
                    id = element.attr('id');
                    idArr = id.split("_");
                    return idArr[idArr.length - 1];
                }

                function addNewRow(code) {
                    $('#add-table').append(formHtml(code));
                    $('select').selectize({
                        sortField: 'text'
                    });
                }

                function deleteRow() {
                    $(this).closest('tr').remove();
                }

                function registerEvents() {
                    $('#add-table').on('keyup', '.sal-lst', function(e) {
                        var code = (e.keyCode ? e.keyCode : e.which);
                        addNewRow(code);
                    });

                    $('#add-table').on('keydown', '.inputs', function(e) {
                        var code = (e.keyCode ? e.keyCode : e.which);
                        if (code == 13) {
                            var index = $('.inputs').index(this) + 1;
                            $('.inputs').eq(index).focus();
                        }
                    });

                    $('#add-table').on('click', '.btn-danger', deleteRow);

                    $(document).on('focus','.autocomplete_txt', handleMultiAutocomplete);

                    $(window).ready(function() {
                        $("#add-form").on("keypress", function (event) {
                            var keyPressed = event.keyCode || event.which;
                            if (keyPressed === 13) {
                                event.preventDefault();
                            }
                        });
                    });
                }
                function init() {
                    registerEvents();
                }

                return {
                    init: init
                };
            })();

            $(document).ready(function(){
                $("#accModal").modal('show');
                AddMultiAutoField.init();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('select').selectize({
                    sortField: 'text'
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('select').selectize({
                    sortField: 'text'
                });
            });
        </script>




@endsection
