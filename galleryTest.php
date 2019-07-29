<?php
	session_start();
  require_once('config.php');

	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
	 // echo 'CONNECTED TO DB';

 ?>	
<html>

<?php  	 
if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
		include 'header-logged-in.php';
	} else {
		include 'header.php';
	}
?>

<style>
.container .gallery a img {
  float: left;
  width: 20%;
  height: auto;
  border: 2px solid #fff;
  -webkit-transition: -webkit-transform .15s ease;
  -moz-transition: -moz-transform .15s ease;
  -o-transition: -o-transform .15s ease;
  -ms-transition: -ms-transform .15s ease;
  transition: transform .15s ease;
  position: relative;
}

.container .gallery a:hover img {
  -webkit-transform: scale(1.05);
  -moz-transform: scale(1.05);
  -o-transform: scale(1.05);
  -ms-transform: scale(1.05);
  transform: scale(1.05);
  z-index: 5;
}

.clear {
  clear: both;
  float: none;
  width: 100%;
}
</style>

<div class='container'>
 <div class="gallery">
 
  <?php
    // Image extensions
    $image_extensions = array("png","jpg","jpeg","gif");

  // Target directory
  $dir = 'img/';
  if (is_dir($dir)){
 
   if ($dh = opendir($dir)){
    $count = 1;

    // Read files
    while (($file = readdir($dh)) !== false){

     if($file != '' && $file != '.' && $file != '..'){
 
      // Thumbnail image path
      $thumbnail_path = "img/".$file;

 
      $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);

      // Check its not folder and it is image file
      if(!is_dir($thumbnail_path) && 
         in_array($thumbnail_ext,$image_extensions)){
   ?>   

       <!-- Image -->
       <a href="<?php echo $image_path; ?>">
        <img src="<?php echo $thumbnail_path; ?>" alt="" title=""/>
       </a>
       <!-- --- -->
       <?php
       // Break
       if( $count%4 == 0){
       ?>
         <div class="clear"></div>
       <?php 
       }
       $count++;
      }
     }
 
    }
    closedir($dh);
   }
  }
 ?>
 </div>
</div>
</html>