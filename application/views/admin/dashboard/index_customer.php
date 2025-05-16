<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
        <?php
        $cusCode = $_SESSION['cus_code'];
        ?>
    </section>
    <section class="content">
        <?php //echo $dashboard_alert_file_install; ?>
        <div class="row">

            <!-- <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo site_url('admin/job/view_job'); ?>">
            <div class="info-box">
                <span class="info-box-icon bg-maroon"><i class="fa fa-cart-plus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Job Card</span>
                    <span class="info-box-number">Job Card</span>
                </div>
            </div>
            </a>
        </div> -->
             <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo site_url('admin/job/all_estimate'); ?>">
            <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-edit"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Job Estimates</span>
                    <span class="info-box-number">Estimate</span>
                </div>
            </div>
            </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?php echo site_url('admin/payment/view_customer/'. $cusCode); ?>">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Manage Customer</span>
                            <span class="info-box-number"> Customer</span>
                        </div>
                    </div></a>
            </div>
            <!-- <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="<?php echo site_url('admin/AllSalesinvoice'); ?>">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Job Invoices</span>
                    <span class="info-box-number">Invoice</span>
                </div>
            </div>
            </a>
        </div> -->
            <div class="clearfix visible-sm-block"></div>
        </div>
        <div class="row">
        </div>
        <div class="row">
            <div class="col-md-12"></div>
        </div>
    </section>
</div>
