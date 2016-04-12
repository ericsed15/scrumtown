<?php
class myEmployees {
	private $db;

	public function __construct() {
		include ( 'DbConnection.php');
		$DbC = new DbConnection();
		$this -> db = $DbC -> getDB();
	}//constructor

	
	function insertEmployee($email,$password,$first_name,$last_name, $address) {
		$insertStmt = "INSERT INTO my_employees 
     (email,password,first_name,last_name, address)
          VALUES
     ('$email','$password','$first_name','$last_name', '$address');";

		try {

			$insert_count = $this -> db -> exec($insertStmt);
		    if($insert_count < 1) throw new Exception("Could not be added. Perhaps you are already registered. Please contact us. ", 1);
			
			return TRUE;
		} catch (Exception $e) {
			$error_message = $e -> getMessage();
			require_once("ErrorDisplay.php");
			ErrorDisplay::echoError($error_message);
			//echo "<p>Error : $error_message </p>";
			return FALSE;
		}
		echo "Employees created successfully <br>";
		echo "No of rows inserted = " . $insert_count;
	}//insertCustomer

	function validateLogin($email,$password){
		$selectStmt= "SELECT * FROM my_employees AS E WHERE E.email = '$email' AND E.password = '$password'";
		try {$resultSet = $this -> db -> query($selectStmt);
		    if ($resultSet -> rowCount() > 0) return TRUE;			
			 throw new Exception("Email or Password not found. Please contact us. ", 1);
		}
		catch (Exception $e) {
			$error_message = $e -> getMessage();
			require_once("ErrorDisplay.php");
			ErrorDisplay::echoError($error_message);
			//echo "<p>Error : $error_message </p>";
			return FALSE;
		}
	}//function
	
	function retrieveAEmployee($email){
		$selectStmt= "SELECT * FROM my_employees AS E WHERE E.email = '$email' ";
		try {$resultSet = $this -> db -> query($selectStmt);
		    if ($resultSet -> rowCount() > 0) {		    		
		    	$EmpInfo = $resultSet->fetch();//fetch customer info into an array
				return $empInfo;
		    }//if customer found			
			 throw new Exception("Your Information was not found. Please log in first. Or you can always contact us. ", 1);
		}//try
		catch (Exception $e) {
			$error_message = $e -> getMessage();
			require_once("ErrorDisplay.php");
			ErrorDisplay::echoError($error_message);
			//echo "<p>Error : $error_message </p>";
			return FALSE;
		}//catch
	}//function retrieveAEmployee
	
	function updateEmployee($email,$password,$first_name,$last_name, $address) {
          $updateStmt = "UPDATE my_employees SET first_name = '$first_name', last_name ='$last_name', password= '$password', address='$address'
            WHERE email = '$email'";
		try {
			$update_count = $this -> db -> exec($updateStmt);
		    if($update_count < 1) throw new Exception("Could not be updated. Please contact us. ", 1);
			
			return TRUE;
			return TRUE;
		} catch (Exception $e) {
			$error_message = $e -> getMessage();
			require_once("ErrorDisplay.php");
			ErrorDisplay::echoError($error_message);
			//echo "<p>Error : $error_message </p>";
			return FALSE;
		}
		echo "Employees updated successfully <br>";
		echo "No of rows updated = " . $update_count;
	}//updateCustomer
	
	
    function updatePassword($email, $newPassword) {
          $updateStmt = "UPDATE my_employees SET password = '$newPassword' 
            WHERE email = '$email'";
		try {
			$update_count = $this -> db -> exec($updateStmt);
		    if($update_count < 1) throw new Exception("Could not be updated. Please contact us. ", 1);
			return TRUE;
		} catch (Exception $e) {
			$error_message = $e -> getMessage();
			require_once("ErrorDisplay.php");
			ErrorDisplay::echoError($error_message);
			//echo "<p>Error : $error_message </p>";
			return FALSE;
		}
		echo "Password updated successfully <br>";
		echo "No of rows updated = " . $update_count;
	}//updatePassword
	

	function deleteEmployee($email,$password) {
		$deleteStmt = "DELETE FROM my_employee WHERE email = '$email' AND password = '$password';";
	
		try {
			$delete_count = $this -> db -> exec($deleteStmt);
			return TRUE;
		} catch (Exception $e) {
			$error_message = $e -> getMessage();
			echo "<p>Error message: $error_message </p>";
			return FALSE;
		}
		echo "Row deleted successfully <br>";
		echo "No of rows deleted = " . $delete_count;
	}
	
}//class
?>