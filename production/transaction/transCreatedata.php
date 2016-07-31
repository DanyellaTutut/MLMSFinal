
<?php

class createReservationLot{

    function Create($tfStatus,$dateCreated,$tfLastName,$tfFirstName,$tfMiddleName,$tfAddress,$tfContactNo,$typeOfPayment,$location,$tfAmount){

		$sql = "INSERT INTO `dbholygarden`.`tblreservationlot` (`datDateCreated`,`strLastName`,`strFirstName`,`strMiddleName`,`strAddress`,`strContactNo`,`intTypeOfPayment`,`dblReservationFee`,`intStatus`,`intLotID`) 
                                                            VALUES ('$dateCreated','$tfLastName','$tfFirstName','$tfMiddleName','$tfAddress','$tfContactNo','$typeOfPayment','$tfAmount','$tfStatus','$location' )";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tbllot` 
                            SET `intLotStatus`='1' WHERE `intLotID`= '$location'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    echo "<script>alert('Succesfully created!')</script>";
            }
            
           
        }
        
    }
        
}


class createReservationAC{

    function Create($tfStatus,$dateCreated,$tfLastName,$tfFirstName,$tfMiddleName,$tfAddress,$tfContactNo,$typeOfPayment,$location,$tfAmount){

		$sql = "INSERT INTO `dbholygarden`.`tblreservationash` (`datDateCreated`,`strLastName`,`strFirstName`,`strMiddleName`,`strAddress`,`strContactNo`,`intTypeOfPayment`,`dblReservationFee`,`intStatus`,`intUnitID`) 
                                                            VALUES ('$dateCreated','$tfLastName','$tfFirstName','$tfMiddleName','$tfAddress','$tfContactNo','$typeOfPayment','$tfAmount','$tfStatus','$location' )";
                                            
        $sql1 = "UPDATE `dbholygarden`.`tblacunit` 
                            SET `intUnitStatus`='1' WHERE `intUnitID`= '$location'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
           if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    echo "<script>alert('Succesfully created!')</script>";
            }
        }
        
    }
        
}


class createSpotLotReserve{

    function Create($tfStatus,$tfName,$dateCreated,$tfLotUnit,$tfBlock,$tfSection,$tfAmount){
                
                $tfLastName ='';                        
                $tfFirstName ='';                        
                $tfMiddleName ='';                        
        
        $sql = "SELECT * FROM tblreservationlot WHERE tblreservationlot.intReservationLot_id='$tfName' ";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
             
             while($row = mysql_fetch_array($result)){
                $tfLastName = $row['strLastName'];
                $tfFirstName = $row['strFirstName'];
                $tfMiddleName = $row['strMiddleName'];
                 
                       
        $sql1 = "INSERT INTO `dbholygarden`.`tblspotlotreserve` (`datDateCreated`,`strLastName`,`strFirstName`,`strMiddleName`,`strLotName`,`strBlockName`,`strSectionName`,`dblAmount`,`intStatus`,`intReservationLot_id`) 
                                                            VALUES ('$dateCreated','$tfLastName','$tfFirstName','$tfMiddleName','$tfLotUnit','$tfBlock','$tfSection','$tfAmount','$tfStatus','$tfName' )";
                    if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    echo "<script>alert('Succesfully created!')</script>";
            }
             
             }
               
                                  
       
           
        }
        
    }
    
class createSpotAshReserve{

    function Create($tfStatus1,$tfName1,$dateCreated,$tfUnitName,$tfLevelName,$tfAshName,$tfAmount){
                
                $tfLastName ='';                        
                $tfFirstName ='';                        
                $tfMiddleName ='';                        
        
        $sql = "SELECT * FROM tblreservationash WHERE tblreservationash.intReservationAsh_id='$tfName1' ";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
             
             while($row = mysql_fetch_array($result)){
                $tfLastName = $row['strLastName'];
                $tfFirstName = $row['strFirstName'];
                $tfMiddleName = $row['strMiddleName'];
                 
                       
        $sql1 = "INSERT INTO `dbholygarden`.`tblspotashreserve` (`datDateCreated`,`strLastName`,`strFirstName`,`strMiddleName`,`strUnitName`,`strLevelName`,`strAshName`,`dblAmount`,`intStatus`,`intReservationAsh_id`) 
                                                            VALUES ('$dateCreated','$tfLastName','$tfFirstName','$tfMiddleName','$tfUnitName','$tfLevelName','$tfAshName','$tfAmount','$tfStatus1','$tfName1' )";
                    if(mysql_query($sql1,$conn)){
                 mysql_close($conn);
                    echo "<script>alert('Succesfully created!')</script>";
            }
             
             }
               
                                  
       
           
        }
        
    }
        
class createInstallmentLot{

    function Create($tfStatus,$tfName,$dateCreated,$tfLotUnit,$tfBlock,$tfSection,$term,$dblRate,$tfDownpayment,$dblBalance){
                
                $tfLastName ='';                        
                $tfFirstName ='';                        
                $tfMiddleName ='';                        
        
        $sql = "SELECT * FROM tblreservationlot  WHERE tblreservationlot.intReservationLot_id='$tfName' ";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
             
             while($row = mysql_fetch_array($result)){
                $tfLastName = $row['strLastName'];
                $tfFirstName = $row['strFirstName'];
                $tfMiddleName = $row['strMiddleName'];
                 
           echo"$tfStatus,$tfLastName,$tfFirstName,$tfMiddleName,$tfName,$dateCreated,$tfLotUnit,$tfBlock,$tfSection,$term,$dblRate,$tfDownpayment,$dblBalance";
        
        $sql1 = "INSERT INTO `dbholygarden`.`tblinstallmentlot` (`datDateCreated`,`strLastName`,`strFirstName`,`strMiddleName`,`strLotName`,`strBlockName`,`strSectionName`,`intTerm`,`dblRate`,`dblDownpayment`,`dblBalance`,`intStatus`,`intReservationLotID`) 
                                                         VALUES ('$dateCreated','$tfLastName','$tfFirstName','$tfMiddleName','$tfLotUnit','$tfBlock','$tfSection','$term','$dblRate','$tfDownpayment','$dblBalance','$tfStatus','$tfName' )";
                    
                if(mysql_query($sql1,$conn)){
                     mysql_close($conn);
                    echo "<script>alert('Succesfully created!')</script>";
            }
             
        }
            
    }
        
}

class createInstallmentAsh{

    function Create($tfStatus1,$tfName1,$dateCreated,$tfUnitName,$tfLevelName,$tfAshName,$dblBalance,$dblRate,$term1,$tfDownpayment1){
                
                $tfLastName ='';                        
                $tfFirstName ='';                        
                $tfMiddleName ='';                        
        
        $sql = "SELECT * FROM tblreservationash WHERE tblreservationash.intReservationAsh_id='$tfName1' ";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
             
             while($row = mysql_fetch_array($result)){
                $tfLastName = $row['strLastName'];
                $tfFirstName = $row['strFirstName'];
                $tfMiddleName = $row['strMiddleName'];
                 
              echo"$tfStatus1,$tfName1,$tfLastName,$tfFirstName,$tfMiddleName,$dateCreated,$tfUnitName,$tfLevelName,$tfAshName,$dblBalance,$dblRate,$term1,$tfDownpayment1";         
        $sql1 = "INSERT INTO `dbholygarden`.`tblinstallmentash` (`datDateCreated`,`strLastName`,`strFirstName`,`strMiddleName`,`strUnitName`,`strLevelName`,`strAshName`,`intStatus`,`intTerm`,`dblRate`,`dblDownpayment`,`dblBalance`,`intReservationAshID`) 
                                                            VALUES ('$dateCreated','$tfLastName','$tfFirstName','$tfMiddleName','$tfUnitName','$tfLevelName','$tfAshName','$tfStatus1','$term1','$dblRate','$tfDownpayment1','$dblBalance','$tfName1' )";
                if(mysql_query($sql1,$conn)){
                     mysql_close($conn);
                    echo "<script>alert('Succesfully created!')</script>";
                }
             
             }
               
        }
        
    }


?>