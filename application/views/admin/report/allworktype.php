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
                                
                                    <div class="col-md-4">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="form-control" name="startdate"  value="<?php echo date("Y-m-d") ?>"/>
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="form-control" name="enddate"  value="<?php echo date("Y-m-d") ?>"/>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-3">
                                        <select class="form-control" name="route" id="route"  multiple="multiple">
                                            <option value="">--select location--</option>
                                            <?php foreach ($locations AS $loc) { ?>
                                                <option value="<?php echo $loc->location_id ?>"><?php echo $loc->location ?></option>
                                            <?php } ?>
                                        </select>
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
                                <th style="width: 100px;">Date</th>
                                <?php foreach ($jobtypes as $jobtype): ?>
                                    <th><?= htmlspecialchars($jobtype->jobtype_name) ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                
                                
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
    var dep = 0;
    var subdep = 0;
    $("#subcategory").select2({
        placeholder: "Select a model"
    });

    var sub = [];
    $("#subcategory").change(function() {
        sub.length = 0;

        $("#subcategory :selected").each(function() {
            sub.push($(this).val());
        });
        $("#subcategory_ar").val(JSON.stringify(sub));
    });

    $("#route").select2({
        placeholder: "Select a location"
    });
    var loc = [];
    $("#route").change(function() {
        loc.length = 0;

        $("#route :selected").each(function() {
            loc.push($(this).val());
        });
        $("#route_ar").val(JSON.stringify(loc));
    });

    $('#product').select2();

   $('#filterform').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: "loadAllWorkType",
            data: $(this).serialize(),
            success: function(data) {
                var response = JSON.parse(data);
                drawTable(response.grouped);
            }
        });
    });

    function drawTable(groupedData) {
        $('#saletable tbody').empty();

        const jobtypes = <?php echo json_encode(array_map(function($jt) {
            return $jt->jobtype_name;
        }, $jobtypes)); ?>;


        const jobtypeTotals = {};
        jobtypes.forEach(jt => jobtypeTotals[jt] = 0);

        for (const date in groupedData) {
            const row = $("<tr/>");
            row.append($("<td/>").text(date));

            jobtypes.forEach(function(jobtype) {
                const amount = parseFloat(groupedData[date][jobtype] || 0);
                jobtypeTotals[jobtype] += amount;
                row.append($("<td/>").text(amount.toFixed(2)));
            });

            $('#saletable tbody').append(row);
        }

    
        const totalRow = $("<tr/>");
        totalRow.append("<th>Total</th>");
        jobtypes.forEach(function(jobtype) {
            totalRow.append(
                $("<th style='text-align:right; color:#00aaf1;'/>").text(jobtypeTotals[jobtype].toFixed(2))
            );
        });

        $('#saletable tfoot').html(totalRow);
    }



  function updateTotal(groupedData, jobtypes) {
        let grandTotal = 0;

        for (const date in groupedData) {
            jobtypes.forEach(jobtype => {
                const amount = parseFloat(groupedData[date][jobtype] || 0);
                grandTotal += amount;
            });
        }

        $('#ntsale').html(grandTotal.toFixed(2));
    }


    function sumcolumn(rclass) {
        var sum = 0;
        var elemnt = document.getElementsByClassName(rclass);
        $(elemnt).each(function() {
            var value = accounting.unformat($(this).text());

            if (!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
        });
        return sum;
    }

    function loadprint() {
        $('.modal-content').load('<?php echo base_url() ?>admin/report/', function(result) {
            $('#salesbydateprint').modal({show: true});
        });
    }
    function printdiv() {
        $("#saletable").print({
            prepend: "<h3 style='text-align:center'>Product vise Sales Report</h3><hr/>",
            title: 'Date vise Sales Report'
        });
    }

    function formatDate(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var day = date.getDate();
        var month = (date.getMonth() + 1);
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12;
        hours = hours < 10 ? '0' + hours : hours;
        day = day < 10 ? '0' + day : day;
        month = month < 10 ? '0' + month : month;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return  date.getFullYear() + "-" + month + "-" + day + " " + strTime;
    }

    $("#department").select2({
        placeholder: "Select a Department",
        allowClear: true,
        ajax: {
            url: "departmentjson",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 2
    });
    $("#department").change(function() {
        dep = $("#department option:selected").val();
        $("#subdepartment").select2('val', '');

    });

    $("#subdepartment").change(function() {
        subdep = $("#subdepartment option:selected").val();
        $("#subcategory").select2('val', '');

    });

    $("#subdepartment").select2({
        placeholder: "Select a Sub Department",
        allowClear: true,
        ajax: {
            url: "subdepartmentjson",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    dep: dep
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 2
    });

    $("#subcategory").select2({
        placeholder: "Select a sub Category",
        allowClear: true,
        ajax: {
            url: "subcategoryjson",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    dep: dep,
                    subdep: subdep
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 2
    });
 $("#saletable").freezeHeader();
</script>