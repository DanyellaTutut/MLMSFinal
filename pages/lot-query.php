<?php

require ("controller/connection.php");
require('controller/query-viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');
require('controller/archivedata.php');
require('controller/retrieve.php');



if (isset($_POST['btnSubmit'])){

    //echo "Record sucessfully saved";
    $tfLotName = $_POST['tfLotName'];
    $typeBlock = $_POST['typeBlock'];
    $lotStatus = $_POST['lotStatus'];
    $tfStatus = $_POST['tfStatus'];

		
    $sql = "CALL checkLotCount($typeBlock)";
    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
    mysql_select_db(constant('mydb'));
    
    if($result = mysql_query($sql,$conn)){
        
        while($row = mysql_fetch_array($result)){
				   
                mysql_close($conn);
                
                if(($row['curr'] + 1) > $row['max']){
                    echo "<script>alert('This block reach max limit unit!')</script>";
                }else{
					
                $num_of_ids = $row['max']; //limit sa block
                $i = 0; //Loop counter.
                $n = 1; //int sa lot name
                $l = "$tfLotName"; //string sa lot nam
				
                while ($i < $num_of_ids){
                     
						$id = $l . sprintf("%04d", $n); //Create "id". Sprintf pads the number to make it 4 digits.
						
                        
						$createLot =  new createLot();
                        $flag =$createLot->Create($id,$typeBlock,$lotStatus,$tfStatus);
                        
						if ($n == 9999) { //Once the number reaches 9999, increase the letter by one and reset number to 0.
							$n = 0;
							
							$l++;
						}
						
						$i++; $n++; //Letters can be incremented the same as numbers. Adding 1 to "AAA" prints out "AAB".
					}
                    
                    if($flag == 1)
                        echo "<script>alert('Succesfully created!')</script>";
                    else
                        echo "<script>alert('Duplicate Data!')</script>";
                        
                    }
                }
        
        
    }	
}
	  
if (isset($_POST['btnSave']))
      {

		//echo "Record sucessfully saved";
		$tfLotID = $_POST['tfLotID'];
        $tfLotName = $_POST['tfLotName'];
		$blockName = $_POST['blockName'];
        $status = $_POST['status'];
        
		
        $updateLot =  new updateLot();
		$updateLot->update($tfLotID,$tfLotName,$blockName,$status);
      }
      
if (isset($_POST['btnDeactivate']))
      {

		//echo "Record sucessfully saved";
		$tfLotID = $_POST['tfLotID'];
		
		
		$deactivateLot =  new deactivateLot();
		$deactivateLot->deactivate($tfLotID);
      }

if (isset($_POST['btnArchive'])){

        $tfLotID = $_POST['tfLotID'];
        
        $archiveLot =  new archiveLot();
        $archiveLot->archive($tfLotID);
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

    <title>MLMS-Lot-Unit-Query</title>

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
            function validateLot(evt) {
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
        <div class="main_container">
            <?php require("sidemenu.php");
                  require("topnav.php");  ?>
                         
            <!-- page content -->
            <div class="right_col" role="main">
                <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                                <H1><b>LOT-UNIT</b></H1>
                            </div><!-- /.panel-heading -->
                                    
                            <div class="panel-body">
                                
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <form class="form-vertical" role="form" action = "lot-query.php" method= "post">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="col-md-2" style = "font-size: 18px;" align="right" style="margin-top:.30em">Filter by:</label>
                                                            
                                                            <div class="col-md-4">
                                                                <select class="form-control" name = "filter1">
                                                                    <option value=""> --Choose Block (Section)--</option>
                                                                    <?php
                                                                       $view = new lot();
                                                                       $view->selectBlock(); 
                                                                    ?>>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <select class="form-control" name = "filter2">
                                                                    <option value=""> --Choose Status--</option>
                                                                    <option value="0"> Available</option>
                                                                    <option value="1"> Reserve</option>
                                                                    <option value="2"> Occupied</option>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <button type="submit" class="btn btn-success pull-left" name= "btnGo">Go</button>
                                                                <button type="submit" class="btn btn-default pull-left" name= "btnBack">Back</button>
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
                                                            <th class = "success" style = "text-align: center; font-size: 18px;">Lot Name</th>
                                                            <th class = "success" style = "text-align: center; font-size: 18px;">Block</th>
                                                            <th class = "success" style = "text-align: center; font-size: 18px;">Lot Type</th>
                                                            <th class = "success" style = "text-align: center; font-size: 18px;">Section Name</th>
                                                            <th class = "success" style = "text-align: center; font-size: 18px;">Lot Status</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            
                                                              if (isset($_POST['btnGo'])){
                                                                  
                                                                   $filter1 = $_POST['filter1'];
                                                                   $filter2 = $_POST['filter2'];
                                                                  echo"$filter1,$filter2,";
                                                                    $sql = "Select l.intLotID, l.strLotName, b.strBlockName, t.strTypeName, s.strSectionName, l.intLotStatus, l.intStatus 
                                                                        FROM tbllot l  
                                                                            INNER JOIN tblBlock b ON l.intBlockID = b.intBlockID 
                                                                            INNER JOIN	tbltypeoflot t ON b.intTypeID = t.intTypeID
                                                                            INNER JOIN tblsection s	ON b.intSectionID = s.intSectionID WHERE l.intStatus = '0'  AND b.intBlockID = '".$filter1."' AND l.intLotStatus = '".$filter2."'
                                                                            ORDER BY  strLotName ASC";

                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            


                                                            while($row = mysql_fetch_array($result)){ 
                                                                
                                                            $intLotID =$row['intLotID'];
                                                            $strLotName =$row['strLotName'];
                                                            $strBlockName =$row['strBlockName'];
                                                            $strTypeName=$row['strTypeName'];
                                                            $strSectionName =$row['strSectionName'];
                                                            $intLotStatus =$row['intLotStatus'];
                                                            $intStatus =$row['intStatus'];
                                                            
                                                            if($intLotStatus==0){
                                                                $LotStatus ="Available";
                                                            }else if($intLotStatus==1){
                                                                $LotStatus="Reserved";
                                                            }else{
                                                                $LotStatus="Occupied";
                                                            }
                                                                        
                                                            echo 
                                                                "<tr><td style ='font-size:18px;'>$strLotName</td>
                                                                    <td style ='font-size:18px;'>$strBlockName</td>
                                                                    <td style ='font-size:18px;'>$strTypeName</td>
                                                                    <td style ='font-size:18px;'>$strSectionName</td>
                                                                    <td style ='font-size:18px;'>$LotStatus</td>
                                                                </tr>";
                                                                    
                                                                }//while($row = mysql_fetch_array($result))
                                                                mysql_close($conn);
                                                                    
                                                              }else if(isset($_POST['btnBack'])){
                                                                    $view = new lot();
                                                                    $view->viewLot();
                                                              }
                                                              else{
                                                                  $view1 = new lot();
                                                                  $view1->viewLot();
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


    
  </body>
</html>