<?php
require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");


echo '
	<body onLoad="javascript:onLoad();">
			<script language = "javascript">

			//-----------------------------------------------------------------------------
			function onLoad() {
				onerror = handleErr;
			}

			//----------------------------------------------------------------------------
			function validateForm() {
				valid = true;

				//if full name field is empty return false
				if(document.registration_form.form_password.value != document.registration_form.verify.value) {
					alert("Passwords do not match. Please re-enter. ");
					valid = false;
					document.registration_form.form_password.value = "";
					document.registration_form.verify.value = "";
					document.registration_form.form_password.focus();
					return valid;
				}
				//if full name field is a number return false

				alert("Form filled out correctly. Press OK to submit");
				return valid;
			}//validateForm

			//--------------------------------------------------------------------------------------
			//generic error handler called if there is an unexpected error
			function handleErr(msg, url, l) {
				var txt = "";
				txt = "There was an error on this page.\n\n";
				txt += "Error: " + msg + "\n";
				txt += "URL: " + url + "\n";
				txt += "Line: " + l + "\n\n";
				txt += "Click OK to continue.\n\n";
				alert(txt);
				return true;
			}

			
			
		</script>
';
EchoHTMLText::echoHeader("Employee Registration ", "Account");		
echo '		<section id="main_form">
			<form action="register.php" method="post"
			name="registration_form" id="registration_form" onsubmit="return validateForm();">
				<fieldset>
					<legend>
						Registration Information
					</legend>
					<label for="email">E-Mail:</label>
					<input type="email" name="email" id="email"
					autofocus required>
					<br>
					<label for="form_password">Password:</label>
					<input type="password" name="form_password" id="form_password"
					required pattern="[a-zA-Z0-9]{6,}"
					placeholder="At least 6 letters or numbers">
					<br>
					<label for="verify">Verify Password:</label>
					<input type="password" name="verify" id="verify"
					required>
					<br>
				</fieldset>
				<fieldset>
					<legend>
						Employee Information
					</legend>
					<label for="first_name">First Name:</label>
					<input type="text" name="first_name" id=
					"first_name" required>
					<br>
					<label for="last_name">Last Name:</label>
					<input type="text" name="last_name" id=
					"last_name" required>
					<br>
					<label for="address">Address:</label>
					<input type="text" name="address" id=
					"address" required>
					<br>
				</fieldset>
				
				<fieldset id="buttons">
					<legend>
						Submit 
					</legend>
					<label>&nbsp;</label>
					<input type="submit" id="submit" value="Submit">
					<input type="reset" id="reset" value="Reset Fields">
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