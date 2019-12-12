
<?php
/*
 ***************************************************************************************
 *	Author: Mohamad Albazeai												           *
 *	           																		   *
 * File description: the result.php page is updating the user application when		   *
 * the user request it from the update.php page, and at the end of the proccess        *
 * we drive the user back to the update.php page to notice thje changes.			   *														   *
 ***************************************************************************************
*/

			session_start(); 
			include "connect.php";				
			$email = $_SESSION["email"] ;
			if(isset($_POST['submit'])){
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
			

			$experince = filter_input(INPUT_POST, "experince", FILTER_SANITIZE_STRING);     	 
			$workLength = filter_input(INPUT_POST, "workLength", FILTER_SANITIZE_STRING);     	 
			$startingDate = filter_input(INPUT_POST, "startingDate", FILTER_SANITIZE_STRING);      
			if($email !== "" and $email !== false and $experince !== "" and $workLength !== "" and $startingDate !== ""){
				$command = "UPDATE application  SET experince = ?, workLength = ?, resume = ? , startingDate = ? WHERE email = ?";	
				$stmt = $dbh->prepare($command);
				$params = [$experince,$workLength,$fileName, $startingDate, $email];
				$success = $stmt->execute($params);
			}
			header("location: update.php");
		


?>