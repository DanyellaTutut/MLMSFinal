
<?php

class updateReservationLot{

    function update($tfReservationLotID,$dateCreated,$tfLastName,$tfFirstName,$tfMiddleName,$tfAddress,$tfContactNo,
                                      $typeOfPayment,$location,$tfAmount){
		$sql = "UPDATE `dbholygarden`.`tblreservationlot` 
                        SET `datDateCreated`='$dateCreated', `strLastName`='$tfLastName', `strFirstName`='$tfFirstName',
                            `strMiddleName`='$tfMiddleName', `strAddress`='$tfAddress', `strContactNo`='$tfContactNo',
                            `intTypeOfPayment`='$typeOfPayment', `dblReservationFee`='$tfAmount', `intLotID`='$location'             
                        WHERE `intReservationLot_id`= '$tfReservationLotID'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}


class updateReservationAC{

    function update($tfReservationAshID,$dateCreated,$tfLastName,$tfFirstName,$tfMiddleName,$tfAddress,$tfContactNo,
                                      $typeOfPayment,$location,$tfAmount){
                                          
		$sql = "UPDATE `dbholygarden`.`tblreservationash` 
                        SET `datDateCreated`='$dateCreated', `strLastName`='$tfLastName', `strFirstName`='$tfFirstName',
                            `strMiddleName`='$tfMiddleName', `strAddress`='$tfAddress', `strContactNo`='$tfContactNo',
                            `intTypeOfPayment`='$typeOfPayment', `dblReservationFee`='$tfAmount', `intUnitID`='$location'             
                        WHERE `intReservationAsh_id`= '$tfReservationAshID'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}




?>