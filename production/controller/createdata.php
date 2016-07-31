
<?php
class createSection{

    function Create($tfSectionName,$tfNoOfBlock,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblsection WHERE strSectionName like '$tfSectionName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){ 
        
        $sql = "INSERT INTO `tblsection` (`strSectionName`,`intNoOfBlock`,`intStatus`) 
                                            VALUES ('$tfSectionName','$tfNoOfBlock','$tfStatus' )";
                                            
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
            echo "<script>alert('Succesfully created!')</script>";

        }
        }

        else {
            echo "<script>alert('duplicate data')</script>";
        }
        
    }
        
}

class createTypes{

    function Create($tfTypeName,$tfNoOfLot,$tfSellingPrice,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tbltypeoflot WHERE strTypeName like '$tfTypeName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){


		$sql = "INSERT INTO `dbholygarden`.`tbltypeoflot` (`strTypeName`,`intNoOfLot`,`dblSellingPrice`, `intStatus`) 
                                                VALUES ('$tfTypeName','$tfNoOfLot','$tfSellingPrice','$tfStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
             echo "<script>alert('Succesfully created!')</script>";
          
        }

        }

        else {
            echo "<script>alert('duplicate data')</script>";
        }
        
    }
        
}

class createBlock{

    function Create($tfBlockName,$typeBlock,$section,$tfNoOfLot,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblblock WHERE strBlockName like '$tfBlockName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

		$sql = "INSERT INTO `dbholygarden`.`tblblock` (`strBlockName`,`intTypeID` ,`intSectionID`, `intNoOfLot`, `intStatus`) 
                                            VALUES ('$tfBlockName','$typeBlock' ,'$section', '$tfNoOfLot','$tfStatus')";
                                            
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
            echo "<script>alert('Succesfully created!')</script>";
        }

        }

        else {
            echo "<script>alert('duplicate data')</script>";
        }
        
    }
        
}


class createLot{

    function Create($tfLotName,$typeBlock,$lotStatus,$tfStatus){


		$sql = "INSERT INTO `dbholygarden`.`tbllot` (`strLotName`, `intBlockID`, `intLotStatus`, `intStatus`) 
                                        VALUES ('$tfLotName','$typeBlock','$lotStatus','$tfStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
             echo "<script>alert('Succesfully created!')</script>";
          
        }
        
    }
        
}


class createInterest{

    function Create($typeLot,$tfNoOfYear,$tfPercentValue,$tfStatus){

		$sql = "INSERT INTO `dbholygarden`.`tblinterest` (`intTypeID`, `intYear`, `dblPercent`, `intStatus`) 
                                        VALUES ('$typeLot','$tfNoOfYear','$tfPercentValue','$tfStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
             echo "<script>alert('Succesfully created!')</script>";
          
        }
        
    }
        
}

class createAC{

    function Create($tfacName,$tfNoOfLevel,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblashcrypt WHERE strAshName like '$tfacName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

		$sql = "INSERT INTO `dbholygarden`.`tblashcrypt` (`strAshName`, `intNoOfLevel`,`intStatus`) 
                                                    VALUES ('$tfacName','$tfNoOfLevel','$tfStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
             echo "<script>alert('Succesfully created!')</script>";
          
        }
}
        else{
            echo "<script>alert('Duplicate Data!')</script>";
          
        }
        
    
        
}
}

class createLevelAC{

    function Create($tfLevelName,$acName,$tfNoOfUnit,$tfStatus,$tfSellingPrice){

        $getDetails = "SELECT strLevelName, intNoOfUnit FROM tbllevelash WHERE intAshID = '$acName' AND intStatus = 0;";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
       
        
        $result = mysql_query($getDetails,$conn);
        $flag = true;
        $error1 = "Level is already existing";
        $error2 = "Unit is incorrect ";
            
        while($row = mysql_fetch_array($result))
        {
            $strLevelName = $row['strLevelName'];
            $NoofUnit = $row['intNoOfUnit'];
            
            if(strcmp($tfLevelName, $strLevelName) == 1 && $NoofUnit == $tfNoOfUnit){
                #qwe
            }
            else{
                $flag = false;
                echo "<script>alert('An error occurred because: $error1, $error2')</script>";
                break;
            }
        }
        
		  $sql = "INSERT INTO `dbholygarden`.`tbllevelash` (`strLevelName`, `intAshID`,`intNoOfUnit`,`intStatus`,`dblSellingPrice`) 
                                            VALUES ('$tfLevelName','$acName','$tfNoOfUnit','$tfStatus','$tfSellingPrice')";
                                            
        if($flag == true)
            if(mysql_query($sql,$conn))
            {
                mysql_close($conn);
                echo "<script>alert('Succesfully created!')</script>";
        
            }
        }
        
    
        
}

class createInterestForLevel{

    function Create($level,$tfNoOfYear,$tfPercentValue,$tfStatus){
        

		$sql = "INSERT INTO `dbholygarden`.`tblinterestforlevel` (`intLevelAshID`, `intYear`, `dblPercent`, `intStatus`) 
                                                    VALUES ('$level','$tfNoOfYear','$tfPercentValue','$tfStatus')";
                                                    
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
             echo "<script>alert('Succesfully created!')</script>";
          
        }
        
    }
        
}

class createAshUnit{

    function Create($tfUnitName,$levelName,$status,$tfStatus,$tfCapacity){

		$sql = "INSERT INTO `dbholygarden`.`tblacunit` (`strUnitName`, `intLevelAshID`,`intUnitStatus`,`intStatus`,`intCapacity`) 
                                                VALUES ('$tfUnitName','$levelName','$status','$tfStatus','$tfCapacity')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
          echo "<script>alert('Succesfully created!')</script>";
          
        }
        
    }
        
}


class createService{

    function Create($tfServiceName,$tfServicePrice,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblservice WHERE strServiceName like '$tfServiceName'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

		$sql = "INSERT INTO `dbholygarden`.`tblservice` (`strServiceName`, `dblServicePrice`,`intStatus`) 
                                                VALUES ('$tfServiceName','$tfServicePrice','$tfStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
          echo "<script>alert('Succesfully created!')</script>";
          
        }
    }
        else{
            echo "<script>alert('Duplicate Data!')</script>";

        }
        
    }
        
}

class createDiscount{



    function Create($serviceName,$tfDescription,$tfPercentValue,$tfStatus){

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));

        $sql = "Select * from tblservice WHERE strDescription like '$tfDescription'";
        $result = mysql_query($sql);
        $check_duplicate = mysql_num_rows($result);

        if($check_duplicate == 0){

		$sql = "INSERT INTO `dbholygarden`.`tbldiscount` (`intServiceID`,`strDescription`, `dblPercent`, `intStatus`) 
                                            VALUES ('$serviceName','$tfDescription','$tfPercentValue','$tfStatus')";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
           echo "<script>alert('Succesfully created!')</script>";
         
        }

    }
        else{

           echo "<script>alert('Duplicate Data!')</script>";
        }
        
    }
        
}

?>