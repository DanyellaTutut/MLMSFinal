<?php

class reservationLot{

    function viewReservationLot(){
		$sql = "SELECT rl.intReservationLot_id, rl.datDateCreated, rl.strLastName, rl.strFirstName, rl.strMiddleName, rl.strAddress, rl.strContactNo, rl.intTypeOfPayment,
                        rl.dblReservationFee, rl.intStatus, l.strLotName, b.strBlockName, s.strSectionName, l.intLotID FROM tblreservationlot rl 
                        INNER JOIN tbllot l ON rl.intLotID = l.intLotID 
                        INNER JOIN tblblock b ON b.intBlockID = l.intBlockID
                        INNER JOIN tblsection s ON s.intSectionID = b.intSectionID  WHERE rl.intStatus='0' ORDER BY rl.datDateCreated ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
                $intReservationLot_id = $row['intReservationLot_id']; 
                $intLotID = $row['intLotID']; 
                $datDateCreated = $row['datDateCreated'];
                $strLastName = $row['strLastName'];
                $strFirstName = $row['strFirstName'];
                $strMiddleName = $row['strMiddleName']; 
                $strAddress = $row['strAddress'];
                $strContactNo =$row['strContactNo']; 
                $intTypeOfPayment = $row['intTypeOfPayment'];
                $dblReservationFee = $row['dblReservationFee'];
                $intStatus = $row['intStatus'];
                $strLotName = $row['strLotName'];
                $strBlockName = $row['strBlockName'];
                $strSectionName = $row['strSectionName'];
                if($intTypeOfPayment==0){
                    $TypeOfPayment = 'Spotcash';
                }else{
                    $TypeOfPayment = 'Installment';
                } 
                
                echo "<tr>
                          <td align='right'>$datDateCreated</td>
                          <td>$strLastName, $strFirstName $strMiddleName</td>
                          <td>$strAddress</td>
                          <td align='right'>$strContactNo</td>
                          <td>$TypeOfPayment</td>
                          <td>$strLotName/$strBlockName/$strSectionName</td>
                          <td align='right'>₱ ".number_format($dblReservationFee,2)."</td>
                          
                    
                          <td align='center'>
                                <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#update$intReservationLot_id'>
                                <i class='glyphicon glyphicon-pencil'></i></button>
                                <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intReservationLot_id'>
                                <i class='glyphicon glyphicon-trash'></i></button>
                          </td>
                      </tr>
                
                        <div class = 'modal fade' id = 'update$intReservationLot_id'>
                            <div class = 'modal-dialog' style = 'width: 50%;'>
                                <div class = 'modal-content' style = ''>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background:#b3ffb3;'>
                                              <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h2 class = 'modal-title'>Update:</h2>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <form class='form-horizontal' role='form' action = 'lotReservation.php' method= 'POST'>						  
                                                
                                                <div class='form-group'>
                                                    <div class='col-md-5'>
                                                       <input type='hidden' class='form-control' name= 'tfReservationLotID' value='$intReservationLot_id' >
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Date:</label>
                                                        <div class='col-md-7'>
                                                            <input type='date' class='form-control input-md' name='tfDate' value='$datDateCreated' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;' >Last Name:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md' name='tfLastName' value='$strLastName' onkeypress='return validateName(event)' maxlength='50' required/>
                                                        </div>
                                                    </div>
                                                 </div>
                                                 
                                                 <div class='row'>           
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>First Name:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md' name='tfFirstName' value='$strFirstName' onkeypress='return validateName(event)' maxlength='50' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'  >Middle Name:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md' name='tfMiddleName' value='$strMiddleName' onkeypress='return validateName(event)' maxlength='50'/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Address:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md' name='tfAddress' value='$strAddress' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Contact No:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md tfContactUpdate' name='tfContactNo' value='$strContactNo' onkeypress='return validateNumber(event)' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Type of Payment:</label>
                                                        <div class='col-md-7'>
                                                            <select class='form-control' id='sel1' name = 'typeOfPayment' value='$TypeOfPayment' required>";
                                                                
                                                            $one = $two = '';
                                                            
                                                                if($TypeOfPayment == 'Spotcash'){
                                                                    $one = 'selected';
                                                                    
                                                                } else{
                                                                    $two = 'selected';
                                                                }
                                                        echo " <option value = '0' $one>Spotcash</option>
                                                                <option value = '1' $two>Installment</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Location:</label>
                                                        <div class='col-md-7'>
                                                            <select class='form-control' id='sel1' name = 'location' required>";
                                                                
                                                                $sql1 = "SELECT l.intLotID, l.strLotName, l.intStatus, b.strBlockName, s.strSectionName FROM tbllot l
                                                                            INNER JOIN tblblock b ON l.intBlockID = b.intBlockID 
                                                                            INNER JOIN tblsection s ON s.intSectionID = b.intSectionID WHERE l.intStatus='0' ORDER BY s.strSectionName ASC"; 
                                                                
                                                                $conn1 = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                mysql_select_db(constant('mydb'));
                                                                $result1 = mysql_query($sql1,$conn1);
            
                                                                
                                                                while($row1 = mysql_fetch_array($result1)){
                                                                    $intLotID2 =$row1['intLotID'];
                                                                    $strLotName2 =$row1['strLotName'];
                                                                    $strBlockName2 =$row1['strBlockName'];
                                                                    $strSectionName2 =$row1['strSectionName'];
                                                                    
                                                                    echo "<option value = $intLotID2";
                                                                    
                                                                    if($strLotName == $strLotName2){
                                                                        echo "selected";
                                                                    }
                                                                    
                                                                    echo ">$strLotName2/$strBlockName2/$strSectionName2</option>";
                                                                }
                                                                
                                                        echo "</select>
                                                    </div>
                                                </div>
                                             </div>
                                             
                                             <div class='row'>
                                                <div class='form-group'>
                                                    <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Reservation Fee:</label>
                                                    <div class='col-md-7'>
                                                        <div class='input-group'>
                                                            <span class = 'input-group-addon'>₱</span>
                                                            <input type='text' class='form-control input-md tfAmountUpdate' name='tfAmount' onkeypress='return validateNumber(event)' value='".number_format($dblReservationFee,2)."' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                              
                                             <div class='form-group modal-footer'> 
                                                <div  class='col-sm-offset-4 col-sm-8'>
                                                    <button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                </div>
                                            </div>
							        
                                            </form>
                                        </div>
                                                
                                    </div><!-- content-->
                                </div>
                            </div>
                            
                            <!--DEACTIVATED MODAL-->
                            <div class = 'modal fade' id = 'deactivate$intReservationLot_id'>
                            <div class = 'modal-dialog' style = 'width: 40%;'>
                                <div class = 'modal-content' style = 'height: 220px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background: light-red'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>Deactivate:</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                        
                                        <h3>Are you sure you want deactivate $strLastName, $strFirstName $strMiddleName?</h3>
                                            <form class='form-horizontal' role='form' action = 'lotReservation.php' method= 'POST'>						  
                                                  
                                                  <div class='form-group'>
                                                       <div class='col-sm-8'>
                                                            <input type='hidden' class='form-control' name= 'tfReservationLotID' value='$intReservationLot_id' >
                                                        </div>
                                                    </div>
                                                 
                                                   <div class='form-group'>
                                                        <div class='col-sm-8'>
                                                            <input type='hidden' class='form-control' name= 'location' value='$intLotID' >
                                                        </div>
                                                    </div>
                                                            
                                                    <div class='form-group'> 
                                                        <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                            <button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
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
    }//function viewReservation()
    
    function selectLotUnit(){
        
		$sql = "SELECT l.intLotID, l.strLotName, l.intStatus, b.strBlockName, s.strSectionName FROM tbllot l
                    INNER JOIN tblblock b ON l.intBlockID = b.intBlockID 
                    INNER JOIN tblsection s ON s.intSectionID = b.intSectionID WHERE l.intStatus='0' AND l.intLotStatus ='0' ORDER BY s.strSectionName ASC"; 
                    
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value = '". $row['intLotID']."'>LOT UNIT: ". $row['strLotName']." BLOCK: ".$row['strBlockName']." SECTION: ".$row['strSectionName']."</option>";
        }
         mysql_close($conn);
    }//function selectAshCrypt

    
             
}//class reservationForLOT
//_________________________________________


class reservationAC{

    function viewReservationAC(){
		$sql = "SELECT ra.intReservationAsh_id, ra.datDateCreated, ra.strLastName, ra.strFirstName, ra.strMiddleName, ra.strAddress, ra.strContactNo, ra.intTypeOfPayment,
                        ra.dblReservationFee, ra.intStatus, ac.strUnitName, la.strLevelName, ac.intUnitID, a.strAshName FROM tblreservationash ra 
                        INNER JOIN tblacunit ac ON ra.intUnitID = ac.intUnitID 
                        INNER JOIN tbllevelash la ON ac.intLevelAshID = la.intLevelAshID  
                        INNER JOIN tblashcrypt a ON la.intAshID = a.intAshID WHERE ra.intStatus='0' ORDER BY ra.datDateCreated ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
                $intReservationAsh_id = $row['intReservationAsh_id'];
                $intUnitID = $row['intUnitID']; 
                $datDateCreated = $row['datDateCreated'];
                $strLastName = $row['strLastName'];
                $strFirstName = $row['strFirstName'];
                $strMiddleName = $row['strMiddleName']; 
                $strAddress = $row['strAddress'];
                $strContactNo =$row['strContactNo']; 
                $intTypeOfPayment = $row['intTypeOfPayment'];
                $dblReservationFee = $row['dblReservationFee'];
                $intStatus = $row['intStatus'];
                $strUnitName = $row['strUnitName'];
                $strLevelName = $row['strLevelName'];
                $strAshName = $row['strAshName'];
                
                
                if($intTypeOfPayment==0){
                    $TypeOfPayment = 'Spotcash';
                }else{
                    $TypeOfPayment = 'Installment';
                } 
                
                echo "<tr>
                          <td align='right'>$datDateCreated</td>
                          <td>$strLastName, $strFirstName $strMiddleName</td>
                          <td>$strAddress</td>
                          <td align='right'>$strContactNo</td>
                          <td>$TypeOfPayment</td>
                          <td>$strUnitName/$strLevelName/$strAshName </td>
                          <td align='right'>₱ ".number_format($dblReservationFee,2)."</td>
                          
                    
                          <td align='center'>
                                <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#update$intReservationAsh_id'>
                                <i class='glyphicon glyphicon-pencil'></i></button>
                                <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intReservationAsh_id'>
                                <i class='glyphicon glyphicon-trash'></i></button>
                          </td>
                      </tr>
                
                        <div class = 'modal fade' id = 'update$intReservationAsh_id'>
                            <div class = 'modal-dialog' style = 'width: 50%;'>
                                <div class = 'modal-content' style = ''>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background:#b3ffb3;'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h2 class = 'modal-title'>Update:</h2>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <form class='form-horizontal' role='form' action = 'acReservation.php' method= 'POST'>						  
                                                
                                                <div class='form-group'>
                                                    <div class='col-sm-12'>
                                                        <input type='hidden' class='form-control' name= 'tfReservationAshID' value='$intReservationAsh_id' >
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Date:</label>
                                                        <div class='col-md-7'>
                                                            <input type='date' class='form-control input-md' name='tfDate' value='$datDateCreated' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Last Name:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md' name='tfLastName' value='$strLastName' onkeypress='return validateName(event)' maxlength='50' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>            
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>First Name:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md' name='tfFirstName' value='$strFirstName' onkeypress='return validateName(event)' maxlength='50' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Middle Name:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md' name='tfMiddleName' value='$strMiddleName' onkeypress='return validateName(event)' maxlength='50' />
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Address:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md' name='tfAddress' value='$strAddress' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;' >Contact No:</label>
                                                        <div class='col-md-7'>
                                                            <input type='text' class='form-control input-md tfContactUpdate' name='tfContactNo' value='$strContactNo' onkeypress='return validateNumber(event)' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Type of Payment:</label>
                                                        <div class='col-md-7'>
                                                            <select class='form-control' id='sel1' name = 'typeOfPayment' value='$TypeOfPayment' required>";
                                                                
                                                                    $one = $two = '';
                                                                    
                                                                        if($TypeOfPayment == 'Spotcash'){
                                                                            $one = 'selected';
                                                                            
                                                                        } else{
                                                                            $two = 'selected';
                                                                        }
                                                                echo " <option value = '0' $one>Spotcash</option>
                                                                        <option value = '1' $two>Installment</option>
                                                                    
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Location:</label>
                                                        <div class='col-md-7'>
                                                            <select class='form-control' id='sel1' name = 'location' required>";
                                                                
                                                                    $sql1 = "SELECT ac.intUnitID, ac.strUnitName, ac.intStatus, la.strLevelName, a.strAshName FROM tblacunit ac
                                                                                INNER JOIN tbllevelash la ON ac.intLevelAshID = la.intLevelAshID 
                                                                                INNER JOIN tblashcrypt a ON a.intAshID = la.intAshID WHERE ac.intStatus='0' ORDER BY la.strLevelname ASC"; 
                                                                    
                                                                    $conn1 = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                                    mysql_select_db(constant('mydb'));
                                                                    $result1 = mysql_query($sql1,$conn1);
                
                                                                    
                                                                    while($row1 = mysql_fetch_array($result1)){
                                                                        $intUnitID2 =$row1['intUnitID'];
                                                                        $strUnitName2 =$row1['strUnitName'];
                                                                        $strLevelName2 =$row1['strLevelName'];
                                                                        $strAshName2 =$row1['strAshName'];
                                                                        
                                                                        echo "<option value = $intUnitID2";
                                                                        
                                                                        if($strUnitName == $strUnitName2){
                                                                            echo "";
                                                                        }
                                                                        
                                                                        echo ">$strUnitName2/$strLevelName2/$strAshName2</option>";
                                                                    }
                                                                    
                                                            echo "</select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                             <div class='row'>
                                                <div class='form-group'>
                                                    <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Reservation Fee:</label>
                                                    <div class='col-md-7'>
                                                        <div class='input-group'>
                                                            <span class = 'input-group-addon'>₱</span>
                                                            <input type='text' class='form-control input-md tfAmountUpdate' name='tfAmount' onkeypress='return validateNumber(event)' value='".number_format($dblReservationFee,2)."' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                              
                                             <div class='form-group modal-footer'> 
                                                <div class='col-sm-offset-4 col-sm-8'>
                                                    <button type='submit' class='btn btn-success' name= 'btnSave'>Save</button>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                </div>
                                            </div>
							        
                                            </form>
                                        </div>
                                                
                                    </div><!-- content-->
                                </div>
                            </div>
                            
                            <!--DEACTIVATED MODAL-->
                            <div class = 'modal fade' id = 'deactivate$intReservationAsh_id'>
                            <div class = 'modal-dialog' style = 'width: 40%;'>
                                <div class = 'modal-content' style = 'height: 220px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background: light-red'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>Deactivate:</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                        
                                        <h3>Are you sure you want deactivate $strLastName, $strFirstName $strMiddleName?</h3>
                                            <form class='form-horizontal' role='form' action = 'acReservation.php' method= 'POST'>						  
                                                  
                                                  <div class='form-group'>
                                                    <div class='col-sm-8'>
                                                        <input type='hidden' class='form-control' name= 'tfReservationAshID' value='$intReservationAsh_id' >
                                                    </div>
                                                 </div>
                                                 
                                                 <div class='form-group'>
                                                    <div class='col-sm-8'>
                                                        <input type='hidden' class='form-control' name= 'location' value='$intUnitID' >
                                                    </div>
                                                 </div>
                                                            
                                                <div class='form-group'> 
                                                    <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                        <button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
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
    }//function viewReservation()
    
    function selectAshCrypt(){
        
		$sql = "SELECT ac.intUnitID, ac.strUnitName, ac.intStatus, la.strLevelName, a.strAshName FROM tblacunit ac
                    INNER JOIN tbllevelash la ON ac.intLevelAshID = la.intLevelAshID 
                    INNER JOIN tblashcrypt a ON a.intAshID = la.intAshID WHERE ac.intStatus='0' AND ac.intUnitStatus='0' ORDER BY la.strLevelname ASC"; 
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        {
            echo "<option value = '". $row['intUnitID']."'>". $row['strUnitName']."/".$row['strLevelName']."/".$row['strAshName']."</option>";
        }
         mysql_close($conn);
    }//function selectAshCrypt

    
             
}//class reservationForAc
//_________________________________________

class spotcashLot{

     function viewSpotcashLot(){
         
		$sql = "SELECT sl.intSpotLotReserve_id, sl.datDateCreated, sl.strLastName, sl.strFirstName, sl.strMiddleName, sl.strLotName, sl.strBlockName, sl.strSectionName, sl.dblAmount, sl.intStatus
	                   FROM tblspotlotreserve sl
	                       INNER JOIN tblreservationlot rl ON sl.intReservationLot_id = rl.intReservationLot_id WHERE sl.intStatus='0' ORDER BY sl.datDateCreated ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
                $intSpotLotReserve_id = $row['intSpotLotReserve_id'];
                $datDateCreated = $row['datDateCreated'];
                $strLastName = $row['strLastName'];
                $strFirstName = $row['strFirstName'];
                $strMiddleName = $row['strMiddleName']; 
                $strLotName = $row['strLotName'];
                $strBlockName =$row['strBlockName']; 
                $strSectionName = $row['strSectionName'];
                $dblAmount = $row['dblAmount'];
                $intStatus = $row['intStatus'];
                
                
                
                echo "<tr>
                          <td align='right'>$datDateCreated</td>
                          <td>$strLastName, $strFirstName $strMiddleName</td>
                          <td>$strLotName/$strBlockName/$strSectionName</td>
                          <td align='right'>₱ ".number_format($dblAmount,2)."</td>
                          
                    
                          <td align='center'>
                                <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intSpotLotReserve_id'>
                                <i class='glyphicon glyphicon-trash'></i></button>
                          </td>
                      </tr>
                
                            
                            <!--DEACTIVATED MODAL-->
                            <div class = 'modal fade' id = 'deactivate$intSpotLotReserve_id'>
                            <div class = 'modal-dialog' style = 'width: 40%;'>
                                <div class = 'modal-content' style = 'height: 220px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background: light-red'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>Deactivate:</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                        
                                        <h3>Are you sure you want deactivate $strLastName, $strFirstName $strMiddleName?</h3>
                                        
                                            <form class='form-horizontal' role='form' action = 'spotcash.php' method= 'POST'>						  
                                                  <div class='form-group'>
                                                    <div class='col-sm-8'>
                                                        <input type='hidden' class='form-control' name= 'tfSpotLotReserveID' value='$intSpotLotReserve_id' >
                                                    </div>
                                                 </div>
                                                 
                                                <div class='form-group'> 
                                                    <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                        <button type='submit' class='btn btn-danger' name= 'btnDeactivate'>Yes</button>
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
    }//function viewSpotLotReserve()
    
    function selectSpotcashLot(){
        
        
		$sql = "SELECT rl.intReservationLot_id, rl.datDateCreated, rl.strLastName, rl.strFirstName, rl.strMiddleName, rl.strAddress, rl.strContactNo, rl.intTypeOfPayment,
                rl.dblReservationFee, rl.intStatus, l.strLotName, l.intLotID, b.strBlockName, s.strSectionName, t.dblSellingPrice FROM tblreservationlot rl 
                    INNER JOIN tbllot l ON rl.intLotID = l.intLotID 
                    INNER JOIN tblblock b ON b.intBlockID = l.intBlockID
                    INNER JOIN tblsection s ON s.intSectionID = b.intSectionID
                    INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID	
                               WHERE rl.intStatus='0' AND rl.intTypeOfPayment='0' ORDER BY rl.datDateCreated ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        
        {
            echo "<option value = '". $row['intReservationLot_id']."'>". $row['strLastName'].",".$row['strFirstName']." ".$row['strMiddleName']."</option>";
        }
         mysql_close($conn);
    }//function selectSpotcashLot

    
             
}//class spotcashLot
//_________________________________________


class spotcashAsh{

    function viewSpotcashAsh(){
         
		$sql = "SELECT sr.intSpotAshReserve_id, sr.datDateCreated, sr.strLastName, sr.strFirstName, sr.strMiddleName, sr.strUnitName, sr.strLevelName, sr.strAshName, sr.dblAmount, sr.intStatus
                    FROM tblspotashreserve sr
                    INNER JOIN tblreservationash ra ON sr.intReservationAsh_id = ra.intReservationAsh_id WHERE sr.intStatus='0' ORDER BY sr.datDateCreated ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
                $intSpotAshReserve_id = $row['intSpotAshReserve_id'];
                $datDateCreated = $row['datDateCreated'];
                $strLastName = $row['strLastName'];
                $strFirstName = $row['strFirstName'];
                $strMiddleName = $row['strMiddleName']; 
                $strUnitName = $row['strUnitName'];
                $strLevelName =$row['strLevelName']; 
                $strAshName = $row['strAshName'];
                $dblAmount = $row['dblAmount'];
                $intStatus = $row['intStatus'];
                
                
                
                echo "<tr>
                          <td align='right'>$datDateCreated</td>
                          <td>$strLastName, $strFirstName $strMiddleName</td>
                          <td>$strUnitName/$strLevelName/$strAshName</td>
                          <td align='right'>₱ ".number_format($dblAmount,2)."</td>
                          
                    
                          <td align='center'>
                                <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intSpotAshReserve_id'>
                                <i class='glyphicon glyphicon-trash'></i></button>
                          </td>
                      </tr>
                
                            
                            <!--DEACTIVATED MODAL-->
                            <div class = 'modal fade' id = 'deactivate$intSpotAshReserve_id'>
                            <div class = 'modal-dialog' style = 'width: 40%;'>
                                <div class = 'modal-content' style = 'height: 220px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background: light-red'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>Deactivate:</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <h3>Are you sure you want deactivate $strLastName, $strFirstName $strMiddleName?</h3>
                                            
                                                <form class='form-horizontal' role='form' action = 'spotcash.php' method= 'POST'>						  
                                                    
                                                    <div class='form-group'>
                                                        <div class='col-sm-8'>
                                                            <input type='hidden' class='form-control' name= 'tfSpotAshReserveID'value='$intSpotAshReserve_id' >
                                                        </div>
                                                    </div>
                                                 
                                                    <div class='form-group'> 
                                                        <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                            <button type='submit' class='btn btn-danger' name= 'btnDeactivate1'>Yes</button>
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
    }//function viewSpotAshReserve()
    
    function selectSpotcashAsh(){
        
        
		$sql = "SELECT ra.intReservationAsh_id, ra.datDateCreated, ra.strLastName, ra.strFirstName, ra.strMiddleName, ra.strAddress, ra.strContactNo, ra.intTypeOfPayment,
                ra.dblReservationFee, ra.intStatus, ac.strUnitName, la.strLevelName, a.strAshName FROM tblreservationash ra 
                INNER JOIN tblacunit ac ON ra.intUnitID = ac.intUnitID 
                INNER JOIN tbllevelash la ON ac.intLevelAshID = la.intLevelAshID  
                INNER JOIN tblashcrypt a ON la.intAshID = a.intAshID 
                    WHERE ra.intStatus='0' AND ra.intTypeOfPayment='0' ORDER BY ra.datDateCreated ASC";

        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        
        {
            echo "<option value = '". $row['intReservationAsh_id']."'>". $row['strLastName'].",".$row['strFirstName']." ".$row['strMiddleName']."</option>";
        }
         mysql_close($conn);
    }//function selectSpotcashLot

    
             
}//class spotcashAsh
//_________________________________________


class installmentLot{

    
    function selectInstallmentLot(){
        
        
		$sql = "SELECT rl.intReservationLot_id, rl.datDateCreated, rl.strLastName, rl.strFirstName, rl.strMiddleName, rl.strAddress, rl.strContactNo, rl.intTypeOfPayment,
                    rl.dblReservationFee, rl.intStatus, l.strLotName, l.intLotID, b.strBlockName, s.strSectionName, t.dblSellingPrice FROM tblreservationlot rl 
                    INNER JOIN tbllot l ON rl.intLotID = l.intLotID 
                    INNER JOIN tblblock b ON b.intBlockID = l.intBlockID
                    INNER JOIN tblsection s ON s.intSectionID = b.intSectionID
                    INNER JOIN tbltypeoflot t ON b.intTypeID = t.intTypeID	WHERE rl.intStatus='0' AND rl.intTypeOfPayment='1' ORDER BY rl.datDateCreated ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        
        {
            echo "<option value = '". $row['intReservationLot_id']."'>". $row['strLastName'].", ".$row['strFirstName']." ".$row['strMiddleName']."</option>";
        }
         mysql_close($conn);
    }//function selectInstallmentLot

    
             
}//class intallmentLot
//_________________________________________

class installmentAsh{

    function viewInstallmentAsh(){
         
		$sql = "SELECT iL.intInstallmentAshID, iL.datDateCreated, iL.strLastName, iL.strFirstName, iL.strMiddleName, iL.strUnitName, iL.strLevelName, iL.strAshName,
                    iL.intTerm, iL.dblRate, iL.dblDownPayment, iL.dblBalance, iL.intStatus FROM tblinstallmentash iL
                    INNER JOIN tblreservationash rl ON rl.intReservationAsh_id = iL.intReservationAshID WHERE iL.intStatus='0' ORDER BY iL.datDateCreated ASC";        
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        
		while($row = mysql_fetch_array($result))
		  { 
                $intInstallmentAshID = $row['intInstallmentAshID'];
                $datDateCreated = $row['datDateCreated'];
                $strLastName = $row['strLastName'];
                $strFirstName = $row['strFirstName'];
                $strMiddleName = $row['strMiddleName']; 
                $strUnitName = $row['strUnitName'];
                $strLevelName =$row['strLevelName']; 
                $strAshName = $row['strAshName'];
                $intTerm = $row['intTerm'];
                $dblRate = $row['dblRate'];
                $dblDownPayment = $row['dblDownPayment'];
                $dblBalance = $row['dblBalance'];
                $intStatus = $row['intStatus'];
                
                $rate=$dblRate*100;
                
                if($intTerm=='1'){
                    $months='12';
                }else if($intTerm=='2'){
                    $months='24';
                }else if($intTerm=='3'){
                    $months='36';
                }else{
                    $months='48';
                }
                
                $x=$dblBalance/$months;
                $y=$x*$dblRate;
                $amortization=$x+$y;
                
                echo "<tr>
                          <td align='right'>$datDateCreated</td>
                          <td>$strLastName, $strFirstName $strMiddleName</td>
                          <td>$strUnitName/$strLevelName/$strAshName</td>
                          <td align='right'>$intTerm yr</td>
                          <td align='right'>$rate %</td>
                          <td align='right'>₱ ".number_format($dblDownPayment,2)."</td>
                          <td align='right'>₱ ".number_format($dblBalance,2)."</td>
                          
                    
                          <td align='center'>
                                <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='View' data-target = '#viewAsh$intInstallmentAshID'>
                                <i class='glyphicon glyphicon-eye-open'></i></button>
                                <button type = 'button' class = 'btn btn-danger' data-toggle = 'modal' title='Deactivate' data-target = '#deactivate$intInstallmentAshID'>
                                <i class='glyphicon glyphicon-trash'></i></button>
                          </td>
                      </tr>
                
                <div class = 'modal fade' id = 'viewAsh$intInstallmentAshID'>
                            <div class = 'modal-dialog' style = 'width: 40%;'>
                                <div class = 'modal-content' >
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background:#b3ffb3;'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h2 class = 'modal-title'>Update:</h2>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <form class='form-horizontal' role='form' action = 'installment.php' method= 'POST' id='monthlyAsh'>						  
                                                            
                                                <div class='form-group'>
                                                   <div class='col-sm-8'>
                                                       <input type='hidden' class='form-control' name= 'tfInstallmentAshID' value='$intInstallmentAshID' >
                                                   </div>
                                                </div>
                                                            
                                        <div class='row'>
                                            <div class='form-group'>
                                                <label class='col-md-4' style ='font-size: 18px;' align='right' style='margin-top:.30em'>Date:</label>
                                                <div class='col-md-5'>
                                                    <input type='date' class='form-control input-md' name='tfDate' required/>
                                                </div>
                                           </div><!-- FORM GROUP -->
                                        </div>                                 
                                                 
                                                <div class='row'>
                                                    <div class='form-group'>
                                                        <label class='col-md-4' align='right' style = 'font-size: 18px; margin-top:.30em;'>Monthly Amortization:</label>
                                                        <div class='col-md-7'>
                                                            <div class='input-group'>
                                                                <span class = 'input-group-addon'>₱</span>
                                                                <input type='text' class='form-control input-md tfPriceView' name= 'tfAmount' value='".number_format($amortization,2)."' required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>
                                               
                                         </form>
                                            <div class='form-group modal-footer'> 
                                                    <div class='col-sm-offset-4 col-sm-8'>
                                                        <button type='submit' class='btn btn-success' name= 'btnPay'>Pay</button>
                                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                    </div>
                                                </div>
                                        </div>         
                                    </div><!-- content-->
                                </div>
                            </div>
                                    
                            
                            <!--DEACTIVATED MODAL-->
                            <div class = 'modal fade' id = 'deactivate$intInstallmentAshID'>
                            <div class = 'modal-dialog' style = 'width: 40%;'>
                                <div class = 'modal-content' style = 'height: 220px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header' style='background: light-red'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>Deactivate:</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <h3>Are you sure you want deactivate $strLastName, $strFirstName $strMiddleName?</h3>
                                            
                                                <form class='form-horizontal' role='form' action = 'installment.php' method= 'POST'>						  
                                                    
                                                    <div class='form-group'>
                                                        <div class='col-sm-8'>
                                                            <input type='hidden' class='form-control' name= 'tfInstallmentAshID' value='$intInstallmentAshID' >
                                                        </div>
                                                    </div>
                                                 
                                                    <div class='form-group'> 
                                                        <div class='col-sm-offset-4 col-sm-8'  style = 'margin-top: 10px;'>
                                                            <button type='submit' class='btn btn-danger' name= 'btnDeactivate1'>Yes</button>
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
    }//function viewSpotAshReserve()
    
    function selectInstallmentAsh(){
        
        
		$sql = "SELECT rl.intReservationAsh_id, rl.datDateCreated, rl.strLastName, rl.strFirstName, rl.strMiddleName, rl.strAddress, rl.strContactNo, rl.intTypeOfPayment,
                    rl.dblReservationFee, rl.intStatus, l.strUnitName, l.intUnitID, b.strLevelName, s.strAshName, b.dblSellingPrice FROM tblreservationash rl 
                    INNER JOIN tblacunit l ON rl.intUnitID = l.intUnitID 
                    INNER JOIN tbllevelash b ON b.intLevelAshID = l.intLevelAshID
                    INNER JOIN tblashcrypt s ON s.intAshID = b.intAshID WHERE rl.intStatus='0' AND rl.intTypeOfPayment='1' ORDER BY rl.datDateCreated ASC";
        
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);
        while($row = mysql_fetch_array($result))
        
        {
            echo "<option value = '". $row['intReservationAsh_id']."'>". $row['strLastName'].", ".$row['strFirstName']." ".$row['strMiddleName']."</option>";
        }
         mysql_close($conn);
    }//function selectInstallmentAsh

    
             
}//class intallmentAsh
//_________________________________________



?>   
