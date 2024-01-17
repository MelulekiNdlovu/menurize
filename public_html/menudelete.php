<?php
    session_start();

    require 'conn.php';

    $itemName = "";
    $itemPrice = "";
    $descr = "";
    $id = "";
    $sess_id = $_SESSION["sess_id"];
    $sel = "";

    if ( isset($_POST["delete"]) )  {

        //Create database connection
        $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        //Check connection was successful
        if ($dblink->connect_errno) {
            printf("Failed to connect to database");
            exit();
        }

        $id = $_POST["dish"];
        $itemName = $_POST["itemName"];
        $itemPrice = $_POST["itemPrice"];
        $descr = $_POST["descr"];

        //Inset data into DB
        $sql = "DELETE FROM menuitems WHERE id=$id";
        if ($dblink->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $_SESSION["delMsg"] = $itemName." has been Deleted<br>";

    }
    
    /*output editing form*/
    $result2 = $dblink->query("SELECT * FROM menuitems WHERE rest_id=$sess_id");

    while ( $row = $result2->fetch_assoc())  {
  
        $sel .= "<option value=".$row["id"].">".$row["mealname"]."</option>";
    }

    $_SESSION["sel"] = $sel;
    header("Location: admin.php");
?>