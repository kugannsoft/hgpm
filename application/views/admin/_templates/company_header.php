

<table style="border-collapse:collapse;width:700px;margin:5px;font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;" border="0">
    <tr style="text-align:left;font-size:35px;font-family: Arial, Helvetica, sans-serif;">
        <td rowspan="4">
            <?php $logo =  $company['Logo']; ?>
            <img style="width:150px; height:80px;margin-left:40px;" src="<?php echo base_url($avatar_dir . '/'.$logo); ?>" alt="logo">
        </td>
        <td colspan="5" style="font-size:20px;font-family: Arial, Helvetica, sans-serif;text-align: right;"><b><?php echo $company['CompanyName'] ?> <?php echo $company['CompanyName2'] ?></b></td>
    </tr> 

    <tr style="text-align:right;color:#9a9494 !important;font-size:12px;font-family: Arial, Helvetica, sans-serif;">
        <td colspan="5"><?php echo $company['AddressLine01'] ?> <?php echo $company['AddressLine02'] ?> <?php echo $company['AddressLine03'] ?></td>
    </tr>

    <tr style="text-align:right;color:#9a9494 !important;font-size:12px;font-family: Arial, Helvetica, sans-serif;">
        <td colspan="5"><?php echo $company['LanLineNo'] ?>, <?php echo $company['Fax'] ?>, <?php echo $company['MobileNo'] ?>,0710 378 378</td>
    </tr>

    <tr style="text-align:right;color:#9a9494 !important;font-size:12px;font-family: Arial, Helvetica, sans-serif;">
        <td colspan="5"><?php echo $company['Email01'] ?></td>
    </tr>
    <tr style="text-align:right;color:#9a9494 !important;font-size:12px;font-family: Arial, Helvetica, sans-serif;">
        <td colspan="5">VAT NO:103338034 - 7000</td>
    </tr>
</table>
