<?php
session_start();
// connect to database
try
{
	// handle form data
	$username = $password = "";
	$accountMade = true;
	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $username = test_input($_POST["username"]);
	  $password = test_input($_POST["password"]);
	}
   require("dbConnector.php"); 
   $db = loadDatabase();
   	$statement = $db->query('SELECT * FROM users WHERE user_username LIKE \'%'.$username.'%\' LIMIT 1');
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	if (!$row) {
		$statement = $db->prepare("INSERT into users (user_username, user_password) VALUES (:user_username, :user_password)");
	    $statement->execute(array(':user_username'=>$username, ':user_password'=>$password));
	} else {
		$accountMade = false;
	}
}
catch (PDOException $ex) 
{
   echo 'Error!: ' . $ex->getMessage();
   die(); 
}
?>
