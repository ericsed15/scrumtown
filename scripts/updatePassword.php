<?php
session_start();
$email = "";
if (isset($_SESSION['email']))
	$email = $_SESSION['email'];
//get session email

// get the data from the form
$oldPassword = $_POST['oldPassword'];
$form_password = $_POST['form_password'];
// error check here
if (empty($oldPassword)) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("Need to submit current password. ");
	exit();
}
if (empty($form_password)) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("Need to submit valid new password. ");
	exit();
}
// If valid, update the customer
$oldPassword = md5($oldPassword);
//weak encryption of password
$form_password = md5($form_password);
//weak encryption of password

require_once ('myEmployee.php');
$mc = new myEmployee();
//validate old password is good
if (!$mc -> validateLogin($email, $oldPassword)) {
	die();
}
if (!$mc -> updatePassword($email, $form_password)) {
	die();
}

require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css", "../images/ING.ico");
echo '<body>';
EchoHTMLText::echoHeader("Thank you for Updating your Password! ", "Home");
?>

<?php EchoHTMLText::echoFooter();?>
</body>
</html>
