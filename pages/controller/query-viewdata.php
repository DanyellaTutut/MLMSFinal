<?php

class types{

    function viewTypes(){
		$sql = "Select * from tbltypeoflot WHERE intStatus = 0 ORDER BY strTypeName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
                $intTypeID = $row['intTypeID']; 
                $strTypeName = $row['strTypeName'];
                $intNoOfLot = $row['intNoOfLot'];
                $dblSellingPrice = $row['dblSellingPrice'];
                $intStatus = $row['intStatus']; 
                
                echo "<tr>
                          <td style = 'font-size:18px;'>$strTypeName</td>
                          <td style = 'font-size:18px; text-align: right;'>$intNoOfLot</td>
                          <td style = 'font-size:18px; text-align: right;'>₱ ".number_format($dblSellingPrice,2)."</td>
                    
                         
                      </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewTypes()         
}//class lot type
//_________________________________________

class interest{

    function viewInterest(){
        
		$sql = "Select i.intInterestID, i.intYear, i.dblPercent,i.intStatus, i.intAtNeed, t.strTypeName FROM tblinterest i
                INNER JOIN tbltypeoflot t ON i.intTypeID = t.intTypeID WHERE i.intStatus = '0' ORDER BY t.strTypeName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
            $intInterestID =$row['intInterestID'];
            $strTypeName =$row['strTypeName'];
            $intYear     =$row['intYear'];
            $dblPercent =$row['dblPercent'];
            $intStatus=$row['intStatus'];
            $intAtNeed=$row['intAtNeed'];
            
            if($intAtNeed==1){
              $tfAtNeed ="Yes";
            }else{
                $tfAtNeed="No";
            }
          
            
            $dblPercentValue = $dblPercent*100;
              
		echo "<tr>
                   <td style = 'font-size:18px;'>$strTypeName</td>
				   <td style = 'font-size:18px; text-align: right;'>$intYear</td>
				   <td style = 'font-size:18px;'>$tfAtNeed</td>
				   <td style = 'font-size:18px; text-align: right;'>$dblPercentValue %</td>
             </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewInterest()
    
    function selectTypeBlock(){
        
		$sql = " select * from dbholygarden.tbltypeoflot where intStatus='0' order by strTypeName asc";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "
                  <option value =". $row['intTypeID'].">".$row['strTypeName']."</option>";
        }
         mysql_close($conn);
    }//function selectTypeBlock

}//class interest
//______________________________________________________________

class section{
    
    function viewSection(){
		
        $sql = "Select * from tblsection WHERE intStatus = 0 ORDER BY strSectionName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
            while($row = mysql_fetch_array($result)){
                
                $intSectionID = $row['intSectionID']; 
                $strSectionName = $row['strSectionName'];
                $intNoOfBlock = $row['intNoOfBlock'];
                $intStatus = $row['intStatus']; 
                
                echo "<tr>
                          <td style ='font-size:20px;'>$strSectionName</td>
                          <td style = 'text-align: right; font-size: 18px;'>$intNoOfBlock</td>
                       </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewSection()
}//class section
//________________________________________________________________
	
class block{

    function viewBlock(){
        
		$sql = "SELECT b.intBlockID, b.strBlockName, b.intNoOfLot, b.intStatus, t.strTypeName, s.strSectionName FROM tblblock b INNER JOIN tblsection s 
                ON b.intSectionID = s.intSectionID 
                INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID WHERE b.intStatus = 0 ORDER BY strSectionName ASC";
        
                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                mysql_select_db(constant('mydb'));
                $result = mysql_query($sql,$conn);
        
		        while($row = mysql_fetch_array($result)){
            
                $intBlockID = $row['intBlockID']; 
                $strBlockName = $row['strBlockName'];
                $intNoOfLot = $row['intNoOfLot'];
                $intStatus = $row['intStatus'];
                $strTypeName = $row['strTypeName'];
                $strSectionName = $row['strSectionName'];
                 
                
                echo "<tr>
                          <td style ='font-size:18px;'>$strBlockName</td>
                          <td style ='font-size:18px;'> $strTypeName</td>
                          <td style ='font-size:18px;'> $strSectionName</td>
                          <td style ='font-size:18px; text-align:right;'>$intNoOfLot</td>
                      </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewBlock()         


	function selectSection(){
		$sql = " select * from dbholygarden.tblsection where intStatus='0' ORDER BY strSectionName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value = ".$row['intSectionID'].">".$row['strSectionName']."</option>";
        }
         mysql_close($conn);
    }

    function selectTypeBlock(){
        
		$sql = " select * from dbholygarden.tbltypeoflot where intStatus='0' ORDER BY strTypeName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value =". $row['intTypeID'].">".$row['strTypeName']."</option>";
        }
         mysql_close($conn);
    }

}//class block
//____________________________________________________	


class lot{

    function viewLot(){
        
		$sql = "Select l.intLotID, l.strLotName, b.strBlockName, t.strTypeName, s.strSectionName, l.intLotStatus, l.intStatus 
                    FROM tbllot l  
                        INNER JOIN tblBlock b ON l.intBlockID = b.intBlockID 
                        INNER JOIN	tbltypeoflot t ON b.intTypeID = t.intTypeID
                        INNER JOIN tblsection s	ON b.intSectionID = s.intSectionID WHERE l.intStatus = '0' ORDER BY  strLotName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        


		while($row = mysql_fetch_array($result)){ 
			  
          $intLotID =$row['intLotID'];
          $strLotName =$row['strLotName'];
          $strBlockName =$row['strBlockName'];
          $strTypeName=$row['strTypeName'];
          $strSectionName =$row['strSectionName'];
          $intLotStatus =$row['intLotStatus'];
          $intStatus =$row['intStatus'];
          
          if($intLotStatus==0){
              $LotStatus ="Available";
          }else if($intLotStatus==1){
              $LotStatus="Reserved";
          }else{
              $LotStatus="Occupied";
          }
                      
          echo 
			  "<tr><td style ='font-size:18px;'>$strLotName</td>
                   <td style ='font-size:18px;'>$strBlockName</td>
			       <td style ='font-size:18px;'>$strTypeName</td>
			       <td style ='font-size:18px;'>$strSectionName</td>
                   <td style ='font-size:18px;'>$LotStatus</td>
              </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewLot()    
    
    function selectTypeBlock(){
        
		$sql = " select * from dbholygarden.tbltypeoflot where intStatus='0' ORDER BY strTypeName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value =". $row['strTypeName'].">".$row['strTypeName']."</option>";
        }
         mysql_close($conn);
    }
	
	function selectBlock(){
		$sql = " SELECT b.intBlockID as blockID, b.strBlockName as Bname, b.intNoOfLot, b.intStatus, t.strTypeName, s.strSectionName as Sname FROM tblblock b INNER JOIN tblsection s 
                ON b.intSectionID = s.intSectionID 
                INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID WHERE b.intStatus = 0 ;";
                
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value = '". $row['blockID']."'>". $row['Bname']." ( ".$row['Sname']." )</option>";
        }
         mysql_close($conn);
    }//function selectBlock
    
}//class Lot-Unit
//___________________________________________________


class ashCrypt{

    function viewAshCrypt(){
		
		$sql = "Select * from tblashcrypt where intStatus='0' order by strAshName asc";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
       
		while($row = mysql_fetch_array($result))
		  { 
            $intAshID = $row['intAshID'];
            $strAshName =$row['strAshName'];
            $intNoOfLevel =$row['intNoOfLevel'];
            
              
		echo "<tr>
                  <td style ='font-size:18px;'>$strAshName</td>
				  <td style = 'text-align: right; font-size:20px;'>$intNoOfLevel</td>
              </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewBuilding()
	
}//class aschcrypt
//___________________________________________


class levelAC{

    function viewLevelAC(){
        
		$sql = "Select la.intLevelAshID, la.strLevelName, la.intStatus, la.intNoOfUnit, ac.strAshName, la.dblSellingPrice from tbllevelash la
		          INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID where la.intStatus ='0' ORDER BY la.strLevelName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
            $intLevelAshID =$row['intLevelAshID'];
            $strLevelName =$row['strLevelName'];
            $strAshName =$row['strAshName'];
            $intNoOfUnit =$row['intNoOfUnit'];
            $dblSellingPrice =$row['dblSellingPrice'];
              
			echo "<tr>
                    <td style ='font-size:18px;'>$strLevelName</td>
				    <td style ='font-size:18px;'>$strAshName</td>
                    <td style = 'text-align: right; font-size:18px;'>$intNoOfUnit</td>
                    <td style = 'text-align: right; font-size:18px;'>₱ ".number_format($dblSellingPrice,2)."</td>
                 </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewLA()
    
    
	
	function selectAC(){
		$sql = " select * from dbholygarden.tblashcrypt where intStatus='0' Order by strAshName asc";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result))
        {
            $intAshID = $row['intAshID'];
            $strAshName = $row['strAshName'];
            
            echo "<option value = '$intAshID'>$strAshName</option>";
        }
         mysql_close($conn);
    }//function selectAC()
	
}//class level
//____________________________________________________

class interestForLevel{

    function viewInterest(){
        
		$sql = "SELECT iL.intInterestID, iL.intYear, iL.dblPercent, iL.intStatus, iL.intAtNeed, l.strLevelName, a.strAshName FROM tblinterestforlevel iL
		          INNER JOIN tbllevelash l ON iL.intLevelAshID = l.intLevelAshID 
                  INNER JOIN tblashcrypt a ON l.intAshID = a.intAshID WHERE iL.intStatus='0' ORDER BY l.strLevelName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
            $intInterestID =$row['intInterestID'];
            $strLevelName =$row['strLevelName'];
            $strAshName =$row['strAshName'];
            $intYear     =$row['intYear'];
            $dblPercent =$row['dblPercent'];
            $intStatus=$row['intStatus'];
            $intAtNeed=$row['intAtNeed'];
            
            if($intAtNeed==1){
              $tfAtNeed ="Yes";
            }else{
                $tfAtNeed="No";
            }
            
            $dblPercentValue = $dblPercent*100;
              
		echo "<tr>
                <td style ='font-size:18px;'>$strLevelName ($strAshName)</td>
                <td style = 'text-align: right; font-size:18px;'>$intYear</td>
                <td style = 'font-size:18px;'>$tfAtNeed</td>
                <td style = 'text-align: right; font-size:18px;'>$dblPercentValue %</td>
             </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewInterest()
    
    function selectLevel(){
        
		$sql = "SELECT la.intLevelAshID, la.strLevelName, la.dblSellingPrice, ac.strAshName, la.intStatus from tbllevelash la
                    INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID WHERE la.intStatus = '0' ORDER BY ac.strAshName ASC";
                                                                          
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value =". $row['intLevelAshID'].">".$row['strLevelName']." (".$row['strAshName'].")</option>";
        }
         mysql_close($conn);
    }//function selectLevel

}//class interestForlevel
//_______________________________________________________

class ashUnit{

    function viewAshUnit(){
        
		$sql = "select acUnit.intUnitID, acUnit.strUnitName, acUnit.intUnitStatus, acUnit.intStatus, la.strLevelName, ac.strAshName, acUnit.intCapacity from tblacunit acUnit
                inner join tbllevelash la ON acUnit.intLevelAshID = la.intLevelAshID 
                inner join tblashcrypt ac ON la.intAshID = ac.intAshID where acUnit.intStatus='0' order by acUnit.strUnitName asc";    
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
            $intUnitID =$row['intUnitID'];
            $strUnitName =$row['strUnitName'];
            $strLevelName =$row['strLevelName'];
            $strAshName =$row['strAshName'];
            $intCapacity =$row['intCapacity'];
            
            $intUnitStatus =$row['intUnitStatus'];
            $intStatus=$row['intStatus'];
            
            if($intUnitStatus==0){
                $AshStatus="Available";
            }else if($intUnitStatus==1){
                $AshStatus="Reserved";
            }else{
                $AshStatus="Occupied";
            }
              
			 echo "<tr>
                    <td style ='font-size:18px;'>$strUnitName</td>
                    <td style ='font-size:18px;'>$strLevelName</td>
                    <td style ='font-size:18px;'>$strAshName</td>
                    <td align='right'; style ='font-size:18px;'>$intCapacity</td>
                    <td style ='font-size:18px;'>$AshStatus</td>
                  </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewAshUnit()


	
	function selectLevel(){
		$sql = " select la.intLevelAshID as levelAsh, la.strLevelName as levelName, la.dblSellingPrice, ac.strAshName as ashName, la.intStatus from tbllevelash la
		            INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID WHERE la.intStatus = '0' ORDER BY ac.strAshName ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            $intLevelAshID = $row['levelAsh'];
            $strLevelName = $row['levelName'];
            $strAshName = $row['ashName'];
            
            echo "<option value = '$intLevelAshID'>$strLevelName ($strAshName)</option>";
        }
         mysql_close($conn);
    }//function selectLevel()
	
}//class AC-Unit
//________________________________________________

class service{

    function viewService(){
		
        $sql = "Select * from tblservice where intStatus='0' ORDER BY strServiceName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        

		while($row = mysql_fetch_array($result)){
             
              $intServiceID = $row['intServiceID'];
              $strServiceName = $row['strServiceName'];
              $intServiceType = $row['intServiceType'];
              $dblServicePrice = $row['dblServicePrice'];
              
              if($intServiceType==0){
                    $serviceType="Service Request";
              }else
                    $serviceType="Service Scheduling";
            
              
	           echo "<tr>
                        <td style ='font-size:18px;'>$strServiceName</td>
                        <td style ='font-size:18px;'>$serviceType</td>
                        <td style = 'text-align: right; font-size:18px;'>₱ ".number_format($dblServicePrice,2)."</td>
                    </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewService()


}//class service
//____________________________________________________

class discount{

    function viewDiscount(){
        
		$sql = "select d.intDiscountID, s.strServiceName, d.strDescription, d.dblPercent, d.intStatus FROM tbldiscount d
	                   INNER JOIN tblservice s ON d.intServiceID = s.intServiceID where d.intStatus='0' ORDER BY s.strServiceName ASC";

        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        

		while($row = mysql_fetch_array($result)){ 
              
              $intDiscountID =$row['intDiscountID'];
              $strServiceName =$row['strServiceName'];
              $strDescription =$row['strDescription'];
              $dblPercent =$row['dblPercent'];
              $intStatus =$row['intStatus'];
              
              $dblPercentValue = $dblPercent*100;               
             
		      echo "<tr>
                        <td style ='font-size:18px;'>$strServiceName</td>
                        <td style ='font-size:18px;'>$strDescription</td>
                        <td style = 'text-align: right; font-size:18px;'>$dblPercentValue %</td>
                    </tr>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewDiscount()

        function selectService(){
		$sql = " select * from dbholygarden.tblService where intStatus='0' order by strServiceName asc";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
        while($row = mysql_fetch_array($result))
        {
            $intServiceID = $row['intServiceID'];
            $strServiceName = $row['strServiceName'];
            
            echo "<option value = '$intServiceID'>$strServiceName</option>";
        }
         mysql_close($conn);
    }//function selectService()
	
}//class discount
    

?>   
