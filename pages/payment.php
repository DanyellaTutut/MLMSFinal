<?php

require ("controller/connection.php");
require('controller/viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');
require('controller/archivedata.php');
require('controller/retrieve.php');


if (isset($_POST['btnSubmit'])){

    $tfServiceName = $_POST['tfServiceName'];
    $tfServicePrice= $_POST['tfServicePrice'];
    $tfStatus=$_POST['tfStatus'];
    
    $createService =  new createService();
    $createService->Create($tfServiceName,$tfServicePrice,$tfStatus);
}
    
if (isset($_POST['btnSave'])){

    $tfServiceID = $_POST['tfServiceID'];
    $tfServiceName = $_POST['tfServiceName'];
    $tfServicePrice = $_POST['tfServicePrice'];
    
    
    $updateservice =  new updateService();
    $updateservice->update($tfServiceID,$tfServiceName,$tfServicePrice);
}

     
      
if (isset($_POST['btnDeactivate'])){

    $tfServiceID = $_POST['tfServiceID'];
    
    $deactivateService =  new deactivateService();
    $deactivateService->deactivate($tfServiceID);
}

if (isset($_POST['btnArchive'])){

        $tfServiceID = $_POST['tfServiceID'];
        
        $archiveService =  new archiveService();
        $archiveService->archive($tfServiceID);
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

    <title>MLMS-Payment</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

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

    <script>
            function validateServiceName(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode == 8 || charCode == 32 || (charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)){
                return true;
                }else{
                return false;
                }
            }
        
    </script>
</head>

<body class="nav-sm"> 
    <div class="container body">
        <div class="main_container">
            <?php require("sidemenu.php");
                  require("topnav.php");  ?>
                  
            <!-- page content -->
            <div class="right_col" role="main">
                <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                                <h1><b>PAYMENT</b></h1>
                            </div><!-- /.panel-heading -->
                     
                            <div class="panel-body">
                                <div class="col-md-6">
                                   <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4><b>Customer Collection<b></h4>
                                        </div><!-- /.panel-heading -->
                                           
                                    <div class="panel-body">
                                        <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                
                                                                <th class = "success" style = "text-align: center;">Customer Name</th>
                                                            
                                                                <th class = "success" style = "text-align: center;">Action</th>
                                                    
                                                            </tr>
                                                        </thead>
                                                            <td>Daniella Soriano</td>
                                                            <td align='center'>
                                <button type = "button" class = "btn btn-success" data-toggle = "modal" title='Collection' data-target = '#viewCollection'>
                                <i class='glyphicon glyphicon-eye-open'> VIEW</i></button>

                          </td>
                                                        <tbody>
                                                           
                                                            
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                        </div><!--panel body -->
                                    </div><!--panel panel-success-->
                                 
                                </div><!--col-md-6 column-->
<!-- ________________________________________________________________________________-->
                             <div class="col-md-6">
                                   <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4><b>Customer Downpayment<b></h4>
                                        </div><!-- /.panel-heading -->
                                           
                                    <div class="panel-body">
                                        <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                            <table id="datatable1-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                
                                                                <th class = "success" style = "text-align: center;">Customer Name</th>
                                                            
                                                                <th class = "success" style = "text-align: center;">Action</th>
                                                    
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                           <td>Daniella Soriano</td>
                                                              <td align='center'>
                                <button type = "button" class = "btn btn-success" data-toggle = "modal" title='Collection' data-target = '#viewDownpayment'>
                                <i class='glyphicon glyphicon-eye-open'> VIEW</i></button>
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                        </div><!--panel body -->
                                    </div><!--panel panel-success-->
                                 
                                </div><!--col-md-6 column-->
                    
                            </div><!--panel body -->
                        </div><!--panel panel-success-->
                    </div><!--col-md-12-->
                </div><!--row-->
            </div><!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                MLMS-Design 
            </div>
            <div class="clearfix"></div>
        </footer><!-- /footer content -->
                
        </div><!-- main_container -->
    </div><!-- container body -->


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
    <script src="../vendors/mask/jquery.mask.min.js"></script>


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
          ajax: "controller/viewdata/php",
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

     <script>
        $('#tfPriceCreate').mask('000000000000.00',{reverse:true});
        $('.tfPriceUpdate').mask('000000000000.00',{reverse:true});
 </script>

<!--DATATABLE1-->
  <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable1-buttons").length) {
            $("#datatable1-buttons").DataTable({
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

        $('#datatable1').dataTable();

        $('#datatable1-keytable').DataTable({
          keys: true
        });

        $('#datatable1-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable1-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable1-checkbox');

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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

     <script>
        $('#tfPriceCreate').mask('000000000000.00',{reverse:true});
        $('.tfPriceUpdate').mask('000000000000.00',{reverse:true});
 </script>
<!-- _____________________________________________M O D A L ___________________________-->
 <!--COLLECTION VIEW MODAL-->
 <!--ILIPAT NA LANG SA TRANSVIEW-->
  <div class = 'modal fade' id = 'viewCollection'>
                            <div class = 'modal-dialog' style = 'width: 50%;'>
                                <div class = 'modal-content' style = ''>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background:#b3ffb3;'>
                                              <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h2 class = 'modal-title'>Collection: (NAME OF CUSTOMER)</h2>
                                        </div>

                                        <div class="modal-body">
                                        
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                
                                                                <th class = "success" style = "text-align: center;">Transaction Code</th>
                                                                <th class = "success" style = "text-align: center;">Unit Code</th>
                                                            
                                                                <th class = "success" style = "text-align: center;">Action</th>
                                                    
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                           <td>Transcode 1</td>
                                                           <td>Unit 1</td>
                                                            <td align='center'>
                                <button type = "button" class = "btn btn-success" data-toggle = "modal" title='popUpCollection' data-target = '#popUpCollection'>
                                <i class='glyphicon glyphicon-folder-open'> COLLECT</i></button>
                                                            
                                                        </tbody>
                                                </table>
                                           
                                        </div>


                                </div>
                            </div>
    </div>
    <!--COLLECTION VIEW MODAL-->
 <!--ILIPAT NA LANG SA TRANSVIEW-->
  <div class = 'modal fade' id = 'popUpCollection'>
                            <div class = 'modal-dialog' style = 'width: 80%;'>
                                <div class = 'modal-content' style = ''>
                                                
                                        <div class="modal-body">
                                        
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                                                <th class = "success" style = "text-align: center;">Due Date</th>
                                                                <th class = "success" style = "text-align: center;">Transaction Date</th>
                                                            
                                                                <th class = "success" style = "text-align: center;">Penalty</th>
                                                                 <th class = "success" style = "text-align: center;">Payment</th>
                                                                  <th class = "success" style = "text-align: center;">Status</th>

                                                    
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                            <tr>
                                                            <td><input type="checkbox" name="select_all" value="1" id="example-select-all"></td>
                                                           <td>08/12/2016</td>
                                                           <td>08/12/2016</td>
                                                           <td>0.00</td>
                                                           <td>200.00</td>
                                                           </tr>
                                                            <tr>
                                                            <td><input type="checkbox" name="select_all" value="1" id="example-select-all"></td>
                                                           <td>08/12/2016</td>
                                                           <td>08/12/2016</td>
                                                           <td>0.00</td>
                                                           <td>200.00</td>
                                                           </tr>
                                                            <tr>
                                                            <td><input type="checkbox" name="select_all" value="1" id="example-select-all"></td>
                                                           <td>08/12/2016</td>
                                                           <td>08/12/2016</td>
                                                           <td>0.00</td>
                                                           <td>200.00</td>
                                                           </tr>
                                                           
                                                            
                                                        </tbody>
                                                </table>
                                           <div class="footer">
                                              <button class="btn btn-success" onclick="hide();" style="align:left">Cancel</button>
                                              <button class="btn btn-success" data-toggle = "modal" title='popUpPayment' data-target = '#popUpPayment' style="align:left">Pay</button>
                                           </div>
                                        </div>


                                </div>
                            </div>
    </div>
 <!--COLLECTION PAY MODAL-->
 <!--ILIPAT NA LANG SA TRANSVIEW-->
  <div class = 'modal fade' id = 'popUpPayment'>
                            <div class = 'modal-dialog' style = 'width: 80%;'>
                                <div class = 'modal-content' style = ''>
                                    

                                        <div class="modal-body">
                                        
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="50%">
                                                    <thead>
                                                            <tr>
                                                                
                                                                <th class = "success" style = "text-align: center;">Due Date</th>
                                                                <th class = "success" style = "text-align: center;">Penalty</th>
                                                            
                                                                <th class = "success" style = "text-align: center;">Payment</th>
                                                    
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                             
                                                        </tbody>
                                                </table>

                                            <div class="form-group">
                                                <label>Payment Details</label>
                                                <label>Payment Details</label>

                                            </div>
                                           
                                        </div>


                                </div>
                            </div>
    </div>

     <!--DOWNPAYMENT VIEW MODAL-->
 <!--ILIPAT NA LANG SA TRANSVIEW-->
  <div class = 'modal fade' id = 'viewDownpayment'>
                            <div class = 'modal-dialog' style = 'width: 50%;'>
                                <div class = 'modal-content' style = ''>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background:#b3ffb3;'>
                                              <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h2 class = 'modal-title'>Downpayment: (NAME OF CUSTOMER)</h2>
                                        </div>

                                        <div class="modal-body">
                                        
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                
                                                                <th class = "success" style = "text-align: center;">Transaction Code</th>
                                                                <th class = "success" style = "text-align: center;">Unit Code</th>
                                                                <th class = "success" style = "text-align: center;">Balance</th>
                                                                <th class = "success" style = "text-align: center;">Due Date</th>
                                                                <th class = "success" style = "text-align: center;">Action</th>
                                                    
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                           <td>Transcode 1</td>
                                                           <td>Unit 1</td>
                                                           <td>100.00</td>
                                                           <td>September 30, 2016</td>
                                                            <td align='center'>
                                <button type = "button" class = "btn btn-success" data-toggle = "modal" title='popUpCollection' data-target = '#popUpCollection'>
                                <i class='glyphicon glyphicon-folder-open'> COLLECT</i></button>
                                                            
                                                        </tbody>
                                                </table>
                                           
                                        </div>


                                </div>
                            </div>
    </div>
  </body>
</html>