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

    <link rel="stylesheet" href="../css/reservation.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
    <script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
    
    <script src="../assets/js/libs/spin.js/spin.min.js"></script>
    <script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
    <script src="../assets/js/libs/mask/jquery.mask.min.js"></script>
        
    <script src="../assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
    <script src="../assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>



        
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
                      <li class = "active"><a href="typeoflot.php" style="font-size: 12px">LOT TYPE</a></li>
                            <li><a href = "interest.php" style="font-size: 12px">INTEREST RATE</a></li>
                            <li><a href = "section.php" style="font-size: 12px">SECTION</a></li>
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
                      <li class = "divider"></li>
                      <li><a href="reservation.php" style="font-size: 12px">UNIT RESERVATION</a></li>
                            <li class = "active"><a href = "payment.php" style="font-size: 12px">PAYMENT</a></li>
                            <li><a href = "section.php" style="font-size: 12px">CONTRACT</a></li>
                            <li><a href = "block.php" style="font-size: 12px">REQUEST</a></li>
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

          <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-success ">
                     <div class="panel-heading">
                        
                         <H2>PAYMENT</H2>
                     </div><!-- /.panel-heading -->
                     <div class="panel_body">
                     <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#menu1">Today's Due Date</a></li>
                      <li><a data-toggle="tab" href="#menu2">Master list</a></li>
                      <li><a data-toggle="tab" href="#menu3">With Penalty</a></li>
                    </ul>

  <div class="tab-content">
                <div id="menu1"" class="tab-pane fade in active">
                   <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                          <table class="table table-bordered table-hover" id="datatables-payment">
                                                <thead>
                                                    <tr>
                                                        <th class="success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                                        <th class="success" style = "text-align: center; font-size: 20px;">Address</th>
                                                        <th class="success" style = "text-align: center; font-size: 20px;">Contact No.</th>
                                                        <th class="success" style = "text-align: center; font-size: 20px;">Type of Payment</th>
                                                        <th class="success" style = "text-align: center; font-size: 20px;">Action</th>
                            
                                                    </tr>
                                            </thead>
                                                
                                                <tbody>
                                                    <tr>
                                                    <td>Daniella Soriano</td>
                                                    <td>Central City</td>
                                                    <td>0912345678</td>
                                                    <td>Installment</td>
                                                    <td align='center'>
                                                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' data-target = '#popUpWindow'><i class='glyphicon glyphicon-edit'></i></button>
                                                          <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = 'id'>
                                                          <i class='glyphicon glyphicon-trash'></i></button>
                                                    </td>
                                                    </tr>
                                                </tbody>
                                          </table>
                      </div><!-- /.table-responsive -->
                </div>
   <!--MENU 2-->
            <div id="menu2" class="tab-pane fade">
                <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                      <table class="table table-bordered table-hover" id="datatables-payment">
                                            <thead>
                                                <tr>
                                                    <th class="success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                                    <th class="success" style = "text-align: center; font-size: 20px;">Address</th>
                                                    <th class="success" style = "text-align: center; font-size: 20px;">Contact No.</th>
                                                    <th class="success" style = "text-align: center; font-size: 20px;">Type of Payment</th>
                                                    <th class="success" style = "text-align: center; font-size: 20px;">Action</th>
                        
                                                </tr>
                              </thead>
                                            
                                            <tbody>
                                                <tr>
                                                <td>Alisa Napiza</td>
                                                <td>Central City</td>
                                                <td>0918765432</td>
                                                <td>Spotcash</td>
                                                <td align='center'>
                                                    <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' data-target = '#popUpWindow'><i class='glyphicon glyphicon-edit'></i></button>
                                                      <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = 'id'>
                                                      <i class='glyphicon glyphicon-trash'></i></button>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>Marivie Pambuena</td>
                                                <td>Starling City</td>
                                                <td>0917856234</td>
                                                <td>Spotcash</td>
                                                <td align='center'>
                                                    <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' data-target = '#popUpWindow'><i class='glyphicon glyphicon-edit'></i></button>
                                                      <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = 'id'>
                                                      <i class='glyphicon glyphicon-trash'></i></button>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>Daniella Soriano</td>
                                                <td>Central City</td>
                                                <td>0912345678</td>
                                                <td>Installment</td>
                                                <td align='center'>
                                                    <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' data-target = '#popUpWindow'><i class='glyphicon glyphicon-edit'></i></button>
                                                      <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = 'id'>
                                                      <i class='glyphicon glyphicon-trash'></i></button>
                                                </td>
                                                </tr>
                                            </tbody>
                                      </table>
                                  </div><!-- /.table-responsive -->
                </div><!-- /.col-md-12 -->

        <!--MENU 3-->
                      <div id="menu3"" class="tab-pane fade">
                     <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                            <table class="table table-bordered table-hover" id="datatables-payment">
                                                  <thead>
                                                      <tr>
                                                          <th class="success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                                          <th class="success" style = "text-align: center; font-size: 20px;">Address</th>
                                                          <th class="success" style = "text-align: center; font-size: 20px;">Contact No.</th>
                                                          <th class="success" style = "text-align: center; font-size: 20px;">Type of Payment</th>
                                                          <th class="success" style = "text-align: center; font-size: 20px;">Action</th>
                              
                                                      </tr>
                                                  </thead>
                                                  
                                                  <tbody>
                                                      <tr>
                                                      <td>Jamie Percano</td>
                                                      <td>Opal City</td>
                                                      <td>0912345678</td>
                                                      <td>Installment</td>
                                                      <td align='center'>
                                                          <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' data-target = '#popUpWindow'><i class='glyphicon glyphicon-edit'></i></button>
                                                            <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = 'id'>
                                                            <i class='glyphicon glyphicon-trash'></i></button>
                                                      </td>
                                                      </tr>
                                                  </tbody>
                                            </table>
                                        </div><!-- /.table-responsive -->
                     </div> <!--END MENU3-->
   </div><!--TAB CONTENT-->

            </div><!--panel body 2-->
          </div>
       </div><!--sub column 2-->
      </div>  <!-- /page content -->
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
          <h3 class = "modal-title">Reservation Details</h3>
         </div>
                        
         <!--body (form)-->
         <div class = "modal-body">
                    
                          
           <form class="form-horizontal" role="form" action = "reservation.php" method= "post">             
                     <div class="form-group" >
                           <div class="col-sm-8">
                            <input type="hidden" class="form-control" value="0" name="tfStatus"/>
                           </div>
                      </div>
                      
                    <div class="row">
                       <div class=  "col-lg-12">
                          <div class="panel panel-default">
                        
                                <div class="panel-body">
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <form role="form">
                                                 <div class="form-group">
                                                  <div class="col-sm-10">

                                                  <legend> Customer Details</legend>      

                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>Last Name:</label>
                                                    <input type="text" class="form-control input-md" name="tfLastname" placeholder="Last Name"
                                                            onkeypress="return validateName(event)" maxlength="50" required/>
                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>First Name:</label>
                                                    <input type="text" class="form-control input-md" name="tfFirstName" placeholder="First Name" required
                                                                 onkeypress="return validateName(event)" maxlength="50"/>
                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em">Middle Name:</label>
                                                    <input type="text" class="form-control input-md" name="tfMiddleName" placeholder="Middle Name" 
                                                                               onkeypress="return validateName(event)" maxlength="50"/>
                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>Home Address:</label>
                                                    <input type="text" class="form-control input-md" name="tfAddress" placeholder="Home Address" required/>
                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>Contact No:</label>
                                                    <input type="text" class="form-control input-md" name="tfContact" id="tfContactCreate" placeholder="Contact No." required/>
                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>Email Address</label>
                                                    <input type="email" class="form-control input-md" name="tfEmail" id="tfEmailCreate" placeholder="Email Address" required/>
                                                
                                                    </div>
                                                 </div>
                                                </form>
                                          </div>

                                            <div class="col-xs-6 col-sm-3">
                                              <legend> Unit Details</legend>
                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>Total Amount:</label>
                                                      <div class="input-group">
                                                        <span class = 'input-group-addon'>₱</span>
                                                        <input type="text" class="form-control input-sm" name="tfAmount" id="tfAmountCreate" placeholder="Automatic price from database" required disabled="true" />
                                                      </div>
                                             <form name="myform">
                                               <table>
                                                 <tr>
                                                   <td>
                                                      <label style = " font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>Type of Payment</label>
                                                                <select class="form-control" id="sel1" name = "typeOfPayment" onchange="showDiv1(this)" required >
                                                                    <option value = "0">Spotcash</option>
                                                                    <option value = "1">Installment</option>
                                                                </select>
                                                          <script type="text/javascript">
                                                                function showDiv1(elem){
                                                                 if(elem.value == 0)
                                                                      document.getElementById('interest').style.visibility = 'hidden' ;
                                                                   
                                                                 else if(elem.value == 1)
                                                                      document.getElementById('interest').style.visibility = 'visible' ;
                                                                } 
                                                         </script>
                                                      <label style = " font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>Amount Paid:</label>
                                                      <div class="input-group">
                                                        <span class = 'input-group-addon'>₱</span>
                                                        <input type="text" class="form-control input-sm" name="tfAmount" id="tfAmountCreate" placeholder="Amount" required />
                                                      </div>

                                                      <div id="interest" style="visibility:hidden;">
                                                        <label name="interest" style = "font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>Term</label>

                                                           <select class="form-control" id="sel1" name = "interestrate" required>
                                                              <option value = "db">Kunin sa database</option>
                                                           </select>
                                                          <h2> COMPUTATION?</h2>
                                                  </div>

                                                    </td>
                                                  </tr>
                                              </table>
                                          </form>
                                            

                                                            


                                                             
                                        </div>

                            </div>
                           </div> <!--PANEL BODY-->

                     <div class="form-group modal-footer"> 
                                <h5 class="col-md-4" style = "color: red;" align="right" style="margin-top:.30em">(*) REQUIRED FIELDS</h5>
                                <div class="col-sm-8">
                  <button type="submit" class="btn btn-success" name= "btnSubmit">Submit</button>
                  <input class = "btn btn-default"  type="reset" name = "btnClear" value = "Clear">
                 </div>
               </div>
                 
              </div>
              </div>
  </body>
</html>