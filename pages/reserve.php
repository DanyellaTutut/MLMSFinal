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

    <title>MLMS-Unit Avail</title>

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
          .ashcrypt {
            //float: left;
            //background: #2db34a;
            border-left: none;
            border-radius: 4px;
            height: 80px;
            line-height: 120px;
            text-align: center;
            width: 80px;
            color: #fff;
            margin: 5px;
            margin-left: 6px; 
            display: inline-block;
          }
          .circle {
            height: 50px;
            width: 50px;
            white-space: nowrap;
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            border-radius: 50%;
            color: #fff;
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

          .ash {
            //background: #F5F7FA;
            //height: 92px;
            border-bottom: 2px solid #E6E9ED;
            white-space: nowrap;
            display:inline-block;
            position: relative;
          }

           .ash:first-child {
            border-top: 2px solid #E6E9ED;
            //margin-left: 10px;
            //margin-top: 10px;
          }

          .ash .ashcrypt:first-child {
            color: #333;
          }

          #levelMap {
            overflow-x: auto;
            overflow-y: auto;
            max-width: 100%;
            display: inline-block;
          }

          .ash .lot {
            display: inline-block;
          }

      </style>
        
        <script>
        $( document ).ready(function() {
            $('.containerLevelMap').width($('.ash').width());
        });
            function validateNumber(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode == 8 || (charCode >= 48 && charCode <= 57)){
                    return true;
                    }else{
                    return false;
                    }
                }

            function addAsh(idLevel) {
              aler(idLevel);
              /*$.get("getData.php?fnName=getAsh&intLevelAshID="+idLevel, function(data){
                alert(data);alert(idLevel);
                //$("#lvl"+idLevel).append("<div class="lot reserved"></div>");
              });*/
            }
            
            $(function(){
              $('body').on('change', '#selectSection', function(){
                $('#selectBlock').html('');
                $('#lotMap').html('');
                window.intLotAvailable = 0;
                window.intLotReserved = 0;
                window.intLotOwned = 0;
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
                        case '0': lotStatus = "available"; intLotAvailable++; break;
                        case '1': lotStatus = "reserved"; intLotReserved++; break;
                        case '2': lotStatus = "owned"; intLotOwned++; break;
                        default: break;
                      }
                      $('#lotMap').append("<div class='lot "+lotStatus+"' id="+arrayData[i]+" lotStatus="+intLotStatus+">"+arrayData[i+1]+"</div>");
                      $('#legendLotAvailable').html(intLotAvailable);
                      $('#legendLotReserved').html(intLotReserved);
                      $('#legendLotOwned').html(intLotOwned);
                    }
                  }
                });
              });

              $('body').on('change', '#selectAshBlock', function(){
                $('#selectLevel').html('');
                $('#levelMap').html('');
                window.intAshAvailable = 0;
                window.intAshReserved = 0;
                window.intAshOwned = 0;
                thisAshID = $(this).val();
                $.get("getData.php?fnName=getLevel&intAshID="+thisAshID, function(data){
                  if(data != 0) {
                    arrayData = data.split(",");
                    $('#selectLevel').append("<option selected disabled>Choose Level</option>");
                    for(var i=0; i<arrayData.length-1; i+=4){
                      var tempLevel = "#lvl"+arrayData[i];
                      $('#levelMap').append("<div class='ash' id='lvl"+arrayData[i]+"'></div>");
                      $('#levelMap').hide();
                      strLevelID = "#lvl"+arrayData[i];
                      $(strLevelID).append("<div class='ashcrypt'>Level "+arrayData[i+1]+"</div>");
                      addAshcrypt(arrayData[i]);
                    }
                  }
                });
              });

              $('body').on('click', '.lot', function(){
                $('#popUpWindow').modal('show');
              });
            });

          function addAshcrypt(intLevelID){
            $.get("getData.php?fnName=getAsh&intLevelAshID="+intLevelID, function(data){
              strLevelID = "#lvl"+intLevelID;
              if(data != '') {
                arrayData = data.split(",");
                for(var i=0; i<arrayData.length-1; i+=4){
                  switch (arrayData[i+2]) {
                    case '0': unitStatus = "available"; intAshAvailable++; break;
                    case '1': unitStatus = "reserved"; intAshReserved++; break;
                    case '2': unitStatus = "owned"; intAshOwned++; break;
                    default: break;
                  }
                  $(strLevelID).append("<div class='ashcrypt "+unitStatus+"'>"+arrayData[i+1]+"</div>");
                }
              }
              else {
                $(strLevelID).remove();
              }
              $('#levelMap').show();
              $('.ash').width($('#levelMap')[0].scrollWidth-20);
              $('#legendAshAvailable').html(intAshAvailable);
              $('#legendAshReserved').html(intAshReserved);
              $('#legendAshOwned').html(intAshOwned);
            });
          }
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

                                    <!-- bill hide untol not adding a unit-->
                                             <div class="form-group" >
                                                <button type="button" class="btn btn-success btn-lg col-md-6" data-toggle="modal" data-target="#billout" ><span class="glyphicon glyphicon-credit-card" aria-hidden="true" ></span> BILL OUT
                                                    </button>
                                            </div>

                                   <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Legends :</b></H3>
                                        </div><!-- /.panel-heading -->
                                        <div class="panel-body">
                                          <center>
                                            <div>
                                              <div class="circle available" id="legendLotAvailable">
                                              </div>
                                              Available
                                            </div>
                                            <div>
                                              <div class="circle reserved" id="legendLotReserved">
                                              </div>
                                              Reserved
                                            </div>
                                            <div>
                                              <div class="circle owned" id="legendLotOwned">
                                              </div>
                                              Owned
                                            </div>
                                          </center>
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
                                        </div>
                                    </div>

                                   <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Legends :</b></H3>
                                        </div><!-- /.panel-heading -->
                                        <div class="panel-body">
                                          <center>
                                            <div class="circle available" id="legendAshAvailable">
                                            </div>
                                            <div class="circle reserved" id="legendAshReserved">
                                            </div>
                                            <div class="circle owned" id="legendAshOwned">
                                            </div>
                                          </center>
                                        </div>
                                </div>
                                </div>
                                <div class="col-md-8" id="containerLevel">
                                    <div class="panel panel-success" id=".containerLevelMap">
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
    <div class = "modal-dialog" style = "width:70%; height: 60%; ">
       <div class = "modal-content">
         <!--header-->
          
          <div class = "modal-header" style="background:#b3ffb3;">
          <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
          <center><h3 class = "modal-title">Lot Details</h3></center>
         </div>
                        
         <!--body (form)-->
         <div class = "modal-body">
                    
                          
           <form class="form-horizontal" role="form" action = "reservation.php" method= "post">             
                  
      
                      
                 <div class="row">
                       <div class=  "col-lg-12">
                          <div class="panel panel-default">
                        
                                <div class="panel-body">
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <form role="form">
                                                 <div class="form-group">
                                                  <div class="col-sm-10">

                                                  <legend>Unit</legend>      

                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Section: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input type="text" class="form-control" readonly="readonly" placeholder="East">
                                                    </div>
                                                  </div>

                                                      <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Block: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input type="text" class="form-control" readonly="readonly" placeholder="St.Mattew">
                                                    </div>
                                                  </div>

                                                      <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Name: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input type="text" class="form-control" readonly="readonly" placeholder="A0001">
                                                    </div>
                                                  </div>
                                                    
                                                
                                                    </div>
                                                 </div>
                                                </form>
                                          </div>

                                            <div class="col-xs-6 col-sm-3">
                                              <legend> Customer</legend>
                                                    
                                             <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input type="text" class="form-control" readonly="readonly" placeholder="Available">
                                                    </div>
                                                  </div>

                                                   <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Owner: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input type="text" class="form-control" readonly="readonly" placeholder="N/A">
                                                    </div>
                                                  </div>

                                                   <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Price: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input type="text" class="form-control" readonly="readonly" placeholder="P500,000">
                                                    </div>
                                                  </div>
                                                  
                                               <br>
                                                </div>
                           
                                                 <div class="modal-footer col-md-6" >
                                                    <button  id= "addunit" type="button" class="btn btn-success btn-lg col-md-8" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Unit
                                                    </button>
                                                  </div>
                            </div>

                           </div> <!--PANEL BODY-->

                                               

                          </div>
                          </div>
                        </div>
                        </form>                        
                             </div>

                            </div>
                           </div> <!--PANEL BODY-->
                 
              </div>



               <div class = "modal fade" id = "billout">
                <div class = "modal-dialog" style = "width:70%; height: 60%; ">
                   <div class = "modal-content">
                     <!--header-->
                      
                      <div class = "modal-header" style="background:#b3ffb3;">
                      <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                      <h3 class = "modal-title"><b>Bill Out Form</b></h3>
                     </div>
                                    
                     <!--body (form)-->
                     <div class = "modal-body">

                      <div class="form-group">       
                                      <select class="select2_single form-control" style="width: 300px;" tabindex="-1" placeholder="Select Customer">
                                        <option></option>
                                        <option>Jeron Cruz</option>
                                        <option>Daniella Soriano</option>
                                      </select>
                                  <button type="submit" class="btn btn-success pull-left" name= "btnGo" data-toggle="modal" data-target="#addCust">Add customer</button>
                                  <script type="text/javascript">
                                    function add() {
                                      $(".select2_single").append("<option>Pumasok?</option>");
                                      alert("asdsd");
                                    }
                                  </script>
                                  </div>

                     </div><!--/modal body-->
                  </div><!--/content-->
                </div>
            </div><!--/modal 2-->



            <div class = "modal fade" id ="addCust">
                <div class = "modal-dialog" style = "width:70%; height: 60%; ">
                   <div class = "modal-content">
                     <!--header-->
                      
                      <div class = "modal-header" style="background:#b3ffb3;">
                      <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                      <h3 class = "modal-title"><b>Customer Form</b></h3>
                     </div>
                                    
                     <!--body (form)-->
                     <div class = "modal-body">

                        <div class="row">
                          <div class="col-md-8">
                               <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Mask</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>


                          </div>
                        </div>
               
                      

                     </div><!--/modal body-->
                  </div><!--/content-->
                </div>
            </div><!--/modal 2-->
  </body>
</html>