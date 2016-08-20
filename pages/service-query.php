<?php

require ("controller/connection.php");
require('controller/query-viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');
require('controller/archivedata.php');
require('controller/retrieve.php');


if (isset($_POST['btnSubmit'])){

    $tfServiceName = $_POST['tfServiceName'];
    $serviceType = $_POST['serviceType'];
    $tfServicePrice= $_POST['tfServicePrice'];
    $tfStatus=$_POST['tfStatus'];
    
    $createService =  new createService();
    $createService->Create($tfServiceName,$serviceType,$tfServicePrice,$tfStatus);
}
    
if (isset($_POST['btnSave'])){

    $tfServiceID = $_POST['tfServiceID'];
    $tfServiceName = $_POST['tfServiceName'];
    $serviceType = $_POST['serviceType'];
    $tfServicePrice = $_POST['tfServicePrice'];
    
    
    $updateservice =  new updateService();
    $updateservice->update($tfServiceID,$serviceType,$tfServiceName,$tfServicePrice);
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

    <title>MLMS-Service-Query</title>

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
                                <H1><b>SERVICE</b></H2>
                            </div><!-- /.panel-heading -->
                     
                            <div class="panel-body">
                                
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <form class="form-vertical" role="form" action = "service-query.php" method= "post">
                                            
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="col-md-2" style = "font-size: 18px;" align="right" style="margin-top:.30em">Filter by:</label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name = "filter">
                                                                    <option value=""> --Choose Service Type--</option>
                                                                    <option value="0"> Service Request</option>
                                                                    <option value="1"> Service Scheduling</option>
                                                                                                        
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <button type="submit" class="btn btn-success pull-left" name= "btnGo">Go</button>
                                                                <button type="submit" class="btn btn-default pull-left" name= "btnBack">Back</button>
                                                                <!--<a type="button" class="btn btn-default pull-left" name= "btnPrint" href="pdfService.php" target="_blank">Print</a>-->
                                                                
                                                            </div>
                                                        </div><!-- FORM GROUP -->
                                                    </div><!-- ROW -->
                                                
                                            </form>
                                                                               
                     	                  </div><!-- /.panel-heading -->
                                           
                                    <div class="panel-body">
                                        <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                
                                                                <th class = "success" style = "text-align: center; font-size: 20px;">Service</th>
                                                                <th class = "success" style = "text-align: center; font-size: 20px;">Service Type</th>
                                                                <th class = "success" style = "text-align: center; font-size: 20px;">Price</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                            <?php
                                                            
                                                              if (isset($_POST['btnGo'])){
                                                                  
                                                                  $filter = $_POST['filter'];
                                                              
                                                                  $sql = "SELECT * FROM tblservice WHERE intStatus='0' AND intServiceType='".$filter."' ORDER BY strServiceName ASC";
        
                                                                  $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                  mysql_select_db(constant('mydb'));
                                                                  $result = mysql_query($sql,$conn);
                                                                

                                                                  while($row = mysql_fetch_array($result)){
                                                                    
                                                                    $intServiceID = $row['intServiceID'];
                                                                    $strServiceName = $row['strServiceName'];
                                                                    $intServiceType = $row['intServiceType'];
                                                                    $dblServicePrice = $row['dblServicePrice'];
                                                                    
                                                                    if($intServiceType==0){
                                                                            $serviceType="Service Request";
                                                                    }else
                                                                            $serviceType="Service Scheduling";
                                                                    
                                                                    
                                                                    echo "<tr>
                                                                                <td style ='font-size:18px;'>$strServiceName</td>
                                                                                <td style ='font-size:18px;'>$serviceType</td>
                                                                                <td style = 'text-align: right; font-size:18px;'>₱ ".number_format($dblServicePrice,2)."</td>
                                                                            </tr>";
                                                                        
                                                                }//while($row = mysql_fetch_array($result))
                                                                mysql_close($conn);
                                                                
                                                                }else if(isset($_POST['btnBack'])){
                                                                    $view = new service();
                                                                    $view->viewService();
                                                                }
                                                                else{
                                                                        $view1 = new service();
                                                                        $view1->viewService();
                                                                }
                                                                
                                                             ?>
                                                            
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                        </div><!--panel body -->
                                    </div><!--panel panel-success-->
                                </div><!--col-md-8-->   
                    
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
  </body>
</html>