<?php
  session_start();

  require 'conn.php';

	$input = json_decode(file_get_contents('php://input'), true);
    // $input['key'] would equal "value"

    $name = $input['name'];
    $email = $input['email'];

  //Create database connection
  $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  //Check connection was successful
  if ($dblink->connect_errno) {
      printf("Failed to connect to database".$dblink->connect_errno);
      exit();
  }

  //Checking if the user exists
  $sql = "SELECT * FROM restaurants WHERE username='$name' && email='$email' ";
  $result = $dblink->query($sql);

  if ($result -> num_rows > 0) {
  
    while ($row = $result->fetch_assoc() ) {

        //echo "Account already exists.Go to <a href=\"login.html\">LOGIN</a> to sign in.";
      	echo "<div class=\"alert alert-danger\" role=\"alert\">
        		<i class=\"bi bi-exclamation-triangle\"></i>
        		Account already exists. Go to <a href=\"https://www.menurize.com/login.html\" class=\"alert-link\">LOGIN</a> to sign in.
    		</div>";

    }

  }else{
    //if they dont exist in yo database, register them here with this code
    $regsql = "INSERT INTO restaurants (username, email)
    VALUES ('$name', '$email')";

    if ($dblink->query($regsql) === TRUE) {
      
      /*******/
  //setting session variable after account creation
  $sql = "SELECT * FROM restaurants WHERE username='$name' && email='$email' ";
  $result = $dblink->query($sql);

  if ($result -> num_rows > 0) {
  
    while ($row = $result->fetch_assoc() ) {

      $_SESSION["username"] = $name;
      $loginName = $_SESSION["username"];
      $idn = $row["id"];

      //output editing form
      $result = $dblink->query("SELECT * FROM menuitems WHERE rest_id=$idn");

        $sel = "";

        while ( $row = $result->fetch_assoc())  {
        
            //$restaurants[] = $row;
            $sel .= "<option value=".$row["id"].">".$row["mealname"]."</option>";
        }

        $_SESSION["sel"] = $sel;
        $_SESSION["sess_id"] = $idn;

    }

  }
      /*******/
      //echo "Your Account has been created. Click <a class=\"link-success\" href=\"https://www.menurize.com/admin.php\">ADMIN</a> to start creating your menu.";
      echo "<div class=\"alert alert-success\" role=\"alert\">
        		<i class=\"bi bi-cursor\"></i>
        		Your Account has been created. Click <a href=\"admin.html\" class=\"alert-link\">ADMIN</a> to start creating your menu.
    		</div>";
      
    } else {
      echo "Error: " . $regsql . "<br>" . $dblink->error;
    }
  }
 
  
?>