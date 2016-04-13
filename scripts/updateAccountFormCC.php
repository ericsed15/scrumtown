<?php
require_once ('EchoHTMlText.php');
session_start();
$email = "";
if (isset($_SESSION['cc_id'])) $cc_id = $_SESSION['cc_id'];//get session email
require_once('MyCostCategories.php');
$mc = new MyCostCategories();
$empInfo= $mc->retrieveACC($cc_id);
if(!($CCInfo)) die();
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
			<form action="updateCC.php" method="post"
			name="update_form" id="update_form" >
				<fieldset>
					<legend>
						Account Information
					</legend>
					<label for="cc_id">CC ID:</label>
					<input type="cc_id" name="cc_id" id="cc_id" value = '.$CCInfo['cc_id'].' autofocus disabled>
					<br>
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" value = '.$CCInfo['cc_name'].' required>
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
				
		</section>
		';
		EchoHTMLText::echoFooter();
	echo '</body>
</html>
';
?>