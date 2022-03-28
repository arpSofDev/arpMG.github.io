<!DOCTYPE html>
<?php
session_start();
if(isset($_GET['LogOut'])){
  SESSION_DESTROY();
  header('Location:Index.php');

}
//get the current date
$date = date('d-m-y');
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Greenways cafe Online Ordering</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css<?php //echo date('l jS \of F Y h:i:s A'); ?>" type = "text/css">
  </head>
  <body>
    <div class="container">
      <div class='header'>
        <h1 id='header'><?php echo $heading; ?></h1>
        <?php
          if($heading!=="Greenways Cafe Online Ordering" AND $_SESSION['userStatus']==FALSE){
            ?>
            <form class="form-inline my-2 my-lg-0 float-right">
                  <input type="submit" class="btn btn-outline-primary my-2 my-lg-0" name="LogOut" value="Log Out">
            </form>
            <?php
            if(!empty($_SESSION['OrderComplete'])){
              echo $_SESSION['OrderComplete'];
            }
             ?>
            <br>
            <br>
        <?php
          }
         ?>
      </div>
