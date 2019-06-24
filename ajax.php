<?php

require_once('config.php');
$link= mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
    //Search box value assigning to $Recipes variable.
    $recipeName = $_POST['search'];
    
    //Search query.
    $Query = "SELECT Recipe_Name FROM Recipes WHERE Recipe_Name LIKE '%$Recipe_sName%' LIMIT 5";
    
    //Query execution
    $ExecQuery = MySQLi_query($con, $Query);
    
    //Creating unordered list to display result.
    echo '
    <ul>
    ';
    
    //Fetching result from database.
    while ($Result = MySQLi_fetch_array($ExecQuery)) {
        ?>
        <!-- Creating unordered list items.
        Calling javascript function named as "fill" found in "script.js" file.
        By passing fetched result as parameter. -->
        
        <li onclick='fill("<?php echo $Result['recipeName']; ?>")'>
        <a>
        <!-- Assigning searched result in "Search box" in "search.php" file. -->
        <?php echo $Result['recipeName']; ?>
        </li></a>
        
        <!-- Below php code is just for closing parenthesis. Don't be confused. -->
        <?php
        }}
        ?>
        </ul>