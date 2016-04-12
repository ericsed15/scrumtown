<?php
class EchoHTMLText {
	public static function echoHead($stylesheetPath, $iconPath) {
		try {
			echo '<head>
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Employee Registration Form</title>
		<meta name="description" content="Test page to learn big picture of  AMP architecture" />
		<meta name="author" content="Elaine Schillinger" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="shortcut icon" href="' . $iconPath . '" />
		<link rel="stylesheet" href="' . $stylesheetPath . '">
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	    </head>';

		} catch (Exception $e) {
			$error_message = $e -> getMessage();
			echo "<p>Error message: $error_message </p>";
		}

	}//echo head

	public static function echoHeader($titleText, $currentLink) {
		if ($currentLink != "Home" && $currentLink != "Account") {
			echo 'ERROR in parameters to echoHeader in class EchoHTMlText';
			echo '<header> <h1>';
			die();
		}

		echo '<header> <h1> ' . $titleText . '</h1>';
		if ($currentLink == "Home") {
			$navText = '<nav> <ul id = "menu">
					<li>
						<a class="current" href="/ACME/index.php">Home</a>
					</li>
					<li>
						<a  href="#">Account</a>
						    <ul id="account_sub_menu">
                            <li><a href="/ACME/scripts/loginForm.php">Login</a></li>
                            <li><a href="/ACME/scripts/registerForm.php">Register</a></li>
                            <li><a href="/ACME/scripts/updateAccountForm.php">Manage</a></li>
                            </ul>
					</li>
					<li>
						<a  href="mailto:akhilesh-bajaj@utulsa.edu">Email Us</a>
					</li>
					<li>
						<a  href="/ACME/scripts/logout.php">Logout</a>
					</li>
				</ul>
		</nav>';
		}//if home
		if ($currentLink == "Account") {
			$navText = '<nav> <ul id = "menu">
					<li>
						<a  href="/ACME/index.php">Home</a>
					</li>
					<li>
						<a  class="current" href="#">Account</a>
						    <ul id="account_sub_menu">
                            <li><a href="/ACME/scripts/loginForm.php">Login</a></li>
                            <li><a href="/ACME/scripts/registerForm.php">Register</a></li>
                            <li><a href="/ACME/scripts/updateAccountForm.php">Manage</a></li>
                            </ul>
					</li>
					<li>
						<a  href="mailto:akhilesh-bajaj@utulsa.edu">Email Us</a>
					</li>
					<li>
						<a  href="/ACME/scripts/logout.php">Logout</a>
					</li>
				</ul>
		</nav>';
		}//if Register

		echo $navText . ' </header>';

	}//echoHeader

	public static function echoFooter() {
		echo '<footer> <p>';
		echo date('l jS \of F Y h:i:s A');
		echo '   &copy; Copyright  by elaine-schillinger
		</p> </footer>';
	}//echoFooter

}//EchoHTMlText
?>