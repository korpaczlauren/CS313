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
<b>Results</b>
          </div>
        </header>
        <div id="survey">
        <?php
        $fname="/var/www/html/results.txt";
        $lines=file($fname, FILE_IGNORE_NEW_LINES);
        $newVal=array_values($_POST);
        $qu = 0;
        for($i = 0; $i < 4; $i++)
        {
            if($newVal[$i] == "No")
                $lines[$qu + 1] += 1;
            else if($newVal[$i] =="yes")
                $lines[$qu] += 1;
            $qu +=2;       
            }
          $fp=fopen($fname, "w+");
            foreach($lines as $key => $value)              
            {
                fwrite($fp,$value."\r\n");               
            }
            fclose($file);
            echo("<h3>Here are the results!</h3><br/>");
            $q = 1;
            for($j = 0; $j < 7; $j)
            { 
                echo("Question " . $q . ":<br/>Yes: " .
                        $lines[$j++] . " No: " . $lines[$j++] 
                        . "<br/>");
                $q++;            
            }
            ?>
        </div>
    </body>
</html>
