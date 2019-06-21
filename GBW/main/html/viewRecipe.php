<?php
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

 if(!$conn){
    die('could not connect' . mysqli_error());
  }

  $recipeID=$_GET["Recipe_ID"];

  $sql = "SELECT * FROM Recipes WHERE Recipe_ID=".$recipeID;
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $recipeName = $data['Recipe_Name'];
  $recipeIMG= $data['Recipe_Img'];
  $timeID= $data['Time_ID'];
  $servings = $data['Serving'];
  
    
 ?>

  </head>
  <body>
    <header>
      <div id="topBar">
        <a href="explore.php"><h1 id="pageTitle">Grocery Basket</h3></a>
        <!--<a href="#" id="logIn">Log In</a>-->
      </div>
    </header>

    <div id="main">
        <table id="searchFilters">
          <col width = 20%>
          <col witdh =80%>
            <tr>
                <td colspan="2"><h1>
                    <?php 
                        echo $recipeName;
                    ?>
                </h1></td>
            </tr>
            <tr>
                <td colspan="2" id="imageCell">
                  <?php
                      if($recipeIMG!="NULL"){
                        echo "<img src='uploads/".$recipeIMG."' id='recipeImage'>";
                      } 
                  ?>
                </td>
            </tr>

            <tr>
              <td class="left">Ingredients Required:</td>
              <td>
                <?php
                    $sql = "SELECT * FROM Recipe_Ingredients WHERE Recipe_ID = ".$recipeID;
                        $result = mysqli_query($conn, $sql);
                            if($result->num_rows>0){
                              echo "<ul>";
                                while($row = $result->fetch_assoc()){
                                    $sql = "SELECT Ingredient_Name FROM Ingredients WHERE Ingredient_ID = ".$row["Ingredient_ID"];
                                    $getName = mysqli_query($conn, $sql);
                                    if($getName->num_rows>0){
                                        $data = mysqli_fetch_assoc($getName);
                                        $ingredientName = $data['Ingredient_Name'];
                                        echo "<li>".$row["Measurement"]." ".$ingredientName."</li>";
                                    }
                                }
                                echo "</ul>";
                            } else{
                              echo "<i>None specified.</i>";
                            }
                    ?>
                </td>
            </tr>
            <tr>
              <td class="left">Tags:</td>
              <td>
                <?php
                    $sql = "SELECT * FROM Recipe_Tag WHERE Recipe_ID = ".$recipeID;
                        $result = mysqli_query($conn, $sql);
                            if($result->num_rows>0){
                              echo "<ul>";
                                while($row = $result->fetch_assoc()){
                                    $sql = "SELECT Tag_Type FROM Tag WHERE Tag_ID = ".$row["Tag_ID"];
                                    $getName = mysqli_query($conn, $sql);
                                    if($getName->num_rows>0){
                                        $data = mysqli_fetch_assoc($getName);
                                        $tagName = $data['Tag_Type'];
                                        echo "<li>".$tagName."</li>";
                                    }
                                }
                                echo "</ul>";
                            } else{
                              echo "<i>None specified.</i>";
                            }
                    ?>
                </td>
            </tr>
            <tr>
              <td class="left">Time Required:</td>
              <td>
                <?php
                    $sql = "SELECT Amount FROM Time WHERE Time_ID = ".$timeID;
                    $getName = mysqli_query($conn, $sql);
                    if($getName->num_rows>0){
                        $data = mysqli_fetch_assoc($getName);
                        $tagName = $data['Amount'];
                        echo "<li>".$tagName."</li>";
                    } else{
                      echo "<i>None specified.</i>";
                    }
                  ?>
                </td>
            </tr>
            <tr>
              <td class="left">Servings:</td>
              <td>
                <?php
                    echo $servings;
                  ?>
                </td>
            </tr>
            <tr>
              <td class="left">Steps:</td>
              <td>
                <?php
                    $sql = "SELECT * FROM Step WHERE Recipe_ID = ".$recipeID." ORDER BY Step_Number";
                        $result = mysqli_query($conn, $sql);
                            if($result->num_rows>0){
                              echo "<ol>";
                                while($row = $result->fetch_assoc()){
                                    echo "<li>".$row["Step_Content"]."</li>";
                                }
                                echo "</ol>";
                            } else{
                              echo "<i>None specified.</i>";
                            }
                    ?>
                </td>
            </tr>
        </table>

      </div>
  </body>

</html>