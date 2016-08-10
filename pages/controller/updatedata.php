
<?php

class updateSection	{

    function update($tfSectionID,$tfSectionName,$tfNoOfBlock){
		$sql = "UPDATE `dbholygarden`.`tblsection` SET `strSectionName`='$tfSectionName', `intNoOfBlock`='$tfNoOfBlock' 
                        WHERE `intSectionID`= '$tfSectionID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}


class updateType	{

    function update($tfTypeID,$tfTypeName,$tfNoOfLot,$tfSellingPrice){
		$sql = "UPDATE `dbholygarden`.`tbltypeoflot` SET `strTypeName`='$tfTypeName',`intNoOfLot`='$tfNoOfLot',`dblSellingPrice`='$tfSellingPrice' 
                    WHERE `intTypeID`= '$tfTypeID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}


class updateBlock	{

    function update($tfBlockID,$typeBlock,$tfBlockName,$section,$tfNoOfLot){
        
		$sql = "UPDATE `dbholygarden`.`tblblock` SET `strBlockName`='$tfBlockName',`intTypeID`='$typeBlock',`intSectionID`='$section',`intNoOfLot`='$tfNoOfLot' 
                    WHERE `intBlockID`= '$tfBlockID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}


class updateLot	{

    function update($tfLotID,$tfLotName,$blockName,$status){
        
		$sql = "UPDATE `dbholygarden`.`tbllot` SET `strLotName`='$tfLotName',`intBlockID`='$blockName',`intLotStatus`='$status'
                WHERE `intLotID`= '$tfLotID'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}


class updateInterest	{

    function update($tfInterestID,$typeLot,$tfNoOfYear,$tfPercentValue){
        
		$sql = "UPDATE `dbholygarden`.`tblinterest` SET `intTypeID`='$typeLot',`intYear`='$tfNoOfYear',`dblPercent`='$tfPercentValue'
                WHERE `intInterestID`= '$tfInterestID'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}


class updateAC	{

    function update($tfAshID,$tfAshName,$tfNoOfLevel){
		$sql = "UPDATE `dbholygarden`.`tblashcrypt` SET `strAshName`='$tfAshName',`intNoOfLevel`='$tfNoOfLevel' 
        WHERE `intAshID`= '$tfAshID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}

class updateLA	{

    function update($tfLevelAshID,$tfLevelName,$ashName,$tfSellingPrice,$tfNoOfUnit){
        
		$sql = "UPDATE `dbholygarden`.`tbllevelash` SET `strLevelName`='$tfLevelName',`intAshID`='$ashName',`dblSellingPrice`='$tfSellingPrice',`intNoOfUnit`='$tfNoOfUnit' 
                WHERE `intLevelAshID`= '$tfLevelAshID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}

class updateInterestForLevel	{

    function update($tfInterestID,$level,$tfNoOfYear,$tfPercentValue){
        
		$sql = "UPDATE `dbholygarden`.`tblinterestforlevel` SET `intLevelAshID`='$level',`intYear`='$tfNoOfYear',`dblPercent`='$tfPercentValue'
                WHERE `intInterestID`= '$tfInterestID'";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}


class updateAshUnit	{

    function update($tfUnitID,$tfUnitName,$levelName,$status,$tfCapacity){
		$sql = "UPDATE `dbholygarden`.`tblacunit` SET `strUnitName`='$tfUnitName',`intLevelAshID`='$levelName',`intUnitStatus`='$status',`intCapacity`='$tfCapacity' 
                    WHERE `intUnitID`= '$tfUnitID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}

class updateApartmentUnit	{

    function update($tfApartmentID,$tfUnitName,$floorName,$status){
		$sql = "UPDATE `dbholygarden`.`tblapartmentunit` SET `strUnitName`='$tfUnitName',`intFloorID`='$floorName',`intApartmentStatus`='$status' 
                        WHERE `intApartmentID`= '$tfApartmentID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}

class updateService	{

    function update($tfServiceID,$tfServiceName,$tfServicePrice){
		$sql = "UPDATE `dbholygarden`.`tblservice` SET `strServiceName`='$tfServiceName',`dblServicePrice`='$tfServicePrice' 
                    WHERE `intServiceID`= '$tfServiceID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}

class updatePromo	{

    function update($tfPromoID,$tfPromoDescription,$tfStartDate,$tfEndDate){
		$sql = "UPDATE `dbholygarden`.`tblpromo` SET `strPromoDescription`='$tfPromoDescription',
        `datStartDate`='$tfStartDate',`datEndDate`='$tfEndDate' 
              WHERE `intPromoID`= '$tfPromoID'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}

class updateDiscount	{

    function update($tfDiscountID,$tfDescription,$tfPercentValue){
        
		$sql = "UPDATE `dbholygarden`.`tbldiscount` SET `strDescription`='$tfDescription',`dblPercent`='$tfPercentValue'
                WHERE `intDiscountID`= '$tfDiscountID'";
        
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