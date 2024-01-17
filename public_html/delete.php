<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Deletion</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon-16x16.png"/>


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
                </div>
            </div>

            <!--socials-->
            <div class="fw-1">
                <a href="https://fb.me/menurize" class="item-color"><i class="bi bi-facebook"></i></a>
            </div>
        </div>
    </nav>

    <form action="del.php" method="post">
        <div id="delHelp" class="form-text">Deleting your Account is irreversible. Your account will be deleted, along with all your menu data.<br>
            You are welcome to create another account, afresh.
        </div>
        <input type="submit" name="delete" value="Delete Account" class="btn btn-danger">
        <a href="admin.php" class="btn btn-dark item-color">Return to my account</a>
    </form>


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
                    <i class="fs-4 bi-facebook item-color"></i>
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
</body>
</html>