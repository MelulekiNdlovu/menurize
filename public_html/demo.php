<?php
    require 'conn.php';
    $name = "";
    $id = "";
    $menu = "";
	$curr = "";

    if(isset($_GET["name"]) ){
        $name = $_GET["name"];
        echo "<h2>".$name."</h2>";
    
    
        //Create database connection
        $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        //Check connection was successful
        if ($dblink->connect_errno) {
            printf("Failed to connect to database");
            exit();
        }

        
        //Fetch restaurant id
        $result = $dblink->query("SELECT * FROM restaurants WHERE name='$name' ");
        while ( $row = $result->fetch_assoc())  {
        
            $id  = $row["id"];
          	$curr = $row["curr"];
        }

        //Fetch menu items
        $res2 = $dblink->query("SELECT * FROM menuitems WHERE rest_id='$id' ");
        while ( $row2 = $res2->fetch_assoc())  {
        
            $menu .= "<div class=\"col-md-3 m-1 card\"><h5>".$row2["mealname"]."</h5><p class=\"small text-muted\">".$row2["descr"]."<br>".$curr." ".$row2["price"]."</p></div>";
        }


    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
  	<link rel="shortcut icon" type="image/png" href="img/favicon-16x16.png"/>
  
  	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-6Y803TG51V"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());

  		gtag('config', 'G-6Y803TG51V');
	</script>

    <!--css links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="css/app.css" rel="stylesheet">
</head>

<body>

    <!--navbar-->
    <nav class="navbar navbar-expand-lg mb-3 bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="img/menurizelogo.png" alt="logo" width="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi-list item-color"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link link-light" href="index.html">Home</a>
                    <a class="nav-link link-light" href="search.html">Search</a>
                    <a class="nav-link link-light" href="login.html">Login</a>
                    <a class="nav-link link-light" href="register.html">Register</a>
                  	<div id="myMenu"></div>
                </div>
            </div>

            <!--socials-->
            <div class="fw-1">
                <a href="https://fb.me/menurize" class="item-color"><i class="bi bi-facebook"></i></a>
            </div>
        </div>
    </nav>


    <!--restaurant menu-->
    <div id="test" class="container-fluid bg-light">
        <div class="row" id="">
            <?php if(isset($menu) ){echo $menu;}else{echo "";} ?>
        </div>
    </div>

    <!--scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  	<script src="js/sess.js"></script>
</body>
</html>