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

                            <form id="add-form" action="/admin/purchaseReturn" method="post">
                                @csrf

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-1 order-md-1 order-2">

                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">التاريخ</label>
                                                <div class="col-sm-8"><input type="text" name="date"
                                                                             class="form-control bg-gray-light"
                                                                             id="current-date"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">اسم المورد</label>
                                                <div class="col-sm-8"><select name="supplier"
                                                                              class="form-control bg-gray-light autocomplete_txt">
                                                        @foreach($suppliers as $supplier)
                                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>


                                                        @endforeach

                                                    </select></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">اسم المخزن</label>
                                                <div class="col-sm-8"><select name="store"
                                                                              class="form-control bg-gray-light autocomplete_txt">
                                                        @foreach($stores as $supplier)
                                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>


                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">امر التحصيل</label>
                                                <div class="col-sm-8"><input type="text" name="order"
                                                                             class="form-control bg-gray-light"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">رقم القيد</label>
                                                <div class="col-sm-8"><input type="text" required name="registration_number"
                                                                             class="form-control bg-gray-light"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-1 text-center order-md-1 order-1">
                                            <img src="/assets/img/by-the-way-logo.png" alt="By The Way Logo"
                                                 class="brand-image mb-4">
                                            <h5 class="modal-title">فاتورة مردود مشتريات</h5>
                                        </div>
                                        <div class="col-md-4 mb-1 order-md-1 order-3">
                                            <div class="form-group row">&nbsp;</div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4">نوع الفاتورة</label>
                                                <div class="col-sm-8">
                                                    <select name="type" class="form-control bg-gray-light custom-select">
                                                        <option value="نقدي">نقدى</option>
                                                        <option value="فيزا">فيزا</option>

                                                        <option value="اجل">اجل</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card shadow-none m-0">
                                                <div class="card-body table-responsive p-0" style="height:250px;">
                                                    <table class="table table-head-fixed text-nowrap table-striped-td table-input-td text-center"
                                                           id="add-table">
                                                        <thead>
                                                        <tr>

                                                            <th>اسم الصنف</th>
                                                            <th>الكمية</th>
                                                            <th>الوحدة</th>
                                                            <th>السعر</th>
                                                            <th>الاجمالى</th>
                                                            <th>حذف</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr id="invoicerow_1">
                                                            <td><select data-type="name" required
                                                                        class="form-control bg-transparent border-0 inputs autocomplete_txt"
                                                                        id="name_1" onchange="selectProduct(this,1)"
                                                                        name="name[]" autocomplete="off">

                                                                    <option value=""> المنتج</option>
                                                                    @foreach($products as $product)
                                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                                    @endforeach
                                                                </select></td>
                                                            <td><input type="number" value="1"
                                                                       class="form-control bg-transparent border-0 inputs"
                                                                       id="quantity_1" onchange="changeQuantity(this,1)" name="quantity[]"></td>
                                                            <td><select data-type="unit"
                                                                        class="form-control bg-transparent border-0 inputs autocomplete_txt"
                                                                        id="unit_1" onchange="selectProduct(this,1)"
                                                                        name="unit[]" autocomplete="off">
                                                                    <option value="وحدة"> باكو/وحدة</option>
                                                                    <option value="علبة">علبة</option>
                                                                    <option value="كارتونة">كارتونة</option>

                                                                </select></td>
                                                            <td><input type="number" data-type="price"
                                                                       class="form-control bg-transparent border-0 inputs autocomplete_txt"
                                                                       readonly id="price_1" name="price[]"
                                                                       autocomplete="off"></td>
                                                            <td><input type="number"
                                                                       class="form-control bg-transparent border-0 totals inputs sal-lst"
                                                                       id="total_1" readonly name="totals[]"></td>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4 font-weight-bold">الاجمالى</label>
                                                <div class="col-sm-8"><input type="text" id="total" readonly name="total"
                                                                             class="form-control bg-gray-light"/></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4 font-weight-bold">الخصم</label>
                                                <div class="col-sm-8"><input type="text" onchange="updateTotal()" id="discount" name="discount"
                                                                             class="form-control bg-gray-light"/></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4 font-weight-bold">الضريبة</label>
                                                <div class="col-sm-8"><input type="text" id="tax" readonly name="tax"
                                                                             class="form-control bg-gray-light"/></div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-sm-4 font-weight-bold">المبلغ بعد
                                                    الضريبة</label>
                                                <div class="col-sm-8"><input type="text"  id="final" readonly name="final"
                                                                             class="form-control bg-gray-light"/></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0 row">
                                    <button type="submit"class="btn btn-primary"><i
                                                class="nav-icon fas fa-save mr-2"></i>حفظ
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Invoice Modal -->
                </section>


                <script src="/assets/vendor/jquery/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

                <script>
                    var AddMultiAutoField = (function () {
                        var rowcount, html, tableBody, rowId;
                        rowcount = $("#add-table tbody tr").length + 1;
                        tableBody = $("#add-table tbody");
                        var accounts = <?php echo json_encode($products)?>;
                        var options = '';
                        options += '<option value="">المنتج</option>';

                        for (var i = 0; i < accounts.length; i++) {
                            options += '<option value="' + accounts[i].id + '">' + accounts[i].name + '</option>';

                        }

                        function formHtml(code) {
                            rowId = $("#add-table tbody tr").attr('id').split('_')[0];

                            if (code == 13 && rowId == 'invoicerow') {
                                html = '<tr id="invoicerow_' + rowcount + '" >';
                                html += '<td><select  data-type="name" required class="form-control bg-transparent border-0 inputs autocomplete_txt" onchange="selectProduct(this,' + rowcount + ')" id="name_' + rowcount + '" name="name[]" autocomplete="off">' +

                                    options +
                                    '</select></td>';
                                html += '<td><input type="number" value="1" class="form-control bg-transparent border-0 inputs" onchange="changeQuantity(this,' + rowcount + ')" id="quantity_' + rowcount + '" name="quantity[]"></td>';
                                html += '<td><select  data-type="unit" class="form-control bg-transparent border-0 inputs autocomplete_txt"  onchange="selectProduct(this,' + rowcount + ')" id="unit_' + rowcount + '" name="unit[]" autocomplete="off">' +
                                    '<option value="وحدة">    باكو/وحدة      </option>' +
                                    '<option value="علبة"> علبة </option>' +
                                    '<option value="كارتونة"> كارتونة </option>' +

                                    '</select></td>';
                                html += '<td><input type="number" data-type="price" class="form-control bg-transparent border-0 inputs autocomplete_txt" readonly id="price_' + rowcount + '" name="price[]" autocomplete="off"></td>';
                                html += '<td><input type="number" class="form-control bg-transparent border-0 inputs totals sal-lst" readonly id="total_' + rowcount + '" name="totals[]"></td>';
                                html += '<td class="p-0"><button type="button" onclick="removeRow(' + rowcount + ')" class="btn btn-rounded border-radius-left-0 btn-danger">حذف</button></td>';
                                html += '</tr>';
                                rowcount++;
                                return html;
                            }


                        }

                        function getFieldNo(type) {
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

                            if (typeof fieldNo === 'undefined') {
                                return false;
                            }

                            currentEle.autocomplete({
                                source: function (data, cb) {
                                    var result;
                                    result = [
                                        {
                                            label: 'There is matching record found for ' + data.term,
                                            value: ''
                                        }
                                    ];
                                    if (multiple.length) {
                                        var result = $.map(multiple, function (obj) {
                                            var arr = obj.split("|");
                                            return {label: arr[fieldNo], value: arr[fieldNo], data: obj};
                                        });
                                    }
                                    data.term, cb($.ui.autocomplete.filter(result, data.term));
                                },
                                autoFocus: true,
                                minLength: 1,
                                select: function (event, ui) {
                                    var resArr, rowNo;


                                    rowNo = getId(currentEle);
                                    resArr = ui.item.data.split("|");

                                    $('#name_' + rowNo).val(resArr[0]);
                                    $('#code_' + rowNo).val(resArr[1]);
                                    $('#unit_' + rowNo).val(resArr[2]);
                                    $('#price_' + rowNo).val(resArr[3]);
                                }
                            });
                        }

                        function getId(element) {
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
                            $('#add-table').on('keyup', '.sal-lst', function (e) {
                                var code = (e.keyCode ? e.keyCode : e.which);
                                addNewRow(code);
                            });

                            $('#add-table').on('keydown', '.inputs', function (e) {
                                var code = (e.keyCode ? e.keyCode : e.which);
                                if (code == 13) {
                                    var index = $('.inputs').index(this) + 1;
                                    $('.inputs').eq(index).focus();
                                }
                            });

                            $('#add-table').on('click', '.btn-danger', deleteRow);

                            $(document).on('focus', '.autocomplete_txt', handleMultiAutocomplete);

                            $(window).ready(function () {
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

                    $(document).ready(function () {
                        $("#accModal").modal('show');
                        AddMultiAutoField.init();
                    });

                    function selectProduct(element, row) {


                        $.ajax({
                            url: '/admin/getPrice/?id=' + $('#name_' + row).val() + '&type=' + $('#unit_' + row).val(),
                            type: 'get',
                            success: function (data) {

                                if (data == 0) {
                                    toastr.error('لا يوجد منتج بهذه الوحدة');

                                } else {
                                    $('#price_' + row).val(data);
                                    $('#total_' + row).val(data * $('#quantity_' + row).val());
                                    updateTotal();

                                }
                            }
                        });

                    }

                    function changeQuantity(element, row) {

                        if($('#price_' + row).val()!="") {

                            $('#total_' + row).val($('#price_' + row).val() * $('#quantity_' + row).val());
                            updateTotal();

                        }
                        else
                        {
                            toastr.error('لم يتم اختيار منتج');

                        }


                    }
                    function updateTotal() {
                      //  alert();
                       var total=0;
                        $('.totals').each(function() {
                            total+=parseFloat($(this).val());
                        });
                        var tax=total*5/100;

                        $('#total').val(total);
                        $('#tax').val(tax);
                        $('#final').val(parseFloat(tax)+parseFloat(total)-$('#discount').val());


                    }
                    function removeRow(row) {
                        $('#invoicerow_'+row).remove();
                        updateTotal();

                    }

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
