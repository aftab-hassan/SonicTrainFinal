<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sonic Train</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,400" />
  <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />

		<!-- The main CSS file -->
		
</head>



				
				
				<body>

<div class="container">
<div class="row" >
   <div class="col-sm-12" style="background:url('titleimage.jpg');color:white;"><center><font size="20">Sonic Train</font></center>
<!--<div class="col-sm-12" style="background:url('image1.jpg');color:white; height: 500px;">-->
<center>Train machine learning models at sonic speed...</center></div>
</div>
<div class="row">
  <div class="jumbotron" style=" background-color:skyblue;">
<?php
$handle = fopen("commentsdb.txt", "r");
$displayheader = 0;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) 
{
        //echo $buffer;
$key   = $_POST['searchtb'];
$pos = strpos($buffer, $key);


if ($pos === false) {
    //echo "The string '$key' was not found in the string '$buffer'";
} else {
    if($displayheader == 0)
    {
     echo "<table width=100% height=50% border=1>";
     echo "<tr>";
     echo "<td><b>Date</b></td>";
     echo "<td><b>Experiment title</b></td>";
     echo "<td><b>Precision</b></td>";
     echo "<td><b>Recall</b></td>";
     echo "<td><b>Accuracy</b></td>";
     echo "<td><b>Download link</b></td>";
     //echo "Date comment precision recall accuracy download";
     //echo "<br>";
     echo "</tr>";

     $displayheader = 1;
    }

    //finding count
$pieces = explode("-", $buffer);
    $count = $pieces[0]; 

//repository/238/summary.csv
$filename = "repository/".$count."/summary.csv";
//$downloadfilename = "repository/".$count."/summary.zip";
$individualfilehandle = fopen($filename, "r");
    $data = fgetcsv($individualfilehandle, 1000, ",");
    $data = fgetcsv($individualfilehandle, 1000, ",");
    fclose($individualfilehandle);
   
    //getting file details
    $date = $data[1];
    $comment = $data[2];
    $precision = $data[3];
    $recall = $data[4];
    $accuracy = $data[5];
    //$downloadlink = "<a href=\"".$filename
    //<a href="download.php">Test.pdf</a>

    echo "<tr>";
    echo "<td>$date</td>";
    echo "<td>$comment</td>";
    echo "<td>$precision</td>";
    echo "<td>$recall</td>";
    echo "<td>$accuracy</td>";
    echo "<td><a href=\"repository/$count.zip\">download</a></td>";
    echo "</tr>";
    //echo "The string '$key' was found in the string '$buffer' and filename=='$filename',count=='$count' date=='$date',P=='$precsion', R=='$recall',A=='$accuracy'";
    //echo "<br>";
    //echo "\r\n";
    //echo " and exists at position $pos";
}

    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
     echo "</table>";
    fclose($handle);
}

?>
</div>
</div>
</div>
</body>
</html>
