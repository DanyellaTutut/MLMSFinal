<?php

require ("controller/connection.php");
require('controller/viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');



if (isset($_POST['btnSubmit']))
      {

    //echo "Record sucessfully saved";
    $tfTypeName = $_POST['tfTypeName'];
    $tfNoOfLot = $_POST['tfNoOfLot'];
    $tfSellingPrice = $_POST['tfSellingPrice'];
    $tfStatus = $_POST['tfStatus'];
    
    
    $createtypes =  new createTypes();
    $createtypes->Create($tfTypeName,$tfNoOfLot,$tfSellingPrice,$tfStatus);
      }
    
if (isset($_POST['btnSave']))
      {

    //echo "Record sucessfully saved";
    $tfTypeID = $_POST['tfTypeID'];
    $tfTypeName = $_POST['tfTypeName'];
    $tfNoOfLot = $_POST['tfNoOfLot'];
    $tfSellingPrice = $_POST['tfSellingPrice'];
    
    
    
    $updatetype =  new updateType();
    $updatetype->update($tfTypeID,$tfTypeName,$tfNoOfLot,$tfSellingPrice);
      }
      
if (isset($_POST['btnDeactivate']))
      {

    //echo "Record sucessfully saved";
    $tfTypeID = $_POST['tfTypeID'];
    
    //$status = $_POST['status'];
    
    $deactivateType =  new deactivateType();
    $deactivateType->deactivate($tfTypeID);
      }


    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MLMS-Unit Management</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">


    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css" />
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <script src="../vendors/jquery/dist/jquery.min.js"></script>

      <style type="text/css">
          #lotMap {
            position: relative;
          }

          .lot {
            float: left;
            //background: #2db34a;
            //border: 2px solid black;
            border-radius: 4px;
            height: 90px;
            line-height: 120px;
            position: relative;
            text-align: center;
            width: 80px;
            color: #fff;
            margin: 10px;
          }
          .circle {
            float: left;
            border: 0px solid black;
            border-radius: 50%;
            height: 50px;
            line-height: 120px;
            position: relative;
            text-align: center;
            width: 50px;
            color: #fff;
            margin: 8%;//10px;
          }

          .available {
            background: #66BB6A;

          }
          .reserved {
            background: #64B5F6;
          }
          .owned {
            background: #C62828;
          }
      </style>
        
        <script>
            function validateNumber(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode == 8 || (charCode >= 48 && charCode <= 57)){
                    return true;
                    }else{
                    return false;
                    }
                }
            
            $(function(){
              $('body').on('change', '#selectSection', function(){
                $('#selectBlock').html('');
                $('#lotMap').html('');
                thisSectionID = $(this).val();
                $.get("getData.php?fnName=getBlock&intSectionID="+thisSectionID, function(data){
                  if(data != 0) {
                    arrayData = data.split(",");
                    $('#selectBlock').append("<option selected disabled>Choose Block</option>");
                    for(var i=0; i<arrayData.length-1; i+=3){
                      $('#selectBlock').append("<option value="+arrayData[i]+" lot="+arrayData[i+2]+">"+arrayData[i+1]+"</option>");
                    }
                  }
                });
              });

              $('body').on('change', '#selectBlock', function(){
                thisBlockID = $(this).val();                
                $.get("getData.php?fnName=getLot&intBlockID="+thisBlockID, function(data){
                  if(data != 0) {
                    arrayData = data.split(",");
                    for(var i=0; i<arrayData.length-1; i+=3){
                      intLotStatus = arrayData[i+2];
                      switch (intLotStatus) {
                        case '0': lotStatus = "available"; break;
                        case '1': lotStatus = "reserved"; break;
                        case '2': lotStatus = "owned"; break;
                        default: break;
                      }
                      $('#lotMap').append("<div class='lot "+lotStatus+"' id="+arrayData[i]+" lotStatus="+intLotStatus+">"+arrayData[i+1]+"</div>");
                    }
                  }
                });
              });

              $('body').on('change', '#selectAshBlock', function(){
                $('#selectLevel').html('');
                //$('#containerLevel').html('');
                $('#levelMap').html('');
                thisAshID = $(this).val();
                $.get("getData.php?fnName=getLevel&intAshID="+thisAshID, function(data){
                  if(data != 0) {
                    arrayData = data.split(",");
                    $('#selectLevel').append("<option selected disabled>Choose Level</option>");
                    for(var i=0; i<arrayData.length-1; i+=4){
                      $('#selectLevel').append("<option value="+arrayData[i]+" unit="+arrayData[i+2]+" price="+arrayData[i+3]+">"+arrayData[i+1]+"</option>");
                      //$('#containerLevel').append("<div class='panel panel-success' style='margin-bottom:0px;'><div class='panel-body' id=''></div></div>");
                    }
                  }
                });
              });

              $('body').on('change', '#selectLevel', function(){
                thisLevelAshID = $(this).val();       
                $.get("getData.php?fnName=getAsh&intLevelAshID="+thisLevelAshID, function(data){alert(data);
                  if(data != 0) {
                    for(var i=0; i<arrayData.length-1; i+=4){
                      intUnitStatus = arrayData[i+2];
                      switch (intUnitStatus) {
                        case '0': unitStatus = "available"; break;
                        case '1': unitStatus = "reserved"; break;
                        case '2': unitStatus = "owned"; break;
                        default: break;
                      }
                      $('#levelMap').append("<div class='lot "+unitStatus+"' id="+arrayData[i]+" unitStatus="+intUnitStatus+" intCapacity="+arrayData[i+3]+">"+arrayData[i+1]+"</div>");
                    }
                  }
                });
              });

              $('body').on('click', '.lot', function(){
                $('#popUpWindow').modal('show');
              });
            });
        </script>   
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php require("sidemenu.php");
                  require("topnav.php");  ?>
        <!-- page content -->
        <div class="right_col" role="main">

              <div class="col-md-12">
                        <div class="panel panel-success ">
                                    
                            <div class="panel-body">
                                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Lot-Unit</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">AshCrypt-Unit</a>
                        </li>
                      
                      </ul>
                      <div id="myTabContent2" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">

                                <div class="col-md-4">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Select Lot</b></H3>
                                        </div><!-- /.panel-heading -->
                     
                                        <div class="panel-body">
                                             <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Section</label>
                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" id="selectSection">
                                                  <option selected disabled>Choose Section</option>
                                                  <?php
                                                    $sql = "Select * from tblsection WHERE intStatus = 0 ORDER BY strSectionName ASC";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result = mysql_query($sql,$conn);
                                                    
                                                    while($row = mysql_fetch_array($result))
                                                      { 
                                                        $intSectionID = $row['intSectionID']; 
                                                        $strSectionName = $row['strSectionName'];
                                                        $intNoOfBlock = $row['intNoOfBlock'];
                                                        $intStatus = $row['intStatus']; 
                                                        echo "<option value=$intSectionID>$strSectionName</option>";
                                                      }
                                                  ?>
                                                </select>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Block</label>
                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" id="selectBlock">
                                                  <option selected disabled>Choose Block</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                    </div>

                                   <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Legends :</b></H3>
                                        </div><!-- /.panel-heading -->
                                        <center>
                                        <div class="panel-body">
                                            <div class="circle available col-md-1">
                                            </div>
                                            <div class="circle reserved col-md-4">
                                            </div>
                                            <div class="circle owned col-md-8">
                                            </div>
                                        </div>
                                </div>
                                </div>

                                  <div class="col-md-8">
                                    <div class="panel panel-success">
                                        <div class="panel-body" id="lotMap">
                                        </div>
                                    </div>
                                </div>
                         
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                          <div class="col-md-4">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Select Ashcrypt</b></H3>
                                        </div><!-- /.panel-heading -->
                     
                                        <div class="panel-body">
                                             <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Block</label>
                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" id="selectAshBlock">
                                                  <option selected disabled>Choose Block</option>
                                                  <?php
                                                    $sql = "Select * from tblashcrypt WHERE intStatus = 0 ORDER BY strAshName ASC";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result = mysql_query($sql,$conn);
                                                    
                                                    while($row = mysql_fetch_array($result))
                                                      { 
                                                        $intAshID = $row['intAshID']; 
                                                        $strAshName = $row['strAshName'];
                                                        $intNoOfLevel = $row['intNoOfLevel'];
                                                        $intStatus = $row['intStatus']; 
                                                        echo "<option value=$intAshID intNoOfLevel=$intNoOfLevel>$strAshName</option>";
                                                      }
                                                  ?>
                                                </select>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" id="selectLevel">
                                                  <option selected disabled>Choose Level</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                    </div>

                                   <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Legends :</b></H3>
                                        </div><!-- /.panel-heading -->
                                        <center>
                                        <div class="panel-body">
                                            <div class="circle available">
                                            </div>
                                            <div class="circle reserved">
                                            </div>
                                            <div class="circle owned">
                                            </div>
                                        </div>
                                </div>
                                </div>
                                <div class="col-md-8" id="containerLevel">
                                    <div class="panel panel-success">
                                        <div class="panel-body" id="levelMap">
                                        </div>
                                    </div>
                                </div>
                        </div>
                      </div>
                    </div>


                            </div>
                        </div>
              </div>
        
            </div><!--/page content-->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            MLMS-Design 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
          </div>


        </div>
  </body>

  <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>

    <script src="js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
     <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  <script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

      <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a Customer",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

    <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->

     <script>
        $('#tfPriceCreate').mask('000000000000.00',{reverse:true});
        $('.tfPriceUpdate').mask('000000000000.00',{reverse:true});
 </script>  


     
  
  <div class = "modal fade" id = "popUpWindow">
    <div class = "modal-dialog" style = "width:90%; height: 80%; ">
       <div class = "modal-content">
         <!--header-->
          
          <div class = "modal-header" style="background:#b3ffb3;">
          <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
          <center><h3 class = "modal-title">Manage Unit</h3></center>
         </div>
                        
         <!--body (form)-->
         <div class = "modal-body">
                    
                          
           <form class="form-horizontal" role="form" action = "reservation.php" method= "post">             
                  
      
                      
                 <div class="row">
                       <div class=  "col-lg-12">
                          <div class="panel panel-default">
                        
                                <div class="panel-body">
                                     
                                     <legend><h3>Owner Name: Protacio,Juan D.</h3></legend>


               <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#addDead" id="addDead-tab" role="tab" data-toggle="tab" aria-expanded="true">ADD DECEASED</a>
                        </li>
                        <li role="presentation" class=""><a href="#transferDead" role="tab" id=transferDead-tab" data-toggle="tab" aria-expanded="false">TRANSFER DECEASED</a>
                        </li>
                        <li role="presentation" class=""><a href="#transferOwn" role="tab" id="transferOwn-tab2" data-toggle="tab" aria-expanded="false">TRANFER OWNERSHIP</a>
                        </li>
                      </ul>

                      
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="addDead" aria-labelledby="home-tab">
                          <legend>Add Deceased</legend>

                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Interment <span class="required">*</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                          </div>



                        </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="transferDead" aria-labelledby="profile-tab">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="transferOwn" aria-labelledby="profile-tab">
                          <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level
                           wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk </p>
                        </div>
                      </div>
                    </div>

                            </div>
                           </div> <!--PANEL BODY-->
                 
              </div>
            </div><!--/modal 2-->
  </body>
</html>