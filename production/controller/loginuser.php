<?php

require_once "connection.php";

class User{
    
		private $user_id 	= 	0;
		private $u          =   null;
		private $p          =   null;
		private $is_active 	=	1;
		
		 public function User($tfUsername,$tfPassword){
			 $this->u = $tfUsername;
			 $this->p =$tfPassword;
		 }

			function checkUser($u , $p){
				$sql = "SELECT * FROM dbholygarden.tblemployee where strUsername = '".$u."' and strPassword = '".$p."';";
				$conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
				mysql_select_db(constant('mydb'));
				$result = mysql_query($sql,$conn);
				$row = mysql_fetch_array($result);
				
				if(!$row){ 
				echo	"<script>alert('Access Denied')</script>
				<script>window.open('login.php','_self')</script>";
				}
				else {
					echo "<script>alert('Access Granted')</script>
						<script>window.open('home.php','_self')</script>";
				 mysql_close($conn);
				}
    
	        }

   }
?>