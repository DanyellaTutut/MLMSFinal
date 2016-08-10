<?php
	require("controller/connection.php");
	
	$fnName = $_GET['fnName'];
    switch ($fnName) {
        case 'getBlock':
            getBlock();
            break;

        case 'getLot':
            getLot();
            break;
        
        default:
            # code...
            break;
    }

    function getBlock() {
    	$intSectionID = $_GET['intSectionID'];
    	$sql = "Select * from tblBlock WHERE intStatus = 0 AND intSectionID = $intSectionID ORDER BY strBlockName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);

        if($row = mysql_fetch_array($result)){
            $intBlockID = $row['intBlockID']; 
            $strBlockName = $row['strBlockName'];
            $intNoOfLot = $row['intNoOfLot'];
            //$intStatus = $row['intStatus']; 
        	echo "$intBlockID,$strBlockName,$intNoOfLot";
        }

        while($row = mysql_fetch_array($result)){
                    
            $intBlockID = $row['intBlockID']; 
            $strBlockName = $row['strBlockName'];
            $intNoOfLot = $row['intNoOfLot'];
            //$intStatus = $row['intStatus']; 

            echo ",intBlockID,$strBlockName,$intNoOfLot";
        }
        mysql_close($conn);
    }

    function getLot() {
    	$intBlockID = $_GET['intBlockID'];
    	$sql = "Select * from tblLot WHERE intStatus = 0 AND intBlockID = $intBlockID ORDER BY strLotName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);

        if($row = mysql_fetch_array($result)){
            $intLotID = $row['intLotID']; 
            $strLotName = $row['strLotName'];
            $intLotStatus = $row['intLotStatus'];
            //$intStatus = $row['intStatus']; 
        	echo "$intLotID,$strLotName,$intLotStatus";
        }

        while($row = mysql_fetch_array($result)){
                    
            $intLotID = $row['intLotID']; 
            $strLotName = $row['strLotName'];
            $intLotStatus = $row['intLotStatus'];
            //$intStatus = $row['intStatus']; 

            echo ",$intLotID,$strLotName,$intLotStatus";
        }
        mysql_close($conn);
    }
?>