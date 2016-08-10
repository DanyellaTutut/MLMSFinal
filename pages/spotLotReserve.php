

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

require ("controller/connection.php");

$q = intval($_GET['q']);

$sql="SELECT rl.intReservationLot_id, rl.datDateCreated, rl.strLastName, rl.strFirstName, rl.strMiddleName, rl.strAddress, rl.strContactNo, rl.intTypeOfPayment,
	   rl.dblReservationFee, rl.intStatus, l.strLotName, l.intLotID, b.strBlockName, s.strSectionName, t.dblSellingPrice, t.strTypeName FROM tblreservationlot rl 
	   INNER JOIN tbllot l ON rl.intLotID = l.intLotID 
	   INNER JOIN tblblock b ON b.intBlockID = l.intBlockID
	   INNER JOIN tblsection s ON s.intSectionID = b.intSectionID
	   INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID WHERE  rl.intReservationLot_id = '".$q."'";
       
       
       
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
            while($row = mysql_fetch_array($result)) {
                
                $tfLotUnit=$row['strLotName'];
                $tfBlock=$row['strBlockName'];
                $tfSection=$row['strSectionName'];
                $tfLotType=$row['strTypeName'];
                $tfAmount=$row['dblSellingPrice'];
        
                echo "<div class='row'>
                        <div class='form-group'>
                            <label class='col-md-4' style = 'font-size: 18px;' align='right' style='margin-top:.30em'>Lot Unit:</label>
                            <div class='col-md-5'>
                                <input type='text' class='form-control input-md' name='tfLotUnit' value='$tfLotUnit' readonly/>
                             </div>
                         </div><!-- FORM GROUP --> 
                       </div>  
                       
                       <div class='row'>
                        <div class='form-group'>
                            <label class='col-md-4' style = 'font-size: 18px;' align='right' style='margin-top:.30em'>Block:</label>
                            <div class='col-md-5'>
                                <input type='text' class='form-control input-md' name='tfBlock' value='$tfBlock' readonly />
                             </div>
                         </div><!-- FORM GROUP --> 
                       </div>
                       
                       <div class='row'>
                        <div class='form-group'>
                            <label class='col-md-4' style = 'font-size: 18px;' align='right' style='margin-top:.30em'>Section:</label>
                            <div class='col-md-5'>
                                <input type='text' class='form-control input-md' name='tfSection' value='$tfSection'  readonly />
                             </div>
                         </div><!-- FORM GROUP --> 
                       </div>
                       
                       <div class='row'>
                        <div class='form-group'>
                            <label class='col-md-4' style = 'font-size: 18px;' align='right' style='margin-top:.30em'>Lot Type:</label>
                            <div class='col-md-5'>
                                <input type='text' class='form-control input-md' name='tfLotType' value='$tfLotType'  readonly/>
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