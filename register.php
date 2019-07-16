<?php
session_start();
require_once('config.php');
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
    if(!$conn){
        die('could not connect' . mysqli_error());
    }
    echo 'CONNECTED TO DB';
    
    if(isset($_POST['login'])){
        
        //login
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $sql= "SELECT UserName from User_Info where Email='".$email."' and Password='".md5($password)."'";
        $strSQL = mysqli_query($conn,$sql);

        $Results = mysqli_fetch_array($strSQL);

        $sqlID = "SELECT User_ID FROM User_Info WHERE Email = '".$email."'";
        $IDSQL = mysqli_query($conn,$sqlID);
        $idResult = mysqli_fetch_array($IDSQL);

        $_SESSION['id'] = $idResult;
        echo $_SESSION['id'];
      
        if(($Results)>=1){
            $dbemail = $_POST['email']; 
            $dbpassword = $_POST['password'];

            //redirect to home
            if ($email == $dbemail && $password == $dbpassword) {
            $_SESSION['login'] = true; 
            $_SESSION['email'] = $email;
            header("location: home.php");

            }        
        }
         
        else
        {
            $message = "Invalid email or password!!";
        }     
  
     }
    elseif(isset($_POST['reg_user']))
    {						//REGISTER
        $username      = mysqli_real_escape_string($conn,$_POST['username']);
        $email     = mysqli_real_escape_string($conn,$_POST['email']);
        $password  = mysqli_real_escape_string($conn,$_POST['password']);
        $query = "SELECT Email FROM User_Info where Email='".$email."'";
        $result = mysqli_query($conn,$query);
        $numResults = mysqli_num_rows($result);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $message =  "Invalid email address please type a valid email!!";
        }
        elseif($numResults>=1) 
        {
            $message = $email." Email already exist!!";
        }
        else
        {
            $qry= mysqli_query($conn,"INSERT into User_Info(Email,UserName,Password) VALUES('".$email."','".$username."','".md5($password)."')");

            if($qry) {

            $_SESSION['email'] = $email;

            header("location: favorites.php");

                }
           alert("sign up successful");
        }
    }

 
?>