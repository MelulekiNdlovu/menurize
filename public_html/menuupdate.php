<?php
    session_start();

    require 'conn.php';

    $itemName = "";
    $itemPrice = "";
    $descr = "";
    $id = "";
    $sess_id = $_SESSION["sess_id"];
    $sel = "";

    //Create database connection
    $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    //Check connection was successful
    if ($dblink->connect_errno) {
        printf("Failed to connect to database");
        exit();
    }

    if ( isset($_POST["update"]) )  {

        $id = $_POST["dish"];
        $itemName = $_POST["itemName"];
        $itemPrice = $_POST["itemPrice"];
        $descr = $_POST["descr"];

        //updating menu item name
        if($_POST["itemName"] != "" ){
            
            //update menu item name
            $sql = "UPDATE menuitems SET mealname='$itemName' WHERE id=$id ";
            $result = $dblink->query($sql);
            if ($dblink->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $dblink->error;
            }
            $_SESSION["nameMsg"] = $_POST["itemName"]." has been UPDATED.";

            
        }

        //updating price
        if($_POST["itemPrice"] != "" ){
            
            //update menu item name
            $sql = "UPDATE menuitems SET price='$itemPrice' WHERE id=$id ";
            $result = $dblink->query($sql);
            if ($dblink->query($sql) === TRUE) {
                echo "Price updated successfully";
            } else {
                echo "Error updating record: " . $dblink->error;
            }
            $_SESSION["priceMsg"] = "Price has been UPDATED to: $".$_POST["itemPrice"]."<br>";


        }

        //updating description
        if($_POST["descr"] != "" ){
            
            //update menu item name
            $sql = "UPDATE menuitems SET descr='$descr' WHERE id=$id ";
            $result = $dblink->query($sql);
            if ($dblink->query($sql) === TRUE) {
                echo "Price updated successfully";
            } else {
                echo "Error updating record: " . $dblink->error;
            }
            $_SESSION["descrMsg"] = "Description has been UPDATED to: <br>".$_POST["descr"]."<br>";

            /*output editing form
            $result2 = $dblink->query("SELECT * FROM menuitems WHERE rest_id=$sess_id");

            while ( $row = $result2->fetch_assoc())  {
          
                $sel .= "<option value=".$row["id"].">".$row["mealname"]."</option>";
            }

            $_SESSION["sel"] = $sel;
            //header("Location: admin.php");*/
        }

    }
    
    /*output editing form*/
    $result2 = $dblink->query("SELECT * FROM menuitems WHERE rest_id=$sess_id");

    while ( $row = $result2->fetch_assoc())  {
  
        $sel .= "<option value=".$row["id"].">".$row["mealname"]."</option>";
    }

    $_SESSION["sel"] = $sel;
    header("Location: admin.php");
?>