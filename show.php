<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sonic Training</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="row">
   <div class="col-sm-12" style="background:url('titleimage.jpg');color:white;"><center><font size="20">Sonic Train</font></center>
<center>Train machine learning models at sonic speed...</center></div>
</div>
<div class="row">
  <div class="jumbotron" style=" background-color:skyblue;">
<?php

include('populateFiles.php');
exec("Rscript wireframe.R");
exec('sh createzip.sh');

//include('train.php');
$row = 1;
if (($uploadhandle = fopen("output.csv", "r")) !== FALSE) {
    //while (($data = fgetcsv($uploadhandle, 1000, ",")) !== FALSE) {
    $headers = fgetcsv($uploadhandle, 1000, ",");
    $numbers = fgetcsv($uploadhandle, 1000, ",");
        $count = count($headers);

	for($i = 0;$i < $count; $i++)
        {
         //echo "<p> ".$headers[$i]. ":". $numbers[$i] ." <br /></p>\n";
         echo "<p> ".$headers[$i]. ":". $numbers[$i];

         if($i < 3)
	  echo "%";
  
         echo " <br /></p>\n";
        }
        //$row++;
    fclose($uploadhandle);
}
/*$my_file = 'output.csv';

		$myfile = fopen($my_file, "r") or die("Unable to open file!");
 while($a=fread($myfile,filesize($my_file)))
 echo $a;
 fclose($myfile);*/
?>
</div>
</div>
</div>
</body>
</html>
