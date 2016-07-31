<?php

require ("controller/connection.php");
require('transaction/transViewdata.php');
require('transaction/transCreatedata.php');
require('transaction/transUpdatedata.php');
require('transaction/transDeactivate.php');


if (isset($_POST['btnSubmit']))
      {

		//echo "Record sucessfully saved";
        $tfStatus=$_POST['tfStatus'];
        $tfName=$_POST['tfName'];
		$tfDate = $_POST['tfDate'];
		$tfLotUnit= $_POST['tfLotUnit'];
		$tfBlock= $_POST['tfBlock'];
		$tfSection= $_POST['tfSection'];
		$tfAmount= $_POST['tfAmount'];
		
        
        $dateCreated = date('Y-m-d',strtotime($tfDate));
		
		$createSpotLotReserve =  new createSpotLotReserve();
		$createSpotLotReserve->Create($tfStatus,$tfName,$dateCreated,$tfLotUnit,$tfBlock,$tfSection,$tfAmount);
      }
      
if (isset($_POST['btnSubmit1']))
      {

		//echo "Record sucessfully saved";
        $tfStatus1=$_POST['tfStatus1'];
        $tfName1=$_POST['tfName1'];
		$tfDate1 = $_POST['tfDate1'];
		$tfUnitName= $_POST['tfUnitName'];
		$tfLevelName= $_POST['tfLevelName'];
		$tfAshName= $_POST['tfAshName'];
		$tfAmount= $_POST['tfAmount'];
		
        
        $dateCreated = date('Y-m-d',strtotime($tfDate1));
		
		$createSpotAshReserve =  new createSpotAshReserve();
		$createSpotAshReserve->Create($tfStatus1,$tfName1,$dateCreated,$tfUnitName,$tfLevelName,$tfAshName,$tfAmount);
      }
	  
if (isset($_POST['btnSave']))
      {

		//echo "Record sucessfully saved";
		$tfReservationLotID = $_POST['tfReservationLotID'];
        $tfDate = $_POST['tfDate'];
        $tfLastName = $_POST['tfLastName'];
        $tfFirstName = $_POST['tfFirstName'];
        $tfMiddleName = $_POST['tfMiddleName'];
        $tfAddress = $_POST['tfAddress'];
        $tfContactNo = $_POST['tfContactNo'];
		$typeOfPayment= $_POST['typeOfPayment'];
		$location= $_POST['location'];
		$tfAmount= $_POST['tfAmount']; 
        
        $dateCreated = date('Y-m-d',strtotime($tfDate));
		
		
		$updateReservationLot =  new updateReservationLot();
		$updateReservationLot->update($tfReservationLotID,$dateCreated,$tfLastName,$tfFirstName,$tfMiddleName,$tfAddress,$tfContactNo,
                                      $typeOfPayment,$location,$tfAmount);
      }

	   
      
if (isset($_POST['btnDeactivate']))
      {

		//echo "Record sucessfully saved";
		$tfSpotLotReserveID = $_POST['tfSpotLotReserveID'];
		
		
		$deactivateSpotLotReserve =  new deactivateSpotLotReserve();
		$deactivateSpotLotReserve->deactivate($tfSpotLotReserveID);
      }

if (isset($_POST['btnDeactivate1']))
      {

		//echo "Record sucessfully saved";
		$tfSpotAshReserveID = $_POST['tfSpotAshReserveID'];
		
		
		$deactivateSpotAshReserve =  new deactivateSpotAshReserve();
		$deactivateSpotAshReserve->deactivate($tfSpotAshReserveID);
      }
	  
?>


<!DOCTYPE html>
<html lang = "en">
  <head>
		<!-- BEGIN  META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->
         
		<title>MLMS-Spotcash</title>
		<link type="text/css" rel="stylesheet" href="assets/css/theme-default/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="assets/css/theme-default/font-awesome.min.css" />
		<link type="text/css" rel="stylesheet" href="assets/css/theme-default/material-design-iconic-font.min.css" />
        <link type="text/css" rel="stylesheet" href="assets/css/theme-default/libs/DataTables/jquery.dataTables.css" />
        <link type="text/css" rel="stylesheet" href="assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css" />
        <link type="text/css" rel="stylesheet" href="assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css" />
        
		<link rel="stylesheet" href="css/reservation.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
        
        
		<script src="assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/js/libs/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/libs/spin.js/spin.min.js"></script>
		<script src="assets/js/libs/autosize/jquery.autosize.min.js"></script>
        <script src="assets/js/libs/mask/jquery.mask.min.js"></script>
        
		<script src="assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
        <script src="assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
		<script src="assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
        
        <!--Data Table-->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#datatables-spotcash').DataTable();
                
            });
        </script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('#datatables-spotcashAC').DataTable();
                
            });
        </script>
        
        
        <script>
            function validateName(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode == 8 || charCode == 32 || (charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)){
                    return true;
                    }else{
                    return false;
                    }
                }
        </script>
        
        <script>
                function showUser(str) {
                    
                    if (str == "") {
                        
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                    } else { 
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET","spotLotReserve.php?q="+str,true);
                        xmlhttp.send();
                    }
                }
                
                 function showCustomer(str) {
                    
                    if (str == "") {
                        
                        document.getElementById("reserveData").innerHTML = "";
                        return;
                    } else { 
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("reserveData").innerHTML = xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET","spotAshReserve.php?ash="+str,true);
                        xmlhttp.send();
                    }
                }
        </script>
        <style>
            td{
                font-size: 15px;
            }
        </style>
        

  </head>
  
  <body>
		<div id = "header">
			<img id = "headerLogo" src = "images/logo.png"/>
		</div>
		
		<div>
			<nav class="navbar navbar-default">
			  
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				  </button>
				</div>
				
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="home.php">HOME</a></li>
					
					<li class="dropdown ">
						<a class="dropdown-toggle" data-toggle="dropdown">MAINTENANCE <span class="caret"></span></a>
						<ul class="dropdown-menu">
							
                            <li><a href = "typeoflot.php">LOT TYPE</a></li>
                            <li><a href = "interest.php">INTEREST RATE</a></li>
                            <li><a  href = "section.php">SECTION</a></li>
                            <li><a href = "block.php">BLOCK</a></li>
                            <li><a href = "lot.php">LOT-UNIT</a></li>
                            
                            <li class = "divider"></li>
                            <li><a href = "ashcrypt.php">ASH CRYPT</a></li>
                            <li><a href = "levelAsh.php">LEVEL</a></li>
                            <li><a href = "interestForLevel.php">INTEREST RATE</a></li>
                            <li><a href = "ashcryptUnit.php">ASH CRYPT-UNIT</a>
                            
                            
                            <li class = "divider"></li>
                            <li><a href = "service.php">SERVICE</a></li>
                            <li><a href = "discount.php">DISCOUNT</a></li>

						</ul>
					</li>
					
					<li class="dropdown  active">
						<a href ="#" class="dropdown-toggle" data-toggle="dropdown">TRANSACTION <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class = "dropdown-header" style="font-size: 15px;">RESERVATION</li>
                            <li><a href = "lotReservation.php" style="text-align: right;">LOT-UNIT</a></li>
                            <li><a href = "acReservation.php" style="text-align: right;">AC-UNIT</a></li>
                            <li class = "divider"></li>
                            
                            <li class="dropdown-header" style="font-size: 15px;">PAYMENT</li>
                            <li  class="active"><a href = "spotcash.php" style="text-align: right;">SPOTCASH</a></li>
                            <li><a href = "installment.php" style="text-align: right;">INSTALLMENT</a></li>
                            <li class = "divider"></li>
                            
                            <li><a href = "contract.php">CONTRACT</a></li>
                            <li><a href = "request.php">REQUEST</a></li>
						</ul>
					</li>
                    
					<li class="dropdown">
						<a href ="#" class="dropdown-toggle" data-toggle="dropdown">QUERIES <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href = "masterlist.php">MASTER LIST</a></li>
							<li><a href = "#">link 1</a></li>
							<li><a href = "#">link 1</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href ="#" class="dropdown-toggle" data-toggle="dropdown">REPORTS <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href = "#">link 1</a></li>
							<li><a href = "#">link 1</a></li>
							<li><a href = "#">link 1</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href ="#" class="dropdown-toggle" data-toggle="dropdown">UTILITIES <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href = "employee.php">EMPLOYEE</a></li>
							<li><a href = "#">link 1</a></li>
							<li><a href = "#">link 1</a></li>
						</ul>
					</li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<form action="apartment.php" method="post">
					<a href = "login.php" onclick="return confirm('Are you sure you want to logout?');" class="btn btn-default" name= "btnLogout" style = "margin-top:10px; margin-right:10px;">
					<span class="glyphicon glyphicon-log-out"></span>
					</a>
					</form>
				  </ul>
				</div>
			</nav>
		</div>
		
		<div class="row">
        <div class="col-md-12">
        <ul id="tabs-demo" class="nav nav-tabs nav-tabs-v3" role="tablist" style="padding-top:10px;">
                <li role="presentation" class="active">
                <a href="#lottable" data-toggle="tab">LOT-UNIT</a>
                </li>
                <li role="presentation" class="">
                <a href="#ashtable" id="tabs2" data-toggle="tab">ASH-UNIT</a>
                </li>
        </ul>
        </div>
        </div>
        
        <div class="tab-content">
        <div class="tab-pane fade active in" id="lottable">
            <div class="panel panel-success ">
                     <div class="panel-heading">
                         
                         <H2>SPOTCASH FOR LOT</H2>
                     </div><!-- /.panel-heading -->
                     
                      <div class="panel-body">
                          
                          <div>
                             <div class="pull-right" style='margin-right: 20px;'>
                                <button type = "button" class = "btn btn-primary  col-md-12 col-lg-12 col-xs-12" data-toggle = "modal" data-target = "#modalLot">Create New</button>
                             </div>
                          </div>
                          
                          <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                              <table class="table table-bordered table-hover" id="datatables-spotcash">
                                    <thead>
                                        <tr>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Date</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Location</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Amount Paid</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Action</th>
                                            
                                        </tr>
						        	</thead>
                                    
                                    <tbody>
                                        <?php
                                            $view = new spotcashLot();
                                            $view->viewSpotcashLot();
                                        ?>
                                    </tbody>
                              </table>
                          </div><!-- /.table-responsive -->
                   </div><!-- /.panel-body -->
            
        </div>
        </div>
        
        <div class="tab-pane fade " id="ashtable">
            <div class="panel panel-success ">
                     <div class="panel-heading">
                         
                         <H2>SPOTCASH FOR ASH CRYPT</H2>
                     </div><!-- /.panel-heading -->
                     
                      <div class="panel-body">
                          
                          <div>
                             <div class="pull-right" style='margin-right: 20px;'>
                                <button type = "button" class = "btn btn-primary  col-md-12 col-lg-12 col-xs-12" data-toggle = "modal" data-target = "#modalAsh">Create New</button>
                             </div>
                          </div>
                          
                          <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                              <table class="table table-bordered table-hover" id="datatables-spotcashAC">
                                    <thead>
                                        <tr>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Date</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Location</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Amount Paid</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Action</th>
                                            
                                        </tr>
						        	</thead>
                                    
                                    <tbody>
                                        <?php
                                            $view1 = new spotcashAsh();
                                            $view1->viewSpotcashAsh();
                                        ?>
                                    </tbody>
                              </table>
                          </div><!-- /.table-responsive -->
                   </div><!-- /.panel-body -->
            </div>
        </div>
        
        
        
		

 	 <!--Modal Create--> 
   <div class = "modal fade" id = "modalLot">
		<div class = "modal-dialog" style = "width: 60%;">
			 <div class = "modal-content">
				 <!--header-->
                 <div class = "modal-header" style="background:#b3ffb3;">
					<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
					<h3 class = "modal-title">Create New:</h3>
				 </div>
												
				 <!--body (form)-->
				 <div class = "modal-body">		
					 <form class="form-horizontal" role="form" action = "spotcash.php" method= "post">						  
					        
                              <div class="form-group" >
                                    <div class="col-sm-8">
                                        <input type="hidden" class="form-control" value="0" name="tfStatus"/>
                                    </div>
                                </div>
							
                             
                             <div class="form-group">
                                 <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Customer:</label>
								<div class="col-sm-5">
										<select class="form-control" name = "tfName" onchange="showUser(this.value)">
                                            <option value="">Choose Customer Name...</option>
												<?php
                                                    $view->selectSpotcashLot();
                                                ?>
										</select>
									</div>
					         </div><!-- FORM GROUP -->
                             
                             <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em">Date:</label>
                                 <div class="col-md-5">
                                     <input type="date" class="form-control input-md" name="tfDate" required/>
                                  </div>
                              </div><!-- FORM GROUP -->
                              
                               <div id="txtHint"><b>Reservation info of customer will be listed here...</b></div>
                             							  
							<div class="form-group modal-footer">
                                <h4 class="col-md-5" style = "color: red;" align="right" style="margin-top:.30em">REQUIRED ALL FIELDS</h4>
								<div class="col-sm-7">
									<button type="submit" class="btn btn-success" name= "btnSubmit">Pay</button>
									<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
								</div>
							</div>
														  
					</form><!--Form-->
				</div> <!--modal-body-->
		   </div> <!--modal-content-->
		</div> <!--modal-dialog-->
	</div> <!--modal-fade-->
    
    
    
    
     <!--Modal Create--> 
   <div class = "modal fade" id = "modalAsh">
		<div class = "modal-dialog" style = "width: 60%;">
			 <div class = "modal-content">
				 <!--header-->
                 <div class = "modal-header" style="background:#b3ffb3;">
					<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
					<h3 class = "modal-title">Create New:</h3>
				 </div>
												
				 <!--body (form)-->
				 <div class = "modal-body">		
					 <form class="form-horizontal" role="form" action = "spotcash.php" method= "post">						  
					        
                              <div class="form-group" >
                                    <div class="col-sm-8">
                                        <input type="hidden" class="form-control" value="0" name="tfStatus1"/>
                                    </div>
                                </div>
							
                             
                             <div class="form-group">
                                 <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Customer:</label>
								<div class="col-sm-5">
										<select class="form-control" name = "tfName1" onchange="showCustomer(this.value)">
                                            <option value="">Choose Customer Name...</option>
												<?php
                                                     $view1->selectSpotcashAsh();
                                                ?>
										</select>
									</div>
					         </div><!-- FORM GROUP -->
                             
                             <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em">Date:</label>
                                 <div class="col-md-5">
                                     <input type="date" class="form-control input-md" name="tfDate1" required/>
                                  </div>
                              </div><!-- FORM GROUP -->
                              
                               <div id="reserveData"><b>Reservation info of customer will be listed here...</b></div>
                             							  
							<div class="form-group modal-footer">
                                <h4 class="col-md-5" style = "color: red;" align="right" style="margin-top:.30em">REQUIRED ALL FIELDS</h4>
								<div class="col-sm-7">
									<button type="submit" class="btn btn-success" name= "btnSubmit1">Pay</button>
									<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
								</div>
							</div>
														  
					</form><!--Form-->
				</div> <!--modal-body-->
		   </div> <!--modal-content-->
		</div> <!--modal-dialog-->
	</div> <!--modal-fade-->

 <script>
        $('#tfAmountCreate').mask('000000000000.00',{reverse:true});
        $('.tfAmountUpdate').mask('000000000000.00',{reverse:true});
        $('#tfContactCreate').mask('00000000000',{reverse:true});
        $('.tfContactUpdate').mask('00000000000',{reverse:true});
 </script>
	
  </body>
</html>
