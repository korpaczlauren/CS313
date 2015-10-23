<?php
	try
{
   $user = 'root';
   $password = ''; 
   $db = new PDO('mysql:host=127.0.0.1;dbname=persons_id', $user, $password);

   echo "<h3>Persons Table</h3>";

	$statement = $db->query('SELECT * FROM persons_id');
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{ 
	   echo '<strong>' . $row['PersonsID'] . ': ' . $row['LastName'] . ' ' . $row['FirstName'] . '</strong>' .
	   ' - "' . $row['Address'] . '"<br />';
	}

}
catch (PDOException $ex) 
{
   echo 'Error!: ' . $ex->getMessage();
   die(); 
}



?>
