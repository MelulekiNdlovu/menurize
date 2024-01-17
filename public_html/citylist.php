<?php

    require 'conn.php';

    //Create database connection
    $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    //Check connection was successful
    if ($dblink->connect_errno) {
        printf("Failed to connect to database");
        exit();
    }

        $sql = "SELECT DISTINCT city FROM restaurants ";
        $result = $dblink->query($sql);

        while ($row = $result->fetch_assoc() ) {

            echo "<option value=".$row["city"].">".$row["city"]."</option>";
      
        }

?>