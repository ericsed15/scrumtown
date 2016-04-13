<?php
// get the data from the form
$email = $_POST['email'];
$form_password = $_POST['form_password'];
$verify = $_POST['verify'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];


// error check here
if (empty($email) || empty($form_password) || empty($first_name) || empty($last_name) || empty($address)) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("Data received from form is not correct");
	exit();
}

// If valid, add the employee
require_once('myEmployees.php');
$form_password=md5($form_password);//weak encryption of password
$mc = new myEmployees();
if(!$mc->insertEmployee($email, $form_password, $first_name, $last_name, $address) ){
	die();
}

require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");
echo	'<body>';
EchoHTMLText::echoHeader("Thank you for Registering! Welcome!", "Home");		
?>


		<section>
			<fieldset>
				<legend>
					Registration Information That You Submitted
				</legend>
				Email: <?php echo $email;?><br />
				First Name: <?php echo $first_name;?><br />
				Last Name: <?php echo $last_name;?><br />
				Address: <?php echo $address;?><br />
				
				<br>
			</fieldset>
		</section>
		<?php EchoHTMLText::echoFooter(); ?>
	</body>
</html>
