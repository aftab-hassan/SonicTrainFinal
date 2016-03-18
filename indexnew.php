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
   <div class="col-sm-12" style="background:url('image1.jpg');color:white;"><center><h1>Sonic Train</h1></center>
<!--<div class="col-sm-12" style="background:url('image1.jpg');color:white; height: 500px;">-->
<center>Train machine learning models at Sonic speed...</center></div>
</div>
<div class="row">
  <div class="jumbotron" style=" background-color:skyblue;">
<?php
if (isset($_POST['submit'])) {
?>
<form action="show.php" method="post">
<?php

if ( isset($_FILES["file"])) {

            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //Print file details

                 //if file already exists
             if (file_exists("uploads/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . "<br>";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            //$storagename = $_FILES["file"]["name"];
            $storagename = 'defaultinput.csv';
            move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $storagename);
            echo "Stored in: " . "uploads/" . $_FILES["file"]["name"] . "<br />";
	   
	   
            }
            
        }
        $row = 1;
if (($handle = fopen('uploads/'.$_FILES["file"]["name"], "r")) !== FALSE) {
$fname=$_FILES["file"]["name"];
?>
<input type="hidden" name="fname" value="<?php echo $fname;?> ">
<?php
		?>
	<hr style=" border-color:red;">
	<table width=100%>
		<?php
		echo "<br><h2>Training</h2><br>";
	$i=0;
		while($i<100)
		  {
		  if($i==6||$i==12||$i==18||$i==24||$i==30)
		  {
		  		  ?>
		  <tr>
		  <?php
		  }
		  ?>
		  <td>
		  <?php
        echo $data[$i];  
        if($data[$i]=="")
        break;
        ?>
        
        <input type="checkbox" checked name='item<?php echo $i;  ?>' value='<?php echo $data[$i].':'; 
      /*  $handle = fopen("uploads/".$_FILES["file"]["name"], "r");
		  $c=1;
while($a = fgetcsv($handle, 1000, ","))
		  {
		  if($c==2)
		  {
		  echo $a[$i];
		  break;
		  }
		  $c++;
		  }*/
        ?>'>
        
        <?php echo '&nbsp; &nbsp;';
        if($i==5||$i==11||$i==17||$i==23||$i==29)
        {?>
        </tr>
        <?php
        }
        ?>
        </td>
        <?php
        $i++;
        }
		
	?>
	</table>
	<hr style="border-color:red;">
	<h2>Response Variable</h2>
	
	Enter the name of response variable: <input type="text">
	<br><input type="submit" value="submit">
	</form>
	
   <?php
    fclose($handle);
}
	   
     } else {
             echo "No file selected <br />";
     }
}
else
?>
<?php
if (isset($_POST['abc'])) {
?>
<form action="show.php" method="post">
<?php
        $row = 1;
if (($handle = fopen('uploads/'.'defaultinput.csv', "r")) !== FALSE) {

?>
<?php
    $data = fgetcsv($handle, 1000, ",");
    $i=0;
		?>
		<table width=100%>
		<?php
		//echo "<h2>PreProcessing</h2><br>";
	
		/*while($i<100)
		  {
		  if($i==6||$i==12||$i==18||$i==24||$i==30)
		  {
		  		  ?>
		  <tr>
		  <?php
		  }
		  ?>
		  <td>
		  <?php
        //echo $data[$i];  
        if($data[$i]=="")
        break;
        ?>
        
        <!--<input type="radio" name='item<?php echo $i;  ?>'>-->
        
        <?php echo '&nbsp; &nbsp;';
        if($i==5||$i==11||$i==17||$i==23||$i==29)
        {?>
        </tr>
        <?php
        }
        ?>
        </td>
        <?php
        $i++;
        }
		*/
	?>
	</table>
	<!--<table width=70% height=50%>
	<tr>
	<td>Search</td>
	<td><input type=text></td>
	<td>and replace with</td>
	<td><input type=text></td>
	</tr>
	<tr>
	<td>Convert format</td>
	<td><input type=text></td>
	<td>to format</td>
	<td><input type=text></td>
	</tr>
	</table>--!>

	<hr style="border-color:red;">
	<h2>Experiment Title</h2>
	
	Enter comments: <!--<input type="text" name="commentstb">--!>
<textarea name="commenttb" style="width:500px;height:50px;"></textarea>



	<hr style=" border-color:red;">
	<table width=100%>
		<?php
		echo "<br><h2>Training</h2><br>";
	$i=0;
		while($i<100)
		  {
		  if($i==6||$i==12||$i==18||$i==24||$i==30)
		  {
		  		  ?>
		  <tr>
		  <?php
		  }
		  ?>
		  <td>
		  <?php
        echo $data[$i];  
        if($data[$i]=="")
        break;
        ?>
        
        <input type="checkbox" checked name='item<?php echo $i;  ?>' value='<?php echo $data[$i]; 
      /*  $handle = fopen("uploads/".$_FILES["file"]["name"], "r");
		  $c=1;
while($a = fgetcsv($handle, 1000, ","))
		  {
		  if($c==2)
		  {
		  echo $a[$i];
		  break;
		  }
		  $c++;
		  }*/
        ?>'>
        
        <?php echo '&nbsp; &nbsp;';
        if($i==5||$i==11||$i==17||$i==23||$i==29)
        {?>
        </tr>
        <?php
        }
        ?>
        </td>
        <?php
        $i++;
        }
		
	?>
	</table>
	<hr style="border-color:red;">
	<h2>Response Variable</h2>
	
	Enter the name of response variable: <input type="text" name="responsetb">


<hr style="border-color:red;">
<h2>Select modeling method:</h2>
<input type="radio" name="model"
<?php if (isset($model) && $model=="ada") echo "checked";?>
value="ada">Adaboost
<input type="radio" name="model"
<?php if (isset($gender) && $gender=="rpart") echo "checked";?>
value="rpart">Decision Tree
	
	<hr style="border-color:red;">
	<h2>Enter number of folds</h2>
	
	Enter the number of folds: <input type="text" name="foldstb">

	<br><input type="submit" value="submit">
	</form>
   <?php
    fclose($handle);
}
	   
    
}


else 
if(!$_POST['submit']&&!$_POST['submit']){
	
	print "<form class='box' enctype='multipart/form-data' action='index.php' method='post'>";
	print "Upload CSV file or to load sample CSV file <br> Click <input type='submit' name='abc' value='Here'> </form><br />\n";
	

	print "<form class='box' enctype='multipart/form-data' action='index.php' method='post'>";


	print "<input size='50' type='file' name='file'><br />\n";

	print "<input type='submit' name='submit' value='Upload'></form>";
	

}


?> 	
</div>
</div>
</div>
</body>
</html>
