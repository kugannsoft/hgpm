<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
        <style>
            td, th {
                line-height: 1.5 !important;
                padding: 2px 2px !important;
            }
            @media print {
                td, th {
                    line-height: 1.5 !important;
                    padding: 2px 2px !important;
                }
            }

        </style>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="row">
                            <form id="filterform">
                                <div class="col-md-4">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="hidden" class="form-control" name="startdate" value="<?php echo date("Y-m-d") ?>"/>
                                        <!-- <span class="input-group-addon">to</span> -->
                                        <input type="text" class="form-control" name="enddate"  id="enddate" value="<?php echo date("Y-m-d") ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="route" id="route" multiple="multiple">
                                        <option value="">--select location--</option>
                                        <?php foreach ($locations AS $loc) { ?>
                                            <option value="<?php echo $loc->location_id ?>"><?php echo $loc->location ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="route_ar" id="route_ar">
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
        <div class="row" id="printReport">
            <div class="col-md-12">
                <div>
                    <div class="box-body table-responsive">
                        <b>Start Cash Float</b> : <span id='startfloat' style='font-weight:bold;font-size:20px;'></span>
                        <table id="saletable" class="table table-bordered"style='font-size:12px;'>
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Customer</td>
                                    <td>Invoice No</td>
                                    <td>Vehicle No</td>
                                    <td>Job Card No</td>
                                    <td>Amount</td>
                                    <td>Cash</td>
                                    <td>Card</td>
                                    <td>Cheque</td>
                                    <td>Bank online</td>
                                    <td>Advance</td>
                                    <td>Credit</td>
                                    <td>Adavance Deduction</td>
                                    

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th id="totalpsale" style=" color: #00aaf1;"></th>
                                    <th id="totalpcash" style="color: #00aaf1;"></th>
                                    <th id="totalpcard" style="color: #00aaf1;"></th>
                                    <th id="totalpcheque" style="color: #00aaf1;"></th>
                                    <th id="totalpbank" style="color: #00aaf1;"></th>
                                    <th id="totalpadvance" style="color: #00aaf1;"></th>
                                    <th id="totalpcredit" style="color: #00aaf1;"></th>
                                    <th id="totaljobAdvance" style="color: #00aaf1;"></th>
                                </tr>
                            </tfoot>
                        </table> 
                        <table id="saletablex" class="table table-bordered">
                            <thead style='font-size:12px;'>
                                <!-- <tr>
                                    <td style="width:20px;"></td>
                                    <td style="width:150px;"></td>
                                    <td style="width:50px;"></td>
                                    <td style="width:100px;"></td>
                                    <td style="width:100px;"></td>
                                </tr> -->
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td></td>
                                    <td>No of New Customers </td>
                                    <td></td>
                                    <td id="noofnewcus" class="text-right"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>No of Existing Customers  </td>
                                    <td></td>
                                    <td id="noofrepcus" class="text-right"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>No Of New Jobs</td>
                                    <td></td>
                                    <td id="noofnewjob" class="text-right"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>No of Complete Jobs </td>
                                    <td></td>
                                    <td id="noofcomjob" class="text-right"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>No of Pending Jobs</td>
                                    <td></td>
                                    <td id="noofpendingjob" class="text-right"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>No of Over Due Jobs </td>
                                    <td></td>
                                    <td id="noofoverjob" class="text-right"></td>
                                    <td></td>
                                </tr> -->
                                <tr><td colspan="5">&nbsp;</td></tr>
                                <!-- <tr>
                                    <td></td>
                                    <td>Start Cash Float  </td>
                                    <td></td>
                                    <td id="startfloat" class="text-right"></td>
                                    <td></td>
                                </tr>  -->
                                <tr><td colspan="5">Complete Jobs Payment Summary</td></tr>
                                <tr>
                                    
                                    <td  colspan="2">Cash  *</td>
                                    <td></td>
                                    <td colspan="2" id="totalpsalebel" class="text-right"></td>
                                   
                                </tr> 
                                <tr>
                                    
                                    <td colspan="2">Card </td>
                                    <td></td>
                                    <td colspan="2" id="totalpcardbel" class="text-right"></td>
                                
                                </tr> 
                                <tr>
                                 
                                    <td colspan="2">Advanced </td>
                                    <td></td>
                                    <td colspan="2" id="totalpadvancebel" class="text-right"></td>
                                  
                                </tr> 
                                <tr>
                                 
                                    <td colspan="2">Credit  </td>
                                    <td></td>
                                    <td colspan="2" id="totalpcreditbel" class="text-right"></td>
                                    
                                </tr>
                                <tr>
                                   
                                    <td colspan="2">Cheque  </td>
                                    <td></td>
                                    <td colspan="2" id="totalpchequebel" class="text-right"></td>
                                    
                                </tr>
                                <tr>
                                  
                                    <td colspan="2">Bank  </td>
                                    <td></td>
                                    <td colspan="2" id="totalpbank1" class="text-right"></td>
                                    
                                </tr>
                                <!-- <tr>
                                    <td></td>
                                    <td>Return Jobs *</td>
                                    <td></td>
                                    <td id="returnjob" class="text-right"></td>
                                    <td></td>
                                </tr> -->
                                <!-- <tr>
                                    <td></td>
                                    <td>Customer Payment (Cash) </td>
                                    <td></td>
                                    <td id="customerpay" class="text-right"></td>
                                    <td></td>
                                </tr>  -->
                                <tr><td colspan="5">&nbsp;</td></tr>
                                <tr><td colspan="5">Payment Summary</td></tr>
                                <!-- <tr>
                                    
                                    <td colspan="2">Supplier Payments  </td>
                                    <td></td>
                                    <td colspan="2" id="suppayment" class="text-right"></td>
                                    
                                </tr>  -->
                                <tr><td colspan="5">&nbsp;</td></tr>
                                <!-- <tr>
                                    <td></td>
                                    <td>Employee Advance Payments  </td>
                                    <td></td>
                                    <td id="salaryadvance" class="text-right"></td>
                                    <td></td>
                                </tr> -->
                                <tr>
                                    
                                    <td colspan="2">Cash Out * </td>
                                    <td></td>
                                    <td colspan="2" id="totalcashOut" class="text-right"></td>
                                    
                                </tr> 
                                <tr>
                                    
                                    <td colspan="2">Cash In * </td>
                                    <td></td>
                                    <td colspan="2" id="totalcashIn" class="text-right"></td>
                                    
                                </tr>
                                <tr>
                                    
                                    <td colspan="2">Expenses  *</td>
                                    <td></td>
                                    <td colspan="2" id="expOut" class="text-right"></td>
                                  
                                </tr> 
                                <tr>
                                    
                                    <td colspan="2">Earning * </td>
                                    <td></td>
                                    <td colspan="2" id="expIn" class="text-right"></td>
                                    
                                </tr> 
                                <tr><td colspan="5">&nbsp;</td></tr> 
                                <tr><td colspan="5">
                                        <table id="saletable2" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                <td colspan="3"></td>
                                              
                                                <td> In</td>
                                                <td> Out</td>
                                                <td colspan="2"></td>
                                              
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                   
                                    <td colspan="2">Day End Cash Float </td>
                                    <td></td>
                                    <td colspan="2" id="endFlaot" class="text-right"></td>
                                    
                                </tr>
                                <tr>
                                  
                                    <td colspan="2">Cash Balance </td>
                                    <td></td>
                                    <td colspan="2" id="balance" class="text-right"></td>
                                  
                                </tr> 
                                <tr>
                                    
                                    <td colspan="2">Diffrence </td>
                                    <td></td>
                                    <td colspan="2" id="dif" class="text-right"></td>
                                  
                                </tr>  
                                <tr><td colspan="5">&nbsp;</td></tr>
                                <tr>
                                  
                                    <td colspan="2">Operated Cashier</td>
                                    <td></td>
                                    <td colspan="2" id="cashier" class="text-right"></td>
                                    
                                </tr> 
                                
                            </tbody>
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
            url: "loaddailybalancedetail",
            data: $(this).serialize(),
            success: function (data) {
                $('#saletable tbody,#saletable2 tbody').empty();
                drawTable(JSON.parse(data));
                $('#totalca').html(accounting.formatMoney(sumcolumn('cashamount')));
                $('#totalcra').html(accounting.formatMoney(sumcolumn('creditamount')));
                $('#totalcrda').html(accounting.formatMoney(sumcolumn('ccardamount')));
                $('#totalcha').html(accounting.formatMoney(sumcolumn('chequeamount')));
                $('#totalcoa').html(accounting.formatMoney(sumcolumn('costamount')));
                $('#totalpadvance').html(accounting.formatMoney(sumcolumn('advance')));
                $('#totalpcredit').html(accounting.formatMoney(sumcolumn('credit')));
                $('#totalpcheque').html(accounting.formatMoney(sumcolumn('cheque')));
                $('#totalpbank').html(accounting.formatMoney(sumcolumn('bank')));
                $('#totalpbank1').html(accounting.formatMoney(sumcolumn('bank')));
                $('#totalpcard').html(accounting.formatMoney(sumcolumn('card')));
                $('#totalpcash').html(accounting.formatMoney(sumcolumn('cash')));
                $('#totalpsale').html(accounting.formatMoney(sumcolumn('net')));
                $('#totalpsalebel').html(accounting.formatMoney(sumcolumn('cash')));
                $('#totalpcardbel').html(accounting.formatMoney(sumcolumn('card')));
                $('#totalpadvancebel').html(accounting.formatMoney(sumcolumn('advance')));
                $('#totalpcreditbel').html(accounting.formatMoney(sumcolumn('credit')));
                $('#totalpchequebel').html(accounting.formatMoney(sumcolumn('cheque')));
                $('#totaljobAdvance').html(accounting.formatMoney(sumcolumn('jobadvance')));
            }
        })
    });
    var startBalance = 0;
    var totalCashIn=0;
    var totalCashOut=0;
    var totalExpIn=0;
    var totalExpOut=0;
    var totalSale = 0;
    var totalSale = 0;
    var cashinhand=0;
    var totalCash=0;
    var posCash = 0;
    var prevjobSale=0;
    var prevposSale = 0;
    var totalNetSale=0;
    var totalsalaryAdvance=0;
    var totalSupPay=0;
    var posCard=0; var jobCard=0;
    var jobadvance=0;
    var cuspayment= 0;
    var jobadvancecard=0;
    var cuspaymentcard= 0;
    var endBalance=0;
    var endFloat=0;
    var cashSale=0;
    function drawTable(data) {
        console.log('data',data);
        startBalance = 0;
        endBalance=0;
        totalCashIn=0;
        totalCashOut=0;
        totalSale = 0;
        cashinhand=0;
        totalCash=0;
        posCash = 0;
        posCredit = 0;
        jobCredit = 0;
        cuspayment=0;
        prevjobSale=0;
        prevposSale = 0;
        totalNetSale=0;
        totalsalaryAdvance=0;
        endFloat=0;
        cashSale=0;
         totalSupPay=0;
        $("#noofnewcus").empty().html(accounting.formatMoney(data.newcus));
        $("#noofnewjob").empty().html(accounting.formatMoney(data.newjobs));
        $("#noofrepcus").empty().html(accounting.formatMoney(data.repcus));
        $("#noofcomjob").empty().html(accounting.formatMoney(data.completejobs));
        $("#noofpendingjob").empty().html(accounting.formatMoney(data.pendingjob));
        $("#noofoverjob").empty().html(accounting.formatMoney(data.overjob));
        startBalance=parseFloat(data.startbal);
        $("#startfloat").html(accounting.formatMoney(startBalance));
        $("#startBal").html(accounting.formatMoney(startBalance));
        $("#cashier").html(data.cashier);
        for (var i = 0; i < data.pro.length; i++) {
            drawRow(data.pro[i]);
        }

        for (var i = 0; i < data.product.length; i++) {
            drawProductRow(data.product[i]);
        }

        for (var i = 0; i < data.part.length; i++) {
            drawPartRow(data.part[i]);
        }

        for (var i = 0; i < data.cuspay.length; i++) {
            drawCusPayRow(data.cuspay[i]);
        }

        for (var i = 0; i < data.advance.length; i++) {
            drawJobAdvanceRow(data.advance[i]);
        }

        

        for (var i = 0; i < data.procash.length; i++) {
            posCash+=parseFloat(data.procash[i].CashAmount);
            posCredit+=parseFloat(data.cash[i].CreditAmount);
            posCard +=parseFloat(data.cash[i].CardAmount);
        }

        for (var i = 0; i < data.bal.length; i++) {
            cuspayment=parseFloat(data.bal[i].CUSTOMER_PAYMENT);
            cashSale=parseFloat(data.bal[i].CASH_SALES);
            $("#expIn").html(accounting.formatMoney(data.bal[i].EX_IN));
            $("#expOut").html(accounting.formatMoney(data.bal[i].EX_OUT));
            $("#salaryadvance").html(accounting.formatMoney(data.bal[i].SALARY));
            $("#startBal").html(accounting.formatMoney(data.bal[i].START_FLOT));
            $("#cashjob").html(accounting.formatMoney((cashSale+cuspayment)));
            $("#cardjob").html(accounting.formatMoney(data.bal[i].CARD_SALES));
            $("#creditjob").html(accounting.formatMoney(data.bal[i].CREDIT_SALES));
            $("#advancejob").html(accounting.formatMoney(data.bal[i].ADVANCE_PAYMENT));
            $("#chequejob").html(accounting.formatMoney(data.bal[i].CHEQUE_SALES));
            $("#bankjob").html(accounting.formatMoney(data.bal[i].BANK_SALES));
            $("#returnjob").html(accounting.formatMoney(data.bal[i].RETURN_AMOUNT));
            $("#totalcashOut").html(accounting.formatMoney(data.bal[i].CASH_OUT));
            $("#totalcashIn").html(accounting.formatMoney(data.bal[i].CASH_IN));
            $("#suppayment").html(accounting.formatMoney(data.bal[i].SUPPLIER_PAYMENT));  
            $("#endFlaot").html(accounting.formatMoney(data.lastbal));  
            $("#startfloat").html(accounting.formatMoney(data.startbal));

            
            endBalance=parseFloat(data.bal[i].BALANCE_AMOUNT)+parseFloat(data.startbal);
            $("#balance").html(accounting.formatMoney(endBalance));
            endFloat=parseFloat(data.lastbal);
            $("#dif").html(accounting.formatMoney(endBalance-endFloat));
           
            totalCash+=parseFloat(data.bal[i].CASH_SALES);
            jobCredit+=parseFloat(data.bal[i].CREDIT_SALES);
            posCard +=parseFloat(data.bal[i].CARD_SALES);
        }

        for (var i = 0; i < data.prevcash.length; i++) {
            prevjobSale+=parseFloat(data.prevcash[i].NetAmount);
        }

        for (var i = 0; i < data.prevprocash.length; i++) {
            prevposSale+=parseFloat(data.prevprocash[i].NetAmount);
        }

        for (var i = 0; i < data.inout.length; i++) {
            drawRowOut(data.inout[i]);
        }

        for (var i = 0; i < data.cash.length; i++) {
           totalCash+=parseFloat(data.cash[i].JobInvPayAmount);
           jobCredit+=parseFloat(data.cash[i].JobCreditAmount);
           jobCard +=parseFloat(data.cash[i].JobCardAmount);
        }

        for (var i = 0; i < data.salary.length; i++) {
           totalsalaryAdvance+=parseFloat(data.salary[i].CashAmount);
        }

        for (var i = 0; i < data.suppay.length; i++) {
           totalSupPay+=parseFloat(data.suppay[i].CashPay);
        }

        for (var i = 0; i < data.advance.length; i++) {
           jobadvance+=parseFloat(data.advance[i].CashPay);
           jobadvancecard+=parseFloat(data.advance[i].CardPay);
        }

        for (var i = 0; i < data.cuspay.length; i++) {
           cuspayment+=parseFloat(data.cuspay[i].CashPay);
           cuspaymentcard+=parseFloat(data.cuspay[i].CardPay);
        }

        for (var i = 0; i < data.expearn.length; i++) {

             if(data.expearn[i].IsExpenses==1){
                totalExpOut+=parseFloat(data.expearn[i].FlotAmount);
             }else if(data.expearn[i].IsExpenses==0){
                totalExpIn+=parseFloat(data.expearn[i].FlotAmount);
             }   
        }
        
        endBalance=0;

        cashinhand =startBalance+totalCash+posCash-totalCashOut+totalCashIn;
        totalNetSale = totalSale + prevjobSale+prevposSale;
        
        
       

    }

    function drawRow(rowData) {
        var row = $("<tr/>");
        $("#saletable").append(row);
        totalSale+=parseFloat(rowData.JobNetAmount);
        
        row.append($("<td>" + rowData.JobInvDate + "</td>"));
        row.append($("<td>" + rowData.DisplayName + "</td>"));
        row.append($("<td>" + rowData.JobInvNo + "</td>"));
        row.append($("<td>" + rowData.JRegNo + "</td>"));
        row.append($("<td  align='left'>" + rowData.JobCardNo + "</td>"));
        row.append($("<td class='net'>" + accounting.formatMoney(rowData.JobNetAmount) + "</td>"));
        row.append($("<td class='cash'>" + accounting.formatMoney(rowData.JobCashAmount) + "</td>"));
        row.append($("<td class='card'>" + accounting.formatMoney(rowData.JobCardAmount) + "</td>"));
        row.append($("<td class='cheque'>" + accounting.formatMoney(rowData.JobChequeAmount) + "</td>"));
        row.append($("<td class='bank'>" + accounting.formatMoney(rowData.JobBankAmount) + "</td>"));
        row.append($("<td class='advance'>" + accounting.formatMoney(0) + "</td>"));
        row.append($("<td class='credit'>" + accounting.formatMoney(rowData.JobCreditAmount) + "</td>"));
        row.append($("<td class='jobadvance'>" + accounting.formatMoney(rowData.JobAdvance) + "</td>"));
    }

    function drawJobAdvanceRow(rowData) {
        var row = $("<tr/>");
        $("#saletable").append(row);
        totalSale+=parseFloat(rowData.NetAmount);
        
        row.append($("<td>" + rowData.PayDate + "</td>"));
        row.append($("<td>" + rowData.CusName + "</td>"));
        row.append($("<td>" + rowData.CusPayNo + "</td>"));
        row.append($("<td>" + rowData.CusCode + "</td>"));
        row.append($("<td  align='left'>" + rowData.CusName + " - Job Advance </td>"));
        row.append($("<td class='net'>" + accounting.formatMoney(rowData.TotalPayment) + "</td>"));
        row.append($("<td class='cash'>" + accounting.formatMoney(rowData.CashPay) + "</td>"));
        row.append($("<td class='card'>" + accounting.formatMoney(rowData.CardPay) + "</td>"));
        row.append($("<td class='cheque'>" + accounting.formatMoney(rowData.ChequePay) + "</td>"));
        row.append($("<td class='bank'>" + accounting.formatMoney(rowData.BankPay) + "</td>"));
        row.append($("<td class='advance'>" + accounting.formatMoney(rowData.TotalPayment) + "</td>"));
        row.append($("<td class='credit'>" + accounting.formatMoney(0) + "</td>"));
        row.append($("<td class='jobadvance'>" + accounting.formatMoney(0) + "</td>"));
    }

    function drawCusPayRow(rowData) {
        var row = $("<tr/>");
        $("#saletable").append(row);
        totalSale+=parseFloat(rowData.NetAmount);
        
        row.append($("<td>" + rowData.PayDate + "</td>"));
        row.append($("<td>" + rowData.CusName + "</td>"));
        row.append($("<td>" + rowData.CusPayNo + "</td>"));
        row.append($("<td>" + rowData.CusCode + "</td>"));
        row.append($("<td  align='left'>" + rowData.CusName + " - Customer Payment</td>"));
        row.append($("<td class='net'>" + accounting.formatMoney(rowData.TotalPayment) + "</td>"));
        row.append($("<td class='cash'>" + accounting.formatMoney(rowData.CashPay) + "</td>"));
        row.append($("<td class='card'>" + accounting.formatMoney(rowData.CardPay) + "</td>"));
        row.append($("<td class='cheque'>" + accounting.formatMoney(rowData.ChequePay) + "</td>"));
        row.append($("<td class='bank'>" + accounting.formatMoney(rowData.BankPay) + "</td>"));
        row.append($("<td class='advance'>" + accounting.formatMoney(0) + "</td>"));
        row.append($("<td class='credit'>" + accounting.formatMoney(0) + "</td>"));
        row.append($("<td></td>"));
        
    }

    function drawProductRow(rowData) {
        var row = $("<tr/>");
        $("#saletable").append(row);
        totalSale+=parseFloat(rowData.NetAmount);
        
        row.append($("<td>" + rowData.InvDate + "</td>"));
        row.append($("<td>" + rowData.InvNo + "</td>"));
        row.append($("<td>" + rowData.InvProductCode + "</td>"));
        row.append($("<td align='left'>" + rowData.AppearName + "</td>"));
       row.append($("<td class='net'>" + accounting.formatMoney(rowData.NetAmount) + "</td>"));
        row.append($("<td class='cash'>" + accounting.formatMoney(rowData.InvCashAmount) + "</td>"));
        row.append($("<td class='card'>" + accounting.formatMoney(rowData.InvCCardAmount) + "</td>"));
        row.append($("<td class='cheque'>" + accounting.formatMoney(rowData.InvChequeAmount) + "</td>"));
        row.append($("<td class='bank'>" + accounting.formatMoney(rowData.BankPay) + "</td>"));
        row.append($("<td class='advance'>" + accounting.formatMoney(0) + "</td>"));
        row.append($("<td class='credit'>" + accounting.formatMoney(rowData.InvCreditAmount) + "</td>"));
        row.append($("<td></td>"));
        
    }

    function drawPartRow(rowData) {
        var row = $("<tr/>");
        $("#saletable").append(row);
        totalSale+=parseFloat(rowData.SalesNetAmount);
        
        row.append($("<td>" + rowData.InvDate + "</td>"));
         row.append($("<td>" + rowData.CusName + "</td>"));
        row.append($("<td>" + rowData.SalesInvNo + "</td>"));
        row.append($("<td>" + rowData.SalesVehicle + "</td>"));
        row.append($("<td align='left'>" + rowData.AppearName + "</td>"));
       row.append($("<td class='net'>" + accounting.formatMoney(rowData.NetAmount) + "</td>"));
        row.append($("<td class='cash'>" + accounting.formatMoney(rowData.SalesCashAmount) + "</td>"));
        row.append($("<td class='card'>" + accounting.formatMoney(rowData.SalesCCardAmount) + "</td>"));
        row.append($("<td class='cheque'>" + accounting.formatMoney(rowData.SalesChequeAmount) + "</td>"));
      
        row.append($("<td class='bank'>" + accounting.formatMoney(rowData.SalesBankAmount) + "</td>"));
        row.append($("<td class='advance'>" + accounting.formatMoney(0) + "</td>"));
        row.append($("<td class='credit'>" + accounting.formatMoney(rowData.SalesCreditAmount) + "</td>"));
        row.append($("<td></td>"));
        
    }

    function drawRowOut(rowData) {
        var row = $("<tr/>");
        $("#saletable2").append(row);

        if(rowData.Mode=='Out'){
            
            totalCashOut+=parseFloat(rowData.CashAmount);
           
            row.append($("<td colspan='3' align='left'>" + rowData.TransactionName + " - " + rowData.Remark + "</td>"));
            row.append($("<td class='nbtamount2'>" + accounting.formatMoney(0) + "</td>"));
            row.append($("<td class='profit2'>" + accounting.formatMoney(rowData.CashAmount) + "</td>"));
            row.append($("<td align='right'></td>"));
        }else if(rowData.Mode=='In'){
            totalCashIn+=parseFloat(rowData.CashAmount);
            
            row.append($("<td colspan='3' align='left'>" + rowData.TransactionName + " - "  + rowData.Remark+ "</td>"));
            row.append($("<td class='nbtamount2'>" + accounting.formatMoney(rowData.CashAmount) + "</td>"));
            row.append($("<td class='profit2'>" + accounting.formatMoney(0) + "</td>"));
            row.append($("<td align='right'></td>"));
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
        var datebalance = $("#enddate").val();
        $("#printReport").print({
            prepend:"<h3 style='text-align:center'>Daily Cash Balance Report "+datebalance+"</h3><hr/>",
            title:'Daily Cash Balance Report '+datebalance
        });
    }
     $("#saletable").freezeHeader();
</script>