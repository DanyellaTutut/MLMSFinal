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

    <title>MLMS-Unit Reservation</title>

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
            border: 2px solid black;
            border-radius: 4px;
            height: 90px;
            line-height: 120px;
            position: relative;
            text-align: center;
            width: 80px;
            color: #fff;
            margin: 10px;
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
                    for(var i=0; i<arrayData.length-1; i+=3){
                      $('#selectBlock').append("<option selected disabled>Choose option</option><option value="+arrayData[i]+" lot="+arrayData[i+2]+">"+arrayData[i+1]+"</option>");
                    }
                  }
                });
              });

              $('body').on('change', '#selectBlock', function(){
                thisBlockID = $(this).val();                $.get("getData.php?fnName=getLot&intBlockID="+thisBlockID, function(data){
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
                                            <H3><b>Select lot</b></H3>
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
                                                  <option selected disabled>Choose option</option>
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

                                </div>
                                  <div class="col-md-8">
                                    <div class="panel panel-success ">
                                        <div class="panel-body" id="lotMap">
                                        </div>
                                    </div>
                                </div>


                         
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk aliquip</p>
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
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

     <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

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
          <h3 class = "modal-title"><b>Details</b></h3>
         </div>
                        
         <!--body (form)-->
         <div class = "modal-body">
                    
                          
           <form class="form-horizontal" role="form" action = "#" method= "post">            
                      
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
                      </div>
                      </div><!--/modal 1-->


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

           





         </div><!--/modal body-->
      </div><!--/content-->
    </div>
</div><!--/modal 2-->



 
  </body>
</html>