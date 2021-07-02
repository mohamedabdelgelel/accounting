/* Calendar Date */
$('#post-date').datepicker("setDate", new Date());
$('#post-date1').datepicker("setDate", new Date());
$('#recive-date1').datepicker("setDate", new Date());

$('#recive-date').datepicker("setDate", new Date());
$('#current-date').datepicker({autoclose: true})
$('#current-date').datepicker("setDate", new Date());
$('#start-date').datepicker({autoclose: true})
$('#start-date').datepicker("setDate", new Date());
$('#end-date').datepicker({autoclose: true})
$('#end-date').datepicker("setDate", new Date());
/* End Calendar Date */
/* Add Multi Auto Field */


var multiple = [
        "AFGHANISTAN|4|93|AFG|",
        "ALBANIA|8|355|ALB|",
        "ALGERIA|12|213|DZA|",
        "AMERICAN SAMOA|16|1684|ASM|",
        "ANDORRA|20|376|AND|",
        "ANGOLA|24|244|AGO|",
        "ANGUILLA|660|1264|AIA|",
        "ANTIGUA AND BARBUDA|28|1268|ATG|",
        "ARGENTINA|32|54|ARG|",
        "ARMENIA|51|374|ARM|",
        "ARUBA|533|297|ABW|",
        "AUSTRALIA|36|61|AUS|",
        "AUSTRIA|40|43|AUT|",
        "AZERBAIJAN|31|994|AZE|",
        "BAHAMAS|44|1242|BHS|",
        "BAHRAIN|48|973|BHR|",
        "BANGLADESH|50|880|BGD|",
        "BARBADOS|52|1246|BRB|",
        "BELARUS|112|375|BLR|",
        "BELGIUM|56|32|BEL|",
        "BELIZE|84|501|BLZ|",
        "BENIN|204|229|BEN|",
        "BERMUDA|60|1441|BMU|",
        "BHUTAN|64|975|BTN|",
        "BOLIVIA|68|591|BOL|",
        "BOSNIA AND HERZEGOVINA|70|387|BIH|",
        "BOTSWANA|72|267|BWA|",
        "BRAZIL|76|55|BRA|",
        "BRUNEI DARUSSALAM|96|673|BRN|",
        "BULGARIA|100|359|BGR|",
        "BURKINA FASO|854|226|BFA|",
        "BURUNDI|108|257|BDI|",
        "CAMBODIA|116|855|KHM|",
        "CAMEROON|120|237|CMR|",
        "CANADA|124|1|CAN|",
        "CAPE VERDE|132|238|CPV|",
        "CAYMAN ISLANDS|136|1345|CYM|",
        "CENTRAL AFRICAN REPUBLIC|140|236|CAF|",
        "CHAD|148|235|TCD|",
        "CHILE|152|56|CHL|",
        "CHINA|156|86|CHN|",
        "COLOMBIA|170|57|COL|",
        "COMOROS|174|269|COM|",
        "CONGO|178|242|COG|",
        "COOK ISLANDS|184|682|COK|",
        "COSTA RICA|188|506|CRI|",
        "COTE D'IVOIRE|384|225|CIV|",
        "CROATIA|191|385|HRV|",
        "CUBA|192|53|CUB|",
        "CYPRUS|196|357|CYP|",
        "CZECH REPUBLIC|203|420|CZE|",
        "DENMARK|208|45|DNK|",
        "DJIBOUTI|262|253|DJI|",
        "DOMINICA|212|1767|DMA|",
        "ECUADOR|218|593|ECU|",
        "EGYPT|818|20|EGY|",
        "EL SALVADOR|222|503|SLV|",
        "EQUATORIAL GUINEA|226|240|GNQ|",
        "ERITREA|232|291|ERI|",
        "ESTONIA|233|372|EST|",
        "ETHIOPIA|231|251|ETH|",
        "FAROE ISLANDS|234|298|FRO|",
        "FIJI|242|679|FJI|",
        "FINLAND|246|358|FIN|",
        "FRANCE|250|33|FRA|",
        "GABON|266|241|GAB|",
        "GAMBIA|270|220|GMB|",
        "GEORGIA|268|995|GEO|",
        "GERMANY|276|49|DEU|",
        "GHANA|288|233|GHA|",
        "GIBRALTAR|292|350|GIB|",
        "GREECE|300|30|GRC|",
        "GREENLAND|304|299|GRL|",
        "GRENADA|308|1473|GRD|",
        "GUADELOUPE|312|590|GLP|",
        "GUAM|316|1671|GUM|",
        "GUATEMALA|320|502|GTM|",
        "GUINEA|324|224|GIN|",
        "GUINEA-BISSAU|624|245|GNB|",
        "GUYANA|328|592|GUY|",
        "HAITI|332|509|HTI|",
        "HONDURAS|340|504|HND|",
        "HONG KONG|344|852|HKG|",
        "HUNGARY|348|36|HUN|",
        "ICELAND|352|354|ISL|",
        "INDIA|356|91|IND|",
        "INDONESIA|360|62|IDN|",
        "IRAQ|368|964|IRQ|",
        "IRELAND|372|353|IRL|",
        "ISRAEL|376|972|ISR|",
        "ITALY|380|39|ITA|",
        "JAMAICA|388|1876|JAM|",
        "JAPAN|392|81|JPN|",
        "JORDAN|400|962|JOR|",
        "KAZAKHSTAN|398|7|KAZ|",
        "KENYA|404|254|KEN|",
        "KIRIBATI|296|686|KIR|",
        "KUWAIT|414|965|KWT|",
        "KYRGYZSTAN|417|996|KGZ|",
        "LATVIA|428|371|LVA|",
        "LEBANON|422|961|LBN|",
        "LESOTHO|426|266|LSO|",
        "LIBERIA|430|231|LBR|",
        "LIECHTENSTEIN|438|423|LIE|",
        "LITHUANIA|440|370|LTU|",
        "LUXEMBOURG|442|352|LUX|",
        "MACAO|446|853|MAC|",
        "MADAGASCAR|450|261|MDG|",
        "MALAWI|454|265|MWI|",
        "MALAYSIA|458|60|MYS|",
        "MALDIVES|462|960|MDV|",
        "MALI|466|223|MLI|",
        "MALTA|470|356|MLT|",
        "MARTINIQUE|474|596|MTQ|",
        "MAURITANIA|478|222|MRT|",
        "MAURITIUS|480|230|MUS|",
        "MEXICO|484|52|MEX|",
        "MONACO|492|377|MCO|",
        "MONGOLIA|496|976|MNG|",
        "MONTSERRAT|500|1664|MSR|",
        "MOROCCO|504|212|MAR|",
        "MOZAMBIQUE|508|258|MOZ|",
        "MYANMAR|104|95|MMR|",
        "NAMIBIA|516|264|NAM|",
        "NAURU|520|674|NRU|",
        "NEPAL|524|977|NPL|",
        "NETHERLANDS|528|31|NLD|",
        "NEW CALEDONIA|540|687|NCL|",
        "NEW ZEALAND|554|64|NZL|",
        "NICARAGUA|558|505|NIC|",
        "NIGER|562|227|NER|",
        "NIGERIA|566|234|NGA|",
        "NIUE|570|683|NIU|",
        "NORFOLK ISLAND|574|672|NFK|",
        "NORWAY|578|47|NOR|",
        "OMAN|512|968|OMN|",
        "PAKISTAN|586|92|PAK|",
        "PALAU|585|680|PLW|",
        "PANAMA|591|507|PAN|",
        "PARAGUAY|600|595|PRY|",
        "PERU|604|51|PER|",
        "PHILIPPINES|608|63|PHL|",
        "PITCAIRN|612|0|PCN|",
        "POLAND|616|48|POL|",
        "PORTUGAL|620|351|PRT|",
        "PUERTO RICO|630|1787|PRI|",
        "QATAR|634|974|QAT|",
        "REUNION|638|262|REU|",
        "SAMOA|882|684|WSM|",
        "SAN MARINO|674|378|SMR|",
        "SAUDI ARABIA|682|966|SAU|",
        "SENEGAL|686|221|SEN|",
        "SEYCHELLES|690|248|SYC|",
        "SIERRA LEONE|694|232|SLE|",
        "SINGAPORE|702|65|SGP|",
        "SLOVAKIA|703|421|SVK|",
        "SLOVENIA|705|386|SVN|",
        "SOLOMON ISLANDS|90|677|SLB|",
        "SOMALIA|706|252|SOM|",
        "SOUTH AFRICA|710|27|ZAF|",
        "SPAIN|724|34|ESP|",
        "SRI LANKA|144|94|LKA|",
        "SUDAN|736|249|SDN|",
        "SURINAME|740|597|SUR|",
        "SWAZILAND|748|268|SWZ|",
        "SWEDEN|752|46|SWE|",
        "SWITZERLAND|756|41|CHE|",
        "THAILAND|764|66|THA|",
        "TIMOR-LESTE||670||",
        "TOGO|768|228|TGO|",
        "TOKELAU|772|690|TKL|",
        "TUVALU|798|688|TUV|",
        "UGANDA|800|256|UGA|",
        "UKRAINE|804|380|UKR|",
        "URUGUAY|858|598|URY|",
        "UZBEKISTAN|860|998|UZB|",
        "VANUATU|548|678|VUT|",
        "VENEZUELA|862|58|VEN|",
        "YEMEN|887|967|YEM|",
        "ZAMBIA|894|260|ZMB|",
        "ZIMBABWE|716|263|ZWE|",
    ];
var AddMultiAutoField = (function(){
  var rowcount, html, tableBody, rowId;
  rowcount = $("#add-table tbody tr").length+1;
  tableBody = $("#add-table tbody");

  function formHtml(code) {
    rowId = $("#add-table tbody tr").attr('id').split('_')[0];

    if (code == 13 && rowId == 'invoicerow') {
      html = '<tr id="invoicerow_'+rowcount+'">';
 html += '<td><input type="text" data-type="code" class="form-control bg-transparent border-0 inputs autocomplete_txt_entry" id="code_'+rowcount+'" name="code[]" autocomplete="off"></td>';
      html += '<td><input type="text" data-type="name" class="form-control bg-transparent border-0 inputs autocomplete_txt_entry" id="name_'+rowcount+'" name="name[]" autocomplete="off"></td>';
     
          html += '<td> <select  data-type="unit" class="mapped2 form-control bg-transparent border-0 inputs autocomplete_txt"  id="unit_'+rowcount+'" name="unit[]"  autocomplete="off"><option>_______</option><option value="cartoon" >كرتون</option><option value="box" >علبة</option><option value="grain" >حبة</option></select></td>';
           html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" id="quantity_'+rowcount+'" name="quantity[]"></td>';

          html += '<td><input type="text" class="form-control bg-transparent border-0 inputs sal-lst" id="price_'+rowcount+'" name="price[]"></td>';
      html += '<td class="p-0"><button type="button" class="btn btn-rounded border-radius-left-0 btn-danger">حذف</button></td>';
      html += '</tr>';
      rowcount++;
      return html;
    }

    if (code == 13 && rowId == 'entryrow') {
      html = '<tr id="entryrow_'+rowcount+'">';
    
       html += '<td><input type="text" data-type="name" class="form-control bg-transparent border-0 inputs autocomplete_txt_entry" id="name_'+rowcount+'" name="name[]" autocomplete="off"></td>';
      html += '<td><input type="text" data-type="code" class="form-control bg-transparent border-0 inputs autocomplete_txt_entry" id="code_'+rowcount+'" name="code[]" autocomplete="off"></td>';
    html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" id="debtor_'+rowcount+'" name="value[]" onchange="codename()"  onblur="calcTotal()" ></td>';
      html += '<td><input type="text" class="form-control bg-transparent border-0 inputs" id="creditor_'+rowcount+'" name="value[]"  onchange="codename()"  onblur="calcTotal()"></td>';
      html += '<td><input type="text" class="form-control bg-transparent border-0 inputs sal-lst" id="statement_'+rowcount+'" name="statement[]"></td>';
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
      function handleAutocomplete_entry() {
        var type, fieldNo, currentEle;
        type = $(this).data('type');
        fieldNo = getFieldNo(type);
        currentEle = $(this);

        if(typeof fieldNo === 'undefined') {
            return false;
        }

        $(this).autocomplete({
            source: function (data, cb) {
                    var result;
                    result = [
                      {
                          label: 'There is matching record found for '+data.term,
                          value: ''
                      }
                    ];
     rowId = $("#add-table tbody tr").attr('id').split('_')[0];
     if(rowId == 'entryrow'){
                    var obj = JSON.parse(accounts);
                    if (obj.length) {
                      var result = $.map(obj, function (obj) {
                        var arr = obj.split("|");
                        return { label: arr[fieldNo], value: arr[fieldNo], data: obj };
                      });
                    }
                }
    else     if(rowId == 'invoicerow'){
                    var obj = JSON.parse(myArray);
                    if (obj.length) {
                      var result = $.map(obj, function (obj) {
                        var arr = obj.split("|");
                        return { label: arr[fieldNo], value: arr[fieldNo], data: obj };
                      });
                    }
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

    function handleAutocomplete() {
        var type, fieldNo, currentEle;
        type = $(this).data('type');
        fieldNo = getFieldNo(type);
        currentEle = $(this);

        if(typeof fieldNo === 'undefined') {
            return false;
        }

        $(this).autocomplete({
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

        $(document).on('focus','.autocomplete_txt_entry', handleAutocomplete_entry);

        $(document).on('focus','.autocomplete_txt', handleAutocomplete);

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
    AddMultiAutoField.init();
});
/* End Add Multi Auto Field */

/* Charts */
$(function () {

//--------------
//- AREA CHART -
//--------------

// Get context with jQuery - using jQuery's .get() method.
var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

var areaChartData = {
labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
datasets: [
{
label               : 'Digital Goods',
backgroundColor     : 'rgba(60,141,188,0.9)',
borderColor         : 'rgba(60,141,188,0.8)',
pointRadius          : false,
pointColor          : '#3b8bba',
pointStrokeColor    : 'rgba(60,141,188,1)',
pointHighlightFill  : '#fff',
pointHighlightStroke: 'rgba(60,141,188,1)',
data                : [28, 48, 40, 19, 86, 27, 90]
},
{
label               : 'Electronics',
backgroundColor     : 'rgba(210, 214, 222, 1)',
borderColor         : 'rgba(210, 214, 222, 1)',
pointRadius         : false,
pointColor          : 'rgba(210, 214, 222, 1)',
pointStrokeColor    : '#c1c7d1',
pointHighlightFill  : '#fff',
pointHighlightStroke: 'rgba(220,220,220,1)',
data                : [65, 59, 80, 81, 56, 55, 40]
},
]
}

var areaChartOptions = {
maintainAspectRatio : false,
responsive : true,
legend: {
display: false
},
scales: {
xAxes: [{
gridLines : {
display : false,
}
}],
yAxes: [{
gridLines : {
display : false,
}
}]
}
}

// This will get the first returned node in the jQuery collection.
var areaChart       = new Chart(areaChartCanvas, {
type: 'line',
data: areaChartData,
options: areaChartOptions
})



//-------------
//- DONUT CHART -
//-------------
// Get context with jQuery - using jQuery's .get() method.
var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
var donutData        = {
labels: [
'Chrome',
'IE',
'FireFox',
'Safari',
'Opera',
'Navigator',
],
datasets: [
{
data: [700,500,400,600,300,100],
backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
}
]
}
var donutOptions     = {
maintainAspectRatio : false,
responsive : true,
}
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
var donutChart = new Chart(donutChartCanvas, {
type: 'doughnut',
data: donutData,
options: donutOptions
})



//-------------
//- BAR CHART -
//-------------
var barChartCanvas = $('#barChart').get(0).getContext('2d')
var barChartData = $.extend(true, {}, areaChartData)
var temp0 = areaChartData.datasets[0]
var temp1 = areaChartData.datasets[1]
barChartData.datasets[0] = temp1
barChartData.datasets[1] = temp0

var barChartOptions = {
responsive              : true,
maintainAspectRatio     : false,
datasetFill             : false
}

var barChart = new Chart(barChartCanvas, {
type: 'bar',
data: barChartData,
options: barChartOptions
})


/*
* LINE CHART
* ----------
*/
//LINE randomly generated data

var sin = [],
cos = []
for (var i = 0; i < 14; i += 0.5) {
sin.push([i, Math.sin(i)])
cos.push([i, Math.cos(i)])
}
var line_data1 = {
data : sin,
color: '#3c8dbc'
}
var line_data2 = {
data : cos,
color: '#00c0ef'
}
$.plot('#line-chart', [line_data1, line_data2], {
grid  : {
hoverable  : true,
borderColor: '#f3f3f3',
borderWidth: 1,
tickColor  : '#f3f3f3'
},
series: {
shadowSize: 0,
lines     : {
show: true
},
points    : {
show: true
}
},
lines : {
fill : false,
color: ['#3c8dbc', '#f56954']
},
yaxis : {
show: true
},
xaxis : {
show: true
}
})
//Initialize tooltip on hover
$('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
position: 'absolute',
display : 'none',
opacity : 0.8
}).appendTo('body')
$('#line-chart').bind('plothover', function (event, pos, item) {

if (item) {
var x = item.datapoint[0].toFixed(2),
y = item.datapoint[1].toFixed(2)

$('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
.css({
top : item.pageY + 5,
left: item.pageX + 5
})
.fadeIn(200)
} else {
$('#line-chart-tooltip').hide()
}

})
/* END LINE CHART */

/* jQueryKnob */

$('.knob').knob({
/*change : function (value) {
//console.log("change : " + value);
},
release : function (value) {
console.log("release : " + value);
},
cancel : function () {
console.log("cancel : " + this.value);
},*/
draw: function () {

// "tron" case
if (this.$.data('skin') == 'tron') {

var a   = this.angle(this.cv)  // Angle
,
sa  = this.startAngle          // Previous start angle
,
sat = this.startAngle         // Start angle
,
ea                            // Previous end angle
,
eat = sat + a                 // End angle
,
r   = true

this.g.lineWidth = this.lineWidth

this.o.cursor
&& (sat = eat - 0.3)
&& (eat = eat + 0.3)

if (this.o.displayPrevious) {
ea = this.startAngle + this.angle(this.value)
this.o.cursor
&& (sa = ea - 0.3)
&& (ea = ea + 0.3)
this.g.beginPath()
this.g.strokeStyle = this.previousColor
this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
this.g.stroke()
}

this.g.beginPath()
this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
this.g.stroke()

this.g.lineWidth = 2
this.g.beginPath()
this.g.strokeStyle = this.o.fgColor
this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
this.g.stroke()

return false
}
}
})
/* END JQUERY KNOB */

})
/* End Charts */
