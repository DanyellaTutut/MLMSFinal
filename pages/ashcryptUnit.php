<?php

require ("controller/connection.php");
require('controller/viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');
require('controller/archivedata.php');
require('controller/retrieve.php');

if (isset($_POST['btnSubmit'])){ 

    //echo "Record sucessfully saved";
    $tfUnitName = $_POST['tfUnitName'];
    $levelName = $_POST['levelName'];
    $status = $_POST['status'];
    $tfCapacity = $_POST['tfCapacity'];
    $tfStatus=$_POST['tfStatus'];
     
    $sql = "CALL checkUnit($levelName)";
    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
    mysql_select_db(constant('mydb'));
    
    if($result = mysql_query($sql,$conn)){
        
        while($row = mysql_fetch_array($result)){
				   
                mysql_close($conn);
                
                if(($row['curr'] + 1) > $row['max']){
                    echo "<script>alert('This level reach max limit unit!')</script>";
                }else{
					
                $num_of_ids = $row['max']; //limit sa block
                $i = 0; //Loop counter.
                $n = 1; //int sa lot name
                $l = "$tfUnitName"; //string sa lot nam
				
                while ($i < $num_of_ids){
                     
						$id = $l . sprintf("%04d", $n); //Create "id". Sprintf pads the number to make it 4 digits.
						
                        
						$createAshUnit =  new createAshUnit();
                        $createAshUnit->Create($id,$levelName,$status,$tfStatus,$tfCapacity);
                        
						if ($n == 9999) { //Once the number reaches 9999, increase the letter by one and reset number to 0.
							$n = 0;
							
							$l++;
						}
						
						$i++; $n++; //Letters can be incremented the same as numbers. Adding 1 to "AAA" prints out "AAB".
					}
                    echo "<script>alert('Succesfully created!')</script>";
                }
        }
        
    }	
        
}
         
if (isset($_POST['btnSave'])){

    $tfUnitID = $_POST['tfUnitID'];
    $tfUnitName = $_POST['tfUnitName'];
    $levelName = $_POST['levelName'];
    $tfCapacity = $_POST['tfCapacity'];
    $status = $_POST['status'];
    
    $updateAU =  new updateAshUnit();
    $updateAU->update($tfUnitID,$tfUnitName,$levelName,$status,$tfCapacity);
} 


      
if (isset($_POST['btnDeactivate'])) {

    $tfUnitID = $_POST['tfUnitID'];
    
    $deactivateAsh =  new deactivateAsh();
    $deactivateAsh->deactivate($tfUnitID);
}

if (isset($_POST['btnArchive'])){

        $tfUnitID = $_POST['tfUnitID'];
        
        $archiveAsh =  new archiveAsh();
        $archiveAsh->archive($tfUnitID);
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

    <title>MLMS-Ashcrypt-Unit</title>

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
            function validateAsh(evt) {
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
                                <H1><b>ASH CRYPT-UNIT</b></H2>
                            </div><!-- /.panel-heading -->
                     
                            <div class="panel-body">
                                <div class="col-md-4 column">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Create New</b></H3>
                                        </div>
                     
                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form" action = "ashcryptUnit.php" method= "post">						  
                                        
                                                <div class="form-group" >
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" value="0" name="tfStatus"/>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Level:</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control input-md" name = "levelName" required>
                                                        <option value=""></option>
                                                                <?php
                                                                    $view = new interestForLevel();
                                                                    $view->selectLevel();
                                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>
                                   
                                                <div class="form-group">
                                                    <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Unit:</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control input-md" name= "tfUnitName" onkeypress='return validateAsh(event)' placeholder="Ex. A" title="Unit must the same with level.." required>
                                                    </div>
                                                </div>
                                                                        
                                                

                                                <div class="form-group" >
                                                    <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Capacity:</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control input-md" min="1" name="tfCapacity" onkeypress='return validateNumber(event)' required/>
                                                    </div>
                                                </div>
                                                                        
                                                <div class="form-group">
                                                    <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Status:</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control input-md" name = "status" required>
                                                                <option value = "0">Available</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                                        
                                                <div class="form-group modal-footer"> 
                                                    <div class="col-md-12 col-md-offset-4">
                                                        <button type="submit" class="btn btn-success col-md-3" name= "btnSubmit">Add</button>
                                                        <input class = "btn btn-default col-md-5" type="reset" name = "btnClear" value = "Clear Entries">
                                                    </div>
                                                    <h4 class="col-md-12" style = "color: red;" align="left" style="margin-top:.30em">REQUIRED ALL FIELDS</h4>
                                                </div>
                                                
                                            </form><!--Form-->
                                        </div><!-- panel body -->
                                     </div><!--panel panel-success-->
                                </div><!--col-md-4 column-->          	
                        
                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <form class="form-vertical" role="form" action = "ashcryptUnit.php" method= "post">
                                                    <div class="col-md-5">
                                                        <h4><b>Show Terminated Unit?</b></h4>
                                                    </div>
                                                    <button type="submit" class="btn btn-success pull-left" name= "btnGo">Go</button>
                                                    <button type="submit" class="btn btn-default pull-left" name= "btnBack">Back</button>
                                                </form>
                     	                  </div><!-- /.panel-heading -->
                                           
                                        <div class="panel-body">         
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                <th class = "success" style = "text-align: center; font-size: 20px;">Unit</th>
                                                                <th class = "success" style = "text-align: center; font-size: 20px;">Level</th>
                                                                <th class = "success" style = "text-align: center; font-size: 20px;">Block</th>
                                                                <th class = "success" style = "text-align: center; font-size: 20px;">Capacity</th>
                                                                <th class = "success" style = "text-align: center; font-size: 20px;">Status</th>
                                                                <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                            <?php
                                                            
                                                              if (isset($_POST['btnGo'])){
                                                                    $viewDeactivate = new deactivatedAshUnit();
                                                                    $viewDeactivate->viewDeactivatedAshUnit();
                                                              }
                                                              else if(isset($_POST['btnBack'])){
                                                                    $view = new ashUnit();
                                                                    $view->viewAshUnit();
                                                              }
                                                              else{
                                                                    $view1 = new ashUnit();
                                                                    $view1->viewAshUnit();
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