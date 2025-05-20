<form id="vehicleaddform">
	<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-power-off myclose"></i></button>
        <h4>Edit Vehicle <b><?php echo $vehicleId; ?> - <span id="regNoName"></span></b></h4>
    </div>
    <div class="modal-body">


    <div class="row" style="background: rgba(121, 191, 130, 0.37);">
            <!-- First Row -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="contactName">Contact Name</label>
                    <input type="text" class="form-control" name="contactName" id="contactName" placeholder="Enter Contact name" value="<?php //echo $vdata->contactName; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="regNo">Reg No</label>
                    <input type="text" required class="form-control" name="regNo" id="regNo" value="<?php //echo $vdata->RegNo; ?>" placeholder="Enter Registration No">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="engineNo">Service Interval (Km)</label>
                    <input type="text" class="form-control" name="engineNo" value="<?php //echo $vdata->EngineNo; ?>" id="engineNo" placeholder="km">
                </div>
            </div>
        </div>

        <div class="row" style="background: rgba(121, 191, 130, 0.37);">
            <!-- Second Row -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="milage">Mileage (Km)</label>
                    <input type="text" class="form-control" name="milage" id="milage" placeholder="Enter Mileage">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="chassisNo">Chassis No</label>
                    <input type="text" class="form-control" name="chassisNo" id="chassisNo"  placeholder="Enter Chassis No">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="make">Make</label>
                    <div class="input-group">
                        <select class="form-control" name="make" id="make1" required>
                            <?php foreach ($make as $mkval) { ?>
                                <option value="<?php echo $mkval->make_id ?>"><?php echo $mkval->make ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-btn">
                            <button class="btn btn-warning" id="addMake1">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="input-group" id="panel_make1">
                    <input type="text" class="form-control pull-right" name="makeName" id="makeName1">
                    <span class="input-group-btn"><button class="btn btn-primary" id="saveMake1">Add</button></span>
                </div>
            </div>
        </div>

        <div class="row" style="background: rgba(121, 191, 130, 0.37);">
            <!-- Third Row -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="model">Model</label>
                    <div class="input-group">
                        <select class="form-control" name="model" id="model1" required></select>
                        <div class="input-group-btn">
                            <button class="btn btn-warning" id="addModel1">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="input-group" id="panel_model1">
                    <input type="text" class="form-control pull-right" name="modelName" id="modelName1">
                        <span class="input-group-btn"><button class="btn btn-primary" id="saveModel1">Add</button></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="register">Date of Registration</label>
                    <input type="date" class="form-control" name="registerDate" id="registerDate">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fuel">Fuel Type</label>
                    <div class="input-group">
                        <select class="form-control" name="fuel" id="fuel1">
                            <option value="">-select-</option>
                            <?php foreach ($fuel as $fval) { ?>
                                <option value="<?php echo $fval->fuel_typeid ?>"><?php echo $fval->fuel_type ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-btn">
                            <button class="btn btn-warning" id="addFuel1">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="input-group" id="panel_fuel1">
                    <input type="text" class="form-control pull-right" name="fuelName" id="fuelName1">
                        <span class="input-group-btn"><button class="btn btn-primary" id="saveFuel1">Add</button></span>
                </div>
            </div>
        </div>

        <div class="row" style="background: rgba(121, 191, 130, 0.37);">
            <!-- Fourth Row -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="manYear">Year of Manufacture</label>
                    <div class="input-group">
                        <select class="form-control" name="manufactureYear" id="manufactureYear">
                            <option value="">-select-</option>
                            <?php foreach ($year as $fval) { ?>
                                <option value="<?php echo $fval->year_id ?>"><?php echo $fval->year ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-btn">
                            <button class="btn btn-warning" id="addmanYear">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="input-group" id="panel_manYear">
                    <input type="text" class="form-control pull-right" name="manYearName" id="manYearName">
                        <span class="input-group-btn"><button class="btn btn-primary" id="savemanYear">Add</button></span>
                </div>
            </div>
            <div class="col-md-4">
               
                <div class="form-group">
                    <label for="domastric">Domestic</label>
                    <div class="input-group">
                        <select class="form-control" name="domostric" id="domostric">
                            <option value="">-select-</option>
                            <?php foreach ($domostrics as $fval) { ?>
                                <option value="<?php echo $fval->dom_id ?>"><?php echo $fval->domastric ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-btn">
                            <button class="btn btn-warning" id="addDom">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="input-group" id="panel_dom">
                    <input type="text" class="form-control pull-right" name="domName" id="domName">
                        <span class="input-group-btn"><button class="btn btn-primary" id="saveDom">Add</button></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="color">Color</label>
                    <div class="input-group">
                        <select class="form-control" name="codeColor" id="codeColor">
                            <option value="">-select-</option>
                            <?php foreach ($color as $fval) { ?>
                                <option value="<?php echo $fval->bodycolor_id ?>"><?php echo $fval->body_color ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group-btn">
                            <button class="btn btn-warning" id="addcolor">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="input-group" id="panel_color">
                    <input type="text" class="form-control pull-right" name="colorName" id="colorName">
                    <span class="input-group-btn"><button class="btn btn-primary" id="saveColor">Add</button></span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
    	<input type="hidden" name="cusCode"  value="<?php echo $vdata->CusCode; ?>" />
        <input type="hidden" name="vehicleId" id="vehicleId" value='<?php echo $vehicleId; ?>' />
        <button id="btnsave" class="btn btn-success btn-flat" type="submit">Update vehicle</button>
    </div>
</form>
<script type="text/javascript">
$("#panel_make1").hide();
$("#panel_model1").hide();
$("#panel_fuel1").hide();
$("#panel_color").hide();
$("#panel_manYear").hide();
$("#panel_dom").hide();
$("#saveModel1").prop('disabled',false);
$("#addModel1").prop('disabled',false);
var makeid=1;

$.ajax({
    url:'<?php echo base_url('admin/customer/loadmodelbymake') ?>/'+makeid,
    type:'GET',
    dataType: 'json',
    success: function (data) {
        $.each(data,function(k,v) {
            $('#model1').append('<option value="'+v.model_id+'">'+v.model+'</option>');
        });
            if(makeid=='' || makeid==0){
                $("#saveModel1").prop('disabled',true);
                $("#addModel1").prop('disabled',true); 
            }else{
                $("#saveModel1").prop('disabled',false);
                $("#addModel1").prop('disabled',false); 
            }
    }
});

  var vregno = $('#vehicleId').val();
        if(vregno =='' ){
            $('#vdatapart').hide();
        } else {
            $('#vdatapart').show();
            $.ajax({
                url:"<?php echo base_url('admin/customer/selectVehicledatajson/') ?>",
                type: "POST",
                data:{vno:vregno},
                dataType:'json',
                success: function(data) {

                    console.log('data',data);
                    
                    $('#vehicleId').val(data.vehicledata.VehicleId);
                    $('#contactName').val(data.vehicledata.contactName);
                    $('#regNo').val(data.vehicledata.RegNo);
                    $('#regNoName').html(data.vehicledata.RegNo);
                    $('#chassisNo').val(data.vehicledata.ChassisNo);
                    $('#engineNo').val(data.vehicledata.EngineNo);
                    $('#make1').val(data.vehicledata.Make);
                    $('#model1').val(data.vehicledata.Model);
                    $('#fuel1').val(data.vehicledata.FuelType);
                    $('#codeColor').val(data.vehicledata.Color);
                    $('#milage').val(data.vehicledata.Milage);
                    $('#registerDate').val(data.vehicledata.RegisterDate);
                    $('#domostric').val(data.vehicledata.Domostric);
                    $('#manufactureYear').val(data.vehicledata.ManufactureYear);
                   
                }
        });
            }



	$('#vehicleaddform').submit(function(e) {
		e.preventDefault();
		 $.ajax({
            url:'<?php echo base_url('admin/customer/editsavevehicle/') ?>',
            type:'POST',
            data: $(this).serializeArray(),
            success: function (data) {
                if(data == 'success') {
                     $('#customermodal').modal('hide');
                }
            }
        });
	});
    
	$('#make1').on('change', function() {
        $('#model1').empty().append('<option value="">-select-</option>');
        makeid = $("#make1 option:selected").val();
        $.ajax({
            url:'<?php echo base_url('admin/customer/loadmodelbymake') ?>/'+makeid,
            type:'GET',
            dataType: 'json',
            success: function (data) {
                $.each(data,function(k,v) {
                    $('#model1').append('<option value="'+v.model_id+'">'+v.model+'</option>');
                });
                    if(makeid=='' || makeid==0){
                        $("#saveModel1").prop('disabled',true);
                        $("#addModel1").prop('disabled',true); 
                    }else{
                        $("#saveModel1").prop('disabled',false);
                        $("#addModel1").prop('disabled',false); 
                    }
            }
        });
    });


    $('#addMake1').click(function(e) {
        $("#panel_make1").show();
        $("#makeName1").focus();
        e.preventDefault();
    });

    $('#saveMake1').click(function(e) {
        var make = $("#makeName1").val();
        $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>" + "admin/master/addMake",
                data: {department:make},
                success: function (json) {
                    var resultData = JSON.parse(json);
                    var feedback = resultData['result'];
                    var val = resultData['make_id'];
                    var dec = resultData['make'];

                    if (feedback == true) {
                        $("#make1").append("<option value='"+val+"'>"+dec+"</option>");
                        $("#makeName1").val('');
                        $("#panel_make1").hide();
                     }
                },
                error: function () {
                    alert('Error while request..');
                }
            });
        e.preventDefault();
    });

    $('#addModel1').click(function(e) {
        $("#panel_model1").show();
        $("#modelName1").focus();
        e.preventDefault();
    });

    $('#saveModel1').click(function(e) {
        makeid = $("#make1 option:selected").val();
        var model = $("#modelName1").val();
        var chassi = $('#chassisNo').val();
        var model_code  = chassi.substr(3,6);
        if(makeid!='' || makeid!=0){
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>" + "admin/master/addModel",
                data: {department1:makeid,subdepartment:model, model_code:model_code},
                success: function (json) {
                    var resultData = JSON.parse(json);
                    var feedback = resultData['result'];
                    var val = resultData['id'];
                    var dec = resultData['model'];

                    if (feedback == true) {
                        $("#model1").append("<option value='"+val+"'>"+dec+"</option>");
                        $("#modelName1").val('');
                        $("#panel_model1").hide();
                     }
                },
                error: function () {
                    alert('Error while request..');
                }
            });
        }else{
            $.notify("Please select a make.", "warning");
        }
        e.preventDefault();
    });


    $('#addFuel1').click(function(e) {
        $("#panel_fuel1").show();
        $("#fuelName1").focus();
        e.preventDefault();
    });

    $('#addcolor').click(function(e) {
        $("#panel_color").show();
        $("#colorName").focus();
        e.preventDefault();
    });
    $('#addmanYear').click(function(e) {
        $("#panel_manYear").show();
        $("#manYearName").focus();
        e.preventDefault();
    });
    $('#addDom').click(function(e) {
        $("#panel_dom").show();
        $("#domName").focus();
        e.preventDefault();
    });

    $('#saveColor').click(function(e) {
        var fuel = $("#colorName").val();
        $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>" + "admin/master/addColor",
                data: {department:fuel},
                success: function (json) {
                    var resultData = JSON.parse(json);
                    var feedback = resultData['result'];
                    var val = resultData['bodycolor_id'];
                    var dec = resultData['body_color'];

                    if (feedback == true) {
                        $("#codeColor").append("<option value='"+val+"'>"+dec+"</option>");
                        $("#colorName").val('');
                        $("#panel_color").hide();
                     }
                },
                error: function () {
                    alert('Error while request..');
                }
            });
        e.preventDefault();
    });

    $('#savemanYear').click(function(e) {
        var fuel = $("#manYearName").val();
        $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>" + "admin/master/addmanYear",
                data: {department:fuel},
                success: function (json) {
                    var resultData = JSON.parse(json);
                    var feedback = resultData['result'];
                    var val = resultData['year_id'];
                    var dec = resultData['year'];

                    if (feedback == true) {
                        $("#manufactureYear").append("<option value='"+val+"'>"+dec+"</option>");
                        $("#manYearName").val('');
                        $("#panel_fuel1").hide();
                     }
                },
                error: function () {
                    alert('Error while request..');
                }
            });
        e.preventDefault();
    });

    $('#saveDom').click(function(e) {
        var fuel = $("#domName").val();
        $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>" + "admin/master/addDom",
                data: {department:fuel},
                success: function (json) {
                    var resultData = JSON.parse(json);
                    var feedback = resultData['result'];
                    var val = resultData['dom_id'];
                    var dec = resultData['domostric'];

                    if (feedback == true) {
                        $("#domostric").append("<option value='"+val+"'>"+dec+"</option>");
                        $("#domName").val('');
                        $("#panel_dom").hide();
                     }
                },
                error: function () {
                    alert('Error while request..');
                }
            });
        e.preventDefault();
    });

    $('#saveFuel1').click(function(e) {
        var fuel = $("#fuelName1").val();
        $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>" + "admin/master/addFuel",
                data: {department:fuel},
                success: function (json) {
                    var resultData = JSON.parse(json);
                    var feedback = resultData['result'];
                    var val = resultData['fuel_id'];
                    var dec = resultData['fuel_type'];

                    if (feedback == true) {
                        $("#fuel1").append("<option value='"+val+"'>"+dec+"</option>");
                        $("#fuelName1").val('');
                        $("#panel_fuel1").hide();
                     }
                },
                error: function () {
                    alert('Error while request..');
                }
            });
        e.preventDefault();
    });


// $('#chassisNo').keyup(function(){
//     var chassisNo =$(this).val();
//     //chassino_validate(chassisNo);
//     var chassi_length = chassisNo.length;

//     if(chassi_length==9){

//         getModelName(chassisNo.substr(3,6));
//     }
// });

// $('#chassisNo').blur(function(){
//     var chassisNo =$(this).val();
//     var chassi_length = chassisNo.length;

//     if(chassi_length>17 || chassi_length<17){
//         $.notify("Invalid Chassis Number", "warning");
//         $('#chassisNo').attr('background-color','#f00');
//         return false;
//     }else{
//         $('#chassisNo').attr('background-color','#fff');
//     }

//     getModelName(chassisNo.substr(3,6));
    
//     check_chassis(chassisNo);
// });

$('#regNo').blur(function(){
    var regNo =$(this).val();
    check_regno(regNo);
});


function check_chassis(ch){
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>" + "admin/customer/check_chassi",
            data: {chassis:ch},
            success: function (json) {
                if(json==1){
                    $.notify("Chassis no already exist.", "warn");
                    $("#btnsave").prop('disabled', true);
                    var r = confirm('Chassis no already exist. Do you want to save this vehicle for new customer ?');
                     if (r === true) {
                        $("#btnsave").prop('disabled', false);
                     }else{
                        $("#btnsave").prop('disabled', true);
                     }
                } else{
$("#btnsave").prop('disabled', false);
                }
            },
            error: function () {
                $.notify("Chassis no not available.", "warn");
            }
        });
    }

    function check_regno(regno){
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>" + "admin/customer/check_regno",
            data: {regno:regno},
            success: function (json) {
                if(json==1){
                    $.notify("Vehicle no already exist.", "warn");
                    $("#btnsave").prop('disabled', true);
                    var r = confirm('Vehicle No already exist. Do you want to save this vehicle for new customer ?');
                     if (r === true) {
                        $("#btnsave").prop('disabled', false);
                     }else{
                        $("#btnsave").prop('disabled', true);
                     }
                } else{
                    $("#btnsave").prop('disabled', false);
                }
            },
            error: function () {
                $.notify("Vehicle not available.", "warn");
            }
        });
    }

    function getModelName(code){
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>" + "admin/master/getModelByCode",
            data: {chassi:code},
            success: function (json) {
                $("#model1").val(json);
            },
            error: function () {
                alert('Error while request..');
            }
        });
    }

    function chassino_validate(chassino){

    var chassi =chassino.trim();
    chassi= chassi.toUpperCase();
    var model  = chassi.substr(3,6);
    var getmake = chassi.substr(1,1);
    var make=0;

    switch (getmake) {
        case 'A':
            make = 2;
            $("#make1").val(make);
            break;
        case 'B':
            make =4; $("#make1").val(make);
            break;
        case 'H':
            make = 5; $("#make1").val(make);
            break;
        case 'D':
            make = 1; $("#make1").val(make);
            break;
        case 'N':
            make = 9; $("#make1").val(make);
            break;
        case 'T':
            make = 3; $("#make1").val(make);
            break;
        case 'V':
            make = 11; $("#make1").val(make);
            break;
    }

    }
</script>