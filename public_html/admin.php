<?php
    session_start();
    
    if(isset($_SESSION["username"])){
        
    }else {
        header("Location: login.html");
    }

    if(isset($_SESSION["sel"])){
        
    }else {
        $_SESSION["sel"] = "";
    }

    if(isset($_SESSION["nameMsg"])){
        
    }else {
        $_SESSION["nameMsg"] = "";
    }

    if(isset($_SESSION["priceMsg"])){
        
    }else {
        $_SESSION["priceMsg"] = "";
    }

    if(isset($_SESSION["descrMsg"])){
        
    }else {
        $_SESSION["descrMsg"] = "";
    }

    if(isset($_SESSION["addMsg"])){
        
    }else {
        $_SESSION["addMsg"] = "";
    }

    if(isset($_SESSION["delMsg"])){
        
    }else {
        $_SESSION["delMsg"] = "";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
  	<link rel="shortcut icon" type="image/png" href="img/favicon-16x16.png"/>
  
  	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-6Y803TG51V"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());

  		gtag('config', 'G-6Y803TG51V');
	</script>

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
  
    <div class="text-success" id="msgUpdate">
        <?php
            echo $_SESSION["descrMsg"];
            echo $_SESSION["priceMsg"];
            echo $_SESSION["nameMsg"];
            echo $_SESSION["addMsg"];
            echo $_SESSION["delMsg"];

            sleep(1);
            $_SESSION["descrMsg"] = "";
            $_SESSION["priceMsg"] = "";
            $_SESSION["nameMsg"] = "";
            $_SESSION["addMsg"] = "";
            $_SESSION["delMsg"] = "";

            echo $_SESSION["descrMsg"];
            echo $_SESSION["priceMsg"];
            echo $_SESSION["nameMsg"];
            echo $_SESSION["addMsg"];
            echo $_SESSION["delMsg"];
        ?>
    </div>

    <div class="container-fluid text-danger mb-3">
        <?php echo $_SESSION["username"]; ?> <i class="bi bi-person-circle"></i>
    </div>
  
    <div class="container-fluid mb-3">
         <form action="logout.php" method="post" class="d-inline">
             <input type="submit" name="logout" value="Logout" class="btn btn-dark item-color">
         </form>

         <form action="delete.php" method="post" class="d-inline float-end">
             <input type="submit" name="delete" value="Delete Account" class="btn btn-danger">

         </form>
    </div>


    <!--Restaurant Details-->
    <div class="container-fluid shadow col-md-5 mx-auto mb-3 rounded">
        <form action="details.php" method="post" enctype="multipart/form-data">
            <h3>Update your Restaurant's details</h3>
            <div class="mb-1">
                <label for="restName" class="form-label">Outlet Name</label>
                <input type="text" name="restName" id="restName" class="form-control" placeholder="Eatery">
                <div id="restNameHelp" class="form-text">Enter the name of your Outlet/Restaurant</div>
            </div>

            <div class="mb-1">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="xyz St., City, Country">
                <div id="addressHelp" class="form-text">Enter the Address of your Outlet/Restaurant</div>
            </div>

            <div class="mb-1">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Bulawayo">
                <div id="cityHelp" class="form-text">Enter the City of your Outlet/Restaurant</div>
            </div>

            <div class="mb-1">
                <label for="curr" class="form-label">Currency</label>
                <input type="text" name="curr" id="curr" class="form-control" placeholder="$">
                <div id="currHelp" class="form-text">Enter the Currency your want displayed with your prices (e.g $, USD, P)</div>
            </div>

            <!--<div class="mb-1">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
                <div id="logoHelp" class="form-text">(Optional) Upload your Logo</div>
            </div>-->

            <input type="submit" name="update" value="Update" class="btn btn-primary">
        </form>
    </div>

    <hr>
    
    
    <!--form for adding items to a menu-->
    <div class="container-fluid shadow col-md-5 mx-auto mb-3 rounded">
        <h3>Add an item to your Menu</h3>
        <form action="menuadd.php" method="post">
            <div class="mb-1">
                <label for="itemName" class="form-label">Item Name</label>
                <input type="text" name="itemName" id="itemName" class="form-control" placeholder="Enter a meal name" required>
                <div id="itemNameHelp" class="form-text">e.g Rice and Chicken</div>
            </div>

            <div class="mb-1 bg-light">
                <label for="itemPrice" class="form-label">Price</label>
                <input type="number" name="itemPrice" id="itemPrice" class="form-control" min="0" step="0.01">
                <div id="itemPriceHelp" class="form-text">Enter a Price (e.g 2.5)</div>
            </div>

            <div class="mb-1">
                <label for="descr" class="form-label">Description</label>
                <input type="text" name="descr" id="descr" class="form-control" placeholder="Enter Description">
                <div id="descrHelp" class="form-text">e.g Rice and a 1/4 piece Portuguese grilled chicken</div>
            </div>

            <input type="submit" name="add" value="Add" class="btn btn-primary">
        </form>
    </div>

    <hr>


    <!--form for editing menu items-->
    <div class="container-fluid mb-3 col-md-5 mx-auto rounded shadow">
        
        <form action="menuupdate.php" method="post" class="">
            <h3>Edit your Menu Items</h3>
            <div class="mb-1 bg-secondary">
                <select name="dish" id="dish" class="form-select" required>
                    <?php echo $_SESSION["sel"]; ?>
                </select>
                <div id="itemNameHelp" class="form-text text-white">Select the menu item you want to change</div>
            </div>

            <div class="mb-1">
                <label for="itemName" class="form-label">Item Name</label>
                <input type="text" name="itemName" id="itemName" class="form-control">
                <div id="itemNameHelp" class="form-text">Enter a new name</div>
            </div>

            <div class="mb-1 bg-light">
                <label for="itemPrice" class="form-label">Price</label>
                <input type="number" name="itemPrice" id="itemPrice" class="form-control" min="0" step="0.01">
                <div id="itemPriceHelp" class="form-text">Enter a new Price</div>
            </div>

            <div class="mb-1">
                <label for="descr" class="form-label">Description</label>
                <input type="text" name="descr" id="descr" class="form-control">
                <div id="descrHelp" class="form-text">Enter a new Description</div>
            </div>

            <input type="submit" name="update" value="Update" class="btn btn-primary">

        </form>
    </div>

    <hr>

    

    <!--form for deleting items-->
    <div class="container-fluid mb-3">
        <form action="menudelete.php" method="post" class="col-md-5 mx-auto">
            <h3>Select item to be deleted</h3>
            <div class="mb-1 bg-secondary">
                <select name="dish" id="dish" class="form-select">
                    <?php echo $_SESSION["sel"]; ?>
                </select>
                <div id="itemNameHelp" class="form-text text-white">Select the menu item you want to Delete</div>
            </div>

            <input type="submit" name="delete" value="Delete" class="btn btn-primary">

        </form>
    </div>

  	<hr>
  
  
  	<!--Footer-->
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg me-1">
                <h4 class="item-color">Socials</h4>
                <p class="lead">
                    Like, Share, Follow us on our social media platforms.
                </p>
                <div>
                    <a href="https://fb.me/menurize" class="item-color"><i class="bi bi-facebook"></i></a>
                </div>
            </div>

            <div class="col-lg">
                <h4 class="item-color">Useful Links</h4>
                <a href="index.html" class="d-block text-decoration-none">Home</a>
                <a href="termsofservice.html" class="d-block text-decoration-none">Terms and Conditions</a>
                <a href="privacypolicy.html" class="d-block text-decoration-none">Privacy Policy</a>
                <em class="item-color">Contact us on enquiry@menurize.com</em>
            </div>

        </div>

        <!--<hr>-->

        <div class="row">
            <p class="item-color">
                &copy; 2022 Menurize <img src="img/menurizelogo.png" alt="menurize logo" width="25px">
            </p>
        </div>
    </div>
    

    <!--scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="js/sess.js"></script>
    
</body>
</html>