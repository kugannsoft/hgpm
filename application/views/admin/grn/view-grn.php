<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <section class="content">
        <div class="box collapse cart-options" id="collapseExample">
            <div class="box-header">Filter Categories</div>
            <div class="box-body categories_dom_wrapper">
            </div>
            <div class="box-footer">
                <button class="btn btn-primary close-item-options pull-right">Hide options</button>
            </div>
        </div>   
        <div class="row" id="printArea">
            <div class="col-lg-12">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table">
                                  
                                    <tr><td>GRN No</td><td class="text-right" id=""><?php echo $grn_hed->GRN_No;?></td></tr>
                                    <tr><td>Date</td><td class="text-right"  id=""><?php echo $grn_hed->GRN_Date;?></td></tr>
                                    <tr><td>Supplier</td><td class="text-right"  id=""><?php echo $grn_hed->SupName;?></td></tr>
                                    <tr><td>Invoice No</td><td class="text-right"  id=""> <?php echo strtoupper($grn_hed->GRN_InvoiceNo); ?></td></tr>
                                   
                                   
                                    <tr><td>Payment No</td><td class="text-right"  id=""></td></tr>
                                </table>
                                
                            </div>
                            <div class="col-md-3">
                                <table class="table">
                                   
                                    <tr><td>Total GRN Amount</td><td class="text-right" id=""><?php echo number_format($grn_hed->GRN_Amount,2);?></td></tr>
                                    <tr><td>GRN Discount Amount</td><td class="text-right"  id="totalDis"><?php echo number_format($grn_hed->GRN_DisAmount,2);?></td></tr>
                               
                                <tr><td>Additional Charges</td><td class="text-right"  id=""><?php echo number_format($grn_hed->GRN_AdditionalCharges,2);?></td></tr>
                                 <tr><td>Net GRN Amount</td><td class="text-right"  id=""><?php echo number_format($grn_hed->GRN_Amount+$grn_hed->GRN_AdditionalCharges -$grn_hed->GRN_DisAmount,2);?></td></tr>
                                <tr><td>GRN VAT Amount</td><td class="text-right"  id=""><?php echo number_format($grn_hed->GRN_VatNetAmount,2);?></td></tr>
                                <tr><td>Total GRN with VAT Amount</td><td class="text-right"  id=""><?php echo number_format($grn_hed->GRN_NetAmount+$grn_hed->GRN_AdditionalCharges,2);?></td></tr>

                                </table>
                            </div>
                             <div class="col-md-4">
                                <table class="table">
                                   <tr><td>Data Entry by</td><td class="text-right"  id=""> <?php echo strtoupper($grn_hed->first_name); ?></td></tr>
                                    <tr><td>Checked by</td><td class="text-right"  id=""></td></tr>
                                    <tr><td>Authorized by</td><td class="text-right"  id=""></td></tr>
                                  <tr><td>Remarks</td><td class="text-right"  id=""><?php echo $grn_hed->GRN_Remark;?></td></tr>
                                </table>
                                
                            </div>
                            <div class="col-sm-1">
                                <button type="button" id="btnPrint" class="btn btn-primary btn-block">Print</button>
                            </div>
                        </div>

                      



                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <table id="tbl_payment" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-right">Product Code</th>
                                        <th class="text-right">Product Name</th>
                                        <th class="text-right">Serial No</th>
                                        <th class="text-right">Total Quantity</th>
                                        <th class="text-right">Free Qty</th>
                                        <th class="text-right">Cost Price</th>
                                        <th class="text-right">Selling Price</th>
                                        <th class="text-right">Discount</th>
                                        <th  class="text-right">Total Net Amount</th>
                                        <th  class="text-right">VAT Amount</th>
                                        <th  class="text-right">NET + VAT Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i = 1;
                                $totalNetAmount = 0; // Initialize total for Net Amount
                                $totalProVat = 0; // Initialize total for VAT
                                ?>

                                <tbody>
                                <?php foreach ($grn as $grndata) { 
                                    $totalNetAmount += $grndata->GRN_NetAmount; // Sum Net Amount
                                    $totalProVat += $grndata->GRN_Pro_Vat; // Sum VAT
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td class="text-right"><?php echo $grndata->GRN_Product ?></td>
                                    <td class="text-right"><?php echo $grndata->Prd_Description ?></td>
                                    <td class="text-right"><?php echo $grndata->SerialNo ?></td>
                                    <td class="text-right"><?php echo number_format($grndata->GRN_Qty, 4) ?></td>
                                    <td class="text-right"><?php echo number_format($grndata->GRN_FreeQty, 4) ?></td>
                                    <td class="text-right"><?php echo number_format($grndata->GRN_UnitCost, 2) ?></td>
                                    <td class="text-right"><?php echo number_format($grndata->GRN_Selling, 2) ?></td>
                                    <td class="text-right"><?php echo number_format($grndata->GRN_DisAmount, 2) ?></td>
                                    <td class="text-right"><?php echo number_format($grndata->GRN_NetAmount, 2) ?></td> <!-- Net Amount -->
                                    <td class="text-right"><?php echo number_format($grndata->GRN_Pro_Vat, 2) ?></td> <!-- VAT -->
                                    <td class="text-right"><?php echo number_format($grndata->GRN_Pro_Vat + $grndata->GRN_NetAmount, 2) ?></td> <!-- Net + VAT -->
                                </tr>
                                <?php $i++; } ?>
                                </tbody>

                                <!-- Footer Totals -->
                                <thead>
                                <tr>
                                    <th colspan="9" class="text-right">Total</th>
                                    <th class="text-right"><?php echo number_format($totalNetAmount, 2); ?></th> <!-- Total Net Amount -->
                                    <th class="text-right"><?php echo number_format($totalProVat, 2); ?></th> <!-- Total VAT -->
                                    <th class="text-right"><?php echo number_format($totalNetAmount + $totalProVat, 2); ?></th> <!-- Total Net + VAT -->
                                </tr>
                                </thead>

                            </table>
                        </div>
                        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
    <div id="customermodal" class="modal fade bs-add-category-modal-lg" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="cusModal">
                <!-- load data -->
            </div>
        </div>
    </div>

    

</div>
<style>
    .shop-items:hover{
        background-color: #00ca6d;
        color: #fff;
    }

    @media print {
    #btnPrint {
        display: none;
    }
}
</style>
<script type="text/javascript">
  $("#btnPrint").click(function(){
    window.print();
});

</script>