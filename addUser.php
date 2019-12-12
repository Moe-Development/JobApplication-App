

<?php
/*
 ***************************************************************************************
 *	Author: Mohamad Albazeai												           
 *	           																		   
 * File description: the adduser.php page, its job is to insert the user account       
 * to the database, after validate the data and hashing the password.				   														   *
 ***************************************************************************************
*/

		include "connect.php";														   		//connecting to the data base
		$valid = false;																 	   // boolean flag
		$identifier = filter_input(INPUT_POST, "identifier", FILTER_VALIDATE_INT);	
		$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);	
		$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);	
		$password = password_hash($password, PASSWORD_DEFAULT);	
		
		if($identifier === 2 and $email !== false and $email !== "" and $password !== ""){
			$command = "INSERT INTO useraccount (email , password) VALUES( ?,?)";					//inserting to the database
			$stmt = $dbh->prepare($command);
			$params =[$email, $password];
			$success = $stmt->execute($params);
		}
		
	
?>

