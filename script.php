<h3>Result:</h3>
<?php
$i=0;
extract($_POST);
$my_file = 'file.txt';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
echo $_POST['fname']."<br>";
		  while($i<150)
		  {
		  $check="item".$i;
		  if(isset($$check))
		  {
		  $$check=$_POST['item'.$i]."<br>";
		/*  echo $$check;*/
		fwrite($handle, $$check);
		  
		  $c=1;
/*while($data = fgetcsv($handle, 1000, ","))
		  {
		  if($c==2)
		  {
		  echo $data[$i];
		  break;
		  }
		  $c++;
		  }
		  */
		  
		  
		  }
		  $i++;
		  }
		/*  $my_file = 'file.txt';
		$myfile = fopen($my_file, "r") or die("Unable to open file!");
 while($a=fread($myfile,filesize($my_file)))
 echo $a;*/
		  fclose($handle);
		  ?>