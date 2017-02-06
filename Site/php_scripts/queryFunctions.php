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
	$result->close();
	$mysqli->close();
	}
}
?>