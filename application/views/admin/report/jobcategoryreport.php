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
                                <div class="col-md-4">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="form-control" name="startdate" value="<?php echo date("Y-m-d") ?>"/>
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="form-control" name="enddate" value="<?php echo date("Y-m-d") ?>"/>
                                    </div>
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
                        
                    <table id="reportTable" border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%; text-align: center;">
                            <thead style="background-color: #f2f2f2;">
                                <tr>
                                    <th>Job Section \ Make</th>
                                    <?php foreach ($makes as $make): ?>
                                        <th><?= htmlspecialchars($make->make) ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jobsections as $section): ?>
                                    <tr>
                                        <td style="text-align: left;"><?= htmlspecialchars($section->JobSection) ?></td>
                                        <?php foreach ($makes as $make): ?>
                                            <td id="jobcard-<?= $section->JobSecNo ?>-<?= $make->make_id ?>">
                                                <?= $report_matrix[$section->JobSection][$make->make] ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
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

        var startdate = $("input[name='startdate']").val();
        var enddate = $("input[name='enddate']").val();

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('admin/report/loadjobcategoryreport'); ?>",
            data: {
                startdate: startdate,
                enddate: enddate,
               
            },
            success: function (data) {
                $('#reportTable tbody').empty();

                drawTable(JSON.parse(data));
            }
        });
    });

    function drawTable(data) {
        data.forEach(function(rowData) {
            var row = $("<tr/>");
            row.append("<td style='text-align: left;'>" + rowData.JobSection + "</td>");

            <?php foreach ($makes as $make): ?>
                var makeName = "<?= $make->make ?>";
                var jobCardCount = rowData.makes[makeName] || 0;  
                row.append("<td>" + jobCardCount + "</td>");
            <?php endforeach; ?>

        
            $('#reportTable tbody').append(row);
        });
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
            prepend:"<h3 style='text-align:center'>Job Invoice Summury by date Report</h3><hr/>",
            title:'Date vise Sales Report'
        });
    }
     $("#saletable").freezeHeader({'height': '600px'});
</script>