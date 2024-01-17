<?php
    session_start();

    require 'conn.php';

    $restName = "";
    $address = "";
    $city = "";
    $addItem = "";

    $sess_id = $_SESSION["sess_id"];
    $sel = "";

    //Create database connection
    $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    //Check connection was successful
    if ($dblink->connect_errno) {
        printf("Failed to connect to database");
        exit();
    }

    //code for capturing input from JS
    $input = json_decode(file_get_contents('php://input'), true);
    // $input['key'] would equal "value"


    //TODO...function for updating restaurant details
    function restaurantDetails() {

        $restName = $input["restName"];
        $address = $input["address"];
        $city = $input["city"];
        $curr = $input["curr"];
        //logo = ...;
    
        //updating restaurant name
        if($restName != "" ){
                
            $sql = "UPDATE restaurants SET name='$restName' WHERE id=$sess_id ";
            $result = $GLOBALS["dblink"]->query($sql);
            if ($GLOBALS["dblink"]->query($sql) === TRUE) {
                echo "Restaurant Name updated successfully";
            } else {
                echo "";
            }
                
        }
    
        //updating address
        if($address != "" ){
                
            $sql = "UPDATE restaurants SET address='$address' WHERE id=$sess_id ";
            $result = $GLOBALS["dblink"]->query($sql);
            if ($GLOBALS["dblink"]->query($sql) === TRUE) {
                echo "Address updated successfully";
            } else {
                    echo "";
            }
    
        }
    
        //updating the city
        if($city != "" ){
                
            $sql = "UPDATE restaurants SET city='$city' WHERE id=$sess_id ";
            $result = $GLOBALS["dblink"]->query($sql);
            if ($GLOBALS["dblink"]->query($sql) === TRUE) {
                echo "City updated successfully";
            } else {
                echo "";
            }
    
        }
    
    
        //updating the currency
        if($curr != "" ){
                
            //update currency
            $sql = "UPDATE restaurants SET curr='$curr' WHERE id=$sess_id ";
            $result = $GLOBALS["dblink"]->query($sql);
            if ($GLOBALS["dblink"]->query($sql) === TRUE) {
                echo "Currency updated successfully";
            } else {
                echo "";
            }
  
        }
    
    
        /*/updating the logo
        if(isset($_POST["logo"])){
    
            $target_dir = "img/".$sess_id."/";
            $target_file = $target_dir . basename($_FILES['logo']['name']);
            echo $target_file;
    
            if (file_exists($target_dir)) {
                echo "The file ". $target_dir ." exists";
            } else {
                mkdir($target_dir);
            }
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
            // Check if image file is a actual image or fake image
            if(isset($_POST["logo"])) {
                $check = getimagesize($_FILES["logo"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
       
    
            // Check file size
            if ($_FILES["logo"]["size"] > 1000000) {
                //1Mb size limit
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
    
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
    
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["logo"]["name"])). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
    
                
            //update logo
            $sql = "UPDATE restaurants SET logo='$target_file' WHERE id=$sess_id ";
            $result = $dblink->query($sql);
            if ($dblink->query($sql) === TRUE) {
                echo "Logo updated successfully";
            } else {
                echo "Error updating record: " . $dblink->error;
            }
            $_SESSION["priceMsg"] = "Logo Updated<br>";
    
        }*/
    }


    //TODO...function for adding menu items
    function addItem($s_id, $iName, $iPrice, $des) {
    
        //Inset data into DB
        $sql = "INSERT INTO menuitems (rest_id, mealname, price, descr)
            VALUES ('$s_id','$iName', '$iPrice', '$des')";
        $GLOBALS["dblink"]->query($sql);
            
        dishPicker();
    }

    //dishPicker code for updating the edit dish picker
    function dishPicker() {

        $sess_id = $_SESSION["sess_id"];
        $result2 = $GLOBALS["dblink"]->query("SELECT * FROM menuitems WHERE rest_id=$sess_id");

        while ( $row = $result2->fetch_assoc())  {
  
            $sel .= "<option value=".$row["id"].">".$row["mealname"]."</option>";
        }

        echo $sel;
    }

    function editItem($id, $updateName, $updatePrice, $updateDescr) {
        //$id = $input["dish"];
        //$updateName = $input["updateName"];
        //$updatePrice = $input["updatePrice"];
        //$updateDescr = $input["updateDescr"];

        //updating menu item name
        if($updateName != "" ){
            
            //update menu item name
            $sql = "UPDATE menuitems SET mealname='$updateName' WHERE id=$id ";
            $result = $GLOBALS["dblink"]->query($sql);
            if ($GLOBALS["dblink"]->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $GLOBALS["dblink"]->error;
            }
            
        }

        //updating price
        if($updatePrice != "" ){
            
            //update menu item name
            $sql = "UPDATE menuitems SET price='$updatePrice' WHERE id=$id ";
            $result = $GLOBALS["dblink"]->query($sql);
            if ($GLOBALS["dblink"]->query($sql) === TRUE) {
                echo "Price updated successfully";
            } else {
                echo "Error updating record: " . $GLOBALS["dblink"]->error;
            }

        }

        //updating description
        if($updateDescr != "" ){
            
            //update menu item name
            $sql = "UPDATE menuitems SET descr='$updateDescr' WHERE id=$id ";
            $result = $GLOBALS["dblink"]->query($sql);
            if ($GLOBALS["dblink"]->query($sql) === TRUE) {
                echo "Price updated successfully";
            } else {
                echo "Error updating record: " . $GLOBALS["dblink"]->error;
            }

        }

    }

    function adminInitialContent() {
        echo $_SESSION["username"];
    }

    function delDish($dishId) {
        //$id = $input["delDish"];

        //Inset data into DB
        $sql = "DELETE FROM menuitems WHERE id=$dishId";
        if ($GLOBALS["dblink"]->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }


    //each section should call the relevant function for each admin action
    if(isset($input['updateDetails'])){
        restaurantDetails();
    }
    elseif(isset($input['addItem'])){
        $itemName = $input["itemName"];
        $itemPrice = $input["itemPrice"];
        $descr = $input["descr"];
        addItem($sess_id, $itemName, $itemPrice, $descr);
    }
    elseif (isset($input['editItem'])) {
        $id = $input["dish"];
        $updateName = $input["updateName"];
        $updatePrice = $input["updatePrice"];
        $updateDescr = $input["updateDescr"];
        editItem($id, $updateName, $updatePrice, $updateDescr);
    }
    elseif (isset($input['dishPicker'])) {
        dishPicker();
    }
    elseif (isset($input['adminInitialContent'])) {
        adminInitialContent();
    }
    elseif (isset($input['delDish'])) {
        $id = $input["delDish"];
        delDish($id);
    }
    
?>