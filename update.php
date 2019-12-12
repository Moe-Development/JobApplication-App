


<?php
			session_start();  
/*
 ***************************************************************************************
 *	Author: Mohamad Albazeai												           *
 *	           																		   *
 * File description: the update.php page is displaying the user application			   *
 * by retrive the data from the database.                                              *
 * it is also contain an update form that allowing the user to update some data        *
 * that refared to the job application.                                                *
 * lastly, its contain a Delete button that allow the user to delete their             *
 * application form from the database, by clicking on the button Towice and ensure     *
 * the alert that they want to delete.                                                 *
 ***************************************************************************************
*/
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Index page</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/update.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src = "../js/jobForm.js"></script>
		
	</head>

	<body>
		<h1 id="header">YOUR APPLICATION HAS BEEN SUBMITED SUCCESSFULLY</h1>
		<div id="deleteContent">
			<?php
			
				include "connect.php";
				$email = $_SESSION["email"] ;	
				if($email !== "" and $email !== false){
					$command = "SELECT * FROM useraccount WHERE email = ?";	
					$stmt = $dbh->prepare($command);
					$params = [$email];
					$success = $stmt->execute($params);
		
					echo "<table>";
					while($row = $stmt->fetch()){
							echo "<tr><th>Name:</th><td> ".$row['name']."</td></tr>";
							echo "<tr><th>phone:</th><td> ".$row['phone']."</td></tr>";
							echo "<tr><th>address:</th><td> ".$row['address']."</td></tr>";
							echo "<tr><th>postalCode:</th><td>" .$row['postalCode']."</td></tr>";
							echo "<tr><th>province:</th><td> ".$row['province']."</td></tr>";
							
					}
				}
				if($email !== "" and $email !== false){
					$command = "SELECT * FROM application WHERE email = ?";	
					$stmt = $dbh->prepare($command);
					$params = [$email];
					$success = $stmt->execute($params);
					while($row = $stmt->fetch()){
						echo "<tr><th>Email:</th><td> ".$row['email']."</td></tr>";
						echo "<tr><th>Program:</th><td> ".$row['program']."</td></tr>";
						echo "<tr><th>School Name:</th><td> ".$row['school']."</td></tr>";
						echo "<tr><th>CO-OP Length:</th><td> ".$row['workLength']."</td></tr>";
						echo "<tr><th>Year of Experince:</th><td> ".$row['experince']."</td></tr>";
						echo "<tr><th>Program Promotes CO-OP: </th><td> ".$row['required']."</td></tr>";
						echo "<tr><th>Uploaded Resume: </th><td> ".$row['resume']."</td></tr>";
						echo "<tr><th>Starting Date: </th><td> ".$row['startingDate']."</td></tr>";
						echo "<tr><th>Heard about this role from:</th><td> ".$row['heard']."</td></tr>";
						echo "<tr><th>Application Date: </th><td> ".$row['applicationDate']."</td></tr>";
						
					}
					echo "</table>";
				}
			?>
		</div>
		<div>
			<button id="updateButton" type="button">Update Application</button>
			<button id="delete" type="button">Delete Application</button>
			<button id="logout" type="button">Log out</button>
		</div>
		<form id="updateForm" action= "result.php" method = "POST" enctype = "multipart/form-data" >
			<fieldset>
				<legend>You can only update the available fields: </legend>
				<p>All the fields are required to be filled: (if you don't want to change some just overwrite your old info)</p>
				<div class="application">
					<label>Starting Date:(when are you ready to start)</label><br>
					<input type="date" name="startingDate" id="startingDate"  required><br>
				</div>
				<div class="application">
					<label>CO-OP Length: (Add 'Months' or 'Year' beside your number)</label><br>
					<input type="text" id="workLength"  name="workLength" placeholder="4 months"  required><br>
				</div>
				<div class="application">
				<label class="" for="">How many years of experince you have in Java: (Select in option)</label><br>
						<select class="" id="experince"  name="experince"  required>
							<option  value="0">0</option>
							<option  value="1-2 YEARS" >1 - 2</option>
							<option  value="2-3 YEARS" >2 - 3</option>
							<option  value="3-4 YEARS" >3 - 4</option>
							<option  value="5-above YEARS" >5 - above</option>
						</select>
				</div>
				<div class="application">
					<label>Upload your Resume (pdf format):</label><br>
					<input  class="applicationInput" type="file" id= "file" name="file" required >
				</div>
			</fieldset>
			<div class="application">
					<input type="submit" id="confirm" name="submit">
					<input type="reset"  name="cancel" value="Clear Form">
			</div>
		</form>
		</div>
			<footer>&#9400; Mohamad Albazeai - Mohawk College</footer>
	</body>
	
</html>