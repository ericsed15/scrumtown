<?php
// get the data from the form
$project_name = $_POST['project_name'];

// error check here
if (empty($project_name) ) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("Data received from form is not correct");
	exit();
}

// If valid, add the customer
require_once('myProjects.php');
$form_password=md5($form_password);//weak encryption of password
$mc = new myProjects();
if(!$mc->insertProject($project_name) ){
	die();
}

require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");
echo	'<body>';
EchoHTMLText::echoHeader("Thank you for creating this project!", "Home");		
?>


		<section>
			<fieldset>
				<legend>
					Submitted Project Information
				</legend>
				Project Name: <?php echo $project_name;?><br />
				<br>
			</fieldset>
		</section>
		<?php EchoHTMLText::echoFooter(); ?>
	</body>
</html>
