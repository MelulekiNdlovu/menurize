<?php
    $input = json_decode(file_get_contents('php://input'), true);
    // $input['key'] would equal "value"


    require 'conn.php';
    $query = $input['query'];
    $filter = $input['filter'];
    $city = $input['city'];

    //Create database connection
    $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    //Check connection was successful
    if ($dblink->connect_errno) {
        printf("Failed to connect to database");
        exit();
    }

    if ($filter == "rest") {
        //selecting restaurant names
        //remember to order them by featured to give preference to featured joints
        $sql = "SELECT name, address, featured, city FROM restaurants WHERE name LIKE '%$query%' AND city LIKE '%$city%' ";
        $result = $dblink->query($sql);

        while ($row = $result->fetch_assoc() ) {

            /*echo "<div class=\"col-md-4 shadow-sm m-1 rounded card\">
            <div><i class=\"".$row["featured"]."\"></i></div>
            <div class=\"card-title\"><a href=\"demo.php?name=".$row["name"]."\">".$row["name"]."</a></div>
            <p class=\"form-text\">
            <em>".$row["address"]."</em>
            <br>"
            .$row["city"].
            "</p>
            </div>";*/

            /*echo "<div class=\"col-md-5 shadow-sm rounded m-1 bg-white\">
            <img class=\"img-fluid rounded w-50 my-2\" src=\"img/pasta.jpg\">
            <p class=\"d-flex flex-inline\">
                <a href=\"menurize.com/demo.php?name=\"" .$row["name"]." \">".$row["name"]."</a>
                <br><br>"
                .$row["city"]."
            </p>
            </div>";*/

            echo "<div class=\"col-md-5 shadow-sm rounded-3 m-1 bg-white shadow-sm\">
            <div>
                <a href=\"demo.php?name=".$row["name"]."\" class=\"text-decoration-none\">" .$row["name"]. "</a>
            </div>
            <p class=\"d-flex flex-inline\">
                <br><br>"
                .$row["city"]."
            </p>
            </a>
        </div>";
      
        }
    } elseif($filter == "dish"){
        //selecting meal names
        //remember to order them by featured to give preference to featured joints
        $sql = "SELECT menuitems.mealname, menuitems.price, menuitems.descr, restaurants.name, restaurants.curr, restaurants.featured
            FROM menuitems
            INNER JOIN restaurants ON menuitems.rest_id=restaurants.id WHERE menuitems.mealname LIKE '%$query%' AND restaurants.city LIKE '%$city%' ";
        $result = $dblink->query($sql);
        $meals = "";

        while ($row = $result->fetch_assoc() ) {

            //$meals .= "<div class=\"col-md-3 shadow-sm m-1 rounded position-relative card\"><h5>".$row["mealname"]."</h5><p class=\"small text-muted\">".$row["descr"]."<br>".$row["curr"]." ".$row["price"]."</p><div class=\"position-absolute bottom-0 start-10\"><a href=\"demo.php?name=".$row["name"]."\">".$row["name"]."</a><i class=\"".$row["featured"]."\"></i></div></div>";
            $meals .= "<div class=\"col-md-5 shadow-sm bg-white rounded-3 border m-1\">
            <h3 class=\"fs-2\">".$row["mealname"]."</h3>
            <p class=\"small text-muted\">".$row["descr"]."<br>".$row["curr"]." ".$row["price"]."</p>
            <a href=\"demo.php?name=".$row["name"]."\">".$row["name"]."</a><i class=\"".$row["featured"]."\"></i></div>";
      
        }
        echo $meals;
    }
?>