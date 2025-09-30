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
                                <div class="col-md-3">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="form-control" name="startdate" value="<?php echo date("Y-m-d") ?>"/>
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="form-control" name="enddate" value="<?php echo date("Y-m-d") ?>"/>
                                    </div>
                                </div>

                                <!-- <div class="col-md-2">
                                    <select class="form-control" name="tCode" id="tCode" multiple="multiple">
                                        <option value="">--select Transaction Name--</option>
                                        <?php foreach ($transactionTypes AS $loc) { ?>
                                            <option value="<?php echo $loc->TransactionCode ?>"><?php echo $loc->TransactionName ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="tCode_ar" id="tCode_ar">
                                </div>

                                <div class="col-md-2">
                                    <select class="form-control" name="route" id="route" multiple="multiple">
                                        <option value="">--select location--</option>
                                        <?php foreach ($locations AS $loc) { ?>
                                            <option value="<?php echo $loc->location_id ?>"><?php echo $loc->location ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="route_ar" id="route_ar">
                                </div> -->
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
                                <tr style="text-align: center;">
                                    <td style="width: 25%;"></td>
                                    <td style="width: 25%"></td>
                                    <td style="width: 25%;">Expense Amount</td>
                                    <td style="width: 25%">Earning Amount</td>
                                  
                                </tr>

                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th id="totalcha" style="text-align: right;color: #00aaf1;"></th>
                                    <th id="totalcoa" style="text-align: right;color: #00aaf1;"></th>
                                    
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

    $("#tCode").select2({
        placeholder: "Select a Transaction a Name"
    });

    var trCode =[];

    $("#tCode").change(function(){
        trCode.length=0;

        $("#tCode :selected").each(function(){
            trCode.push($(this).val());
        });
        $("#tCode_ar").val(JSON.stringify(trCode));
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
            url: "loadreport9",
            data: $(this).serialize(),
            success: function (data) {
                $('#saletable tbody').empty();
               const parsed = JSON.parse(data);
               drawTable(parsed);
                
                $('#totalcha').html(accounting.formatMoney(sumcolumn('totalcha')));
                $('#totalcoa').html(accounting.formatMoney(sumcolumn('totalcoa')));
            }
        });
    });

    function drawTable(data) {
    console.log('data', data);

    if (Array.isArray(data)) {
        const grouped = {};
        data.forEach(function (row) {
            const key = row.TransactionName || 'Unknown';
            if (!grouped[key]) grouped[key] = [];
            grouped[key].push(row);
        });
        data = grouped;
    }

    var earntot = 0;
    var exptot = 0;

    $.each(data, function (key, value) {
        $("#saletable").append("<tr style='background-color:#00a678;color:#fff;'><td colspan='7'><b>" + key + "</b></td></tr>");

        for (var i = 0; i < value.length; i++) {
            drawRow(value, i);

           
             var IsExpenses = (value[i].IsExpenses );
            var amt = parseFloat(value[i].Amount || value[i].CashAmount || 0);

            if (IsExpenses == 1) {
                exptot += amt;
            } else{
                earntot += amt;
            }

            if (i == (value.length - 1)) {
                $("#saletable").append(
                    "<tr style='background-color:#A9A9A9;color:#fff;'>" +
                        "<td align='right' colspan='2' >Total</td>" +
                        "<td class='totalcha' align='right'><b>" + accounting.formatMoney(exptot) + "</b></td>" +
                        "<td class='totalcoa' align='right'><b>" + accounting.formatMoney(earntot) + "</b></td>" +
                        "<td><b></b></td>" +
                    "</tr>"
                );
                $("#saletable").append("<tr><td colspan='7'>&nbsp;</td></tr>");
                earntot = 0;
                exptot = 0;
            }
        }
    });
}
    function drawRow(rowData, index) {
    var row = $("<tr/>");
    $("#saletable").append(row);

    var earn = 0;
    var exp = 0;

    var IsExpenses = (rowData[index].IsExpenses ||rowData[index].IsExpenses  );
    var amt = parseFloat(rowData[index].Amount || rowData[index].CashAmount || 0);

    if (IsExpenses == 1) {
        earn = 0;
        exp = amt;
    } else {
        exp = 0;
        earn = amt;
    }

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
            prepend:"<h3 style='text-align:center'>Expenses/ Earninig Summarry Report</h3><hr/>",
            title:'Expenses/ Earninig Summarry'
        });
    }
     $("#saletable").freezeHeader();
</script>