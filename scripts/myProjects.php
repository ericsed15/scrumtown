<?php
class myProject {
	private $db;

	public function __construct() {
		include ( 'DbConnection.php');
		$DbC = new DbConnection();
		$this -> db = $DbC -> getDB();
	}//constructor

	
	function insertCC($project_id,$project_name) {
		$insertStmt = "INSERT INTO myProject 
     (project_id,project_name)
          VALUES
     ('$project_id','$project_name');";

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
		echo "Project created successfully <br>";
		echo "No of rows inserted = " . $insert_count;
	}//insertCC

	
	function retrieveAproject($cc_id){
		$selectStmt= "SELECT * FROM myProject AS E WHERE E.id = '$project_id' ";
		try {$resultSet = $this -> db -> query($selectStmt);
		    if ($resultSet -> rowCount() > 0) {		    		
		    	$ProjectInfo = $resultSet->fetch();//fetch customer info into an array
				return $ProjectInfo;
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
	
	function updateProject($project_id,$project_name) {
          $updateStmt = "UPDATE my SET  name ='$project_name',
            WHERE name = '$project_name'";
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
		echo "Project updated successfully <br>";
		echo "No of rows updated = " . $update_count;
	}//updateCustomer
	
	

	function deleteProject($project_id, $project_name) {
		$deleteStmt = "DELETE FROM myProject WHERE id = '$project_id' AND name = '$project_name';";
	
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