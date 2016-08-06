<?php

require ("controller/connection.php");
require('controller/viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');


if (isset($_POST['btnSubmit']))
      { 

    //echo "Record sucessfully saved";
    $tfUnitName = $_POST['tfUnitName'];
    $levelName = $_POST['levelName'];
    $status = $_POST['status'];
    $tfCapacity = $_POST['tfCapacity'];
    $tfStatus=$_POST['tfStatus'];
     
        $sql = "CALL checkUnit($levelName)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        
        if($result = mysql_query($sql,$conn))
        {
            while($row = mysql_fetch_array($result)){
                mysql_close($conn);
                if(($row['curr'] + 1) > $row['max']){
                    echo "<script>alert('This level reach max limit of unit!')</script>";
                }
                else{
                        $createAshUnit =  new createAshUnit();
                        $createAshUnit->Create($tfUnitName,$levelName,$status,$tfStatus,$tfCapacity);
      
                }
            }
        }
        
   }
         
if (isset($_POST['btnSave']))
      {

    //echo "Record sucessfully saved";
    $tfUnitID = $_POST['tfUnitID'];
    $tfUnitName = $_POST['tfUnitName'];
    $levelName = $_POST['levelName'];
    $tfCapacity = $_POST['tfCapacity'];
    $status = $_POST['status'];
    
    
    $updateAU =  new updateAshUnit();
    $updateAU->update($tfUnitID,$tfUnitName,$levelName,$status,$tfCapacity);
      } 


      
if (isset($_POST['btnDeactivate']))
      {

    //echo "Record sucessfully saved";
    $tfUnitID = $_POST['tfUnitID'];
    
    
    $deactivateAsh =  new deactivateAsh();
    $deactivateAsh->deactivate($tfUnitID);
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

 
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
          
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

           <!-- <div class="navbar nav_title" style="border:0;">
              <a href="section.php" class="site_title"><i class="fa fa-home"></i><span>  MLMS</span></a>
            </div> -->

            
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li style="font-size: 20px"><a><i class="fa fa-cog"></i> Maintenance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li class = "divider"></li>
                            <li><a href="typeoflot.php" style="font-size: 12px">LOT TYPE</a></li>
                            <li><a href = "interest.php" style="font-size: 12px">INTEREST RATE</a></li>
                            <li><a href = "section.php" style="font-size: 12px">SECTION</a></li>
                            <li><a href = "block.php" style="font-size: 12px">BLOCK</a></li>
                            <li><a href = "lot.php" style="font-size: 12px">LOT-UNIT</a></li>
                            
                            <li class = "divider"></li>
                            <li><a href = "ashcrypt.php" style="font-size: 12px">ASH CRYPT</a></li>
                            <li><a href = "levelAsh.php" style="font-size: 12px">LEVEL</a></li>
                            <li><a href = "interestForLevel.php" style="font-size: 12px">INTEREST RATE</a></li>
                            <li class = "active"><a href = "ashcryptUnit.php" style="font-size: 12px">ASH CRYPT-UNIT</a>
                            
                            <li class = "divider"></li>
                            <li><a href = "service.php" style="font-size: 12px">SERVICE</a></li>
                            <li><a href = "discount.php" style="font-size: 12px">DISCOUNT</a></li>
                    </ul>
                  </li>
                  <li style="font-size: 20px"><a><i class="fa fa-briefcase"></i> Transactions <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li class = "divider"></li>
                      <li><a href="reservation.php" style="font-size: 12px">UNIT RESERVATION</a></li>
                           <li><a href = "#" style="font-size: 12px">PAYMENT</a></li>
                            <li><a href = "#" style="font-size: 12px">CONTRACT</a></li>
                            <li><a href = "#" style="font-size: 12px">REQUEST</a></li>
                    </ul>
                  </li>
                  <li style="font-size: 20px"><a><i class="fa fa-list"></i> Queries <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href = "masterlist.php">MASTER LIST</a></li>
                      
                    </ul>
                  </li>
                  <li style="font-size: 20px"><a><i class="fa fa-list-alt"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                    </ul>
                  </li>
                  <li style="font-size: 20px"><a><i class="fa fa-wrench"></i> Utilities <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href = "employee.php">EMPLOYEE</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav" >
          <div class="nav_menu" style="background-color:#ABEBC6;">
          <a class="navbar-brand" rel="home" href="#" >
        <img style="max-width:800px; margin-top: -16px; margin-left: -15px"
             src="images/logo2.png">
                   </a>

            <nav>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt="">Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-white">1</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Admin</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Memorial Lot Management System with Collection Monitoring
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-success ">
                     <div class="panel-heading">
                        
                         <H2>ASH CRYPT-UNIT</H2>
                     </div><!-- /.panel-heading -->
                     
                      <div class="panel-body">

                          <div class="col-md-4 column">
                        <div class="panel panel-success ">
                            <div class="panel-heading">
                    <H2><b>Create New</b></H2>
                            </div>
                     
                                <div class="panel-body">

                                    <form class="form-horizontal" role="form" action = "ashcryptUnit.php" method= "post">             
             
                            <div class="form-group" >
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" value="0" name="tfStatus"/>
                                </div>
                            </div>
                                   
                         <div class="form-group">
              <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Unit Name:</label>
                   <div class="col-md-7">
                  <input type="text" class="form-control input-md" name= "tfUnitName" required>
                 </div>
                  </div>
                              
                   <div class="form-group">
                  <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Level Name:</label>
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
                        <option value = "1">Reserved</option>
                        <option value = "2">Occupied</option>
                    </select>
                  </div>
                   </div>
                            
                              
              <<div class="form-group modal-footer"> 
                                <h5 class="col-md-4" style = "color: red;" align="right" style="margin-top:.30em">REQUIRED ALL FIELDS</h5>
                                <div class="col-sm-8">
                  <button type="submit" class="btn btn-success" name= "btnSubmit">Add</button>
                  <input class = "btn btn-default"  type="reset" name = "btnClear" value = "Clear">
                 </div>
               </div>
                              
          </form><!--Form-->

                                </div><!-- 1 sub panel body-->
                            </div>
                        </div><!--1 sub column-->

                          
                        
                          <div class="table-responsive col-md-8 col-lg-8 col-xs-8">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class = "success" style = "text-align: center; font-size: 20px;">Unit</th>
                                            <th class = "success" style = "text-align: center; font-size: 20px;">Level</th>
                                            <th class = "success" style = "text-align: center; font-size: 20px;">Ash Crypt</th>
                                            <th class = "success" style = "text-align: center; font-size: 20px;">Capacity</th>
                                            <th class = "success" style = "text-align: center; font-size: 20px;">Status</th>
                                            <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                        </tr>
                      </thead>
                                    
                                    <tbody>
                                        <?php
                                            $view = new ashUnit();
                                            $view->viewAshUnit();
                                        ?>
                                    </tbody>
                              </table>
                          </div><!-- /.table-responsive -->
                   </div><!-- /.panel-body -->
             </div>
        </div><!-- /.col-md-12 -->
   </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            MLMS-Design 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
          </div>

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