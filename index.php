
<!DOCTYPE html>
<html>

<!--
****************************************************************************************
 *	Author: Mohamad Albazeai												           *
 *	           																		   *
 * File description: the is the index.php page, it is the main page that hold          *
 * the user sign in and sign up forms, and respons on the user action with             *
 * the help of javascript.															   *
 ***************************************************************************************
 -->
 
	<head>
		<title>Index page</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="css/applicationStyle.css"/>
		<script src = "js/appActions.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>

	<body>
		<h1>Welcome To Easy Future IT Company:</h1>
		<form id="login" >
			<fieldset>
					<legend>Log in &#128064; </legend>
						<label class="labelStyle" id="#label1" for="email">Email &#128231; </label>
						<input class = "main" id="email" type = "email" name="email" placeholder="example@gmail.com"  required><br>
						
						<label class="labelStyle" id="" for="password">Password &#128274;</label>
						<input class = "main" id="password" type = "password" name="password" placeholder="************" required ><br>
			</fieldset>
					<div>
						<p id= "error"></p>
						<input id= "loginButton" type ="submit" value="log in">
					</div>
					<div class= "profile">
						<span>Create Account!</span>
						<button id="register" type="button">Register</button>
					</div>
		</form>
		<form id="signUp" > 
			<fieldset>
				<legend>Registration Form &#128064;</legend>
					<label class="labelStyle" for="registeringEmail">Email &#128231;*</label>
					<input class="main" type="email" id="registeringEmail" name="email" placeholder="example@gmail.com" required ><br>
					<label class="labelStyle" for="registeringEmail2">Confirm Email &#128231;*</label>
					<input class="main" type="email" id="registeringEmail2" name="email2" placeholder="example@gmail.com" required ><br>
					<label class="labelStyle" for="registeringPassword">Create Password &#128274;*</label>
					<input class="main" type="text" id="registeringPassword" name="registeringPassword" required ><br>
			</fieldset>
			<p id="invalidData"></p>
			<div id= "registrationInput">
				<input id= "confirm" type ="submit" value="Confirm">
				<input type="reset" value="Clear"/>
			</div>
		</form>
		<footer>&#9400; Mohamad Albazeai - Mohawk College</footer>
	</body>

</html>