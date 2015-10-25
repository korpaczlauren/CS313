<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$personidErr = $lastnameErr = $firstnameErr = $addressErr = $cityErr = "";
$personid = $lastname = $firstname = $address = $city = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["personid"])) {
     $personidErr = "Person ID is required";
   } else {
     $personid = test_input($_POST["personid"]);
   }
   
   if (empty($_POST["lastname"])) {
     $lastnameErr = "Last name is required";
   } else {
     $lastname = test_input($_POST["lastname"]);
   }
     
   if (empty($_POST["firstname"])) {
     $firstname = "";
   } else {
     $firstname = test_input($_POST["firstname"]);
   }

   if (empty($_POST["address"])) {
     $address = "";
   } else {
     $address = test_input($_POST["address"]);
   }

   if (empty($_POST["city"])) {
     $cityErr = "City is required";
   } else {
     $city = test_input($_POST["city"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   PersonsID: <input type="text" name="personsid">
   <span class="error">* <?php echo $personsidErr;?></span>
   <br><br>
   Last name: <input type="text" name="lastname">
   <span class="error">* <?php echo $lastnameErr;?></span>
   <br><br>
   First name: <input type="text" name="firstname">
   <span class="error"><?php echo $firstnameErr;?></span>
   <br><br>
   Address: <input type="text" name="address">
   <span class="error"><?php echo $addressErr;?></span>
   <br><br>
   City: <input type="text" name="city">
   <span class="error"><?php echo $cityErr;?></span>
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
