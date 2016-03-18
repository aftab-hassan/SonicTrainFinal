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
<a href='testemail.php?hello=true'>Send an update</a>
<?php
  function runMyFunction() {
    echo 'I just ran a php function';

$to      = 'aftabh@uw.edu';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: aftabh@uw.edu' . "\r\n" .
    'Reply-To: aftabh@uw.edu' . "\r\n" . 
 'MIME-Version: 1.0'."\r\n"
mail($to, $subject, $message, $headers);
  }

  if (isset($_GET['hello'])) {
    runMyFunction();
  }
?>
</div>

</div>

</div>

</body>
</html>
