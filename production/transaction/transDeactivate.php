
<?php

class deactivateReservationLot{

    function deactivate($tfReservationLotID,$location){
		$sql = "UPDATE `dbholygarden`.`tblreservationlot` SET `intStatus`='1' WHERE `intReservationLot_id`= '$tfReservationLotID'";
        $sql1 = "UPDATE `dbholygarden`.`tbllot` SET `intLotStatus`='0'            
                                     WHERE `intLotID`= '$location'";
        
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    echo "<script>alert('Succesfully Deactivate!')</script>";
            }
		}
    }        
}

class deactivateReservationAC	{

    function deactivate($tfReservationAshID,$location){
		$sql = "UPDATE `dbholygarden`.`tblreservationash` SET `intStatus`='1' WHERE `intReservationAsh_id`= '$tfReservationAshID'";
         $sql1 = "UPDATE `dbholygarden`.`tblacunit` SET `intUnitStatus`='0'            
                                     WHERE `intUnitID`= '$location'";
                                     
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        { 
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    echo "<script>alert('Succesfully Deactivate!')</script>";
            }
		}
    }        
}

class deactivateSpotLotReserve{

    function deactivate($tfSpotLotReserveID){
		$sql = "UPDATE `dbholygarden`.`tblspotlotreserve` SET `intStatus`='1' WHERE `intSpotLotReserve_id`= '$tfSpotLotReserveID'";
        
                                     
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateSpotAshReserve{

    function deactivate($tfSpotAshReserveID){
		$sql = "UPDATE `dbholygarden`.`tblspotashreserve` SET `intStatus`='1' WHERE `intSpotAshReserve_id`= '$tfSpotAshReserveID'";
        
                                     
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateInstallmentLot{

    function deactivate($tfInstallmentLotID){
		$sql = "UPDATE `dbholygarden`.`tblinstallmentlot` SET `intStatus`='1' WHERE `intInstallmentLotID`= '$tfInstallmentLotID'";
        
                                     
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateInstallmentAsh{

    function deactivate($tfInstallmentAshID){
		$sql = "UPDATE `dbholygarden`.`tblinstallmentash` SET `intStatus`='1' WHERE `intInstallmentAshID`= '$tfInstallmentAshID'";
        
                                     
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}


?>