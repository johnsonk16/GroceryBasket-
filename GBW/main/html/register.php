<?php
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
   
    echo 'CONNECTED TO DB';
 

  //initialize variables

  $username = "";
  $email= "";
  $errors= array();

  //Register User

if (isset($_POST['reg_user'])){

	$username = mysqli_real_escape_string($conn, $_POST['UserName']);
	$email = mysqli_real_escape_string($conn, $_POST['Email']);
	$password = mysqli_real_escape_string($conn, $_POST['Password']);


//form validation 
if (empty($username)){
		array_push("username is required");
}
if (empty($email)){
		array_push("email is required");
}
if (empty($password)){
	array_push($errors, "Password is required");
}


//check DB to see if user is already created 

$user_check = "SELECT * FROM user_info 	WHERE UserName= '$username' OR Email= '$email' LIMIT 1 ";
$result = mysqli_query($conn, $user_check);
$user = mysqli_fetch_assoc($result);
						
//if user exists
if ($user){
	if ($user['UserName'] === $username){
		array_push($errors, "Username already exists");
	}
	if($user['Email']===$email){
		array_push($errors, "Email already exists");
	}
}

//if no errors, register user
if (count($errors)==0){
	$Epassword = md5($password); //encrypt the password to save to DB 

	$insertInfo = "INSERT INTO user_info (Email, UserName, Password) VALUES ('$email', '$username', '$Epassword')";

	mysqli_query($conn, $insertInfo);
	$_SESSION['UserName'] = $username;
	$_SESSION['success'] = "You are now logged in"; 

	}

}//end of register 


?>