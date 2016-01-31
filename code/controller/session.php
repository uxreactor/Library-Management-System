<?php 
	function setSession($email,$type,$memid){
		session_start();
		if($type == 'admin'){
			$_SESSION["admin"] = $email;
			$_SESSION["type"] = "admin";
		}else if ($type == 'user'){
			$_SESSION["user"] = $email;
			$_SESSION["type"] = $memid;
		}else{
			return false;
		}
		return $_SESSION["type"];
	}
	function checkSession() {
		if(!isset($_SESSION)) { 
	        session_start(); 
	    } 
	
		if (count($_SESSION) > 0 && $_SESSION["user"]) {
			return $_SESSION["type"];	
		} else if (count($_SESSION) > 0 && $_SESSION["admin"]){
			return $_SESSION["type"];
		} else {
			return false;
		}	
	}

?>