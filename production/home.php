<?php

require('controller/connection.php');
require('controller/viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');

if (isset($_POST['btnSubmit']))
      {

    //echo "Record sucessfully saved";
    //$tfSectionID = $_POST['tfSectionID'];
    $tfSectionName = $_POST['tfSectionName'];
    $tfNoOfBlock = $_POST['tfNoOfBlock'];
        $tfStatus = $_POST['tfStatus'];
        
    $createsec =  new createSection();
    $createsec->Create($tfSectionName,$tfNoOfBlock,$tfStatus);
      }

if (isset($_POST['btnSave']))
      {

    //echo "Record sucessfully saved";
    $tfSectionID = $_POST['tfSectionID'];
    $tfSectionName = $_POST['tfSectionName'];
    $tfNoOfBlock = $_POST['tfNoOfBlock'];
        //$status = $_POST['status'];
    
    $updatesec =  new updateSection();
    $updatesec->update($tfSectionID,$tfSectionName,$tfNoOfBlock);
      }

if (isset($_POST['btnDeactivate']))
      {

    //echo "Record sucessfully saved";
    $tfSectionID = $_POST['tfSectionID'];
    
    //$status = $_POST['status'];
    
    $deactivatesec =  new deactivateSection();
    $deactivatesec->deactivate($tfSectionID);
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

    <title>MLMS-Home</title>

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
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/jquery.dataTables.css" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css" />

    <link rel="stylesheet" href="../css/section.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
    <script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
    
    <script src="../assets/js/libs/spin.js/spin.min.js"></script>
    <script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
    <script src="../assets/js/libs/mask/jquery.mask.min.js"></script>
        
    <script src="../assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
    <script src="../assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>


    <script type="text/javascript">
            $(document).ready(function(){
                $('#datatables-section').DataTable();
                
            });
        </script>
        
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
                
              function validateSectionName(evt) {
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
                      <li class = "active"><a  href = "section.php" style="font-size: 12px">SECTION</a></li>
                            <li><a href = "block.php" style="font-size: 12px">BLOCK</a></li>
                            <li><a href = "lot.php" style="font-size: 12px">LOT-UNIT</a></li>
                            
                            <li class = "divider"></li>
                            <li><a href = "ashcrypt.php" style="font-size: 12px">ASH CRYPT</a></li>
                            <li><a href = "levelAsh.php" style="font-size: 12px">LEVEL</a></li>
                            <li><a href = "interestForLevel.php" style="font-size: 12px">INTEREST RATE</a></li>
                            <li><a href = "ashcryptUnit.php" style="font-size: 12px">ASH CRYPT-UNIT</a>
                            
                            <li class = "divider"></li>
                            <li><a href = "service.php" style="font-size: 12px">SERVICE</a></li>
                            <li><a href = "discount.php" style="font-size: 12px">DISCOUNT</a></li>
                    </ul>
                  </li>
                  <li style="font-size: 20px"><a><i class="fa fa-briefcase"></i> Transactions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class = "dropdown-header" style="font-size: 12px;">RESERVATION</li>
                            <li><a href = "lotReservation.php" style="text-align: right; font-size: 12px;">LOT-UNIT</a></li>
                            <li><a href = "acReservation.php" style="text-align: right; font-size: 12px;">AC-UNIT</a></li>
                            <li class = "divider"></li>
                            
                            <li class="dropdown-header" style="font-size: 12px;">PAYMENT</li>
                            <li><a href = "spotcash.php" style="text-align: right; font-size: 12px;">SPOTCASH</a></li>
                            <li><a href = "installment.php" style="text-align: right; font-size: 12px;">INSTALLMENT</a></li>
                            <li class = "divider"></li>
                            
                            <li><a href = "contract.php" style = "font-size: 12px;">CONTRACT</a></li>
                            <li><a href = "request.php" style = "font-size: 12px;">REQUEST</a></li>
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
       
      </div>
            </div>
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
  </body>
</html>