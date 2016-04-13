<?php
session_start();
$project_id = "";
if (isset($_SESSION['project_id'])) $project_id = $_SESSION['project_id'];//get session email

// get the data from the form
$project_id = $_POST['project_id'];
$project_name = $_POST['project_name'];


// error check here
if (empty($project_id)) {
	include ('ErrorDisplay.php');
	ErrorDisplay::echoError("Data received from form is not correct");
	exit();
}

// If valid, add the customer
require_once('myProjects.php');
$mc = new myProjects();
if(!$mc->updateProjects($project_id,$project_name) ){
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
				 Name: <?php echo $project_name;?><br />
				ID: <?php echo $project_id;?><br />
				<br>
			</fieldset>
		</section>
		<?php EchoHTMLText::echoFooter(); ?>
	</body>
</html>