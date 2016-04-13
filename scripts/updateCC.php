<?php
session_start();
$cc_idl = "";
if (isset($_SESSION['cc_id'])) $cc_id = $_SESSION['cc_id'];//get session email

// get the data from the form
$cc_id = $_POST['cc_id'];
$cc_name = $_POST['cc_name'];


// error check here
if (empty($cc_id)) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("Data received from form is not correct");
	exit();
}

// If valid, add the customer
require_once('myCostCategories.php');
$mc = new myCostCategories();
if(!$mc->updateCC($cc_id,$cc_name) ){
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
				 Name: <?php echo $cc_name;?><br />
				ID: <?php echo $cc_id;?><br />
				<br>
			</fieldset>
		</section>
		<?php EchoHTMLText::echoFooter(); ?>
	</body>
</html>