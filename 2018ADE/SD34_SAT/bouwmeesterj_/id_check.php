<?php
if(!isset($_SESSION['user_id'])){ // if the user has not logged in
    header("Location: index.php");  // go to the login page
}
?>
