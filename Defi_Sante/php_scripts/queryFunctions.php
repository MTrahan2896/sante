<?php function phpSelectQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');

	$myArray = array();
	if ($result = $mysqli->query($query)) {

    while($row = $result->fetch_array()) {

            $myArray[] = $row;
    }

    echo json_encode($myArray);
	}

	$result->close();
	$mysqli->close();
	}


	function phpQuery($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	if ($result = $mysqli->query($query)) {
	
	$mysqli->close();
	}


	function phpSelectReturnSingleName($query){
    $mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	if ($result = $mysqli->query($query)) {

    while($row = $result->fetch_array()) {
        return $row['nom']; 
        
    }
     
	}

	$result->close();
	$mysqli->close();
	}

	function alert($message){
		echo "<script>alert('".$message."')</script>";
	}




}
?>