

/****************************************************************************************
 *	Author: Mohamad Albazeai												            *
 *	        																			*
 *  																				    *
 * File description: the jobform javascript file is holding the 						*
 * user action on the update.php page. its doing action, fetching , 				    *
 * and response on the user action.								   						*
 ****************************************************************************************
 */


window.addEventListener("load", function(){
	event.preventDefault();   // prevent from reloading 
		
		let confirmDelete = 0;
		$(document).ready(function(){
			$("#out").click(function(){
				window.location.href = ("../index.php");
			});
			
			$("#updateForm").hide();
			$("#updateButton").click(function(){
				$("#updateForm").show();
				confirmDelete = 0;
			});
			$("#logout").click(function(){
				window.location.href = ("../index.php");
			});
			$("#delete").click(function(){
				confirmDelete +=1 ;
				if(confirmDelete === 2){
					fetch("delete.php",{credentials: 'include'});
					$("#updateForm").hide();
					$("#updateButton").hide();
					$("#delete").hide();
					$("#deleteContent").hide();
					$("#header").html("YOUR APPLICATION HAS BEEN DELETED SUCCESSFULLY");

				}else{alert("You are about to delete your application!! if you sure about deleting click again on the Delete Application button.");}
			});
		});
			
});