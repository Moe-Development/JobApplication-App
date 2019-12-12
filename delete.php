

<?php

/*
 ***************************************************************************************
 *	Author: Mohamad Albazeai												           *
 *	           																		   *
 * File description: the delet.php page is deleting the user application               *
 * from the database when the user request it from the update.php page.                *
 * at the end of the proccess its deleteing and took the 							   *
 * user back to the update.php page.												   *
 ***************************************************************************************
*/
		session_start(); 
		include "connect.php";			
		$email = $_SESSION["email"] ;
		if($email !== "" and $email !== false){
			$command = "DELETE FROM application WHERE email = ?";	
			$stmt = $dbh->prepare($command);
			$params = [$email];
			$success = $stmt->execute($params);
		}
		if($email !== "" and $email !== false){
			$command = "UPDATE useraccount  SET name = ?, phone = ?, address = ? , postalCode = ?, province = ? WHERE email = ?";				
			$stmt = $dbh->prepare($command);
			$params = [null,null,null,null,null, $email];
			$success = $stmt->execute($params);
		}
		header("location: update.php");

?>