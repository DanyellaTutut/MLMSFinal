<!DOCTYPE html>
<html lang = "en">
  <head>
		<!-- BEGIN  META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->
         
		<title>MLMS-Unit Reservation</title>
		

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
						
                            <li class="active"><a href = "reservation.php">RESERVATION</a></li>
                            <li><a href = "payment.php">PAYMENT</a></li>
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
		
		<!--boo-->
    <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-success ">
                     <div class="panel-heading">
                       
                         <H2>RESERVATION</H2>
                     </div><!-- /.panel-heading -->
                     
                      <div class="panel-body">
                          <div class="col-md-4 column">
                            <div class="panel panel-success">
                                <div class="panel-heading"><h3>Create New</h3></div>
                                 <div class="panel-body">
                                  <div class = "body">
                                  <form class="form-horizontal"   role="form" action = "reservation.php" method= "POST">
                                                
                                  <h1>Insert Map Here</h1>
                                <!--ALL FIELDS ARE REQUIRED-->

                               <div class="form-group modal-footer"> 
                                          
                                 <div class="col-sm-7">
                                <button type="button" class="btn btn-success" name= "btnSubmit" data-toggle = 'modal' title='Edit' data-target = '#popUpWindow'>Save</button>
                            <input class = "btn btn-default"  type="reset" name = "btnClear" value = "Clear Entries">
                           </div>
                         </div>
                                        
                      </form><!--Form-->
                    </div> <!--body-->
                   </div>
                </div>
              </div>
            

            <!-- LIST-->

              <div class="col-md-8 column">
                <div class="panel panel-default" style="margin-left: 20px;">
                    <div class="panel-heading"><h3>List</h3></div>
                     <div class="panel-body" id="sectionBody">
                                   <div class="block">
                                      <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                              <table class="table table-bordered table-hover" id="datatables-reserve">
                                    <thead>
                                        <tr>
                                            <th class="success" style = "text-align: center; font-size: 16px;">Date</th>
                                            <th class="success" style = "text-align: center; font-size: 16px;">Customer Name</th>
                                            <th class="success" style = "text-align: center; font-size: 16px;">Address</th>
                                            <th class="success" style = "text-align: center; font-size: 16px;">Contact No.</th>
                                            <th class="success" style = "text-align: center; font-size: 16px;">Type of Unit</th>
                                            <th class="success" style = "text-align: center; font-size: 16px;">Action</th>
                
                                        </tr>
                      </thead>
                                    
                                    <tbody>
                                      <tr>
                                        <td>01/21/2016</td>
                                        <td>Daniella Soriano</td>
                                        <td>Central City</td>
                                        <td>0912345678</td>
                                        <td>Lot</td>
                                        <td align='center'>
                                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' data-target = '#viewWindow'><i class='glyphicon glyphicon-eye-open'></i></button>
                                              <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = 'id'>
                                              <i class='glyphicon glyphicon-trash'></i></button>
                                        </td>
                                      </tr>
                                    </tbody>
                              </table>
                          </div><!-- /.table-responsive -->
                                 </div>
                     </div> <!-- panel-body -->
                  </div> <!-- panel panel-success -->
                </div>

                <!--end-->
              </div> <!-- panel-body -->

        </div>
      </div>
    </div>
               

 	 <!--Modal Create New--> 
   <div class = "modal fade" id = "popUpWindow">
		<div class = "modal-dialog" style = "width:80%;">
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
                            <h4 class="col-md-5" style = "color: red;" align="right" style="margin-top:.30em">(*) REQUIRED FIELDS</h4>
                          </div> <!--PANEL BODY-->

        
              <div class="form-group"> 
                <div style= "" class="col-sm-offset-5 col-sm-7">
                  <button type="submit" class="btn btn-success" name= "btnSubmit">Submit</button>
                  <input class = "btn btn-success" type="reset" name = "btnClear" value = "Clear Entries">
                </div>
              </div>
              </div>
                  </div>
                  </div><!--ROW-->
                      
                              
          </form><!--Form-->
        </div> <!--modal-body-->
        
       </div> <!--modal-content-->
    </div> <!--modal-dialog-->
  </div> <!--modal-fade-->

<!--MODAL VIEW-->

 <div class = "modal fade" id = "viewWindow">
    <div class = "modal-dialog" style = "width:80%;">
       <div class = "modal-content">
         <!--header-->
                 <div class = "modal-header" style="background:#b3ffb3;">
          <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
          <h3 class = "modal-title">View Reservation</h3>
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

                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em">Full Name</label>
                                                    <input type="text" class="form-control input-md" name="tfLastname" placeholder="Full Name" disabled="true" />
                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em" disabled="true">Home Address:</label>
                                                    <input type="text" class="form-control input-md" name="tfAddress" placeholder="Home Address" disabled="true" />
                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em">Contact No:</label>
                                                    <input type="text" class="form-control input-md" name="tfContact" id="tfContactCreate" placeholder="Contact No." disabled="true" />
                                                    <label style = " font-size: 14px;" align="right" style="margin-top:.30em">Email Address</label>
                                                    <input type="email" class="form-control input-md" name="tfEmail" id="tfEmailCreate" placeholder="Email Address" disabled="true" />
                                                
                                                    </div>
                                                 </div>
                                                </form>
                                          </div>

                                            <div class="col-xs-6 col-sm-3">
                                              <legend> Unit Details</legend>
                                            
                                            <form name="myform">
                                               <table>
                                                 <tr>
                                                   <td>
                                                      <label style = " font-size: 14px;" align="right" style="margin-top:.30em"><span style = "color: red; font-size: 14px;">*</span>Unit Owned</label>
                                                                <select class="form-control" id="sel1" name = "unitOwned" onchange="showDiv(this)" required >   <option value = "0">Select Unit</option>
                                                                    <option value = "1">Kunin sa database</option>
                                                                    <option value = "2">kung multiple</option>
                                                                </select>
                                                          <script type="text/javascript">
                                                                function showDiv(elem){
                                                                 if(elem.value == 0)
                                                                      document.getElementById('divHidden').style.visibility = 'hidden' ;
                                                                   
                                                                 else if(elem.value == 1)
                                                                      document.getElementById('divHidden').style.visibility = 'visible' ;

                                                                 else if(elem.value == 2)
                                                                      document.getElementById('divHidden').style.visibility = 'visible' ;
                                                                } 
                                                         </script>
                                                     
                                                      <div id="divHidden" style="visibility:hidden;">
                                                      <label style = " font-size: 14px;" align="right" style="margin-top:.30em">Total Amount:</label>
                                                       <input type="text" class="form-control input-md" name="totalAmt" id="totalAmt" placeholder="Total" disabled="true" />
                                                      <label name="interest" style = "font-size: 14px;" align="right" style="margin-top:.30em">Term</label>
                                                      <input type="text" class="form-control input-md" name="paymentType" id="paymentType" placeholder="Payment Type" disabled="true" />
                                                          <h2> COMPUTATION?</h2>
                                                      </div>
                                                    </td>
                                                  </tr>
                                              </table>
                                          </form>
                                                    
                                             
                                            

                                                            


                                                             
                                        </div>

                            </div>
                            <h4 class="col-md-5" style = "color: red;" align="right" style="margin-top:.30em">(*) REQUIRED FIELDS</h4>
                          </div> <!--PANEL BODY-->

                
              <div class="form-group"> 
                <div style= "" class="col-sm-offset-5 col-sm-7">
                  <button type="submit" class="btn btn-success" name= "btnSubmit">Submit</button>
                  <input class = "btn btn-success" type="reset" name = "btnClear" value = "Clear Entries">
                </div>
              </div>
              </div>
                  </div>
                  </div><!--ROW-->
                      
                              
          </form><!--Form-->
        </div> <!--modal-body-->
       </div> <!--modal-content-->
    </div> <!--modal-dialog-->
  </div> <!--modal-fade-->


	
  </body>
</html>
