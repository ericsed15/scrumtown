<?php
class ErrorDisplay {
	public static function echoError($errMsg){
		require_once ('EchoHTMlText.php');
        echo '<!DOCTYPE html> <html lang="en">  ';
       EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");
	   echo '<body>';
	   EchoHTMLText::echoHeader("Error Found ", "Account");
	   echo '<section>
            <h2> Error</h2>
            <p>'.$errMsg.'</p>
        </section>
		';
		EchoHTMLText::echoFooter(); 
		echo '</body>
            </html>';
	}//echoError
	
	
	
}//class
?>