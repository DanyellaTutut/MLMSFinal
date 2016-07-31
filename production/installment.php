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
		$term= $_POST['term'];
		$rate= $_POST['rate'];
		$tfDownpayment= $_POST['tfDownpayment'];
		
        $dblRate=$rate/100;
        $dblBalance=$tfAmount-$tfDownpayment;
        
        $dateCreated = date('Y-m-d',strtotime($tfDate));
		
        
		$createInstallmentLot =  new createInstallmentLot();
		$createInstallmentLot->Create($tfStatus,$tfName,$dateCreated,$tfLotUnit,$tfBlock,$tfSection,$term,$dblRate,$tfDownpayment,$dblBalance);
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
		$tfAmount1= $_POST['tfAmount1'];
		$term1= $_POST['term1'];
		$rate1= $_POST['rate1'];
		$tfDownpayment1= $_POST['tfDownpayment1'];
		
        $dblRate=$rate1/100;
        $dblBalance=$tfAmount1-$tfDownpayment1;
        
        $dateCreated = date('Y-m-d',strtotime($tfDate1));
		
		$createInstallmentAsh =  new createInstallmentAsh();
		$createInstallmentAsh->Create($tfStatus1,$tfName1,$dateCreated,$tfUnitName,$tfLevelName,$tfAshName,$dblBalance,$dblRate,$term1,$tfDownpayment1);
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
		$tfInstallmentLotID = $_POST['tfInstallmentLotID'];
		
		
		$deactivateInstallmentLot =  new deactivateInstallmentLot();
		$deactivateInstallmentLot->deactivate($tfInstallmentLotID);
      }

if (isset($_POST['btnDeactivate1']))
      {

		//echo "Record sucessfully saved";
		$tfInstallmentAshID = $_POST['tfInstallmentAshID'];
        
		$deactivateInstallmentAsh =  new deactivateInstallmentAsh();
		$deactivateInstallmentAsh->deactivate($tfInstallmentAshID);
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
        
    <title>MLMS-Installment</title>
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
            $('#datatables-installmentLot').DataTable();
            
        });
        $(document).ready(function(){
            $('#datatables-viewLot').DataTable();
            
        });
        $(document).ready(function(){
            $('#datatables-installmentAC').DataTable();
            
        });
        $(document).ready(function(){
            $('#datatables-viewAsh').DataTable();
            
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
                    xmlhttp.open("GET","installmentLot.php?q="+str,true);
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
                    xmlhttp.open("GET","installmentAsh.php?ash="+str,true);
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
    <div id = "header"><img id = "headerLogo" src = "images/logo.png"/></div>
		
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
                        <li><a href = "spotcash.php" style="text-align: right;">SPOTCASH</a></li>
                        <li  class="active"><a href = "installment.php" style="text-align: right;">INSTALLMENT</a></li>
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
                    <H2>INSTALLMENT FOR LOT</H2>
                </div><!-- /.panel-heading -->
                     
                <div class="panel-body">
                    <div>
                        <div class="pull-right" style='margin-right: 20px;'>
                            <button type = "button" class = "btn btn-primary  col-md-12 col-lg-12 col-xs-12" data-toggle = "modal" data-target = "#modalLot">Create New</button>
                        </div>
                    </div>
                          
                    <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                        <table class="table table-bordered table-hover" id="datatables-installmentLot">
                            <thead>
                                <tr>
                                    <th class="success" style = "text-align: center; font-size: 20px;">Date</th>
                                    <th class="success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                    <th class="success" style = "text-align: center; font-size: 20px;">Location</th>
                                    <th class="success" style = "text-align: center; font-size: 20px;">Term</th>
                                    <th class="success" style = "text-align: center; font-size: 20px;">Rate</th>
                                    <th class="success" style = "text-align: center; font-size: 20px;">Downpayment</th>
                                    <th class="success" style = "text-align: center; font-size: 20px;">Balance</th>
                                    <th class="success" style = "text-align: center; font-size: 20px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    
    $sql = "SELECT iL.intInstallmentLotID, iL.datDateCreated, iL.strLastName, iL.strFirstName, iL.strMiddleName, iL.strLotName, iL.strBlockName, iL.strSectionName,
            iL.intTerm, iL.dblRate, iL.dblDownPayment, iL.dblBalance, iL.intStatus FROM tblinstallmentlot iL
                    INNER JOIN tblreservationlot rl ON rl.intReservationLot_id = iL.intReservationLotID WHERE iL.intStatus='0' ORDER BY iL.datDateCreated ASC";        
        
    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
    mysql_select_db(constant('mydb'));
    $result = mysql_query($sql,$conn);

    while($row = mysql_fetch_array($result)) { 
        
        $intInstallmentLotID = $row['intInstallmentLotID'];
        $datDateCreated = $row['datDateCreated'];
        $strLastName = $row['strLastName'];
        $strFirstName = $row['strFirstName'];
        $strMiddleName = $row['strMiddleName']; 
        $strLotName = $row['strLotName'];
        $strBlockName =$row['strBlockName']; 
        $strSectionName = $row['strSectionName'];
        $intTerm = $row['intTerm'];
        $dblRate = $row['dblRate'];
        $dblDownPayment = $row['dblDownPayment'];
        $dblBalance = $row['dblBalance'];
        $intStatus = $row['intStatus'];
        
        $rate = $dblRate*100;
        
        if($intTerm=='1'){
            $months='12';
        }else if($intTerm=='2'){
            $months='24';
        }else if($intTerm=='3'){
            $months='36';
        }else{
            $months='48';
        }
        
        $x=$dblBalance/$months;
        $y=$x*$dblRate;
        $amortization=$x+$y;
        
        echo "<tr>
                <td align='right'>$datDateCreated</td>
                <td>$strLastName, $strFirstName $strMiddleName</td>
                <td>$strLotName/$strBlockName/$strSectionName</td>
                <td align='right'>$intTerm yr</td>
                <td align='right'>$rate %</td>
                <td align='right'>₱ ".number_format($dblDownPayment,2)."</td>
                <td align='right'>₱ ".number_format($dblBalance,2)."</td>
                    
                <td align='center'>
                    <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='View' data-target = '#view$intInstallmentLotID'>
                    <i class='glyphicon glyphicon-eye-open'></i></button>
                    <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intInstallmentLotID'>
                    <i class='glyphicon glyphicon-trash'></i></button>
                </td>
            </tr>";
?>  


                            
<!--DEACTIVATED MODAL LOT-->
<div class = 'modal fade' id = 'deactivate<?php echo"$intInstallmentLotID";?>'>
    <div class = 'modal-dialog' style = 'width: 40%;'>
        <div class = 'modal-content' style = 'height: 220px;'>
                                                
                        <!--header-->
            <div class = 'modal-header' style='background: light-red'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <h3 class = 'modal-title'>Deactivate:</h3>
            </div>
                                                    
                        <!--body (form)-->
            <div class = 'modal-body'>
                <h3>Are you sure you want deactivate <?php echo"$strLastName, $strFirstName $strMiddleName?";?></h3>
                                            
                <form class='form-horizontal' role='form' action = 'installment.php' method= 'POST'>						  
                                                    
                        <div class='form-group'>
                            <div class='col-sm-8'>
                                <input type='hidden' class='form-control' name= 'tfInstallmentLotID' value='<?php echo"$intInstallmentLotID";?>' >
                            </div>
                        </div>
                                                 
                        <div class='form-group'> 
                            <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                <button type='submit' class='btn btn-danger' name= 'btnDeactivate1'>Yes</button>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                            </div>
                        </div>
                    </form>
                    
            </div>                       
        </div><!-- content-->
    </div>
</div>
<?php   
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn); 
?>                       
    
                                    </tbody>
                              </table>
                          </div><!-- /.table-responsive -->
                   </div><!-- /.panel-body -->
             </div>
        </div><!-- /.col-md-6 -->

        
<div class="tab-pane fade " id="ashtable">
    <div class="panel panel-success ">
        <div class="panel-heading">
            <H2>INSTALLMENT FOR ASH CRYPT</H2>
        </div><!-- /.panel-heading -->
                     
        <div class="panel-body">
            <div>
                <div class="pull-right" style='margin-right: 20px;'>
                    <button type = "button" class = "btn btn-primary  col-md-12 col-lg-12 col-xs-12" data-toggle = "modal" data-target = "#modalAsh">Create New</button>
                </div>
            </div>
                          
            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                <table class="table table-bordered table-hover" id="datatables-installmentAC">
                    <thead>
                        <tr>
                            <th class="success" style = "text-align: center; font-size: 20px;">Date</th>
                            <th class="success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                            <th class="success" style = "text-align: center; font-size: 20px;">Location</th>
                            <th class="success" style = "text-align: center; font-size: 20px;">Term</th>
                            <th class="success" style = "text-align: center; font-size: 20px;">Rate</th>
                            <th class="success" style = "text-align: center; font-size: 20px;">Downpayment</th>
                            <th class="success" style = "text-align: center; font-size: 20px;">Balance</th>
                            <th class="success" style = "text-align: center; font-size: 20px;">Action</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
<?php
      
$sql = "SELECT iL.intInstallmentAshID, iL.datDateCreated, iL.strLastName, iL.strFirstName, iL.strMiddleName, iL.strUnitName, iL.strLevelName, iL.strAshName,
                    iL.intTerm, iL.dblRate, iL.dblDownPayment, iL.dblBalance, iL.intStatus FROM tblinstallmentash iL
                    INNER JOIN tblreservationash rl ON rl.intReservationAsh_id = iL.intReservationAshID WHERE iL.intStatus='0' ORDER BY iL.datDateCreated ASC";        
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
                $intInstallmentAshID = $row['intInstallmentAshID'];
                $datDateCreated = $row['datDateCreated'];
                $strLastName = $row['strLastName'];
                $strFirstName = $row['strFirstName'];
                $strMiddleName = $row['strMiddleName']; 
                $strUnitName = $row['strUnitName'];
                $strLevelName =$row['strLevelName']; 
                $strAshName = $row['strAshName'];
                $intTerm = $row['intTerm'];
                $dblRate = $row['dblRate'];
                $dblDownPayment = $row['dblDownPayment'];
                $dblBalance = $row['dblBalance'];
                $intStatus = $row['intStatus'];
                
                $rate=$dblRate*100;
                
                if($intTerm=='1'){
                    $months='12';
                }else if($intTerm=='2'){
                    $months='24';
                }else if($intTerm=='3'){
                    $months='36';
                }else{
                    $months='48';
                }
                
                $x=$dblBalance/$months;
                $y=$x*$dblRate;
                $amortization=$x+$y;
                
                echo "<tr>
                          <td align='right'>$datDateCreated</td>
                          <td>$strLastName, $strFirstName $strMiddleName</td>
                          <td>$strUnitName/$strLevelName/$strAshName</td>
                          <td align='right'>$intTerm yr</td>
                          <td align='right'>$rate %</td>
                          <td align='right'>₱ ".number_format($dblDownPayment,2)."</td>
                          <td align='right'>₱ ".number_format($dblBalance,2)."</td>
                          
                    
                          <td align='center'>
                                <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='View' data-target = '#viewAsh$intInstallmentAshID'>
                                <i class='glyphicon glyphicon-eye-open'></i></button>
                                <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivateAsh$intInstallmentAshID'>
                                <i class='glyphicon glyphicon-trash'></i></button>
                          </td>
                      </tr>";
?>          
                
                                    
                            
                            <!--DEACTIVATED MODAL-->
                            <div class = 'modal fade' id = 'deactivateAsh<?php echo"$intInstallmentAshID";?>'>
                            <div class = 'modal-dialog' style = 'width: 40%;'>
                                <div class = 'modal-content' style = 'height: 220px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background: light-red'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>Deactivate:</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <h3>Are you sure you want deactivate <?php echo"$strLastName, $strFirstName $strMiddleName?";?></h3>
                                            
                                                <form class='form-horizontal' role='form' action = 'installment.php' method= 'POST'>						  
                                                    
                                                    <div class='form-group'>
                                                        <div class='col-sm-8'>
                                                            <input type='hidden' class='form-control' name= 'tfInstallmentAshID' value='<?php echo"$intInstallmentAshID";?>' >
                                                        </div>
                                                    </div>
                                                 
                                                    <div class='form-group'> 
                                                        <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                            <button type='submit' class='btn btn-danger' name= 'btnDeactivate1'>Yes</button>
                                                            <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                                
                                    </div><!-- content-->
                                </div>
                            </div>
<?php               
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);                           
?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.panel-body -->
    </div>
</div><!-- /.col-md-6 -->


<!--MODAL CREATE LOT--> 
<!--MODAL CREATE LOT--> 
<div class = "modal fade" id = "modalLot">
    <div class = "modal-dialog" style = "width: 60%; ">
        <div class = "modal-content">
                
                <!--header-->
            <div class = "modal-header" style="background:#b3ffb3;">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <h3 class = "modal-title">Create New:</h3>
            </div>
                                            
                <!--body (form)-->
            <div class = "modal-body">		
                <form class="form-horizontal" role="form" action = "installment.php" method= "post">						  
                     
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
                                        $view = new installmentLot();
                                        $view->selectInstallmentLot();
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
                            
                    <div class='form-group'>
                        <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Downpayment:</label>
                        <div class="col-md-5">
                            <div class=' input-group'>
                                <span class = 'input-group-addon'>₱</span>
                                <input type='text' class='form-control input-md' name= 'tfDownpayment' id='tfPriceCreate' required/>
                            </div>
                        </div>
                    </div>
                                              
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
    
    
<!--Modal VIEW LOT-->
<!--Modal VIEW LOT-->
<div class = 'modal fade' id = 'view<?php echo"$intInstallmentLotID";?>'>
    <div class = 'modal-dialog' style = 'width: 40%;'>
        <div class = 'modal-content' >
                                                
                        <!--header-->
            <div class = 'modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <h2 class = 'modal-title'> Monthly Amortization:</h2>
            </div>
                                                    
                        <!--body (form)-->
            <div class = 'modal-body'>
                <form class='form-horizontal' role='form' action = 'installment.php' method= 'POST' id='monthlyLot'>						  
                                
                    <div class='form-group'>
                        <div class='col-sm-8'>
                            <input type='hidden' class='form-control' name= 'tfInstallmentLotID' value='$intInstallmentLotID' >
                        </div>
                    </div>
                                                            
                    <div class='row'>
                        <div class='form-group'>
                            <label class='col-md-5' style ='font-size: 18px;' align='right' style='margin-top:.30em'>Date:</label>
                            <div class='col-md-5'>
                                <input type='date' class='form-control input-md' name='tfDate' required/>
                            </div>
                        </div><!-- FORM GROUP -->
                    </div>                                 
                                                 
                    <div class='row'>
                        <div class='form-group'>
                            <label class='col-md-5' align='right' style = 'font-size: 18px; margin-top:.30em;'>Amount:</label>
                            <div class='col-md-5'>
                                <div class='input-group'>
                                    <span class = 'input-group-addon'>₱</span>
                                    <input type='text' class='form-control input-md tfPriceView' name= 'tfAmount' value='<?php echo"".number_format($amortization,2)."";?>'readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class='form-group modal-footer'> 
                        <div class='col-sm-offset-4 col-sm-8'>
                            <button type='submit' class='btn btn-success' name= 'btnPay'>Pay</button>
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                        </div>
                    </div>
                </form>
                
                <div class="panel-body" style="overflow:auto;">
                    <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                        <table class="table table-bordered table-hover" id="datatables-viewLot">
                            <thead>
                                <tr>
                                    <th class="success">Date</th>
                                    <th class="success">Amount Paid</th>
                                    <th class="success">Current Balance</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                     
                                echo"
                                <td align='right'>2016-08-15</td>
                                <td align='right'>₱ ".number_format(2100,2)."</td>
                                <td align='right'>₱ ".number_format(64130,2)."</td>";
                                
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.panel-body -->
                
            </div>         
        </div><!-- content-->
    </div>
</div>
  
<!--MODAL CREATE ASH--> 
<!--MODAL CREATE ASH--> 
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
            
                    <form class="form-horizontal" role="form" action = "installment.php" method= "post">						  
                        
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
                                                $view1 = new installmentAsh();
                                                $view1->selectInstallmentAsh();
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
                                                        
                        <div class='form-group'>
                                <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Downpayment:</label>
                                <div class="col-md-5">
                                    <div class=' input-group'>
                                        <span class = 'input-group-addon'>₱</span>
                                        <input type='text' class='form-control input-md' name= 'tfDownpayment1' id='tfPriceCreate1' required/>
                                    </div>
                                </div>
                        </div>
                        
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
 
 
<!--MODAL VIEW ASH-->   
<!--MODAL VIEW ASH-->   
<div class = 'modal fade' id = 'viewAsh<?php echo"$intInstallmentAshID";?>'>
    <div class = 'modal-dialog' style = 'width: 40%;'>
        <div class = 'modal-content' >
                        
                            <!--header-->
            <div class = 'modal-header' style='background:#b3ffb3;'>
                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                <h2 class = 'modal-title'>Monthly Amortization:</h2>
            </div>
                            
                            <!--body (form)-->
            <div class = 'modal-body'>
                <form class='form-horizontal' role='form' action = 'installment.php' method= 'POST' id='monthlyAsh'>						  
                                
                    <div class='form-group'>
                        <div class='col-sm-8'>
                            <input type='hidden' class='form-control' name= 'tfInstallmentAshID' value='<?php echo"$intInstallmentAshID";?>' >
                        </div>
                    </div>
                                    
                    <div class='row'>
                        <div class='form-group'>
                            <label class='col-md-5' style ='font-size: 18px;' align='right' style='margin-top:.30em'>Date:</label>
                            <div class='col-md-5'>
                                <input type='date' class='form-control input-md' name='tfDate' required/>
                            </div>
                        </div><!-- FORM GROUP -->
                    </div>                                 
                            
                    <div class='row'>
                        <div class='form-group'>
                            <label class='col-md-5' align='right' style = 'font-size: 18px; margin-top:.30em;'>Amount:</label>
                            <div class='col-md-5'>
                                <div class='input-group'>
                                    <span class = 'input-group-addon'>₱</span>
                                    <input type='text' class='form-control input-md tfPriceView' name= 'tfAmount' value='<?php echo"".number_format($amortization,2)."";?>' readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class='form-group modal-footer'> 
                        <div class='col-sm-offset-4 col-sm-8'>
                            <button type='submit' class='btn btn-success' name= 'btnPay'>Pay</button>
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                         </div>
                    </div>
                </form>
                
                <div class="panel-body" style="overflow:auto;">
                    <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                        <table class="table table-bordered table-hover" id="datatables-viewAsh">
                            <thead>
                                <tr>
                                    <th class="success">Date</th>
                                    <th class="success">Amount Paid</th>
                                    <th class="success">Current Balance</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                echo"
                                <td align='right'>2016-08-15</td>
                                <td align='right'>₱ ".number_format(2100,2)."</td>
                                <td align='right'>₱ ".number_format(64130,2)."</td>";
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.panel-body -->
                
            </div>         
        </div><!-- content-->
    </div>
</div>

 <script>
        $('#tfAmountCreate').mask('000000000000.00',{reverse:true});
        $('#tfPriceCreate').mask('000000000000.00',{reverse:true});
        $('.tfPriceView').mask('000000000000.00',{reverse:true});
        $('#tfPriceCreate1').mask('000000000000.00',{reverse:true});
        $('.tfAmountUpdate').mask('000000000000.00',{reverse:true});
        $('#tfContactCreate').mask('00000000000',{reverse:true});
        $('.tfContactUpdate').mask('00000000000',{reverse:true});
 </script>
	
  </body>
</html>
