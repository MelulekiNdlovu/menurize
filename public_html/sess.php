<?php
	session_start();
    if ( isset($_SESSION["username"]) ) {
        echo "<a class=\"nav-link link-light\" href=\"admin.html\">My Menu</a>";
    }else{ echo ""; }
?>