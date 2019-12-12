

/****************************************************************************************
 *	Author: Mohamad Albazeai												            *
 *	        																			*
 *  																				    *
 * File description: the appAction javascript file is holding the 						*
 * user action on the index.php page. its doing action, fetching , 						*
 * and response on the user action.								   						*
 ****************************************************************************************
 */

window.addEventListener("load", function(){
	event.preventDefault();   // prevent from reloading 
	
	//declearing the signin form varaibles to share their values in mulitple function :
	let email ;
	let password ;
	let identifier ;
	
	//declearing the signup form varaibles to share their values in mulitple function :
	let registeringEmail ;
	let confirmRegisteringEmail ;
	let registeringPassword ;
	let registringIdentifier ;
	
	
	$(document).ready(function(){
		$("#signUp").hide();
	});
	
	/*event listenner on the log in forms contains fetching and some other functions that determine wether the user is registerd or not*/
	document.forms.login.addEventListener("submit",function(event){	
		event.preventDefault(); 
		email = $("#email").val().toLowerCase();
		password = $("#password").val().toLowerCase();
		identifier = 1;
		
		let params = "email=" + email + "&password=" + password + "&identifier=" + identifier;
	
		// validate the user log in info: 
		fetch("php/getUser.php",{
			method: 'POST',
			credentials: 'include',
			headers:{"Content-Type": "application/x-www-form-urlencoded"},
			body: params
		})
		.then(response => response.json())
		.then(success)
		
	});
	
	
	/* success function is defind wether the user email is registred in the database or not */
	function success(text){
		if(text === 1){
			window.location.href = ("php/applicationForm.php");
		}
		else if(text === 2){
			window.location.href = ("php/update.php");	
		}
			
		else{
			$(document).ready(function(){
				$("#error").html("Email or Password is not Correct!");
				$("#error").css({"color": "darkred", "fontWeight":"bold"});
				$("#email").css('border', '3px solid red');
				$("#password").css('border', '3px solid red');
			});
		}
	}
	
	//register button on click
	$("#register").click(function(){
		$(document).ready(function(){
			$("#email").css('border', '2px solid green');
			$("#password").css('border', '2px solid green');
			$("#error").html("");
			$("#login").hide();
			$("#signUp").show();
			
		});
	});
	
	/* on confirm the registeration form to when the user created a new account */
	document.forms.signUp.addEventListener("submit",function(event){	
		event.preventDefault(); 
		registeringEmail = $("#registeringEmail").val().toLowerCase();;
		confirmRegisteringEmail = $("#registeringEmail2").val().toLowerCase();;
		registeringPassword = $("#registeringPassword").val().toLowerCase();;
		registringIdentifier = 2;
		
		if(registeringPassword.length <= 30 && registeringEmail.length  <= 100){
			if(registeringEmail === confirmRegisteringEmail){
				let params = "email=" + registeringEmail + "&password=" + registeringPassword + "&identifier=" + registringIdentifier;
			
				// validate the user log in info: 
				fetch("php/getUser.php",{
					method: 'POST',
					credentials: 'include',
					headers:{"Content-Type": "application/x-www-form-urlencoded"},
					body: params
				})
				.then(response => response.json())
				.then(validate)
			}else{
				$(document).ready(function(){
					$("#invalidData").html("Email is not matching!!");
					$("#invalidData").css({"color": "red", "fontWeight":"bold"});
					$("#registeringEmail").css('border', '3px solid red');
					$("#registeringEmail2").css('border', '3px solid red');
				});
			}
		}else{
			$(document).ready(function(){
				$("#invalidData").html("Password or Email is to long!!");
				$("#invalidData").css({"color": "red", "fontWeight":"bold"});
			});
			
		}
	});
	
	/*validate function is validating the user email on the registration form and it works right after the fetch*/
	function validate(text){
		console.log(text);
		if(text !== true){
			addUser();
			$("#signUp").hide();
			$("#login").show();
			$("#email").val($("#registeringEmail").val());
			$("#password").val($("#registeringPassword").val());
		}
		else{
			$("#invalidData").html("Email already registered !!");
			$("#invalidData").css({"color": "red", "fontWeight":"bold"});
			$("#registeringEmail").css('border', '3px solid red');
			$("#registeringEmail2").css('border', '3px solid red');
		
		}
	
	}
	/*add user function contain a fetch method that adding the user to the database through connecting to addUser.php page*/
	function addUser(){
		let params = "email=" + registeringEmail + "&password=" + registeringPassword + "&identifier=" + registringIdentifier;
		fetch("php/addUser.php",{
			method: 'POST',
			credentials: 'include',
			headers:{"Content-Type": "application/x-www-form-urlencoded"},
			body: params
		})
				
	}
	
	
	
});
	