<?php
require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");



EchoHTMLText::echoHeader("Login Page ", "Account");		
echo '		<section id="main_form">
			<form action="login.php" method="post"
			name="login_form" id="login_form" >
				<fieldset>
					<legend>
						Login Information
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
					
				</fieldset>
				<fieldset id="buttons">
					<legend>
						Submit Your Login Information
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