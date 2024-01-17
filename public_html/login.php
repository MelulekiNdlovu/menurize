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
        //header("Location: admin.php");
      	
      	echo "<div class=\"alert alert-success\" role=\"alert\">
        <i class=\"bi bi-cursor\"></i>
        Login Successful. Click <a href=\"admin.html\" class=\"alert-link\">ADMIN</a> to update & edit your menu.
    </div>";

    }

  }else{
    //if they dont exist in yo database, show error msg
    
    echo "<div class=\"alert alert-danger\" role=\"alert\">
        <i class=\"bi bi-exclamation-triangle\"></i>
        Account not found!. Please <a href=\"https://www.menurize.com/register.html\" class=\"alert-link\">REGISTER</a> to create an account.
    </div>";
  }
 
  
?>