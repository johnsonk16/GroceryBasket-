 <?php
     $files = glob("gallery/*.*");
     for ($i=0; $i<count($files); $i++)
      {
        $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

         $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
         if (in_array($ext, $supported_file)) {
            $path_parts= pathinfo($image);
            echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
            $filename =  $path_parts["filename"];
            echo $filename;
             echo "<a href='viewRecipe.php?".$filename." '>";
             echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";

             ?>
         </a>
         <?
            } else {
                continue;
            }
          }
       //displays in alphabetical order ?

       ?>