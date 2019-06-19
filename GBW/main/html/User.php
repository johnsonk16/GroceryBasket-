 <?php
 //Login/register combinded into one file. at the moment, there is no testing based off what is in DB, but will write to the DB. 
 
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
  
echo 'CONNECTED TO DB';
        
  if(isset($_POST['login'])){
     
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $strSQL = mysqli_query($conn,"SELECT UserName from User_Info where Email='".$email."' and Password='".md5($password)."'");
        $Results = mysqli_fetch_array($strSQL);
      
        if(($Results)>=1) //doesnt work yet
        {
  		        $message = $Results['UserName']." Login Sucessfully!!";
        }
        else
        {
            $message = "Invalid email or password!!";
        }        
     }
    elseif(isset($_POST['reg_user']))
    {						//REGISTER WORKS!!!!!!! 
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
        elseif($numResults>=1) //this part doesnt work yet ):
        {
            $message = $email." Email already exist!!";
        }
        else
        {
            mysqli_query($conn,"INSERT into User_Info(Email,UserName,Password) VALUES('".$username."','".$email."','".md5($password)."')");
            $message = "Signup Sucessfully!!";
        }
    }

 
?>