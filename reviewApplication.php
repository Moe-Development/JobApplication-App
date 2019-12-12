


<?php

/*
****************************************************************************************
 *	Author: Mohamad Albazeai												           *
 *	           																		   *
 * File description: the reviewApplication.php page is recieving the 				   *
 * application form that was fiiled by the user.									   *
 * it is filtring the the application form and insert them to the database.            *
 * at the end of the proccess its drive the user to 								   *
 * the update.php page when its show the user data.									   *
 ***************************************************************************************
*/
	session_start();             		 				  //starting the session to get the user email 
	include "connect.php";								 //connecting to the data base
	$ApplicationExist = false;						 	// boolean flag to check if the application already exist or not to do the approprate query
	if(isset($_SESSION["email"])){
		if(isset($_POST['submit'])){						// READING THE UPLOADED FILES
			$file = $_FILES['file'];					
			$fileName = $_FILES['file']['name'];
			$fileTempName = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			$fileType = $_FILES['file']['type'];
			
			$fileExtension = explode('.',$fileName);
			$fileActualExt = strtolower(end($fileExtension));
			$allowed = array('jpg','jpeg','png','pdf');
			
			if(in_array($fileActualExt, $allowed)){
				if($fileError === 0){
					$fileDestination = '../uploadedFiles/'.rand(1,1000)."-".$fileName;
					move_uploaded_file($fileTempName, $fileDestination);
				}else{
					echo "there was an error uploading your File!!";
				}
			}else{
				echo "you cannot upload files of this type!!";
			}
			
			
		}
		
		$tm=date_default_timezone_set('UTC');  														//getting the current date
		$date = date("Y-m-d");	
		$email = $_SESSION["email"];
		
		//useraccount table fields
		$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);     	 				
		$address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);     	 			
		$postalCode = filter_input(INPUT_POST, "postalCode", FILTER_SANITIZE_STRING);     				 
		$province = filter_input(INPUT_POST, "province", FILTER_SANITIZE_STRING);     				 
		$phone = filter_input(INPUT_POST, "phone", FILTER_VALIDATE_INT);  					
		
		//application table fields
		$program = filter_input(INPUT_POST, "program", FILTER_SANITIZE_STRING);     			 
		$schoolName = filter_input(INPUT_POST, "schoolName", FILTER_SANITIZE_STRING);     	
		$experince = filter_input(INPUT_POST, "experince", FILTER_SANITIZE_STRING);     	
		$programPromoteCoop = filter_input(INPUT_POST, "program_Promote_Coop", FILTER_SANITIZE_STRING);     	 
		$workLength = filter_input(INPUT_POST, "workLength", FILTER_SANITIZE_STRING);     	 
		$startingDate = filter_input(INPUT_POST, "startingDate", FILTER_SANITIZE_STRING);      
		$heardFrom = filter_input(INPUT_POST, "heardFrom", FILTER_SANITIZE_STRING);     
		
		if($email !== "" and $email !== false){
			$command = "SELECT * FROM application  WHERE  email = ?";
			$stmt = $dbh->prepare($command);
			$params = [$email];
			$success = $stmt->execute($params);
			while($row = $stmt->fetch()){
				$ApplicationExist = true;
			}
		}
		
		if(!$ApplicationExist and $email !== false and $email !== "" and $program !== "" and $schoolName !== "" and $experince !== "" and $workLength !== "" and $programPromoteCoop !== "" and $fileName !== "" and $startingDate !== "" and $heardFrom !== "" ){
			$command = "INSERT INTO application (email , program, school, experince, workLength, required, resume,startingDate,heard, applicationDate)VALUES( ?,?,?,?,?,?,?,?,?,?)";					
			$stmt = $dbh->prepare($command);
			$params = [$email, $program, $schoolName, $experince, $workLength, $programPromoteCoop, $fileName, $startingDate, $heardFrom, $date];
			$success = $stmt->execute($params);
		}
		if(!$ApplicationExist and $name !== "" and $phone !== "" and $address !== "" and $postalCode !== "" and $province !== "" and $email !== false and $email !== ""){
			$command = "UPDATE useraccount  SET name = ?, phone = ?, address = ? , postalCode = ?, province = ? WHERE email = ?";				
			$stmt = $dbh->prepare($command);
			$params = [$name,$phone,$address,$postalCode,$province, $email];
			$success = $stmt->execute($params);
		}
		
		header("location: update.php");			//moving to the update.php page
	}
	

?>