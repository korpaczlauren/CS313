<?php
    session_start();
    $timeout = 600;
    if(isset($_SESSION['timeout'])) {
        $duration = time() - (int)$_SESSION['timeout'];
        if($duration > $timeout) {
            session_destroy();
            session_start();
        }
                else {
                        echo '<script type="text/javascript" language="javascript">window.open("submit.php","_self");</script>';
                }
    }
    $_SESSION['timeout'] = time();
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
<style>
#header {
    background-color:pink;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:pink;
    height:300px;
    width:100px;
    float:left;
    padding:5px;	      
}
#section {
    width:350px;
    float:left;
    padding:10px;	 	 
}
#footer {
    background-color:pink;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
</style>
</head>
<body>

<div id="header">
<h1>Lauren's homepage</h1>
</div>

<div id="nav">
Other<br>
Other<br>
Other<br>
</div>

<div id="section">
<h2>Welcome!</h2>
<p>
<b>Survey</b>
          </div>
        </header>
        <div id="content">
            <a href="submit.php" class="link">Survey Results</a>
            <form id ="survey" action="submit.php" method="post">
                Do you like walking to class?
                <input type="radio" name="pool" value="yes">Yes
                <input type="radio" name="pool" value="No">No<br/>
                Do you like online classes?
                <input type="radio" name="pizza" value="yes">Yes
                <input type="radio" name="pizza" value="No">No<br/>
                Do you like cooking at home?
                <input type="radio" name="uni" value="yes">Yes
                <input type="radio" name="uni" value="No">No<br/>   
                Do you like day classes?
                <input type="radio" name="mission" value="yes">Yes
                <input type="radio" name="mission" value="No">No<br/>
                <input type="submit" value="Submit Poll">
            </form>
        </div>
        <footer>
            &copy; 2015   
        </footer>
    </body>
</html>
