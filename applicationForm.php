

<!DOCTYPE html>
<html>
<!--*************************************************************************************
 *	Author: Mohamad Albazeai												            *
 *	           																		    *
 * File description: the applicationform.php page, its contain the job application form *
 * when the user can applay to the job by filling the job application.					*		
 ****************************************************************************************
 -->


	<head>
		<title>Index page</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="../css/form.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src = "../js/jobForm.js"></script>
		<style>
		</style>
	</head>

	<body id="applicationBody">
		<header>
			<h1>Job Application:</h1>
			<p>Please be advised, one application is allowed only (but you can still update some info).</p>
		</header>
		<form id="applicationForm" action="reviewApplication.php" method = "POST"  enctype = "multipart/form-data" >
			<h2>Please fill out the form in case to submit your application:</h2>
			<fieldset>
			<legend>Personal Info: </legend>
				<div>
				<p id="test"></p>
					<label class="labelStyle" for="name">Full Name*:</label><br>
					<input class="main" type="text" id="name" name="name" required ><br>
				</div>
				<div class="userAddress">	
					<label class="" for="address">Address:</label><br>
					<input class="" type="text" id="address" name="address" required ><br>
				</div>
				<div class="userAddress">
					<label class="" for="postalCode">Postal Code:</label><br>
					<input class="" type="text" id="postalCode" name="postalCode" pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]"  placeholder= "L8L 5T5" title="ENTER YOUR POSTAL CODE IN RIGHT FORMAT ('L8L 3W3')" required ><br>
				</div>
				<div class="personalData">
					<label class="" for="phone">Phone:</label><br>
					<input class="" type="number" id="phone" name="phone" min="0" placeholder="1234567890" required ><br>
				</div>	
				<div class="personalData">
					<label class="" for="province">Province:</label><br>
					<select class="" id="province"  name="province"  required><br>
						<option  value="AB" >AB</option>
						<option  value="BC" >BC</option>
						<option  value="MB" >MB</option>
						<option  value="NB" >NB</option>
						<option  value="NL" >NL</option>
						<option  value="NS" >NS</option>
						<option  value="NT" >NT</option>
						<option  value="NU" >NU</option>
						<option  value="ON" selected>ON</option>
						<option  value="PE" >PE</option>
						<option  value="QC" >QC</option>
						<option  value="SK" >SK</option>
						<option  value="YT" >YT</option>
					</select>
				</div>
			</fieldset>
			<fieldset>
			<legend>Job Requested Info: </legend>
			<div class="application">
				<label>Your current school name: (write it down)</label><br>
				<input class="applicationInput" type="text" id="schoolName" name="schoolName" required ><br>
			</div>
			<div class="application">
				<label>What is your program major:</label><br>
				<input class="applicationInput" type="text" id="program" name="program" required ><br>
			</div>
			<div class="application">
				<label class="" for="">How many years of experince you have in Java: (Select in option)</label><br>
						<select class="" id="experince"  name="experince"  ><br>
							<option  value="0">0</option>
							<option  value="1-2 YEARS" >1 - 2</option>
							<option  value="2-3 YEARS" >2 - 3</option>
							<option  value="3-4 YEARS" >3 - 4</option>
							<option  value="5-above YEARS" >5 - above</option>
						</select>
			</div>
			<div class="application">
				<label class="" for="">Are you registered in a program that promote CO-OP:</label><br>
				<select class="" id="program_Promote_Coop"  name="program_Promote_Coop" required ><br>
							<option></option>
							<option  value="Yes" >Yes</option>
							<option  value="No" >No</option>
							
				</select><br>
			</div>
			<div class="application">
				<label>CO-OP Length: (Add 'Months' or 'Year' beside your number)</label><br>
				<input type="text" id="workLength"  name="workLength" placeholder="4 months" required ><br>
			</div>
			<div class="application">
				<label>Starting Date:(when are you ready to start)</label><br>
				<input type="date" name="startingDate" id="startingDate" required ><br>
			</div>
			<div class="application">
				<label class="" for="">How did you hear about us: </label><br>
				<select class="" id="heardFrom"  name="heardFrom" required ><br>
							<option  value=""></option>
							<option  value="Indeed" >Indeed</option>
							<option  value="Student Resources" >Student Resources</option>
							<option  value="Company Web Site" >Company Web Site</option>
							<option  value="Other" >Other</option>
				</select><br>
			</div>
			<div class="application">
				<label>Upload your Resume (pdf format):</label><br>
				<input  class="applicationInput" type="file" id= "file" name="file" required ><br>
			</div>
			</fieldset>
			<div class="application">
				<input type="submit" id="confirm" name="submit" >
				<input type="reset"  name="cancel" value="Clear Form" >
				<button id="out">log out!</button>
			</div>
		</form>
		<footer>&#9400; Mohamad Albazeai - Mohawk College</footer>
	</body>
</html>


 



