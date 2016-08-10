

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

require ("controller/connection.php");

$ash = intval($_GET['ash']);


$sql="SELECT ra.intReservationAsh_id, ra.datDateCreated, ra.strLastName, ra.strFirstName, ra.strMiddleName, ra.strAddress, ra.strContactNo, ra.intTypeOfPayment,
	   ra.dblReservationFee, ra.intStatus, ac.strUnitName, la.strLevelName, la.dblSellingPrice, a.strAshName FROM tblreservationash ra 
        INNER JOIN tblacunit ac ON ra.intUnitID = ac.intUnitID 
        INNER JOIN tbllevelash la ON ac.intLevelAshID = la.intLevelAshID  
        INNER JOIN tblashcrypt a ON la.intAshID = a.intAshID 
                WHERE ra.intReservationAsh_id='".$ash."'";
      
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
            while($row = mysql_fetch_array($result)) {
                
                $strUnitName=$row['strUnitName'];
                $strLevelName=$row['strLevelName'];
                $strAshName=$row['strAshName'];
                $tfAmount=$row['dblSellingPrice'];
        
                echo "<div class='row'>
                        <div class='form-group'>
                            <label class='col-md-4' style = 'font-size: 18px;' align='right' style='margin-top:.30em'>Ash Unit:</label>
                            <div class='col-md-5'>
                                <input type='text' class='form-control input-md' name='tfUnitName' value='$strUnitName' readonly/>
                             </div>
                         </div><!-- FORM GROUP --> 
                       </div>  
                       
                       <div class='row'>
                        <div class='form-group'>
                            <label class='col-md-4' style = 'font-size: 18px;' align='right' style='margin-top:.30em'>Level Name:</label>
                            <div class='col-md-5'>
                                <input type='text' class='form-control input-md' name='tfLevelName' value='$strLevelName' readonly />
                             </div>
                         </div><!-- FORM GROUP --> 
                       </div>
                       
                       <div class='row'>
                        <div class='form-group'>
                            <label class='col-md-4' style = 'font-size: 18px;' align='right' style='margin-top:.30em'>Section:</label>
                            <div class='col-md-5'>
                                <input type='text' class='form-control input-md' name='tfAshName' value='$strAshName'  readonly />
                             </div>
                         </div><!-- FORM GROUP --> 
                       </div>
                       
                       <div class='row'>
                           <div class='form-group'>
                               <label class='col-md-4' style = 'font-size: 18px;' align='right' style='margin-top:.30em'>Total Amount:</label>
                                 <div class='col-md-5'>
                                     <div class='input-group'>
                                        <span class = 'input-group-addon'>₱</span>
                                        <input type='text' class='form-control input-md' name='tfAmount' value='$tfAmount' readonly/>
                                     </div>
                                  </div>
                                  </div>
                              </div><!-- FORM GROUP -->
                             
                       ";
            }
         mysql_close($conn);

?>
</body>
</html>