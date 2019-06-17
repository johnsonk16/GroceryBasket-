<?php
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

  $error = mysqli_connect_error();

  if($error != null){
    $output = "<p>Unable to connect to database.</p>".$error;
    exit($output);

   echo 'CONNECTED TO DB';
  } 
    

	//insert email into DB
	$emailPOST = @$_POST['email'];
		$sql = "INSERT INTO user_info(email) VALUES('$emailPOST')";
			if (!mysqli_query($connect,$sql)){
			die('Error: '.mysqli_error($connect));
		}

	//insert password into DB
	$passPOST = @$_POST['password'];
		$sql = "INSERT INTO user_info(password) VALUES('$passPOST')";
			if (!mysqli_query($connect,$sql)){
			die('Error: '.mysqli_error($connect));
		}
						
 ?>