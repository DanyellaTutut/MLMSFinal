<?php

class deactivatedTypes{

    function viewDeactivatedTypes(){
        
		$sql = "SELECT * FROM tbltypeoflot WHERE intStatus = 1 ORDER BY strTypeName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)) { 
                $intTypeID = $row['intTypeID']; 
                $strTypeName = $row['strTypeName'];
                $intNoOfLot = $row['intNoOfLot'];
                $dblSellingPrice = $row['dblSellingPrice'];
                $intStatus = $row['intStatus']; 
                
                echo "<tr>
                          <td style = 'font-size:18px;'>$strTypeName</td>
                          <td style = 'font-size:18px; text-align: right;'>$intNoOfLot</td>
                          <td style = 'font-size:18px; text-align: right;'>₱ ".number_format($dblSellingPrice,2)."</td>
                    
                          <td align='center'>
                                <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intTypeID'>
                                <i class='glyphicon glyphicon-repeat'></i></button>
                          </td>
                      </tr>
                
                        
                            
                            <!--ARCHIVE MODAL-->
                            <div class = 'modal fade' id = 'archive$intTypeID'>
                            <div class = 'modal-dialog' style = 'width: 40%;'>
                                <div class = 'modal-content' style = 'height: 220px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background: light-red'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>Archive: <b>Lot Type</b></h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                        
                                        <h3>Are you sure you want to retrieve $strTypeName?</h3>
                                            <form class='form-horizontal' role='form' action = 'typeoflot.php' method= 'POST'>						  
                                                  <div class='form-group'>
                                                    <div class='col-sm-8'>
                                                        <input type='hidden' class='form-control' name= 'tfTypeID' 
                                                               value='$intTypeID' >
                                                    </div>
                                                 </div>
                                                            
                                                <div class='form-group'> 
                                                    <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                        <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                                        <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                                
                                    </div><!-- content-->
                                </div>
                            </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewTypes()         
}//class lot type
//_________________________________________

class deactivatedInterest{

    function viewDeactivatedInterest(){
        
		$sql = "Select i.intInterestID, i.intYear, i.dblPercent,i.intStatus, i.intAtNeed, t.strTypeName FROM tblinterest i
                INNER JOIN tbltypeoflot t ON i.intTypeID = t.intTypeID WHERE i.intStatus = '1' ORDER BY t.strTypeName ASC";
        
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
              
		echo "<tr><td style = 'font-size:18px;'>$strTypeName</td>
				   <td style = 'font-size:18px; text-align: right;'>$intYear</td>
				   <td style = 'font-size:18px;'>$tfAtNeed</td>
				   <td style = 'font-size:18px; text-align: right;'>$dblPercentValue %</td>
				   
                   <td align='center'>
                       <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intInterestID'>
                       <i class='glyphicon glyphicon-repeat'></i></button>
                   </td>
			   </tr>
               
               
                        
            <!--ARCHIVE MODAL-->
            <div class = 'modal fade' id = 'archive$intInterestID'>
                <div class = 'modal-dialog' style = 'width: 40%;'>
                    <div class = 'modal-content' style = 'height: 220px;'>
                                
                                    <!--header-->
                        <div class = 'modal-header' style='background: light-red'>
                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                            <h3 class = 'modal-title'>Archive: <b>Interest Rate</b></h3>
                        </div>
                                    
                                    <!--body (form)-->
                        <div class = 'modal-body'>
                        
                        <h3>Are you sure you want retrieve $strTypeName?</h3>
                            <form class='form-horizontal' role='form' action = 'interest.php' method= 'POST'>						  
                                    <div class='form-group'>
                                    <div class='col-sm-8'>
                                        <input type='hidden' class='form-control' name= 'tfInterestID' 
                                                value='$intInterestID' >
                                    </div>
                                    </div>
                                            
                                <div class='form-group'> 
                                    <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                        <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                                
                    </div><!-- content-->
                </div>
            </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewInterest()
 

}//class interest
//______________________________________________________________

class deactivatedSection{
    
    function viewDeactivatedSection(){
		
        $sql = "SELECT * FROM tblsection WHERE intStatus = 1 ORDER BY strSectionName ASC";
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
                
                        <td align='center'>
                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intSectionID'>
                            <i class='glyphicon glyphicon-repeat'></i></button>
                        </td>
                  </tr>
                
                        
                            
                    <div class = 'modal fade' id = 'archive$intSectionID'>
                        <div class = 'modal-dialog' style = 'width: 40%;'>
                            <div class = 'modal-content' style = 'height: 220px;'>
                                            
                                                <!--header-->
                                    <div class = 'modal-header' style='background: light-red'>
                                        <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                        <h3 class = 'modal-title'>Archive: <b>Section</b></h3>
                                    </div>
                                                
                                                <!--body (form)-->
                                    <div class = 'modal-body'>
                                    
                                    <h3>Are you sure you want retrieve $strSectionName?</h3>
                                        <form class='form-horizontal' role='form' action = 'section.php' method= 'POST'>						  
                                            <div class='form-group'>
                                                <div class='col-sm-8'>
                                                    <input type='hidden' class='form-control' name= 'tfSectionID' value='$intSectionID' >
                                                </div>
                                            </div>
                                                        
                                            <div class='form-group'> 
                                                <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                    <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                            
                                </div><!-- content-->
                            </div>
                    </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewSection()
}//class section
//________________________________________________________________
	
class deactivatedBlock{

    function viewDeactivatedBlock(){
        
		$sql = "SELECT b.intBlockID, b.strBlockName, b.intNoOfLot, b.intStatus, t.strTypeName, s.strSectionName FROM tblblock b INNER JOIN tblsection s 
                ON b.intSectionID = s.intSectionID 
                INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID WHERE b.intStatus = 1 ORDER BY strBlockName ASC";
        
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
                    
                          <td align='center'>
                                <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intBlockID'>
                                <i class='glyphicon glyphicon-repeat'></i></button>
                          </td>
                      </tr>
                
                        
                            
                        <!--ARCHIVE MODAL-->
                        <div class = 'modal fade' id = 'archive$intBlockID'>
                            <div class = 'modal-dialog' style = 'width: 40%;'>
                                <div class = 'modal-content' style = 'height: 220px;'>
                                                
                                                <!--header-->
                                    <div class = 'modal-header' style='background: light-red'>
                                        <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                        <h3 class = 'modal-title'>Archive: <b>Block</b></h3>
                                    </div>
                                                
                                                <!--body (form)-->
                                    <div class = 'modal-body'>
                                    
                                    <h3>Are you sure you want retrieve $strBlockName?</h3>
                                        <form class='form-horizontal' role='form' action = 'block.php' method= 'POST'>						  
                                                <div class='form-group'>
                                                <div class='col-sm-8'>
                                                    <input type='hidden' class='form-control' name= 'tfBlockID'  value='$intBlockID' >
                                                </div>
                                                </div>
                                                        
                                            <div class='form-group'> 
                                                <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                    <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                                
                                    </div><!-- content-->
                                </div>
                            </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewBlock()         

}//class block
//____________________________________________________	


class deactivatedLot{

    function viewDeactivatedLot(){
        
		$sql = "Select l.intLotID, l.strLotName, b.strBlockName, t.strTypeName, s.strSectionName, l.intLotStatus, l.intStatus 
                    FROM tbllot l  
                        INNER JOIN tblBlock b ON l.intBlockID = b.intBlockID 
                        INNER JOIN	tbltypeoflot t ON b.intTypeID = t.intTypeID
                        INNER JOIN tblsection s	ON b.intSectionID = s.intSectionID WHERE l.intStatus = '1' ORDER BY  strLotName ASC";

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
                
                   <td align='center'>
                       <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intLotID'>
                       <i class='glyphicon glyphicon-repeat'></i></button>
                   </td>
			  </tr>
              
             
    
            <!--ARCHIVE MODAL-->
            <div class = 'modal fade' id = 'archive$intLotID'>
                <div class = 'modal-dialog' style = 'width: 40%;'>
                    <div class = 'modal-content' style = 'height: 220px;'>
                                    
                                        <!--header-->
                            <div class = 'modal-header' style='background: light-red'>
                                <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                <h3 class = 'modal-title'>Archive: <b>Lot-Unit</b></h3>
                            </div>
                                        
                                        <!--body (form)-->
                            <div class = 'modal-body'>
                            
                            <h3>Are you sure you want retrieve $strLotName?</h3>
                                <form class='form-horizontal' role='form' action = 'lot.php' method= 'POST'>						  
                                    <div class='form-group'>
                                        <div class='col-sm-8'>
                                            <input type='hidden' class='form-control' name= 'tfLotID' value='$intLotID' >
                                        </div>
                                    </div>
                                                
                                    <div class='form-group'> 
                                        <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                            <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                    
                        </div><!-- content-->
                    </div>
            </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewLot()    
    
}//class Lot-Unit
//___________________________________________________


class deactivatedAC{

    function viewDeactivatedAC(){
		
		$sql = "SELECT * FROM tblashcrypt WHERE intStatus='1' ORDER BY strAshName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
       
		while($row = mysql_fetch_array($result)){ 
            
            $intAshID = $row['intAshID'];
            $strAshName =$row['strAshName'];
            $intNoOfLevel =$row['intNoOfLevel'];
            
              
            echo "<tr><td style ='font-size:18px;'>$strAshName</td>
                      <td style = 'text-align: right; font-size:20px;'>$intNoOfLevel</td>
                        
                       <td align = 'center'>
                            <button type = 'button' class = 'btn btn-success' data-toggle='modal' title='Retrieve' data-target = '#retrieve$intAshID'>
                            <i class='glyphicon glyphicon-repeat'></i></button>
                       </td>
                    </tr>
               
               
                        
                <!--ARCHIVE MODAL-->
                <div class = 'modal fade' id = 'retrieve$intAshID'>
                    <div class = 'modal-dialog' style = 'width: 40%;'>
                        <div class = 'modal-content' style = 'height: 220px;'>
                                        
                                            <!--header-->
                                <div class = 'modal-header' style='background: light-red'>
                                    <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                    <h3 class = 'modal-title'>Archive: <b>Block</b></h3>
                                </div>
                                            
                                            <!--body (form)-->
                                <div class = 'modal-body'>
                                
                                <h3>Are you sure you want retrieve $strAshName?</h3>
                                    <form class='form-horizontal' role='form' action = 'ashcrypt.php' method= 'POST'>						  
                                        <div class='form-group'>
                                            <div class='col-sm-8'>
                                                <input type='hidden' class='form-control' name= 'tfAshID' value='$intAshID' >
                                            </div>
                                        </div>
                                                    
                                        <div class='form-group'> 
                                            <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                        
                            </div><!-- content-->
                        </div>
                    </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewBuilding()
	
}//class aschcrypt
//___________________________________________


class deactivatedLevelAC{

    function viewDeactivatedLevelAC(){
        
		$sql = "Select la.intLevelAshID, la.strLevelName, la.intStatus, la.intNoOfUnit, ac.strAshName, la.dblSellingPrice from tbllevelash la
		          INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID where la.intStatus ='1' ORDER BY la.strLevelName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){
             
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
                    
                    <td align = 'center'>
                        <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intLevelAshID'>
                        <i class='glyphicon glyphicon-repeat'></i></button>
                    </td>
			     </tr>
               
                  
                        
                <!--ARCHIVE MODAL-->
                <div class = 'modal fade' id = 'archive$intLevelAshID'>
                    <div class = 'modal-dialog' style = 'width: 40%;'>
                        <div class = 'modal-content' style = 'height: 220px;'>
                                        
                                            <!--header-->
                                <div class = 'modal-header' style='background: light-red'>
                                    <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                    <h3 class = 'modal-title'>Archive: <b>Level</b></h3>
                                </div>
                                            
                                            <!--body (form)-->
                                <div class = 'modal-body'>
                                
                                <h3>Are you sure you want retrieve $strLevelName?</h3>
                                    <form class='form-horizontal' role='form' action = 'levelash.php' method= 'POST'>						  
                                        <div class='form-group'>
                                            <div class='col-sm-8'>
                                                <input type='hidden' class='form-control' name= 'tfLevelAshID' value='$intLevelAshID' >
                                            </div>
                                        </div>
                                                    
                                        <div class='form-group'> 
                                            <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                        
                            </div><!-- content-->
                        </div>
                    </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewLA()
    
}//class level
//____________________________________________________

class deactivatedInterestForLevel{

    function viewDeactivatedInterestForLevel(){
        
		$sql = "SELECT iL.intInterestID, iL.intYear, iL.dblPercent, iL.intStatus, iL.intAtNeed, l.strLevelName, a.strAshName FROM tblinterestforlevel iL
		          INNER JOIN tbllevelash l ON iL.intLevelAshID = l.intLevelAshID 
                  INNER JOIN tblashcrypt a ON l.intAshID = a.intAshID WHERE iL.intStatus='1' ORDER BY l.strLevelName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){ 
            
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
                        
                        <td align='center'>
                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intInterestID'>
                            <i class='glyphicon glyphicon-repeat'></i></button>
                        </td>
                  </tr>
               
               
                        
                <!--ARCHIVE MODAL-->
                <div class = 'modal fade' id = 'archive$intInterestID'>
                    <div class = 'modal-dialog' style = 'width: 40%;'>
                        <div class = 'modal-content' style = 'height: 220px;'>
                                        
                                            <!--header-->
                                <div class = 'modal-header' style='background: light-red'>
                                    <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                    <h3 class = 'modal-title'>Archive: <b>Interest Rate</b></h3>
                                </div>
                                            
                                            <!--body (form)-->
                                <div class = 'modal-body'>
                                
                                <h3>Are you sure you want retrieve $strLevelName?</h3>
                                    <form class='form-horizontal' role='form' action = 'interestForLevel.php' method= 'POST'>						  
                                        <div class='form-group'>
                                            <div class='col-sm-8'>
                                                <input type='hidden' class='form-control' name= 'tfInterestID' value='$intInterestID' >
                                            </div>
                                        </div>
                                                    
                                        <div class='form-group'> 
                                            <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                        
                            </div><!-- content-->
                        </div>
                    </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewInterest()
    
}//class interestForlevel
//_______________________________________________________

class deactivatedAshUnit{

    function viewDeactivatedAshUnit(){
        
		$sql = "SELECT acUnit.intUnitID, acUnit.strUnitName, acUnit.intUnitStatus, acUnit.intStatus, la.strLevelName, ac.strAshName, acUnit.intCapacity 
                    FROM tblacunit acUnit
                        INNER JOIN tbllevelash la ON acUnit.intLevelAshID = la.intLevelAshID 
                        INNER JOIN tblashcrypt ac ON la.intAshID = ac.intAshID WHERE acUnit.intStatus='1' ORDER BY acUnit.strUnitName ASC";    
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result)){ 
            
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
                        
                        <td align = 'center'>
                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intUnitID'>
                            <i class='glyphicon glyphicon-repeat'></i></button>
                        </td>
				 </tr>
               
                        
                <!--ARCHIVE MODAL-->
                <div class = 'modal fade' id = 'archive$intUnitID'>
                    <div class = 'modal-dialog' style = 'width: 40%;'>
                        <div class = 'modal-content' style = 'height: 220px;'>
                                        
                                            <!--header-->
                                <div class = 'modal-header' style='background: light-red'>
                                    <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                    <h3 class = 'modal-title'>Archive: <b>Unit</b></h3>
                                </div>
                                            
                                            <!--body (form)-->
                                <div class = 'modal-body'>
                                
                                <h3>Are you sure you want retrieve $strUnitName?</h3>
                                
                                    <form class='form-horizontal' role='form' action = 'ashcryptUnit.php' method= 'POST'>						  
                                        <div class='form-group'>
                                            <div class='col-sm-8'>
                                                <input type='hidden' class='form-control' name= 'tfUnitID' value='$intUnitID' >
                                            </div>
                                        </div>
                                                    
                                        <div class='form-group'> 
                                            <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                        
                            </div><!-- content-->
                        </div>
                    </div>";
        
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewAshUnit()

}//class AC-Unit
//________________________________________________

class deactivatedService{

    function viewDeactivatedService(){
		
        $sql = "SELECT * FROM tblservice WHERE intStatus='1' ORDER BY strServiceName ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        

		while($row = mysql_fetch_array($result)) { 
            
              $intServiceID = $row['intServiceID'];
              $strServiceName = $row['strServiceName'];
              $dblServicePrice = $row['dblServicePrice'];
              
                echo "<tr>
                        <td style ='font-size:18px;'>$strServiceName</td>
                        <td style = 'text-align: right; font-size:18px;'>₱ ".number_format($dblServicePrice,2)."</td>
                            
                        <td align = 'center'>
                                <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intServiceID'>
                                <i class='glyphicon glyphicon-repeat'></i></button>
                        </td>
                    </tr>
               
             
                    <!--ARCHIVE MODAL-->
                    <div class = 'modal fade' id='archive$intServiceID'>
                        <div class = 'modal-dialog' style = 'width: 40%;'>
                            <div class = 'modal-content' style = 'height: 220px;'>
                                            
                                                <!--header-->
                                    <div class = 'modal-header' style='background: light-red'>
                                        <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                        <h3 class = 'modal-title'>Archive: <b>Service</b></h3>
                                    </div>
                                                
                                                <!--body (form)-->
                                    <div class = 'modal-body'>
                                    
                                    <h3>Are you sure you want retrieve $strServiceName?</h3>
                                        <form class='form-horizontal' role='form' action = 'service.php' method= 'POST'>						  
                                                
                                            <div class='form-group'>
                                                <div class='col-sm-8'>
                                                    <input type='hidden' class='form-control' name= 'tfServiceID' value='$intServiceID' >
                                                </div>
                                            </div>
                                                        
                                            <div class='form-group'> 
                                                <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                    <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                            
                                </div><!-- content-->
                            </div>
                        </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewService()


}//class service
//____________________________________________________

class deactivatedDiscount{

    function viewDeactivatedDiscount(){
        
		$sql = "SELECT d.intDiscountID, s.strServiceName, d.strDescription, d.dblPercent, d.intStatus 
                    FROM tbldiscount d
	                       INNER JOIN tblservice s ON d.intServiceID = s.intServiceID WHERE d.intStatus='1' ORDER BY s.strServiceName ASC";

        
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
                            
                        <td align = 'center'>
                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Retrieve' data-target = '#archive$intDiscountID'>
                            <i class='glyphicon glyphicon-repeat'></i></button>
                        </td>
                </tr>
               
        
                <!--ARCHIVE MODAL-->
                <div class = 'modal fade' id='archive$intDiscountID'>
                    <div class = 'modal-dialog' style = 'width: 40%;'>
                        <div class = 'modal-content' style = 'height: 220px;'>
                                        
                                            <!--header-->
                                <div class = 'modal-header' style='background: light-red'>
                                    <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                    <h3 class = 'modal-title'>Archive: <b>Discount</b></h3>
                                </div>
                                            
                                            <!--body (form)-->
                                <div class = 'modal-body'>
                                
                                <h3>Are you sure you want retrieve $strDescription?</h3>
                                    <form class='form-horizontal' role='form' action = 'discount.php' method= 'POST'>						  
                                            
                                        <div class='form-group'>
                                            <div class='col-sm-8'>
                                                <input type='hidden' class='form-control' name= 'tfDiscountID' value='$intDiscountID' >
                                            </div>
                                        </div>
                                                    
                                        <div class='form-group'> 
                                            <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                <button type='submit' class='btn btn-danger' name= 'btnArchive'>Yes</button>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                        
                            </div><!-- content-->
                        </div>
                </div>";
                
            }//while($row = mysql_fetch_array($result))
			  mysql_close($conn);         
    }//function viewDiscount()

}//class discount
    

?>   
