<?php
require_once ('EchoHTMlText.php');
echo '<!DOCTYPE html> <html lang="en">  ';
EchoHTMLText::echoHead("../styles/register.css","../images/ING.ico");


echo '
	<body onLoad="javascript:onLoad();">
			<script language = "javascript">

			//-----------------------------------------------------------------------------
			function onLoad() {
				onerror = handleErr;
			}

			//----------------------------------------------------------------------------
			function validateForm() {
				valid = true;

				//if cost category name field is empty return false
				if(document.new_cost_category_form.cc_name.value == "") {
					alert("Cost Category name should not be blank.");
					valid = false;
					return valid;
				}

				alert("Form filled out correctly. Press OK to submit");
				return valid;
			}//validateForm

			//--------------------------------------------------------------------------------------
			//generic error handler called if there is an unexpected error
			function handleErr(msg, url, l) {
				var txt = "";
				txt = "There was an error on this page.\n\n";
				txt += "Error: " + msg + "\n";
				txt += "URL: " + url + "\n";
				txt += "Line: " + l + "\n\n";
				txt += "Click OK to continue.\n\n";
				alert(txt);
				return true;
			}

			
			
		</script>
';
EchoHTMLText::echoHeader("Create Category", "Account");		
echo '		<section id="main_form">
			<form action="createCostCategory.php" method="post"
			name="new_cost_category_form" id="new_cost_category_form" onsubmit="return validateForm();">
				<fieldset>
					<legend>
						New Cost Category
					</legend>
					<label for="cc_name">Cost Category Name</label>
					<input type="text" name="cc_name" id="cc_name"
					autofocus required>
				</fieldset>
				<fieldset id="buttons">
					<legend>
						Submit New Cost Category
					</legend>
					<label>&nbsp;</label>
					<input type="submit" id="submit" value="Submit">
					<input type="reset" id="reset" value="Reset Fields">
					<br>
				</fieldset>
			</form>
		</section>
		';
		EchoHTMLText::echoFooter();
	echo '</body>
</html>
';
?>