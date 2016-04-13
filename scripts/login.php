<?php
// get the data from the form
$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();
if (isset($_SESSION['email'])) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("You are already logged in. If this is an error, please logout first, then log in again. ");
	exit();
}
$email = $_POST['email'];
$form_password = $_POST['form_password'];
// error check here
if (empty($email) || empty($form_password)) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("Data received from form is not correct");
	$_SESSION = array();
	// Clear session data from memory
	session_destroy();
	// Clean up the session ID
	// Get name of session cookie
	$name = session_name();

	// Create expire date in past
	$expire = strtotime('-1 year');

	// Get session params
	$params = session_get_cookie_params();
	$path = $params['path'];
	$domain = $params['domain'];
	$secure = $params['secure'];
	$httponly = $params['httponly'];

	setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
	exit();
}//if

// If valid, check for email passwd match with db
require_once ('myEmployees.php');
$form_password = md5($form_password);
//weak encryption of password
$mc = new myEmployees();
if (!$mc -> validateLogin($email, $form_password)) {
	$_SESSION = array();
	// Clear session data from memory
	session_destroy();
	// Clean up the session ID
	// Get name of session cookie
	$name = session_name();

	// Create expire date in past
	$expire = strtotime('-1 year');

	// Get session params
	$params = session_get_cookie_params();
	$path = $params['path'];
	$domain = $params['domain'];
	$secure = $params['secure'];
	$httponly = $params['httponly'];

	setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
	die();
}
//$lifetime = 60 * 60 * 24 * 14;
//session_set_cookie_params($lifetime, '/');
//session_start();
$_SESSION['email'] = $email;
//store email as session variable
require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css", "../images/ING.ico");
echo '<body>';
$welcomeText = "Welcome $email !";
EchoHTMLText::echoHeader($welcomeText, "Home");
EchoHTMLText::echoFooter();
?>
</body>
</html> 