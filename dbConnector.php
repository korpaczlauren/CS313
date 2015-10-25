<?php
function loadDatabase() 
{
  $dbHost = "";
  $dbPort = "";
  $dbUser = "";
  $dbPassword = "";
     $dbName = "persons";
     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
     if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
          //echo "Using local credentials: "; 
          $dbHost = "127.0.0.1";
          $dbUser = "root";
          $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
     }
     else 
     { 
          // In the openshift environment
          //echo "Using openshift credentials: ";
          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
          $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
          $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
          $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
     } 
     //echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";
     return $db;
}
?>
