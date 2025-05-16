<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
 
    @media print {
    thead { display: table-header-group; }
    tfoot { display: table-footer-group; }
    
    tr { page-break-inside: avoid; }
    
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
                    <?php  $checkRole = $_SESSION['role'];

                    if ($checkRole != 6) {
                        ?>
                    <div class="box-header" style="background: #b4f3c8">
                        <div class="col-sm-4">
                        <form class="form-horizontal">
                        <div class="form-group">
                                <label for="cusCompany" class="col-sm-4 control-label">Branch <span class="required"></span></label>
                                <div class="col-sm-8">
                                     <select name="branch" required="required"  id="branch" class="form-control">
                                        <option value="">Select a branch</option>
                                         <?php foreach ($loc as $trns) { ?>
                                        <option value="<?php echo $trns->location_id; ?>" com="<?php echo $trns->location_id; ?>"  <?php if($trns->location_id==$_SESSION['location']){echo 'selected';}?> ><?php echo $trns->location; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="cusCode" class="col-sm-4 control-label">Job Status <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" required="required"  name="jobStatus" id="jobStatus" >
                                    <option value="">Select a status</option>
                                     <?php foreach ($jobStatus as $trns) { ?>
                                    <option value="<?php echo $trns->status_id; ?>"  <?php if($jobHed->IsCompelte==$trns->status_id){?>selected<?php }?>><?php echo $trns->status_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="div_emp">
                            <label for="cusCode" class="col-sm-4 control-label">Job Assign to <span class="required">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" required="required"  name="emp" id="emp" >
                                    <option value="">Select a employee</option>
                                     <?php foreach ($salesperson as $trns) { ?>
                                    <option value="<?php echo $trns->RepID; ?>" <?php //if($jobHed->assignTo==$trns->RepID){?><?php //}?>><?php echo $trns->RepName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="div_emp">
                            <label for="cusCode" class="col-sm-4 control-label"><span class="required"></span></label>
                            <div class="col-sm-4">
                                <input type="button" name="btnSave" id="btnSave" value="Update" class="btn btn-success">
                            </div>
                            <div class="col-sm-4">
                                <?php if($jobHed->IsCancel==0 && $jobHed->IsCompelte==0){?>
                                <input type="button" name="btnSave" id="btnCancel" value="Cancel Job" class="btn btn-danger">
                                <?php } ?>
                            </div>
                        </div>
                        </form>
                        <hr>
                    </div>
                    <div class="col-sm-3">
                        <table style="font-size:10">
                            <tbody>
                                <!-- <tr><td>Assign To</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php //echo $jobHed->RepName?></td></tr> -->
                                <tr><td>Status</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $jobHed->status_name?></td></tr>
                                <tr><td>Job No</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $jobHed->JobCardNo?></td></tr>
                                <tr><td>Job Date</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $jobHed->appoimnetDate?></td></tr>
                                <tr><td>Start Date</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $jobHed->startDate?></td></tr>
                                <tr><td>End Date</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $jobHed->endDate?></td></tr>
                                <tr><td>Close Date</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td><td><?php echo $jobHed->closeDate?></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-2">
                                <!--  <span class="pull-right">Print Preview &nbsp;<input type="checkbox" class="prd_icheck" name="printPreview" id="printPreview" value="1"><br><br></span> -->
                            </div>
                            <?php if (in_array("SM161", $blockView) || $blockView == null) { ?>
                                <div class="col-sm-2">
                                    <button type="button" id="btnPrint" class="btn btn-primary btn-sm btn-block">Print
                                    </button>
                                </div>
                            <?php } ?>
                            <?php if (in_array("M3", $blockEdit) || $blockEdit == null) { ?>
                                <div class="col-sm-2"><a
                                            href="../../job/edit_job/<?php echo base64_encode($jobHed->JobCardNo); ?>"
                                            class="btn btn-info btn-sm btn-block">Edit</a></div>
                            <?php } ?>
                            <div class="col-sm-2"><a
                                        href="../../purchase/addpo?job=<?php echo base64_encode($jobHed->JobCardNo); ?>"
                                        class="btn btn-info btn-sm btn-block">PO</a></div>
                            <?php if (in_array("SM51", $blockAdd) || $blockAdd == null) { ?>
                                <div class="col-sm-2">
                                    <a href="../../job/estimate_job?type=job&id=<?php echo base64_encode($jobHed->JobCardNo); ?>"
                                       class="btn btn-info btn-sm ">Estimate</a>
                                    <!-- <?php if ($jobHed->IsCancel == 0) { ?><button type="button" id="btnPrint" class="btn btn-danger btn-sm btn-block">Cancel</button><?php } ?> -->
                                </div>
                            <?php } ?>
                            <?php if (in_array("M4", $blockAdd) || $blockAdd == null) { ?>
                                <div class="col-sm-2">
                                    <a href="../../Salesinvoice/job_invoice?type=job&id=<?php echo base64_encode($jobHed->JobCardNo); ?>"
                                       class="btn btn-info btn-sm ">Invoice</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table" id="tblEmp">
                                    <tr><td>Employee</td><td style="padding:2px;">Type</td><td style="padding:2px;">#</td></tr>
                                    <?php foreach ($workers as $trns) { ?>
                                    <tr><td><?php echo $trns->RepName; ?></td><td><?php echo $trns->EmpType; ?></td><td style="padding:2px;"><button wid="<?php echo $trns->jworkid; ?>" class=" btnRemove btn btn-danger btn-xs">Remove</button></td></tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>       
                    </div>
                        <!-- </div> -->
                    </div><!-- /.box-header -->
                      <?php }
                    ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="row" align="center" style='margin:5px;' id="printArea">
                                                                       <!-- load comapny common header -->
    <?php $this->load->view('admin/_templates/company_header.php',true); ?>

                <!-- <table style="border-collapse:collapse;width:700px;padding:5px;font-size: 12px;" border="1">
                    <thead style="display: table-header-group;">

                        <tr style="text-align:left;font-size:13px;">
                            <td colspan="2" rowspan="5" style="border:1px solid #000;font-size:13px;width:250px;padding: 5px;" v-align="top">
                                <span><a href="<?php echo base_url('admin/payment/view_customer/').$invCus->CusCode ?>"><?php echo $invCus->DisplayName;?></a></span><br>
                            
                                        <?php echo $invCus->CusCode;?><br>
                                        <?php echo $invCus->ContactPerson;?><br>
                                
                            
                                    <?php echo nl2br($invCus->Address01)."<br>".$invCus->Address02;?> <?php echo $invCus->Address03;?><br>
                                
                                <?php ?>   
                                <span id="lbladdress2">Tel : <?php echo $invCus->LanLineNo;?> Mobile : <?php echo $invCus->MobileNo;?></span>
                            </td>
                           
                            <td style="font-size:11px;width:130px;text-align: left;border-left: 1px solid #000;border-top: 1px solid #000;border-right: 1px solid #000;">REG. NO:<?php echo $jobHed->JRegNo?></td>
                        <tr style="text-align:left;font-size:12px;">
                            
                            <td style="text-align:left;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;">&nbsp;&nbsp;V.I.H NO:<?php echo $invVehi->ChassisNo?></td>
                          
                            <td colspan="5" style="text-align:left;border-right: 1px solid #000;border-top: 1px solid #000;">&nbsp;&nbsp;JOB NO:<?php echo $jobHed->JobCardNo?></td>
                        </tr>
                        
                        <tr style="text-align:left;font-size:12px;">
                        
                            <td style="text-align:left;border-left: 1px solid #000;border-right: 1px solid #000;">&nbsp;&nbsp;MAKE:<?php echo $invVehi->make?></td>
                          
                            <td colspan="5" style="text-align:left;border-right: 1px solid #000;">&nbsp;&nbsp;MODEL:<?php echo $invVehi->model?></td>
                        </tr>
                       

                        <tr style="text-align:left;font-size:12px;">
                          
                            <td style="text-align:left;font-size:13px;border-left: 1px solid #000;border-right: 1px solid #000;border-right: 1px solid #000;">ODO METER:<?php echo $jobHed->OdoIn?></td>
                            
                            <td colspan="4" style="border-right: 1px solid #000;">&nbsp;&nbsp;DATE:<?php echo $jobHed->appoimnetDate?></td>
                        </tr>
                        <tr style="text-align:left;font-size:12px;">
                          
                            <td style="text-align:left;font-size:13px;border-left: 1px solid #000;border-right: 1px solid #000;border-right: 1px solid #000;">Type of fuel:</td>
                            
                            <td colspan="4" style="border-right: 1px solid #000;">&nbsp;&nbsp;Payment Type:<?php echo $jobHed->payType?></td>
                        </tr>
                        <tr style="text-align:left;font-size:12px;">
                            <td style="text-align:left;font-size:13px;" colspan="2"></td>
                            <td></td>
                            <td style="text-align:right;font-size:11px;border-left: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;"></td>
                            <td style="border-bottom: 1px solid #000;"></td><td colspan="2" style="font-size:11px;text-align:right;border-right: 1px solid #000;border-bottom: 1px solid #000;"></td>
                        </tr>
                    <hr>
                        <tr>
                            <th style='padding: 3px;width:30px;'>No.</th>
                            <th style='padding: 3px;width:540px;text-align: center;'> Customer Request Notes </th>
                            <th style='padding: 3px;width:130px;text-align: center;' colspan="5">Estimate Cost</th>
                        </tr>
                        <tr>
                            <th style='padding: 3px;'>&nbsp;</th>
                            <th style='padding: 3px;'>&nbsp;</th>
                            <th style='text-align:right' colspan="5">Rs</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php 
                    $i=1;
                    $subtotal=0;
                     foreach ($jobDtl as $dtl) { ?>
                          <?php 
                          $subtotal += $dtl->JobAmount;
                          ?>
                       <tr>
                        <td style='text-align:right'><?php echo $i;?></td>
                        <td style='text-align:right'><?php echo $dtl->JobDescription?></td>
                        <td style='text-align:right'colspan="5"><?php echo $dtl->JobAmount?></td>
                      
                    </tr>
                   <?php $i++; 
                   } ?>
                   
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" style='text-align:right'>Sub Total</th>
                            <th style='text-align:right'colspan="5"><?php echo number_format($subtotal, 2); ?></th>
                        
                        </tr>
                    </tfoot>
                     
                        </table><br>
                        <table style="border-collapse:collapse;width:700px;padding:5px;font-size: 12px;" border="1">
                        <tr>
                            <th colspan="6" style="text-align:left;font-size: 12px;">
                                <span>Terms & Conditions</span>
                                <ul>
                                   <?php foreach ($term as $val) { ?>
                                       <li><?php echo $val->InvCondition; ?></li>
                                   <?php } ?>
                                </ul> 
                            </th>
                        </tr>
                        </table>
                       
                        <div id="foot" style='border: 1px #000 solid;width:700px;padding: 5px;' >
                        <table style="border-collapse:collapse;width:683px;padding:2px;font-size: 12px;">
                        <tr>
                            <td rowspan="3" style='padding:5px;padding-right:20px;border:1px solid #000; text-align:left;font-size: 12px;width:350px;'>
                            I agree with above condition & I hand over to you for carry out work <br>

                            <br>
                            …………………………………………………………………………….

                            <br>
                            Customer / authorize Person
                            <br>
                            …………………………………………………………………………….
                            <br>
                            Name
                            </td>
                            <td style='width: 5px' ></td>
                            <td colspan="2" style='border:1px solid #000;'>Further work to be carry out.
                            <br>
                            …………………………………………………………………………….
                            <br>
                            <br>
                            …………………………………………………………………………….
                            <br>
                            <br>
                            …………………………………………………………………………….
                            <br>
                            <br>
                            …………………………………………………………………………….
                            <br>
                            </td>
                        </tr>
                      
                        
                       
                       
                         
                </table> -->


                <table style="border-collapse:collapse;width:700px;padding:5px;font-size:13px;font-family: Arial, Helvetica, sans-serif;" border="0">
      
            <thead style="display: table-header-group;">
            <tr style="text-align:left;font-size:13px;">
                   
                    
                   <td style="font-size:13px;font-weight: bold;text-align:left; width:10%"></td>
                   <td colspan="4" style="font-size:18px;font-weight: bold;text-align:center;">Job Card</td>
            </tr>
            <tr style="text-align:left;font-size:13px;">
            <td colspan="2" rowspan="5" style="border:1px solid #000; font-size:13px; width:100px; padding:5px; vertical-align: top;">
                           
            Customer Code&nbsp;: <?php echo $invCus->CusCode; ?>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
            <strong>Chassi  No: <?php echo $invVehi->ChassisNo?></strong><br> 

                            <a href="<?php echo base_url('admin/payment/view_customer/') . $invCus->CusCode; ?>">
                                Customer Name: <?php echo $invCus->DisplayName; ?>
                            </a>
                            <br>

                            Customer Address:<?php echo $invCus->Address01; ?>,<?php echo $invCus->Address02; ?>,<?php echo $invCus->Address03; ?><br>
                        

                            <span id="lbladdress2">
                            Tel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $invCus->LanLineNo; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Mobile&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $invCus->MobileNo; ?>
                            </span>
                            <br>

                            <span>Customer VAT No:<?php echo $invCus->VatNumber; ?></span>
                        </td>
       
                        <td>&nbsp;&nbsp;</td>   
                       <td style="font-size:12px;text-align: left;border-left: 1px solid #000;border-top: 1px solid #000;width:200px;" colspan="5">&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $jobHed->appoimnetDate?></td>
                       
                       <td style="font-size:12px;text-align: left;border-top: 1px solid #000;border-right: 1px solid #000;" colspan="1"></td>
                   </tr>
                        <tr style="text-align:left;font-size:12px;border:1px solid #000; ">
                           <td style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">&nbsp;&nbsp;</td>   
                               <td style="text-align:left;border-left:1px solid #000;border-top:1px solid #fff;" colspan="4">&nbsp;&nbsp;<strong>Reg.No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $jobHed->JRegNo?></strong></td>

                               
                           </tr>
                           <tr style="text-align:left;font-size:12px;border:1px solid #000;">
                           <td style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">&nbsp;&nbsp;</td>     
                               <td style="text-align:left;;border-top:1px solid #fff;" colspan="2"> &nbsp;&nbsp;<strong>Job NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $jobHed->JobCardNo?></strong></td>
                              
                               <td colspan="2" style="text-align:left;;border-top:1px solid #fff;">&nbsp;&nbsp;Odo Meter&nbsp;:<?php echo $jobHed->OdoIn?></td>
                           </tr>
                           <tr style="text-align:left;font-size:12px;border:1px solid #000;">
                           <td style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">&nbsp;&nbsp;</td>    
                              <td style="text-align:left;;border-top:1px solid #fff;" colspan="2">&nbsp;&nbsp;Make&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $invVehi->make?>&nbsp;&nbsp;</td>
                              <td colspan="4" style="text-align:left;;border-top:1px solid #fff;">&nbsp;&nbsp;Model&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo $invVehi->model?></td>
                              
                          </tr>
                          
                           <tr style="text-align:left;font-size:12px;border:1px solid #000;">
                           <td style="border:1px solid #fff;border-right: 1px solid #000;border-bottam:1px solid #fff;">&nbsp;&nbsp;</td>     
                               <td style="text-align:left;;border-top:1px solid #fff;" colspan="2">&nbsp;&nbsp;Payment Type:<?php echo $jobHed->payType?></td>
                               <td colspan="2" style="text-align:left;;border-top:1px solid #fff;">&nbsp;&nbsp;Type of fuel:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $invVehi->fuel_type?></td>
                              
                               
                           </tr>
                           <tr>
                               <td colspan="7" style="height: 15px;"></td>
                           </tr>
       
                           <tr style="line-height: 20px;!important;border:1px solid;font-size:10px;">
                            <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center; width:5%;">No</th>
                             <th  style="font-weight:bold;;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #fff;text-align:center;;width:45%; ">Customer Request Notes</th>
                         <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #fff;text-align:center;;width:5%; "></th>
                          <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #fff;text-align:center;width:5%;" class='text-right'></th>
                              <th  style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #fff;text-align:center;width: 10px;%; " class='text-right'></th>
                        <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;border-right: 1px solid #000;text-align:center;width:10%;" class='text-right'></th>

                    <th style="font-weight:bold;border-left: 1px solid #000;border-top:1px solid #000;text-align:center;">Estimate Cost</th>

                        </tr>
            </thead>

            <tbody>
                        
                    <?php 
                    $i=1;
                    $subtotal=0;
                     foreach ($jobDtl as $dtl) { ?>
                          <?php 
                          $subtotal += $dtl->JobAmount;
                          ?>
                       <tr>
                        <!-- <td style='text-align:right'><?php echo $i;?></td>
                        <td style='text-align:right'><?php echo $dtl->JobDescription?></td>
                        <td style='text-align:right'colspan="5"><?php echo $dtl->JobAmount?></td> -->
                        <td style="border-bottom:1px solid #000;border-left:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px"><?php echo $i;?></td>
                       <td style="border-bottom:1px solid #000;border-right:1px solid #fff;border-top:1px solid #000;padding:5px"><?php echo $dtl->JobDescription?></td>
                       <td class="text-right" style="border-bottom:1px solid #000;border-right:1px solid #fff;border-top:1px solid #000;padding: 5px"></td>
                       <td class="text-right" style="border-bottom:1px solid #000;border-right:1px solid #fff;border-top:1px solid #000;padding: 5px"></td>
                       <td class="text-right" style="border-bottom:1px solid #000;border-right:1px solid #fff;border-top:1px solid #000;padding: 5px"></td>
                       <td class="text-right" style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px"></td>
                       <td class="text-right" style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;padding: 5px"><?php echo number_format($dtl->JobAmount,2)?></td>
                      
                    </tr>
                   <?php $i++; 
                   } ?>
                   
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6" style='text-align:right;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000'>Sub Total</th>
                            <th style='text-align:right;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000'colspan="1"><?php echo number_format($subtotal, 2); ?></th>
                        
                        </tr>
                    </tfoot>
                     
                        </table>
                        </table><br>
                        <table style="border-collapse:collapse;width:700px;padding:5px;font-size: 12px;" border="1">
                        <tr>
                            <th colspan="6" style="text-align:left;font-size: 12px;">
                                <span>Terms & Conditions</span>
                                <ul>
                                   <?php foreach ($term as $val) { ?>
                                       <li><?php echo $val->InvCondition; ?></li>
                                   <?php } ?>
                                </ul> 
                            </th>
                        </tr>
                        </table>
                       
                        <div id="foot" style='border: 1px #000 solid;width:700px;padding: 5px;' >
                        <table style="border-collapse:collapse;width:683px;padding:2px;font-size: 12px;">
                        <tr>
                            <td rowspan="3" style='padding:5px;padding-right:20px;border:1px solid #000; text-align:left;font-size: 12px;width:350px;'>
                            I agree with above condition & I hand over to you for carry out work <br>

                            <br>
                            …………………………………………………………………………….

                            <br>
                            Customer / authorize Person
                            <br>
                            …………………………………………………………………………….
                            <br>
                            Name
                            </td>
                            <td style='width: 5px' ></td>
                            <td colspan="2" style='border:1px solid #000;'>Further work to be carry out.
                            <br>
                            …………………………………………………………………………….
                            <br>
                            <br>
                            …………………………………………………………………………….
                            <br>
                            <br>
                            …………………………………………………………………………….
                            <br>
                            <br>
                            …………………………………………………………………………….
                            <br>
                            </td>
                        </tr>
                      
                        
                       
                       
                         
                </table>
                Receiving time:
                </div>
            </div>
                            </div>
                             <div class="col-lg-1"></div>
                            <div class="col-lg-4">
                                <div class="row"> 
                                <div class="col-lg-11">
                                <table class="table" style="font-size:11px;">
                                    <tr><td>Create by</td><td>:</td><td><?php echo $jobHed->first_name; ?></td></tr>
                                    <tr><td>Create Date</td><td>:</td><td><?php echo $jobHed->appoimnetDate ?></td></tr>
                                   
                                  <?php if($invUpdate):  ?>
                                  <tr><td colspan="3">Last Updates</td></tr>
                                  <?php  foreach ($invUpdate AS $up) { ?>
                                    <tr><td><?php echo $up->UpdateDate ?></td><td>:</td><td><?php echo $up->Remark." by ".$up->first_name." ".$up->last_name ?></td></tr>
                                  <?php }
                                  endif; ?>
                                  </table>
                                  <?php if($estimate){ ?>
                                    <table class="table"  style="font-size:11px;">
                                            <tr><td colspan="4"><h4>Estimates</h4></td></tr>
                                            <tr><td>Date</td><td>Estimate NO</td><td>:</td><td>Net Amount</td></tr>
                                            <?php $totalEst=0;
                                              foreach ($estimate as $po) { ?>
                                               <tr><td><?php  echo $po->EstDate;   ?></td><td><a target="_blank" href="../../job/view_estimate?type=est&id=<?php echo base64_encode($po->EstimateNo);?>&sup=<?php echo $po->Supplimentry; ?>"><?php  echo $po->EstimateNo;   ?></a></td><td><?php  echo $po->Supplimentry;   ?></td><td><?php  echo number_format($po->EstNetAmount,2);   ?></td></tr>
                                           <?php $totalEst+=$po->EstNetAmount; } ?>
                                           <tr><td></td><td>Total</td><td></td><td><?php  echo number_format($totalEst,2);   ?></td></tr>
                                    </table>
                                    <?php } ?>
                                    <?php if($jobpo){ ?>
                                    <table class="table"  style="font-size:11px;">
                                            <tr><td colspan="4"><h4>Purchase Orders</h4></td></tr>
                                            <tr><td>Date</td><td>PO NO</td><td>:</td><td>PO Amount</td></tr>
                                            <?php $totalPO=0;
                                              foreach ($jobpo as $po) { ?>
                                               <tr><td><?php  echo $po->PO_Date;   ?></td><td><a target="_blank" href="../../purchase/view_po/<?php echo base64_encode($po->PO_No);?>"><?php  echo $po->PO_No;   ?></a></td><td>:</td><td><?php  echo number_format($po->PO_NetAmount,2);   ?></td></tr>
                                           <?php $totalPO+=$po->PO_NetAmount; } ?>
                                           <tr><td></td><td>Total</td><td></td><td><?php  echo number_format($totalPO,2);   ?></td></tr>
                                    </table>
                                    <?php } ?>
                                </div></div>
                            </div>
                           <!-- <div class="row row-eq-height"> -->
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="box box-success">
                <div class="box-header">
            <div class="col-sm-3">
                <!-- <form action="admin/job/do_upload" method="post" enctype="multipart-fomdata"> -->
                <?php echo form_open_multipart('admin/job/do_upload');?>
                    <div class="form-group" role="group">
                        <label>Document Image</label>
                        <input type="Hidden" name="jNo" id="jNo" value="<?php echo $JobNo;?>">
                        <?php echo $error;?>
                        <input type="Hidden" name="jobNo" id="jobNo" value="<?php echo $JobNo;?>">
                        <input type="file" name="userfile" size="20" />
                    </div>
                    <div class="form-group" role="group">
                        <input type="submit" class="btn btn-primary" value="upload" />
                    </div>
                </form>
            </div>
            <div class="col-sm-8">
            <div class="row">
                <?php foreach ($job_doc as $doc) { ?>
                <div class="col-sm-3">
                    <?php if ($doc->ext == 'pdf'){ ?>
                    <a href="<?php echo base_url("upload/job_doc/$doc->doc_name");?>" target="_blank">
                        <?php echo $doc->doc_name;?>
                    </a>
                   <?php } else { ?>
                        <a href="<?php echo base_url("upload/job_doc/$doc->doc_name");?>" rel="facebox">
                            <img src="<?php echo base_url("upload/job_doc/$doc->doc_name");?>" class="thumbnail" width="150">
                        </a>
               <?php     } ?>
                </div>
                <?php } ?>
            </div>
            </div>
                </div>
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
                    //$this->load->view('admin/job/jobcard-print.php',true); ?>
        </div>
    </div>
</div>
<style>
    .shop-items:hover{
        background-color: #00ca6d;
        color: #fff;
    }

    .form-group {
    margin-bottom: 5px;
}
div.ui-datepicker{
                font-size:10px;
            }

#cus_details{
    font-size: 18px;
}
</style>
<script type="text/javascript">
$('a[rel*=facebox]').facebox(); 
$("#div_emp").hide();

$("#jobStatus").change(function(){
    var job_status = $(this).val();

    if(job_status==1){
        $("#div_emp").show();
    }else{
        $("#div_emp").hide();
    }
});

$("#tblEmp tr").on('click','.btnRemove',function(){
    var wid=0;
    wid=($(this).attr('wid'));
    $.ajax({
        type: "POST",
        url: "../../job/removeEmployee",
        data: { emp:wid},
        success: function(data)
        {
            var resultData = JSON.parse(data);
            var feedback = resultData['fb'];
            var invNumber = resultData['InvNo'];

            if (feedback != 1) {
                $.notify("Employee has not deleted.", "warning");
                return false;
            } else {
                $.notify("Employee has Successfully deleted.", "success");
                location.reload();
                return false;
            }
        }
    });
});


    $("#btnCancel").click(function(){

        var r = confirm("Do you want to cancel this job card.?");
        if (r == true) {
            var jobdata = $("#jobArr").val();
            $("#btnCancel").attr('disabled', true);
                $.ajax({
                    url: "../../job/cancelJob",
                    type: "POST",
                    data: {jobNo:jobNo},
                    success: function(data) {
                        var newdata = JSON.parse(data);
                        var fb = newdata.fb;
                        var lastproduct_code = newdata.JobCardNo;

                        if (fb) {
                            $.notify(lastproduct_code+" Job card  successfully canceled.", "success");
                            $("#btnCancel").attr('disabled', false);
                        } else {
                             $.notify(" Opps Error.", "danger");
                            $("#btnCancel").attr('disabled', false);
                        }
                    }
            });
        }else{

        }
    });

$("#btnSave").click(function(){
    $("#btnSave").prop("disabled",true);
    var jobStatus = $("#jobStatus option:selected").val();
    var emp = $("#emp option:selected").val();
    var branch= $("#branch option:selected").val();
     $.ajax({
        type: "POST",
        url: "../../job/updateJobStatus",
        data: { jobStatus: jobStatus,emp:emp,jobNo:jobNo,branch:branch},
        success: function(data)
        {
            var resultData = JSON.parse(data);
            var feedback = resultData['fb'];
            var invNumber = resultData['InvNo'];
            var iswork = resultData['work'];

            if (feedback != 1) {
                if(iswork==2){
                    $.notify("Employee has already assigned.", "warning");
                    $("#btnSave").attr('disabled', false);
                    return false;
                }else{
                    $.notify("Job Status Not Updated.", "warning");
                    $("#btnSave").attr('disabled', false);
                    return false;
                }
                
            } else {
                if(iswork==2){
                    $.notify("Employee has already assigned.", "warning");
                    $("#btnSave").attr('disabled', false);
                    return false;
                }else{
                    $.notify("Job Status Successfully Updated.", "success");
                    $("#btnSave").prop('disabled',false);
                    location.reload();
                    return false;
                }
                
            }
        }
    });
});
        var jobNo='';
        jobNo=$("#jNo").val();
        loadInvoicetoPrint(jobNo);
        $("#btnPrint").click(function(){

            
$('#printArea').focus().print();
});

        function loadInvoicetoPrint(JobNo){

        $("#tbl_jobcard_data tbody").html('');
        $.ajax({
                type: "POST",
                url: "../../job/getJobDataById",
                data: { jobNo: JobNo},
                success: function(data)
                {
                    var resultData = JSON.parse(data);

                    $("#lblcusCode").html(resultData.cus_data.CusCode);
                    $("#lblAddress").html(nl2br(resultData.cus_data.Address01)+",<br><br> ");
                    $("#lblCusName").html(resultData.cus_data.RespectSign+". "+resultData.cus_data.CusName);
                    $("#lblpaymentType").html(resultData.cus_data.payType);
                    $("#lblemail").html(resultData.cus_data.Email);
                    
                    $("#lblcusName").html(resultData.vehicle_data.contactName);
                   
                    $("#lblmake").html(resultData.vehicle_data.make);
                    $("#lblmodel").html(resultData.vehicle_data.model);
                    $("#lblFuelType").html(resultData.vehicle_data.fuel_type);
                    $("#lblviNo").html(resultData.vehicle_data.ChassisNo);
                    
                    $("#lblcountry").html(resultData.vehicle_data.body_color);

                    $("#lblcusCode").html(resultData.cus_data.CusCode);
                    $("#lblJobNo").html(resultData.job_data.JobCardNo);
                    $("#lblregNo").html(resultData.job_data.JRegNo);
                    $("#lblnoofjobs").html(resultData.job_count.noofjobs);
                   
                    $("#lblOdo").html(resultData.job_data.OdoIn);
                    $("#lblNextService").html(parseFloat(resultData.job_data.OdoIn)+parseFloat(resultData.job_data.NextService));
                    
                    $("#lblSAName").html(resultData.job_data.serviceAdvisor);
                    $("#lblTel").html(resultData.job_data.advisorContact);
                    $("#lbldate").html(resultData.job_data.appoimnetDate); 
                    $("#lbldelveryDate").html((resultData.job_data.deliveryDate).substring(0, 10)); 
                    $("#lbldelveryTime").html((resultData.job_data.deliveryDate).substring(10, 19)); 

                    for (var i =  0; i < resultData.job_desc.length; i++) {
                         k=(i+1);
                     $("#tbl_jobcard_data tbody").append("<tr><td style='text-align: center;'>" + (k) + "</td><td style='padding-left: 5px;'>" + resultData.job_desc[i].JobDescription + "</td><td>&nbsp;</td><td>&nbsp;</td></tr>");
            
                    }
                    $("#tbl_jobcard_data tbody").append("<tr><td style='height:150px;'></td><td style='height:150px;'></td><td style='height:150px;'></td><td style='height:150px;'></td></tr>");
                    $("#btnPrint").prop('disabled',false);
                }
            });
    }

     function nl2br (str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }
 
</script>