<?php 
require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");
echo	'<body>';
EchoHTMLText::echoHeader("Welcome to the ACME Home Page", "Home");
echo'		
		<section >
			<img src="../images/ThreeTierOverview.png" alt="Overview of 3 tier architecture" height="500" width="500">
		</section>
		';
EchoHTMLText::echoFooter();
echo '	</body>
</html>
';
?>