<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
    $cusCode = $_SESSION['cus_code'];
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?php if ($admin_prefs['user_panel'] == true): ?>
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $user_login['firstname'] . $user_login['lastname']; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($admin_prefs['sidebar_form'] == true): ?>
            <!-- Search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control"
                           placeholder="<?php echo lang('menu_search'); ?>...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>

        <?php endif; ?>
        <!-- Sidebar menu -->
        <ul class="sidebar-menu">
            <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
            <?php if (in_array("M1", $blockView) || $blockView == null) { ?>
                <li class="<?= active_link_controller('dashboard') ?>">
                    <a href="<?php echo site_url('admin/dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array("M2", $blockView) || $blockView == null) { ?>
                <li class="treeview <?= active_link_controller('customer') ?>">
<!--                    <a href="#">-->
<!--                        <i class="fa fa-user"></i><span>Customer</span>-->
<!--                        <i class="fa fa-angle-left pull-right"></i>-->
<!--                    </a>-->
<!--                    <ul class="treeview-menu">-->
                        <?php if (in_array("SM21", $blockView) || $blockView == null) { ?>
                            <?php if (!in_array('addcustomer', $block_function)) { ?>
                                <li class="<?= active_link_function('addcustomer') ?>">
                                    <a href="<?php echo site_url('admin/payment/view_customer/'. $cusCode); ?>"><i class="fa fa-user"></i><span>Customer</span></a>
                                </li>
                            <?php }
                        } ?>
<!--                    </ul>-->
                </li>
            <?php } ?>
            <?php if (in_array("M3", $blockView) || $blockView == null) { ?>
                <li class="treeview <?= active_link_controller('job') ?>">
                <li class="<?= active_link_controller('Job') ?>">
                    <a href="<?php echo site_url('admin/job/view_job_customer'); ?>">
                        <i class="fa fa-book">
                        </i> <span>All Job Cards</span>
                    </a>
                </li>
                </li>
                <?php
            } ?>

            <?php if (in_array("M4", $blockView) || $blockView == null) { ?>
                <li class="treeview <?= active_link_controller('Salesinvoice') ?>">
                    <a href="#">
                        <i class="fa fa-book"></i><span>Invoice</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php
                        if (in_array("SM42", $blockView) || $blockView == null) {
                            if (!in_array('all_sales_invoice', $block_function)) { ?>
                                <!--<li class="<?= active_link_function('all_sales_invoice') ?>">-->
                                <!--    <a href="<?php echo site_url('admin/Salesinvoice/all_sales_invoice'); ?>">All Sales-->
                                <!--        Invoice</a>-->
                                <!--</li>-->
                            <?php }
                        }


                        if (in_array("SM45", $blockView) || $blockView == null) { ?>
                            <li class="<?= active_link_function('index') ?>">
                                <a href="<?php echo site_url('admin/AllSalesinvoice/customerWise'); ?>">All Job Invoice</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array("M5", $blockView) || $blockView == null) { ?>
                        <?php if (in_array("SM52", $blockView) || $blockView == null) { ?>
                            <li class="">
                                <a href="<?php echo site_url('admin/job/all_estimate_customer'); ?>"><i class="fa fa-tags"></i> <span>Estimates</a>
                            </li>
                        <?php } ?>
            <?php } ?>

            <?php if (in_array("M8", $blockView) || $blockView == null) { ?>
                <li class="treeview <?= active_link_controller('report') ?>">
                    <a href="#">
                        <i class="fa fa-gratipay"></i><span>Reporting</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
<!--                    <ul class="treeview-menu">-->
<!--                        <li class="--><?//= active_link_controller('report') ?><!--">-->
<!--                            <a href="--><?php //echo site_url('admin/customer/customerreport'); ?><!--">-->
<!--                                <i class="fa fa-gratipay"></i><span>All Customers</span>-->
<!--                            </a>-->
<!--                        </li>-->


<!--                        <li class="--><?//= active_link_controller('report') ?><!--">-->
<!--                            <a href="#"><i class="fa fa-gratipay"></i><span>Job Sale</span>-->
<!--                                <i class="fa fa-angle-left pull-right"></i>-->
<!--                            </a>-->
<!--                            <ul class="treeview-menu">-->
<!--                                <li class="--><?//= active_link_function('jobsalesbydate') ?><!--">-->
<!--                                    <a href="--><?php //echo site_url('admin/report/jobsalesbydate'); ?><!--">Date wise Job sale</a>-->
<!--                                </li>-->
<!--                                <li class="--><?//= active_link_function('jobsalesumbydate') ?><!--">-->
<!--                                    <a href="--><?php //echo site_url('admin/report/jobsalesumbydate'); ?><!--">Job Invoice-->
<!--                                        summery</a>-->
<!--                                </li>-->
<!--                                <li class="--><?//= active_link_function('jobpaymentbyinvoice') ?><!--">-->
<!--                                    <a href="--><?php //echo site_url('admin/report/jobpaymentbyinvoice'); ?><!--">Job Payment-->
<!--                                        summery</a>-->
<!--                                </li>-->


<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li class="--><?//= active_link_controller('report') ?><!--">-->
<!--                            <a href="#"><i class="fa fa-gratipay"></i><span>Pos Sale</span>-->
<!--                                <i class="fa fa-angle-left pull-right"></i>-->
<!--                            </a>-->
<!--                            <ul class="treeview-menu">-->
<!--                                <li class="--><?//= active_link_function('salesbydate') ?><!--">-->
<!--                                    <a href="--><?php //echo site_url('admin/report/salesbydate'); ?><!--">Date wise sale</a>-->
<!--                                </li>-->
<!--                                <li class="--><?//= active_link_function('salesbyproduct') ?><!--">-->
<!--                                    <a href="--><?php //echo site_url('admin/report/salesbyproduct'); ?><!--">Product wise sale</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->




<!--                    <ul class="treeview-menu">-->
<!--                        <li class="--><?//= active_link_controller('report') ?><!--">-->
<!--                            <a href="#"><i class="fa fa-gratipay"></i><span>Payments</span>-->
<!--                                <i class="fa fa-angle-left pull-right"></i>-->
<!--                            </a>-->
<!--                            <ul class="treeview-menu">-->
<!--                                <li class="--><?//= active_link_function('customerpayment') ?><!--">-->
<!--                                    <a href="--><?php //echo site_url('admin/report/customerpayment'); ?><!--">Customer Payments</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
                    <ul class="treeview-menu">
                        <li class="<?= active_link_controller('report') ?>">
                            <a href="#"><i class="fa fa-gratipay"></i><span>Credit</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?= active_link_function('customercredit') ?>">
                                    <a href="<?php echo site_url('admin/report/customercredit'); ?>">Customer Outstanding
                                        Detail</a>
                                </li>
                                <!--<li class="<?= active_link_function('customercredit') ?>">-->
                                <!--    <a href="<?php echo site_url('admin/report/customercreditsummary'); ?>">Customer-->
                                <!--        Outstanding Summary</a>-->
                                <!--</li>-->
                            </ul>
                        </li>
                    </ul>


                </li>
            <?php } ?>

        </ul>
    </section>
</aside>
