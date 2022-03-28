<!DOCTYPE html>
<?php
  $heading = "Greenways Cafe Online Ordering";
  $incorrectLogIn = '';
  //add header section
  include "templates/header.php";
  $fileNameCheck = 'Menu/menu'.$date.'.csv';
  if(file_exists($fileNameCheck )){
    //open file with lunch menu
    $fileLunch= new SplfileObject('Menu/menu'.$date.'.csv');
    //skips row if it has nothing in it
    $fileLunch->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);
    //create an array which holds the lunch menu
    $rowsLunch=[];
    while(!$fileLunch->eof()){
        $rowsLunch[] = $fileLunch->fgetcsv();
    }
  }else{
    $output = "There is no menu for today";
  }
  //get date for the next day
  $tomorrow = date("d-m-y", strtotime("+1 day"));
  $tomorrowFileNameCheck = 'Menu/menu'.$tomorrow.'.csv';
  if(file_exists($tomorrowFileNameCheck )){
    //open file with lunch menu
    $fileLunchTomorrow= new SplfileObject($tomorrowFileNameCheck);
    //skips row if it has nothing in it
    $fileLunchTomorrow->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);
    //create an array which holds the lunch menu
    $rowsLunchTomorrow=[];
    while(!$fileLunchTomorrow->eof()){
        $rowsLunchTomorrow[] = $fileLunchTomorrow->fgetcsv();
    }
  }else{
    $outputTomorrow = "There is no menu for today";
  }
  //log in stuff
  if(isset($_POST['submit'])){
    $userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    //open data.csv
    //fopen('data/data.csv');
    $rowsData=[];
    $fileData = new SplfileObject('data/data.csv');
    //skips row if it has nothing in it
    $fileData->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);
    //create an array
    $rowsData=[];

    while(!$fileData->eof()){
        $rowsData[] = $fileData->fgetcsv();
    }
    foreach ($rowsData as $row){
      if(!empty($row[0])){
        if($row[0]==$userName){
          if(password_verify($password,$row[1])){
            if($row[2]=='student' OR $row[2]=='staff'){
              $_SESSION['userStatus']= false;
              echo $_SESSION['userStatus'];
              $_SESSION['userName'] = $userName;
              header('Location:AddOrder.php');
            }else{
              $_SESSION['userStatus']= true;
              $_SESSION['userName'] = $userName;
               header('Location:ViewOrders.php');

            }
            break;
          }
        }else{
          $incorrectLogIn='Your Username or Password was incorrect. Please try again';
        }
      }
    }
  }
?>

<form action="Index.php" method="post">
  <div class="row">
    <div class="col">
      <input type="text" name='userName' class="form-control" placeholder="User Name">
    </div>
    <div class="col">
      <input type="password" name='password' class="form-control" placeholder="Password">
    </div>
    <div class='col'>
      <button type="submit" name='submit' class="btn btn-primary">Log In!</button>
    </div>
  </div>
  <p class="small">Username/Password - admin/admin; staff/staff; student/student</p>
</form>
<br>
<?php echo $incorrectLogIn; ?>
<div class="card mb-5" >
  <div class="card-header"><h4>Todays Lunch Special - Log In To Order</h4></div>
  <?php
  if(file_exists($fileNameCheck )){
    foreach ($rowsLunch as $row){?>
      <div class="card-body">
        <?php if(!empty($row[0])){ ?>
        <h4 class='card-title'><?php echo $row[0];?></h4>
        <p style="float: right;"><?php echo '$'.$row[2];?></p>
        <p class='card-text'><?php echo $row[1];?></p>
      </div>
      <?php } ?>
    <?php }
  } else{
    echo '<p>'.$output."<p>";
  }?>
</div>
</div>
<div class="card mb-5" >
  <div class="card-header"><h4>Tommorows Lunch Special - Come Back Tomorrow To Order</h4></div>
  <?php
  if(file_exists($tomorrowFileNameCheck)){
    foreach ($rowsLunchTomorrow as $row){?>
      <div class="card-body">
        <?php if(!empty($row[0])){ ?>
        <h4 class='card-title'><?php echo $row[0];?></h4>
        <p style="float: right;"><?php echo '$'.$row[2];?></p>
        <p class='card-text'><?php echo $row[1];?></p>
      </div>
      <?php } ?>
    <?php }
  } else{
    echo '<p>'.$outputTomorrow."<p>";
  }?>
</div>
<?php
  include "templates/footer.php";
 ?>
