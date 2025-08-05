<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
@media print {
    thead {
        display: table-header-group;
    }

    tfoot {
        display: table-footer-group;
    }

    tr {
        page-break-inside: avoid;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
}
</style>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-2">
                                <?php $checkRole = $_SESSION['role'];
                                if ($checkRole != 6){ ?>
                                <a href="../job/estimate_job?type=est&id=<?php echo base64_encode($estHed->EstimateNo);?>&sup=<?php echo ($estHed->Supplimentry);?>"
                                    class="btn btn-block btn-info">Edit</a>
                                <?php }  ?>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" id="btnPrint" class="btn btn-primary btn-block">Print</button>
                            </div>

                            <div class="col-sm-2">
                                <?php if ($checkRole != 6){ ?>
                                <a href="../Salesinvoice/job_invoice?type=est&id=<?php echo base64_encode($estHed->EstimateNo);?>&sup=<?php echo ($estHed->Supplimentry);?>"
                                    class="btn btn-block btn-primary">Invoice</a>
                                <?php }  ?>
                            </div>
                        </div>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="row row-eq-height">
                                    <div class="row" id="printArea" align="center" style='margin:5px;'>

                                        <!-- load comapny common header -->
                                        <?php $this->load->view('admin/_templates/company_header.php',true); ?>

                                        <table
                                            style="border-collapse:collapse;width:700px;padding:5px;font-size:13px;font-family: Arial, Helvetica, sans-serif;"
                                            border="0">
                                            <?php if($estHed->EstJobType==1){?>
                                            <thead style="display: table-header-group;">

                                                <tr style="text-align:left;font-size:13px;">


                                                    <td
                                                        style="font-size:13px;font-weight: bold;text-align:left; width:10%">
                                                    </td>
                                                    <td colspan="5"
                                                        style="font-size:18px;font-weight: bold;text-align:center;">
                                                        ESTIMATE</td>
                                                </tr>
                                                <tr style="text-align:left;font-size:13px;">
                                                    <td colspan="2" rowspan="5"
                                                        style="border:1px solid #000; font-size:13px; width:100px; padding:5px; vertical-align: top;">

                                                        Customer Code&nbsp;: <?php echo $invCus->CusCode; ?>&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <br>

                                                        <a
                                                            href="<?php echo base_url('admin/payment/view_customer/') . $invCus->CusCode; ?>">
                                                            Customer Name: <?php echo $invCus->DisplayName; ?>
                                                        </a>
                                                        <br>

                                                        Customer
                                                        Address:<?php echo $invCus->Address01; ?>,<?php echo $invCus->Address02; ?>,<?php echo $invCus->Address03; ?><br>


                                                        <span id="lbladdress2">
                                                            Telphone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                            <?php echo $invCus->LanLineNo; ?>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Mobile&nbsp;&nbsp;&nbsp;&nbsp;:
                                                            <?php echo $invCus->MobileNo; ?>
                                                        </span>
                                                        <br>

                                                        <span>Customer VAT No:<?php echo $invCus->VatNumber; ?></span>
                                                    </td>

                                                    <td>&nbsp;&nbsp;</td>
                                                    <td style="font-size:12px;text-align: left;border-left: 1px solid #000;border-top: 1px solid #000;width:200px;"
                                                        colspan="5">
                                                        &nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo (new DateTime($estHed->EstDate))->format('d-m-Y H:i:s'); ?>
                                                    </td>

                                                    <td style="font-size:12px;text-align: left;border-top: 1px solid #000;border-right: 1px solid #000;"
                                                        colspan="1"></td>
                                                </tr>
                                                <tr style="text-align:left;font-size:12px;border:1px solid #000; ">
                                                    <td
                                                        style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">
                                                        &nbsp;&nbsp;</td>
                                                    <td style="text-align:left;border-left:1px solid #000;border-top:1px solid #fff;"
                                                        colspan="4">
                                                        &nbsp;&nbsp;Reg.No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $estHed->EstRegNo;?>
                                                    </td>


                                                </tr>
                                                <tr style="text-align:left;font-size:12px;border:1px solid #000;">
                                                    <td
                                                        style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">
                                                        &nbsp;&nbsp;</td>
                                                    <td style="text-align:left;;border-top:1px solid #fff;" colspan="3">
                                                        &nbsp;&nbsp;Estimate NO:<?php echo $estHed->EstimateNo ?></td>

                                                    <td colspan="2"
                                                        style="text-align:left;;border-top:1px solid #fff;font-size:10px;">
                                                        &nbsp;&nbsp;Odo
                                                        Meter&nbsp;:<?php  if(isset($invVehi)){ echo $invVehi->Milage;}?>
                                                    </td>
                                                </tr>
                                                <tr style="text-align:left;font-size:12px;border:1px solid #000;">
                                                    <td
                                                        style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">
                                                        &nbsp;&nbsp;</td>
                                                    <td style="text-align:left;;border-top:1px solid #fff;" colspan="3">
                                                        &nbsp;&nbsp;Make&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php if(isset($invVehi)){ echo $invVehi->make;} ?>&nbsp;&nbsp;
                                                    </td>
                                                    <td colspan="4"
                                                        style="text-align:left;;border-top:1px solid #fff;font-size:10px;">
                                                        &nbsp;&nbsp;Model&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php  if(isset($invVehi)){ echo $invVehi->model;}?>
                                                    </td>

                                                </tr>

                                                <tr style="text-align:left;font-size:12px;border:1px solid #000;">
                                                    <td
                                                        style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">
                                                        &nbsp;&nbsp;</td>
                                                    <td style="text-align:left;;border-top:1px solid #fff;" colspan="4">
                                                        &nbsp;&nbsp;Chassis
                                                        No&nbsp;&nbsp;:<?php if($estHed->Supplimentry>0){ echo $estHed->Supplimentry;}?><?php if(isset($invVehi)){ echo $invVehi->ChassisNo;}?>
                                                    </td>


                                                </tr>



                                                <tr>
                                                    <td colspan="7" style="height: 15px; border: none;"></td>
                                                </tr>



                                                <tr
                                                    style="line-height: 20px;background-color:#fff !important;border:1px solid;font-size:10px;">
                                                    <th
                                                        style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center; width:5%;">
                                                        No</th>
                                                    <th
                                                        style="font-weight:bold;;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;;width:45%; ">
                                                        Description</th>
                                                    <th
                                                        style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;;width:5%; ">
                                                    </th>
                                                    <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;width:5%;"
                                                        class='text-right'>Qty</th>
                                                    <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;width: 10%; "
                                                        class='text-right'>Unit price</th>
                                                    <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;width:10%;"
                                                        class='text-right'>Quoted Amount</th>

                                                    <th
                                                        style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;text-align:center;">
                                                        Amended Amount</th>

                                                </tr>

                                            </thead>
                                            <?php }elseif($estHed->EstJobType==2){ ?>
                                            <thead style="display: table-header-group;">


                                                <tr style="text-align:left;font-size:13px;">


                                                    <td
                                                        style="font-size:13px;font-weight: bold;text-align:left; width:10%">
                                                    </td>
                                                    <td colspan="5"
                                                        style="font-size:18px;font-weight: bold;text-align:center;">
                                                        ESTIMATE</td>
                                                </tr>
                                                <tr style="text-align:left;font-size:13px;">
                                                    <td colspan="2" rowspan="5"
                                                        style="border:1px solid #000; font-size:13px; width:100px; padding:5px; vertical-align: top;">

                                                        Customer Code&nbsp;: <?php echo $invCus->CusCode; ?>&nbsp;&nbsp;
                                                        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                                                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <br>

                                                        <a
                                                            href="<?php echo base_url('admin/payment/view_customer/') . $invCus->CusCode; ?>">
                                                            Customer Name: <?php echo $invCus->DisplayName; ?>
                                                        </a>
                                                        <br>

                                                        Customer
                                                        Address:<?php echo $invCus->Address01; ?>,<?php echo $invCus->Address02; ?>,<?php echo $invCus->Address03; ?><br>


                                                        <span id="lbladdress2">
                                                            Telphone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                            <?php echo $invCus->LanLineNo; ?>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            Mobile&nbsp;&nbsp;&nbsp;&nbsp;:
                                                            <?php echo $invCus->MobileNo; ?>
                                                        </span>
                                                        <br>

                                                        <span>Customer VAT No:<?php echo $invCus->VatNumber; ?></span>
                                                    </td>

                                                    <td>&nbsp;&nbsp;</td>
                                                    <td style="font-size:12px;text-align: left;border-left: 1px solid #000;border-top: 1px solid #000;width:200px;"
                                                        colspan="5">
                                                        &nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo (new DateTime($estHed->EstDate))->format('d-m-Y H:i:s'); ?>
                                                    </td>

                                                    <td style="font-size:12px;text-align: left;border-top: 1px solid #000;border-right: 1px solid #000;"
                                                        colspan="1"></td>
                                                </tr>
                                                <tr style="text-align:left;font-size:12px;border:1px solid #000; ">
                                                    <td
                                                        style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">
                                                        &nbsp;&nbsp;</td>
                                                    <td style="text-align:left;border-left:1px solid #000;border-top:1px solid #fff;"
                                                        colspan="4">
                                                        &nbsp;&nbsp;Reg.No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $estHed->EstRegNo;?>
                                                    </td>


                                                </tr>
                                                <tr style="text-align:left;font-size:12px;border:1px solid #000;">
                                                    <td
                                                        style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">
                                                        &nbsp;&nbsp;</td>
                                                    <td style="text-align:left;;border-top:1px solid #fff;" colspan="3">
                                                        &nbsp;&nbsp;Estimate NO:<?php echo $estHed->EstimateNo ?></td>

                                                    <td colspan="2"
                                                        style="text-align:left;;border-top:1px solid #fff;font-size:10px;">
                                                        &nbsp;&nbsp;Odo
                                                        Meter&nbsp;:<?php  if(isset($invVehi)){ echo $invVehi->Milage;}?>
                                                    </td>
                                                </tr>
                                                <tr style="text-align:left;font-size:12px;border:1px solid #000;">
                                                    <td
                                                        style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">
                                                        &nbsp;&nbsp;</td>
                                                    <td style="text-align:left;;border-top:1px solid #fff;" colspan="3">
                                                        &nbsp;&nbsp;Make&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php if(isset($invVehi)){ echo $invVehi->make;} ?>&nbsp;&nbsp;
                                                    </td>
                                                    <td colspan="4"
                                                        style="text-align:left;;border-top:1px solid #fff;font-size:10px;">
                                                        &nbsp;&nbsp;Model&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php  if(isset($invVehi)){ echo $invVehi->model;}?>
                                                    </td>

                                                </tr>

                                                <tr style="text-align:left;font-size:12px;border:1px solid #000;">
                                                    <td
                                                        style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">
                                                        &nbsp;&nbsp;</td>
                                                    <td style="text-align:left;;border-top:1px solid #fff;" colspan="4">
                                                        &nbsp;&nbsp;Chassis
                                                        No&nbsp;&nbsp;:<?php if($estHed->Supplimentry>0){ echo $estHed->Supplimentry;}?><?php if(isset($invVehi)){ echo $invVehi->ChassisNo;}?>
                                                    </td>


                                                </tr>



                                                <tr>
                                                    <td colspan="7" style="height: 15px; border: none;"></td>
                                                </tr>



                                                <tr
                                                    style="line-height: 20px;background-color:#fff !important;border:1px solid;font-size:10px;">
                                                    <th
                                                        style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center; width:5%;">
                                                        No</th>
                                                    <th
                                                        style="font-weight:bold;;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;;width:45%; ">
                                                        Description</th>
                                                    <th
                                                        style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;;width:5%; ">
                                                    </th>
                                                    <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;width:5%;"
                                                        class='text-right'>Qty</th>
                                                    <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;width: 10%; "
                                                        class='text-right'>Unit price</th>
                                                    <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;width:10%;"
                                                        class='text-right'>Quoted Amount</th>

                                                    <th
                                                        style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;text-align:center;">
                                                        Amended Amount</th>

                                                </tr>

                                            </thead>
                                            <?php } ?>
                                            <tbody>
                                                <?php $i=1;$total=0;
                                                    if($supNo>0){
                                                        $i=$estlastNo+1;
                                                    }else if($supNo==0){
                                                        $i=1;
                                                    }else{
                                                        $i=1;
                                                    }
                                                    function ifzero($num){
                                                        if($num==0){
                                                            return '-';
                                                        }else{
                                                            return number_format($num,2);
                                                        }
                                                    }
                                                    foreach ($estDtl as $key=>$estdtl) { ?>
                                                                                <?php if($estHed->EstJobType==1){
                                                    
                                                    
                                                ?>
                                                <tr style="!important;">
                                                    <td
                                                        style="border-bottom:1px solid #000;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;padding: 5px">
                                                    </td>
                                                    <td colspan="7"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000; font-size:10px;padding: 5px">
                                                        <b><?php echo $key;?></b></td>
                                                </tr>
                                                <?php 
                                                foreach ($estdtl AS $dtl) { ?>
                                                <tr style="font-size:10px;">
                                                    <td
                                                        style="text-align:center;border-bottom:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php echo $i;?></td>
                                                    <td
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php echo $dtl->EstJobDescription?></td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php echo $dtl->EstPartType?></td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php echo ifzero($dtl->EstQty);?></td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php if($dtl->EstIsInsurance==0){echo ifzero($dtl->EstNetAmount/$dtl->EstQty);} ?>
                                                    </td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php if($dtl->EstIsInsurance==0){echo ifzero($dtl->EstNetAmount);}else{echo $dtl->EstInsurance;} ?>
                                                    </td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                    </td>

                                                </tr>
                                                <?php $i++; $total+=$dtl->EstNetAmount;
                                                    } ?>
                                                <?php }elseif($estHed->EstJobType==2){ 
                         
                                                ?>
                                                <tr style="!important;">
                                                    <td
                                                        style="border-bottom:1px solid #000;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;padding: 5px">
                                                    </td>
                                                    <td colspan="7"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;padding: 5px;font-size:10px;">
                                                        <b><?php echo $key;?></b></td>
                                                </tr>
                                                <?php 
                                                foreach ($estdtl AS $dtl) { ?>
                                                <tr style="font-size:10px;">
                                                    <td
                                                        style="text-align:center;border-bottom:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php echo $i;?></td>
                                                    <td
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php echo $dtl->EstJobDescription?></td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php echo $dtl->EstPartType?></td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php echo ifzero($dtl->EstQty);?></td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php if($dtl->EstIsInsurance==0){echo ifzero($dtl->EstNetAmount/$dtl->EstQty);} ?>
                                                    </td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                        <?php if($dtl->EstIsInsurance==0){echo ifzero($dtl->EstNetAmount);}else{echo $dtl->EstInsurance;} ?>
                                                    </td>
                                                    <td class="text-right"
                                                        style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px">
                                                    </td>
                                                </tr>
                                                <?php $i++; $total+=$dtl->EstNetAmount;
                                                } ?>
                                                <?php } ?>
                                                <?php  } ?>
                                            </tbody>
                                            <tfoot>
                                                <?php if($estHed->EstJobType==2){ ?>

                                                <tr>
                                                    <th colspan="5"
                                                        style="text-align:right;font-size:12px;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
                                                        Estimate Amount &nbsp;&nbsp; Rs</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;font-size:12px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                        <?php echo number_format($estHed->EstimateAmount,2) ?>&nbsp;
                                                    </th>
                                                    <th
                                                        style='text-align:right;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                    </th>
                                                </tr>
                                                <?php if($estHed->EstVatAmount>0){ ?>
                                                <tr>
                                                    <th colspan="5"
                                                        style="text-align:right;font-size:10px;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
                                                        VAT Amount &nbsp;&nbsp; Rs</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;font-size:10px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                        <?php echo number_format($estHed->EstVatAmount,2)?>&nbsp;</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                    </th>
                                                </tr>
                                                <?php } ?>
                                                <?php if($estHed->EstVatAmount>0){ ?>
                                                <tr>
                                                    <th colspan="5"
                                                        style="text-align:right;font-size:10px;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
                                                        Total Amount with VAT &nbsp;&nbsp; Rs</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;font-size:10px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                        <?php echo number_format($estHed->EstNetAmount,2) ?>&nbsp;</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                    </th>
                                                </tr>
                                                <?php  }elseif($estHed->EstVatAmount<0){ ?>
                                                <tr>
                                                    <th colspan="5"
                                                        style="text-align:right;font-size:10px;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
                                                        Total Amount&nbsp;&nbsp; Rs</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;font-size:10px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                        <?php echo number_format($estHed->EstNetAmount,2) ?>&nbsp;</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                    </th>
                                                </tr>
                                                <?php } ?>
                                                <?php  }elseif($estHed->EstJobType==1){ ?>




                                                <tr>
                                                    <th colspan="5"
                                                        style="text-align:right;padding: 5px;font-size:12px; !important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
                                                        Estimate Amount &nbsp;&nbsp; Rs</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;font-size:12px; !important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                        <?php echo number_format($estHed->EstimateAmount,2) ?>&nbsp;
                                                    </th>
                                                    <th
                                                        style='text-align:right;padding: 5px; !important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                    </th>
                                                </tr>
                                                <?php if($estHed->EstVatAmount>0){ ?>
                                                <tr>
                                                    <th colspan="5"
                                                        style="text-align:right;font-size:10px;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
                                                        VAT Amount &nbsp;&nbsp; Rs</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;font-size:10px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                        <?php echo number_format($estHed->EstVatAmount,2)?>&nbsp;</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                    </th>
                                                </tr>
                                                <?php } ?>
                                                <?php if($estHed->EstVatAmount>0){ ?>
                                                <tr>
                                                    <th colspan="5"
                                                        style="text-align:right;font-size:10px;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
                                                        Total Amount with VAT &nbsp;&nbsp; Rs</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;font-size:10px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                        <?php echo number_format($estHed->EstNetAmount,2) ?>&nbsp;</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                    </th>
                                                </tr>
                                                <?php  }elseif($estHed->EstVatAmount<1){ ?>
                                                <tr>
                                                    <th colspan="5"
                                                        style="text-align:right;font-size:10px;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
                                                        Total Amount&nbsp;&nbsp; Rs</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;font-size:10px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                        <?php echo number_format($estHed->EstNetAmount,2) ?>&nbsp;</th>
                                                    <th
                                                        style='text-align:right;padding: 5px;!important;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>
                                                    </th>
                                                </tr>
                                                <?php } ?>
                                                <?php } ?>
                                                
                                                <tr>
                                                    <th colspan="6" style="text-align:left">
                                                            <br>
                                                    </th>
                                                </tr>
                                                 <tr>
                                                    <th colspan="6" style="text-align:left">REMARK: <span
                                                            id="lblremark1"><?php echo $estUser->remark ?></span><br><br>
                                                    </th>
                                                </tr>

                                            </tfoot>
                                        </table>
                                        <table
                                            style="border-collapse:collapse;width:700px;font-family: Arial, Helvetica, sans-serif;"
                                            border="1">
                                            <tr>
                                                <td colspan="8" style="text-align:left;">
                                                    <!-- COMPUTER BASE SIKKENS 2K COLOUR MIXING AND BAKE BOOTH PAINTING -->
                                                </td>
                                            </tr>

                                            <tr>

                                                <td style="font-size: 11px; text-align: center; width: 25%;">AP/GP =
                                                    Genuine parts</td>
                                                <td style="font-size: 11px; text-align: center; width: 25%;">NON = Non
                                                    genuine parts</td>
                                                <td style="font-size: 11px; text-align: center; width: 25%;">UP = Used
                                                    parts</td>
                                                <td style="font-size: 11px; text-align: center; width: 25%;">MR = Market
                                                    rate</td>
                                            </tr>

                                            <tr>
                                        </table>
                                        <table id="footer"
                                            style="border-collapse:collapse;width:700px;padding:5px;font-size:12px; margin-top:20px;"
                                            border="1">
                                            <tr>
                                                <th colspan="6" style="text-align:left;font-size: 12px;">

                                                    <span>Terms & Conditions</span>
                                                    <ul>
                                                        <br>
                                                        <?php foreach ($term as $val) { ?>
                                                        <li><?php echo $val->InvCondition; ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                </th>
                                            </tr>
                                        </table>
                                        <br>
                                        <table id="footer"
                                            style="border-collapse:collapse;width:700px;padding:5px;font-size:12px;"
                                            border="1">
                                            <tr>



                                                <th colspan="1"
                                                    style="border:1px solid #000; width:200px; text-align:center;">
                                                    <br>


                                                    VAT would be added to net invoice valve.
                                                </th>


                                                <th colspan="1"
                                                    style="border:1px solid #000; width:200px; text-align:center;">
                                                    <br><br>

                                                    ........................<br>
                                                    Name & signature(Customer)
                                                </th>


                                                <th colspan="1"
                                                    style="border:1px solid #000; width:200px; text-align:center;">
                                                    <br><br>

                                                    ........................<br>
                                                    Name & signature (Assessor)
                                                </th>


                                                <th colspan="1"
                                                    style="border:1px solid #000; width:200px; text-align:center;">
                                                    <br><br>

                                                    ........................<br>
                                                    Signature (HGPM)
                                                </th>
                                            </tr>

                                        </table>
                                        <br>
                                        <table id="footer"
                                            style="border-collapse:collapse;width:700px;padding:5px;font-size:12px;"
                                            border="1">
                                            <tr>



                                                <th colspan="1"
                                                    style="border:1px solid #000; width:200px; text-align:center;">
                                                    <br><br>

                                                    <?php echo $estUser->first_name ?></br>
                                                    Prepared By
                                                </th>


                                                <th colspan="1"
                                                    style="border:1px solid #000; width:200px; text-align:center;">
                                                    <br><br>

                                                    ........................<br>
                                                    Issued By
                                                </th>


                                                <th colspan="1"
                                                    style="border:1px solid #000; width:200px; text-align:center;">
                                                    <br><br>

                                                    ........................<br>
                                                    Issued Date
                                                </th>



                                            </tr>

                                        </table>

                                        <input type="Hidden" name="estNo" id="estNo" value="<?php echo $EstimateNo;?>">
                                        <input type="Hidden" name="supNo" id="supNo" value="<?php echo $supNo;?>">
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <table class="table" style="font-size:11px;">
                                    <tr><td>Create by</td><td>:</td><td><?php echo $estHed->first_name." ".$estHed->last_name[0]; ?></td></tr>
                                    <tr><td>Create Date</td><td>:</td><td><?php echo $estHed->EstDate ?></td></tr>
                                   
                                  <?php if($invUpdate):  ?>
                                  <tr><td colspan="3">Last Updates</td></tr>
                                  <?php  foreach ($invUpdate AS $up) { ?>
                                    <tr><td><?php echo $up->UpdateDate ?></td><td>:</td><td><?php echo $up->first_name." ".$up->last_name ?></td></tr>
                                  <?php }
                                  endif; ?>
                              </table>
                            </div>

                            
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
    <!--invoice print-->
    <div class="modal fade bs-payment-modal-lg" id="modelInvoice" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <?php //jobcard print 
          // if( $estHed->EstJobType==1){ 
          //   $this->load->view('admin/job/estimate_print.php',true);
          // }else{
          //   $this->load->view('admin/job/general_estimate_print.php',true);
          // }
          ?>
        </div>
    </div>

    <!--labour print-->
    <div class="modal fade bs-payment-modal-lg" id="modelInvoice2" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <?php //jobcard print 
        //  if( $estHed->EstJobType==1){ 
        //     $this->load->view('admin/job/ins_estimate_labour_print.php',true);
        // }else{
        //     $this->load->view('admin/job/estimate_labour_print.php',true);
        // }
         ?>
        </div>
    </div>
</div>
<style>
.shop-items:hover {
    background-color: #00ca6d;
    color: #fff;
}

.form-group {
    margin-bottom: 5px;
}

div.ui-datepicker {
    font-size: 10px;
}

#cus_details {
    font-size: 18px;
}

.borderdot {
    border-bottom: 1px dashed #000;
}

.bordertopbottom {
    border-bottom: 1px solid #000;
    border-top: 1px solid #000;
}
</style>
<script type="text/javascript">
var estNo = '';
estNo = $("#estNo").val();
var supNo = '';
supNo = $("#supNo").val();
loadEstimateData(estNo, supNo);
$("#btnPrint").click(function() {
    $('#printArea').focus().print();
});

$("#btnPrint2").click(function() {
    $('#printArea2').focus().print();
});

var cusCode = 0;
var customer_name = '';
var outstanding = 0;
var available_balance = 0;
var outstanding = 0;

function ifzero(num) {
    if (num == 0) {
        return '-';
    } else {
        return accounting.formatMoney(num);
    }
}

function ifnull(num) {
    if (num == '') {
        return ' ';
    } else if (num == 'null') {
        return '';
    } else {
        return (num);
    }
}


function loadEstimateData(estNo, supNo) {
    clearInvoiceData();
    var totalEstAmount = 0;
    $.ajax({
        type: "POST",
        url: "../job/getEstimateDataById",
        data: {
            estNo: estNo,
            supNo: supNo
        },
        success: function(data) {
            var resultData = JSON.parse(data);

            cusCode = resultData.cus_data.CusCode;
            outstanding = resultData.cus_data.CusOustandingAmount;
            available_balance = parseFloat(resultData.cus_data.CreditLimit) - parseFloat(outstanding);
            customer_name = resultData.cus_data.CusName;
            $("#lblcusName,#lblcusNamelb").html(resultData.cus_data.RespectSign + ". " + resultData.cus_data
                .CusName + "<br>" + nl2br(resultData.cus_data.Address01));
            $("#lblcusCode,#lblcusCodelb").html(resultData.cus_data.CusCode);
            $("#creditLimit").html(accounting.formatMoney(resultData.cus_data.CreditLimit));
            $("#creditPeriod").html(resultData.cus_data.CreditPeriod);
            $("#cusOutstand").html(accounting.formatMoney(outstanding));
            $("#availableCreditLimit").html(accounting.formatMoney(available_balance));
            $("#lblAddress,#lblAddresslb").html(nl2br(resultData.cus_data.Address01) + ", " + resultData
                .cus_data.Address02);
            $("#cusAddress2,#cusAddress2lb").html(resultData.cus_data.Address03);
            $("#lbltel,#lbltellb").html(resultData.cus_data.MobileNo + " " + resultData.cus_data.LanLineNo);
            $("#lblConName,#lblConNamelb").html(resultData.vehicle_data.contactName);
            $("#lblregNo,#lblregNolb").html(resultData.vehicle_data.RegNo);
            $("#lblmake,#lblmakelb").html(resultData.vehicle_data.make);
            $("#lblmodel,#lblmodellb").html(resultData.vehicle_data.model);
            $("#lblviNo,#lblviNolb").html(resultData.vehicle_data.ChassisNo);
            $("#lblestimateNo,#lblestimateNolb").html(resultData.est_hed.EstimateNo);

            if (resultData.est_hed.Supplimentry > 0) {
                $("#lblsupNo,#lblsupNolb").html(resultData.est_hed.Supplimentry);
            }

            if (resultData.est_hed.EstJobType == 1) {
                $("#lblesttype,#lblesttypelb").html("INSURANCE");
            } else if (resultData.est_hed.EstJobType == 2) {
                $("#lblesttype,#lblesttypelb").html("GENERAL");
            }

            if (resultData.est_hed.EstVatAmount > 0 && resultData.est_hed.EstIsVatTotal == 1) {
                $("#rowVat,#rowVatlb,#is_rowVat").show();
            } else {
                $("#rowVat,#rowVatlb,#is_rowVat").hide();
            }

            if (resultData.est_hed.EstimateAmount > 0 && resultData.est_hed.EstIsVatTotal == 1) {
                $("#rowSubTotal,#rowSubTotallb,#is_rowTotal").show();
            } else {
                $("#rowSubTotal,#rowSubTotallb,#is_rowTotal").hide();
            }

            if (resultData.est_hed.EstNbtAmount > 0 && resultData.est_hed.EstIsNbtTotal == 1) {
                $("#rowNbt,#rowNbtlb,#is_rowNbt").show();
            } else {
                $("#rowNbt,#rowNbtlb,#is_rowNbt").hide();
            }

            $("#lblInsCompany,#lblInsCompanylb").html(resultData.est_hed.VComName);
            $("#lblinvDate,#lblinvDatelb").html(resultData.est_hed.EstDate);
            $("#lblremark,#lblremarklb").html(resultData.est_hed.remark);
            $("#lbltotalEsSubAmount,#lbltotalEsSubAmountlb,#is_total").html(accounting.formatMoney(
                resultData.est_hed.EstimateAmount));
            $("#lbltotalEsAmount,#lbltotalEsAmountlb,#is_net").html(accounting.formatMoney(resultData
                .est_hed.EstNetAmount));
            $("#lbltotalEsVatAmount,#lbltotalEsVatAmountlb,#is_vat").html(accounting.formatMoney(resultData
                .est_hed.EstVatAmount));
            $("#lbltotalEsNbtAmount,#lbltotalEsNbtAmountlb,#is_Nbt").html(accounting.formatMoney(resultData
                .est_hed.EstNbtAmount));
            $("#lbltotalNet,#lbltotalNetlb,#is_net").html(accounting.formatMoney(resultData.est_hed
                .EstNetAmount));

            var k = 1;
            if (supNo > 0) {
                k = parseFloat(resultData.estlastNo) + 1;
            } else if (supNo == 0) {
                k = 1;
            } else {
                k = 1;
            }

            if (resultData.est_hed.EstJobType == 1) {
                $.each(resultData.est_dtl, function(key, value) {
                    $("#tbl_est_data").append(
                        "<tr><td class='bordertopbottom'></td><td  class='bordertopbottom' style='padding: 1px 3px 1px 50px;'><b>" +
                        getKey(key) +
                        "</b></td><td class='bordertopbottom'></td><td class='bordertopbottom'></td><td class='bordertopbottom'></td><td class='bordertopbottom'></td></tr>"
                        );
                    for (var i = 0; i < value.length; i++) {
                        if (value[i].EstIsInsurance == 1) {
                            $("#tbl_est_data").append(
                                "<tr><td style='text-align:center;padding:  1px 3px;' class='borderdot'>" +
                                (k) + "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                value[i].EstJobDescription +
                                "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                ifnull(value[i].EstPartType) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                (value[i].EstInsurance) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'></td></tr>"
                                );
                        } else {
                            totalEstAmount += parseFloat(value[i].EstNetAmount);
                            $("#tbl_est_data").append(
                                "<tr><td class='borderdot' style='text-align:center;padding:  1px 3px;'>" +
                                (k) + "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                value[i].EstJobDescription +
                                "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                ifnull(value[i].EstPartType) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstNetAmount) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'></td></tr>"
                                )
                        }
                        k++;
                    }
                });
            } else if (resultData.est_hed.EstJobType == 2) {
                $.each(resultData.est_dtl, function(key, value) {
                    $("#tbl_est_data").append(
                        "<tr><td class='bordertopbottom'></td><td class='bordertopbottom' style='padding: 1px 3px 1px 50px;'><b>" +
                        getKey(key) +
                        "</b></td><td class='bordertopbottom'></td><td class='bordertopbottom'></td><td class='bordertopbottom'></td><td class='bordertopbottom'></td></tr>"
                        );
                    for (var i = 0; i < value.length; i++) {
                        if (value[i].EstIsInsurance == 1) {
                            $("#tbl_est_data").append(
                                "<tr><td class='borderdot' style='text-align:center;padding:1px 3px;'>" +
                                (k) + "</td><td class='borderdot' style='padding: 1px 3px;'>" +
                                value[i].EstJobDescription +
                                "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                ifnull(value[i].EstPartType) +
                                "</td><td class='borderdot' style='text-align:right;padding: 1px 3px;'>" +
                                ifzero(value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstNetAmount / value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                (value[i].EstInsurance) + "</td></tr>");
                        } else {
                            totalEstAmount += parseFloat(value[i].EstNetAmount);
                            $("#tbl_est_data").append(
                                "<tr><td class='borderdot' style='text-align:center;padding: 1px 3px;'>" +
                                (k) + "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                value[i].EstJobDescription +
                                "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                ifnull(value[i].EstPartType) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstNetAmount / value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstNetAmount) + "</td></tr>")
                        }
                        k++;
                    }
                });
            }
            totalEstAmount = 0;

            var l = 1;
            if (supNo > 0) {
                l = parseFloat(resultData.estlastNo) + 1;
            } else if (supNo == 0) {
                l = 1;
            } else {
                l = 1;
            }

            if (resultData.est_hed.EstJobType == 1) {
                $.each(resultData.est_dtl, function(key, value) {
                    $("#tbl_est_data_lb").append(
                        "<tr><td ></td><td   style='padding: 1px 3px 1px 50px;'><b>" + getKey(
                            key) + "</b></td><td ></td><td ></td><td></td><td ></td></tr>");
                    for (var i = 0; i < value.length; i++) {
                        if (value[i].EstIsInsurance == 1) {
                            $("#tbl_est_data_lb").append(
                                "<tr><td style='text-align:center;padding:  1px 3px;' class='borderdot'>" +
                                (l) + "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                value[i].EstJobDescription +
                                "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                ifnull(value[i].EstPartType) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                (value[i].EstInsurance) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'></td></tr>"
                                );
                        } else {
                            totalEstAmount += parseFloat(value[i].EstNetAmount);
                            $("#tbl_est_data_lb").append(
                                "<tr><td class='borderdot' style='text-align:center;padding:  1px 3px;'>" +
                                (l) + "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                value[i].EstJobDescription +
                                "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                ifnull(value[i].EstPartType) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstNetAmount) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'></td></tr>"
                                )
                        }
                        l++;
                    }
                });
            } else if (resultData.est_hed.EstJobType == 2) {
                $.each(resultData.est_dtl, function(key, value) {
                    $("#tbl_est_data_lb").append(
                        "<tr><td ></td><td style='padding: 1px 3px 1px 50px;'><b>" + getKey(
                        key) + "</b></td><td ></td><td ></td><td ></td><td ></td></tr>");
                    for (var i = 0; i < value.length; i++) {
                        if (value[i].EstIsInsurance == 1) {
                            $("#tbl_est_data_lb").append(
                                "<tr><td class='borderdot' style='text-align:center;padding:1px 3px;'>" +
                                (l) + "</td><td class='borderdot' style='padding: 1px 3px;'>" +
                                value[i].EstJobDescription +
                                "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                ifnull(value[i].EstPartType) +
                                "</td><td class='borderdot' style='text-align:right;padding: 1px 3px;'>" +
                                ifzero(value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstNetAmount / value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                (value[i].EstInsurance) + "</td></tr>");
                        } else {
                            totalEstAmount += parseFloat(value[i].EstNetAmount);
                            $("#tbl_est_data_lb").append(
                                "<tr><td class='borderdot' style='text-align:center;padding: 1px 3px;'>" +
                                (l) + "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                value[i].EstJobDescription +
                                "</td><td class='borderdot' style='padding:  1px 3px;'>" +
                                ifnull(value[i].EstPartType) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstNetAmount / value[i].EstQty) +
                                "</td><td class='borderdot' style='text-align:right;padding:  1px 3px;'>" +
                                ifzero(value[i].EstNetAmount) + "</td></tr>")
                        }
                        l++;
                    }
                });
            }
        }
    });
}

function clearInvoiceData() {
    $("#tbl_est_data tbody").html('');
    $("#lblcusName").html('');
    $("#lblcusCode").html('');
    $("#creditLimit").html('');
    $("#creditPeriod").html('');
    $("#cusOutstand").html('');
    $("#availableCreditLimit").html('');
    $("#lblAddress").html('');
    $("#cusAddress2").html('');
    $("#lbltel").html('');
    $("#lblConName").html('');
    $("#lblregNo").html('');
    $("#lblmake").html('');
    $("#lblmodel").html('');
    $("#lblviNo").html('');
    $("#lblestimateNo").html('');
    $("#lblinvDate").html('');
}

function nl2br(str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

function getKey(txt) {
    var text = '';
    if (txt == 'Outside Parts') {
        text = 'SUPPLY';
    } else if (txt == 'PARTS') {
        text = 'SUPPLY';
    } else {
        text = txt;
    }
    return text;
}
</script>