<?php
// get the data from the form
$cc_name = $_POST['cc_name'];

// error check here
if (empty($cc_name) ) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("Data received from form is not correct");
	exit();
}

// If valid, add the customer
require_once('myCostCategories.php');
$mc = new myCostCategories();
if(!$mc->insertCostCategory($cc_name) ){
	die();
}

require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");
echo	'<body>';
EchoHTMLText::echoHeader("Thank you for creating this cost category!", "Home");		
?>


		<section>
			<fieldset>
				<legend>
					Submitted Cost Category Information
				</legend>
				Cost Category Name: <?php echo $cc_name;?><br />
				<br>
			</fieldset>
		</section>
		<?php EchoHTMLText::echoFooter(); ?>
	</body>
</html>
