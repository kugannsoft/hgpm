<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="row">
                            <form id="filterform">
                                <div class="input-daterange input-group" id="datepicker">
                                        <input type="hidden" class="form-control" name="startdate" id="startdate" >
                            
                                        <input type="hidden" class="form-control" name="enddate" id="enddate" >
                                    </div>

                                    <div class="col-lg-3">
                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> 
                                        <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>


                             
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-flat btn-success">Show</button>
                                </div>
                                <div class="col-md-1">
                                    <button onclick="printdiv()" class="btn btn-flat btn-default">Print</button>
                                </div>
                            </form>
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
                                    <td>Date</td>
                                    <td>Product</td>
                                    <td>Qty</td>
                                    <td>Cost Price</td>
                                    <td>Selling Price</td>
                                    <td>Profit</td>
                                     <td>Total Qty Profit</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                
                                <tr>
                                 
                                    <td colspan="5" style="color:#f00;font-weight:bold">Total</td>
                                    <td id="totalca" style="color:#f00;font-weight:bold"></td>
                                    <td id="totalqtyca" style="color:#f00;font-weight:bold"></td>
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
            url: "loadprofit",
            data: $(this).serialize(),
            success: function (data) {
                $('#saletable tbody').empty();
                drawTable(JSON.parse(data));
                $('#totalca').html(accounting.formatMoney(sumcolumn('total')));
                $('#totalqtyca').html(accounting.formatMoney(sumcolumn('total_qty_profit')));

            }
        })
    });

    function drawTable(data) {
        const grouped = {};

         data.forEach(row => {
            const invoiceNo = row.JobInvNo;
            if (!grouped[invoiceNo]) {
                grouped[invoiceNo] = [];
            }
            grouped[invoiceNo].push(row);
        });

        $('#saletable tbody').empty();

  
        for (const invoiceNo in grouped) {
            const group = grouped[invoiceNo];

            
            const headerRow = $("<tr class='table-group-header'/>").append(
                `<td colspan="6"><strong>Invoice No: ${invoiceNo}</strong></td>`
            );
            $("#saletable").append(headerRow);

           
            group.forEach(drawRow);
        }
    }
    function drawRow(rowData) {
        var row = $("<tr/>");
        $("#saletable").append(row);
        
        row.append($("<td>" + rowData.JobinvoiceTimestamp + "</td>"));
        row.append($("<td>" + rowData.JobDescription + "</td>"));
        row.append($("<td>" + (accounting.formatMoney(rowData.JobQty) || 0) + "</td>"));
        row.append($("<td>" + (accounting.formatMoney(rowData.JobCost) || 0)+ "</td>"));
        row.append($("<td>" + (accounting.formatMoney(rowData.JobPrice) || 0) + "</td>"));
        row.append($("<td class='total'>" + (accounting.formatMoney(rowData.JobPrice - rowData.JobCost) || 0) + "</td>"));
        row.append($("<td class='total_qty_profit'>" + (accounting.formatMoney((rowData.JobPrice - rowData.JobCost) * (rowData.JobQty)) || 0) + "</td>"));
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
            prepend:"<h3 style='text-align:center'>Profit  Report</h3><hr/>",
            title:'Profit Report'
        });
    }

    $(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        $('#startdate').val(start.format('YYYY-MM-DD'));
        $('#enddate').val(end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>