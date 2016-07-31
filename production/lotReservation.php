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
		$tfDate = $_POST['tfDate'];
		$tfLastName= $_POST['tfLastname'];
		$tfFirstName= $_POST['tfFirstName'];
		$tfMiddleName= $_POST['tfMiddleName'];
		$tfAddress= $_POST['tfAddress'];
		$tfContactNo= $_POST['tfContact'];
		$typeOfPayment= $_POST['typeOfPayment'];
		$location= $_POST['location'];
		$tfAmount= $_POST['tfAmount'];
        
        $dateCreated = date('Y-m-d',strtotime($tfDate));
		
		$createReservationLot =  new createReservationLot();
		$createReservationLot->Create($tfStatus,$dateCreated,$tfLastName,$tfFirstName,$tfMiddleName,$tfAddress,$tfContactNo,$typeOfPayment,
                                        $location,$tfAmount);
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
		$tfReservationLotID = $_POST['tfReservationLotID'];
        $location= $_POST['location'];
		
		
		$deactivateReservationLot =  new deactivateReservationLot();
		$deactivateReservationLot->deactivate($tfReservationLotID,$location);
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
         
		<title>MLMS-Reservation for Lot</title>
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
                $('#datatables-reservelot').DataTable();
                
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
                            <li class="active"><a href = "lotReservation.php" style="text-align: right;">LOT-UNIT</a></li>
                            <li><a href = "acReservation.php" style="text-align: right;">AC-UNIT</a></li>
                            <li class = "divider"></li>
                            
                            <li class="dropdown-header" style="font-size: 15px;">PAYMENT</li>
                            <li><a href = "spotcash.php" style="text-align: right;">SPOTCASH</a></li>
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
		
		
		

        <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-success ">
                     <div class="panel-heading">
                         
                         <H2>RESERVATION FOR LOT</H2>
                     </div><!-- /.panel-heading -->
                     
                      <div class="panel-body">
                          
                          <div>
                             <div class="pull-right" style='margin-right: 20px;'>
                                <button type = "button" class = "btn btn-primary  col-md-12 col-lg-12 col-xs-12" data-toggle = "modal" data-target = "#popUpWindow">Create New</button>
                             </div>
                          </div>
                          
                          <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                              <table class="table table-bordered table-hover" id="datatables-reservelot">
                                    <thead>
                                        <tr>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Date</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Address</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Contact No.</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Type of Payment</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Location</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Amount Paid</th>
                                            <th class="success" style = "text-align: center; font-size: 20px;">Action</th>
								
                                        </tr>
						        	</thead>
                                    
                                    <tbody>
                                        <?php
                                            $view = new reservationLot();
                                            $view->viewReservationLot();
                                        ?>
                                    </tbody>
                              </table>
                          </div><!-- /.table-responsive -->
                   </div><!-- /.panel-body -->
             </div>
        </div><!-- /.col-md-12 -->
   </div>
				

 	 <!--Modal Create--> 
   <div class = "modal fade" id = "popUpWindow">
		<div class = "modal-dialog" style = "width: 60%;">
			 <div class = "modal-content">
				 <!--header-->
                 <div class = "modal-header" style="background:#b3ffb3;">
					<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
					<h3 class = "modal-title">Create New:</h3>
				 </div>
												
				 <!--body (form)-->
				 <div class = "modal-body">		
					 <form class="form-horizontal" role="form" action = "lotReservation.php" method= "post">						  
					        
                              <div class="form-group" >
                                    <div class="col-sm-8">
                                        <input type="hidden" class="form-control" value="0" name="tfStatus"/>
                                    </div>
                                </div>
							
                             
                             <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 20px;">*</span>Date:</label>
                                 <div class="col-md-5">
                                     <input type="date" class="form-control input-md" name="tfDate" required/>
                                  </div>
                              </div><!-- FORM GROUP -->
                             
                             <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 20px;">*</span>Last Name:</label>
                                 <div class="col-md-5">
                                     <input type="text" class="form-control input-md" name="tfLastname" placeholder="Last Name..."
                                         onkeypress="return validateName(event)" maxlength="50" required/>
                                  </div>
                              </div><!-- FORM GROUP -->
                             
                              <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 20px;">*</span>First Name:</label>
                                 <div class="col-md-5">
                                     <input type="text" class="form-control input-md" name="tfFirstName" placeholder="First Name..." required
                                         onkeypress="return validateName(event)" maxlength="50"/>
                                  </div>
                              </div><!-- FORM GROUP -->
                             
							  <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em">Middle Name:</label>
                                 <div class="col-md-5">
                                     <input type="text" class="form-control input-md" name="tfMiddleName" placeholder="Middle Name..." 
                                         onkeypress="return validateName(event)" maxlength="50"/>
                                  </div>
                              </div><!-- FORM GROUP -->
                             
                               <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 20px;">*</span>Address:</label>
                                 <div class="col-md-5">
                                     <input type="text" class="form-control input-md" name="tfAddress" placeholder="Address..." required/>
                                  </div>
                              </div><!-- FORM GROUP -->
                             
                               <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 20px;">*</span>Contact No:</label>
                                 <div class="col-md-5">
                                     <input type="text" class="form-control input-md" name="tfContact" id="tfContactCreate" placeholder="Contact No..." required/>
                                  </div>
                              </div><!-- FORM GROUP -->
                             
                               <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 20px;">*</span>Location</label>
                                 <div class="col-md-5">
                                     <select class="form-control" id="sel1" name = "location" required>
                                            <?php
                                                $view->selectLotUnit();
                                                ?>
                                        </select>
                                  </div>
                              </div><!-- FORM GROUP -->
                              
                              <div class="form-group">
								<label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 20px;">*</span>Type of Payment</label>
									<div class="col-sm-5">
										<select class="form-control" id="sel1" name = "typeOfPayment" required>
												<option value = "0">Spotcash</option>
												<option value = "1">Installment</option>
										</select>
									</div>
					         </div><!-- FORM GROUP -->
                             
                             <div class="form-group">
                                 <label class="col-md-4" style = " font-size: 18px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 20px;">*</span>Reservation Fee:</label>
                                 <div class="col-md-5">
                                     <div class="input-group">
                                        <span class = 'input-group-addon'>₱</span>
                                        <input type="text" class="form-control input-md" name="tfAmount" id="tfAmountCreate" required/>
                                     </div>
                                  </div>
                              </div><!-- FORM GROUP -->
                                           
              											  
							<div class="form-group modal-footer">
                                <h4 class="col-md-5" style = "color: red;" align="right" style="margin-top:.30em">(*)REQUIRED FIELDS</h4>
								<div class="col-sm-7">
									<button type="submit" class="btn btn-success" name= "btnSubmit">Submit</button>
									<input class = "btn btn-default" type="reset" name = "btnClear" value = "Clear Entries">
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
