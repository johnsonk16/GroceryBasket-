 <?php
 //Login/register combinded into one file. Log in/register works! Next session needs to be figured out. 
 
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
  
//echo 'CONNECTED TO DB';
        
  if(isset($_POST['login'])){
     
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $Epassword = md5($password);

        $queryE = "SELECT UserName FROM User_Info where Email='$email'";
        $resultE = mysqli_query($conn,$queryE);
        $numResultsE = mysqli_num_rows($resultE);

        $queryP= "SELECT UserName FROM User_Info where Password='$Epassword'";
        $resultP = mysqli_query($conn,$queryP);
        $numResultsP = mysqli_num_rows($resultP);
      
        if (empty($email) ||empty($password))
        { 
      //      header("Location:http://localhost:8080/GroceryBasket-Web/GBW/main/html/home.php");
            ?>
            <script>
                alert("Data is missing");
            </script>
            <?php
            
        }
        
        elseif($numResultsE!=1) //this part does work (:
        {  
    //      header("Location:http://localhost:8080/GroceryBasket-Web/GBW/main/html/home.php");
            ?>
            <script>
                alert("invalid Email");
            </script>
            <?php
           
            
        }
         elseif($numResultsP!=1) //this part does work (:
        { 
   //     header("Location:http://localhost:8080/GroceryBasket-Web/GBW/main/html/home.php");
            ?>
            <script>
                alert("invalid password");
            </script>
            <?php
            
            
        } elseif($numResultsE != $numResultsP) {
   //      header("Location:http://localhost:8080/GroceryBasket-Web/GBW/main/html/home.php");
         ?>
            <script>
                alert("User does not exist");
            </script>
            <?php
             
            
        }
        else {
                    session_start();
                    $_SESSION['userId']= ['UserID'];
                    $_SESSION['username']= ['username'];
        
                    
              ?>  <script>
                alert("LOGGED IN");
            </script>
            <?php
       //      header("Location:http://localhost:8080/GroceryBasket-Web/GBW/main/html/home.php");
                }
            }

    elseif(isset($_POST['reg_user']))
    {						//REGISTER WORKS!!!!!!! 
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password  = mysqli_real_escape_string($conn,$_POST['password']);
        $query = "SELECT Email FROM User_Info where Email='$email'";

        $result = mysqli_query($conn,$query);
        $numResults = mysqli_num_rows($result);


        if (empty($username)|| empty($email) ||empty($password))
        {
            ?>
            <script>
                alert("Data is missing");
            </script>
            <?php
            exit();
        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            ?>
            <script>
                alert("invalid email");
            </script>
            <?php
            exit();
        }
        elseif($numResults>=1) //this part does work (:
        { ?>
            <script>
                alert("Email already in use");
            </script>
            <?php
            exit(); 
            
        }
        else
        { session_start();
            mysqli_query($conn,"INSERT into User_Info(Email,UserName,Password) VALUES('".$email."','".$username."','".md5($password)."')");

            header("Location:http://localhost:8080/GroceryBasket-Web/GBW/main/html/home.php");
                    
             ?>
            <script>
                alert("Logged in!");
            </script>
            <?php
            
        }
    }

 
?>