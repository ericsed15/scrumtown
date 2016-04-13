<?php
require_once ('EchoHTMlText.php');
session_start();
$email = "";
if (isset($_SESSION['projecy_id'])) $project_id = $_SESSION['project_id'];//get session email
require_once('MyProjects.php');
$mc = new MyProjects();
$empInfo= $mc->retrieveAProjects($cc_id);
if(!($ProjectInfo)) die();
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
			<form action="updateProjects.php" method="post"
			name="update_form" id="update_form" >
				<fieldset>
					<legend>
						Account Information
					</legend>
					<label for="project_id">Project ID:</label>
					<input type="project_id" name="project_id" id="project_id" value = '.$ProjectInfo['project_id'].' autofocus disabled>
					<br>
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" value = '.$ProjectInfo['project_name'].' required>
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