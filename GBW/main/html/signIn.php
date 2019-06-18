<?php

	session_start();
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
 

 ///  echo 'CONNECTED TO DB';
  } 
    
$email="";
$password="";


if(isset($_POST['login'])){

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if(empty($email)){
		alert("email required");
	}
	if(empty($password)){
		alert("password required");
	}

	//check to see if email/password match DB	
	$user_check = "SELECT * FROM user_info 	WHERE Email= '$email' OR Password = '$password'";
	$result = mysqli_query($conn, $user_check);
	$user = mysqli_fetch_assoc($result);
	if ($user){
	if ($user['Email'] !== $email){
		alert("email does not exist");
	}
	$ePassword = md5($password);
	if($user['Password']!==$password){
		array_push($errors, "invalid password");
	}
}
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