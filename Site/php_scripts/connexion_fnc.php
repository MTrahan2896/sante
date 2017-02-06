<?php
function verifier_user_existant($username,$pwd_input)
{
	echo "user";
	$query = "Select * from utilisateur where username = '".$username."'";
	$mysqli = new mysqli('localhost','root','','bd_application');
	$myArray = array();
	if ($result = $mysqli->query($query)) {

		if ( mysqli_num_rows($result) == 1 )
		{
		$row = $result->fetch_array();
			verifier_password($username, $pwd_input, $row['password']);

		}
		else
		{
		echo "<script>alert('User invalid');</script>";
		}
        
	}

	$result->close();
	$mysqli->close();	 
}

function verifier_password($username,$pwd_input,$pwd)
{	echo "pwd";
	if (password_verify($pwd_input,$pwd))
	{
		echo "<script>alert('Login completed');</script>";

	}
	else
	{
		echo "<script>alert('Login failed');</script>";
	}

}

?>