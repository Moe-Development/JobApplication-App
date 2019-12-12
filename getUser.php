

<?php
		
/*
****************************************************************************************
 *	Author: Mohamad Albazeai												           *
 *	           																		   *
 * File description: the getUser.php page, its job is to validate the user data 	   *
 * on the log in, to make sure the user exist in the database. 						   *
 * it is also validate the user account on the sign up to make sure the user 		   *
 * email is not exist in the database in case to 									   *
 * add the user account to the database.										   	   *
 ***************************************************************************************
*/
			session_start();
			include "connect.php";															 //connecting to the data base
			$validate = 0;													   				//boolean flag
			$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);	
			$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);	
			$identifier = filter_input(INPUT_POST, "identifier", FILTER_VALIDATE_INT);	
			
			if($identifier === 1 and $email !== false and $email !== "" and $password !== ""){
					$command = "SELECT * FROM useraccount WHERE email = ?";
					$stmt = $dbh->prepare($command);
					$params = [$email];
					$success = $stmt->execute($params);
					while($row = $stmt->fetch()){
						if(password_verify($password, $row["password"])){
							$_SESSION["email"] = $row["email"];
							$validate = 1;
						}
						else{
							session_unset();
							session_destroy();
						}
						
					}
					
					if($validate === 1){
						$command = "SELECT email FROM application WHERE email = ?";
						$stmt = $dbh->prepare($command);
						$params = [$email];
						$success = $stmt->execute($params);
						while($row = $stmt->fetch()){
								$validate = 2;
						}
					}
			}
			
			else if($identifier === 2 and $email !== false and $email !== ""){
				$command = "SELECT email FROM useraccount WHERE email = ?";
				$stmt = $dbh->prepare($command);
				$params = [$email];
				$success = $stmt->execute($params);
				while($row = $stmt->fetch()){
					$validate = true;
				}
			}
			
			echo json_encode($validate);
?>





