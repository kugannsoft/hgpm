<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

         <style>
            #hdsaletable thead {
                background-color: rgb(202, 205, 245) !important;
                }
        </style>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="row">
                            <form id="filterform">
                                <div class="col-md-4">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="form-control" name="startdate" value="<?php echo date("Y-m-d") ?>"/>
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="form-control" name="enddate" value="<?php echo date("Y-m-d") ?>"/>
                                    </div>
                                </div>
                                    <div class="col-md-3">
                                       <select class="form-control" name="customer" id="customer">
                                            <option value="">--Select Employee--</option>
                                            <?php foreach ($salesperson AS $loc) { ?>
                                               <option value="<?php echo $loc->RepID ?>"><?php echo $loc->RepName ?></option>
                                            <?php } ?>
                                        </select>
                                       
                                    </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-flat btn-success">Show</button>
                                </div>
                            </form>
                            <div class="col-md-2">
                                <button onclick="printdiv()" class="btn btn-flat btn-default">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body table-responsive">
                        <table id="saletable" class="table table-bordered">
                            <thead>
                               <tr>
                                    <td style="width: 120px;">Name</td>
                                    <td style="width: 80px;">Date</td>
                                    <td style="width: 80px;">Working Hours</td>
                                    <td style="width: 100px;text-align:center;">Flat Qty</td>
                                    <td style="width: 100px;">Invoice Amount</td>
                                    <td style="width: 100px;">Working Inv Amount</td>
                                     <td style="width:100px;">Working Flat Inv Amount</td>
                                    <td style="width: 100px;">Lost/Profit Rate</td>
                                </tr>

                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th style='text-align:center' id ="totalQty"></th>
                                    <th style='text-align:center' id ="totalFlatQty"></th>
                                    <th style='text-align:center' id ="totalCostPrice"></th>
                                    <th style='text-align:center' id ="totalCostQty"></th>
                                    <th style='text-align:center' id ="totalCostFlatQty"></th>
                                    <th style='text-align:center' id ="totalProfit"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--print view modal-->
        <div id="salesbydateprint" class="modal fade bs-add-category-modal-lg" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- load data -->
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $('.input-daterange').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    
      $("#route").select2({
          placeholder: "Select a location"
      });
    var loc =[];
 $("#route").change(function(){
    loc.length=0;

    $("#route :selected").each(function(){
        loc.push($(this).val()); 
    });
    $("#route_ar").val(JSON.stringify(loc));
 });
 
    $('#filterform').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "loademployeeproductivity",
            data: $(this).serialize(),
            success: function (data) {
                $('#saletable tbody').empty();
                drawTable(JSON.parse(data));
                $('#totalQty').html(accounting.formatMoney(sumcolumn('totalQty')));
               $('#totalFlatQty').html(accounting.formatMoney(sumcolumn('totalFlatQty')));
               $('#totalCostPrice').html(accounting.formatMoney(sumcolumn('totalCostPrice')));
               $('#totalCostQty').html(accounting.formatMoney(sumcolumn('totalCostQty')));
               $('#totalCostFlatQty').html(accounting.formatMoney(sumcolumn('totalCostFlatQty')));
               $('#totalProfit').html(accounting.formatMoney(sumcolumn('totalProfit')));
            }
        })
    });

    function drawTable(data) {
        for (var i = 0; i < data.length; i++) {
            drawRow(data[i]);
        }
    }
    function drawRow(rowData) {
        var row = $("<tr/>");
        
        $("#saletable").append(row);
        
        row.append($("<td style='width: 120px; text-align: right;'>" + rowData.RepName + "</td>"));
        row.append($("<td style='width: 120px; text-align: right;'>" + rowData.Date + "</td>"));
        row.append($("<td style='width: 120px; text-align: center;' class='totalQty'>" + rowData.Qty  + "</td>"));
        row.append($("<td style='width: 120px; text-align: center;' class='totalFlatQty'>" + rowData.FlatQty  + "</td>"));
        row.append($("<td style='width: 120px; text-align: center;' class='totalCostPrice'>" + rowData.CostPrice  + "</td>"));
         row.append($("<td style='width: 120px; text-align: center;' class='totalCostQty'>" + rowData.CostPrice * rowData.Qty  + "</td>"));
         row.append($("<td style='width: 120px; text-align: center;' class='totalCostFlatQty'>" + rowData.CostPrice * rowData.FlatQty  + "</td>"));
        row.append($("<td style='width: 120px; text-align: center;' class='totalProfit'>" + rowData.ProfitAmount  + "</td>"));
    
    }
    
    function sumcolumn(rclass) {
        var sum = 0;
        var elemnt = document.getElementsByClassName(rclass);
        $(elemnt).each(function () {
            var value = accounting.unformat($(this).text());

            if (!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
        });
        return sum;
    }

    function loadprint() {
        $('.modal-content').load('<?php echo base_url() ?>admin/report/', function (result) {
            $('#salesbydateprint').modal({show: true});
        });
    }
    function printdiv() {
        $("#saletable").print({
            prepend:"<h3 style='text-align:center'>Employee Productivity Report</h3><hr/>",
            title:'Employee Productivity Report'
        });
    }

     $("#saletable").freezeHeader();
</script>