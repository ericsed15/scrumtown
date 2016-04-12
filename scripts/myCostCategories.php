<?php
class myCostCategories {
	private $db;

	public function __construct() {
		include ( 'DbConnection.php');
		$DbC = new DbConnection();
		$this -> db = $DbC -> getDB();
	}//constructor

	
	function insertCC($cc_id,$cc_name) {
		$insertStmt = "INSERT INTO myCostCategories 
     (cc_id,cc_name)
          VALUES
     ('$cc_id','$cc_name');";

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
		echo "Cost Categoies created successfully <br>";
		echo "No of rows inserted = " . $insert_count;
	}//insertCC

	
	function retrieveACC($cc_id){
		$selectStmt= "SELECT * FROM myCostCategoies AS E WHERE E.id = '$cc_id' ";
		try {$resultSet = $this -> db -> query($selectStmt);
		    if ($resultSet -> rowCount() > 0) {		    		
		    	$CCInfo = $resultSet->fetch();//fetch customer info into an array
				return $CCInfo;
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
	
	function updateCC($cc_id,$cc_name) {
          $updateStmt = "UPDATE my SET  name ='$cc_name',
            WHERE name = '$cc_name'";
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
		echo "CC updated successfully <br>";
		echo "No of rows updated = " . $update_count;
	}//updateCustomer
	
	

	function deleteCC($cc_id, $cc_name) {
		$deleteStmt = "DELETE FROM myCostCategories WHERE id = '$cc_id' AND name = '$cc_name';";
	
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