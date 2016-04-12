<?php
require_once ('EchoHTMlText.php');
session_start();
$email = "";
if (isset($_SESSION['email'])) $email = $_SESSION['email'];//get session email
require_once('MyEmployees.php');
$mc = new MyEmployees();
$empInfo= $mc->retrieveAEmployee($email);
if(!($empInfo)) die();
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");
echo ' <body>
    <script type = text/javascript>
	var $ = function(id) {
	return document.getElementById(id);
    }//$

			function validateForm() {
				valid = true;
				if(document.update_password_form.form_password.value != document.update_password_form.verify.value) {
					alert("Passwords do not match. Please re-enter. ");
					valid = false;
					document.update_password_form.form_password.value = "";
					document.update_password_form.verify.value = "";
					document.update_password_form.form_password.focus();
					return valid;
				}

				alert("Form filled out correctly. Press OK to submit");
				return valid;
			}//validateForm

			

	</script>
	
	';
EchoHTMLText::echoHeader("Manage Your Account ", "Account");		
echo '		<section id="main_form">
			<form action="update.php" method="post"
			name="update_form" id="update_form" >
				<fieldset>
					<legend>
						Account Information
					</legend>
					<label for="email">E-Mail:</label>
					<input type="email" name="email" id="email" value = '.$empInfo['email'].' autofocus disabled>
					<br>
					<label for="first_name">First Name:</label>
					<input type="text" name="first_name" id="first_name" value = '.$empInfo['first_name'].' required>
					<br>
					<label for="last_name">Last Name:</label>
					<input type="text" name="last_name" id="last_name" value = '.$empInfo['last_name'].' required>
					<br>
					<label for="password">Password:</label>
					<input type="text" name="password" id="password" value = '.$empInfo['password'].' required>
					<br>
					<label for="address">Address:</label>
					<input type="address" name="address" id="address" value = '.$empInfo['address'].' required>
					<br>
					</select>
					<br>
				</fieldset>
				<fieldset id="buttons">
					<legend>
						Submit Your Updated Information
					</legend>
					<label>&nbsp;</label>
					<input type="submit" id="submit" value="Submit">
					<input type="reset" id="reset" value="Reset Fields">
					<br>
				</fieldset>
				</form>
				<form action="updatePassword.php" method="post"
			     name="update_password_form" id="update_password_form" onsubmit="return validateForm();" >
			     <fieldset id="passwordUpdate">
					<legend>
						Update Password Only
					</legend>
					<label for="oldPassword">Old Password:</label>
					<input type="password" name="oldPassword" id="oldPassword">
					<br><br>
					<label for="form_password">New Password:</label>
					<input type="password" name="form_password" id="form_password"
					required pattern="[a-zA-Z0-9]{6,}"
					placeholder="At least 6 letters or numbers">
					<br>
					<label for="verify">Verify Password:</label>
					<input type="password" name="verify" id="verify"
					required>
					<br>
					
					<input type="submit" id="submitOldPassword" value="Change Password" >
					
					<br>
				</fieldset>
			</form>
		</section>
		';
		EchoHTMLText::echoFooter();
	echo '</body>
</html>
';
?>