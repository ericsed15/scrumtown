<?php
session_start();
$email = "";
if (isset($_SESSION['email'])) $email = $_SESSION['email'];//get session email

// get the data from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];

// error check here
if (empty($email) || empty($first_name)) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("Data received from form is not correct");
	exit();
}

// If valid, add the customer
require_once('myEmployees.php');
$mc = new my_employees();
if(!$mc->updateEmployee($email, $first_name, $last_name, $address) ){
	die();
}

require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");
echo	'<body>';
EchoHTMLText::echoHeader("Thank you for Updating your Information! ", "Home");		
?>


		<section>
			<fieldset>
				<legend>
					This is your updated Information: 
				</legend>
				Email: <?php echo $email;?><br />
				First Name: <?php echo $first_name;?><br />
				Last Name: <?php echo $last_name;?><br />
				Password: <?php echo $password;?><br />
				Address: <?php echo $address;?><br />
				<br>
			</fieldset>
		</section>
		<?php EchoHTMLText::echoFooter(); ?>
	</body>
</html>
