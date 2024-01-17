<?php
    require 'conn.php';
    
    //Create database connection
    $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    //Check connection was successful
    if ($dblink->connect_errno) {
        printf("Failed to connect to database");
        exit();
    }

    
    //Fetch data from restaurants table
    //remember to limit the number of featured restaurants to 10 or so ie LIMIT clause
    $result = $dblink->query("SELECT name, address, featured, city FROM restaurants WHERE featured ='bi-stars item-color' ");
    
    //Initialize array variable
    $restaurants = array();

    while ( $row = $result->fetch_assoc())  {
    
        $restaurants[] = $row;
    }

    /*for ($i=0; $i < count($restaurants); $i++) { 
        for ($j=0; $j < count($restaurants[$i]); $j++) { 
            $restaurants[$i]["menu"] = array();
            $id = $restaurants[$i]["id"];
            $q = "SELECT * FROM menuitems WHERE rest_id=$id";
            $result = $dblink->query($q);
            while ( $row = $result->fetch_assoc())  {
                array_push($restaurants[$i]["menu"], $row);
                //$restaurants[$i]["menu"] = array($row);
            }
        }
        
    }*/
    
    echo json_encode($restaurants);
?>