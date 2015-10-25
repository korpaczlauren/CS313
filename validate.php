<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 

<?php
// define variables and set to empty values
$personsid = $lastname = $firstname = $address = $city = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $personsid = test_input($_POST["personsid"]);
   $lastname = test_input($_POST["lastname"]);
   $firstname = test_input($_POST["firstname"]);
   $address = test_input($_POST["address"]);
   $city = test_input($_POST["city"]);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   PersonsID: <input type="text" name="personsid">
   <br><br>
   Last Name: <input type="text" name="lastname">
   <br><br>
   First Name: <input type="text" name="firstname">
   <br><br>
   Address: <input type="text" name="address">
   <br><br>
   City: <input type="text" name="city">
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $personsid;
echo "<br>";
echo $lastname;
echo "<br>";
echo $firstname;
echo "<br>";
echo $address;
echo "<br>";
echo $city;
?>

</body>
</html>
