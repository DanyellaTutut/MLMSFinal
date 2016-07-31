
<?php

class deactivateSection	{

    function deactivate($tfSectionID){
		$sql = "call deactivateSection($tfSectionID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateType	{

    function deactivate($tfTypeID){
        
		$sql = "call deactivateLotType($tfTypeID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateBlock	{

    function deactivate($tfBlockID){
		$sql = "call deactivateBlock($tfBlockID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateLot	{

    function deactivate($tfLotID){
		$sql = "UPDATE `dbholygarden`.`tbllot` SET `intStatus`='1' WHERE `intLotID`= '$tfLotID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}


class deactivateInterest	{

    function deactivate($tfInterestID){
		$sql = "UPDATE `dbholygarden`.`tblinterest` SET `intStatus`='1' WHERE `intInterestID`= '$tfInterestID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateAC	{

    function deactivate($tfAshID){
		$sql = "call deactivateAshCrypt($tfAshID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateLA	{

    function deactivate($tfLevelAshID){
		$sql = "call deactivateLevel($tfLevelAshID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateAsh	{

    function deactivate($tfUnitID){
		$sql = "UPDATE `dbholygarden`.`tblacunit` SET `intStatus`='1' WHERE `intUnitID`= '$tfUnitID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateApartment	{

    function deactivate($tfApartmentID){
		$sql = "UPDATE `dbholygarden`.`tblapartmentunit` SET `intStatus`='1' WHERE `intApartmentID`= '$tfApartmentID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateService	{

    function deactivate($tfServiceID){
		$sql = "call deactivateService($tfServiceID)";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully Deactivated!')</script>";
		}
    }        
}

class deactivateDiscount	{

    function deactivate($tfDiscountID){
		$sql = "UPDATE `dbholygarden`.`tbldiscount` SET `intStatus`='1' WHERE `intDiscountID`= '$tfDiscountID'";
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