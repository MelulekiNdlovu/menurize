<?php
    session_start();
    require 'conn.php';

    if (isset($_POST["delete"])) {
        $sess_id = $_SESSION["sess_id"];

        //Create database connection
        $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        //Check connection was successful
        if ($dblink->connect_errno) {
            printf("Failed to connect to database");
            exit();
        }

        //Delete Account
        $sql = "DELETE FROM menuitems WHERE rest_id='$sess_id' ";
        $dblink->query($sql);

        $sql2 = "DELETE FROM restaurants WHERE id='$sess_id' ";
        $dblink->query($sql2);
      
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
      
      	header("Location: https://www.menurize.com");
        
        echo "<div class=\"alert alert-primary\" role=\"alert\">
        Your account has been deleted!<br>
        <a href=\"menurize.com\">Menurize Home</a>
      </div>";
    }
?>