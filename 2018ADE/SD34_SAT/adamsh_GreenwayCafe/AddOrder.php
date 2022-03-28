<!DOCTYPE html>
<?php
  $nav1 = 'nav-link';
  $nav2 = 'nav-link';
  $nav3 = 'nav-link active';
  $nav4 = 'nav-link';
  $heading = "Add Lunch order";
  //add header section
  include 'templates/header.php';
  include 'templates/nav.php';
  $fileNameCheck = 'Menu/menu'.$date.'.csv';
  if(file_exists($fileNameCheck )){
    $fileLunch= new SplfileObject($fileNameCheck);
    $fileLunch->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);
    $rowsLunch=[];
    while(!$fileLunch->eof()){
        $rowsLunch[] = $fileLunch->fgetcsv();
    }
  }else{
    $output = "There is no Lunch Specials Today";
  }
  $showLunch = "hidden";
  $showDrinks = "hidden";
  //open file with lunch menu

  $fileDrink= new SplfileObject('Menu/drinks.csv');
  //skips row if it has nothing in it

  $fileDrink->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);
  //create an array which holds the lunch menu

  $rowsDrink=[];

  while(!$fileDrink->eof()){
      $rowsDrink[] = $fileDrink->fgetcsv();
  }

  if(isset($_GET['submit'])){
    //put everything in form into array

    parse_str($_SERVER['QUERY_STRING'],$newOrder);
    //get rid of submit from array
    unset($newOrder['submit']);

    foreach($newOrder as $key=>$value){
    //put everything that has value in it into an array
      // if($value>0){
        $order[] = [$key,$value];
      // }
    }

    //set counter to 0
    $count = 0;
    //set another counter
    $priceCount = $count + 1;
    foreach($order as $row){
      //get values that are amounts (not the prices)
      if($row[0][0] == 'a' AND $row[1]>0){
        //add price to the end of the array
        array_push($order[$count],$order[$priceCount][1]);
        //print_r($order[$count]);
        //increase counters

      }
      $count = $count + 1;
      $priceCount = $count + 1;
    }

    //make another counter
    $countRow = 0;
    //set total cost to 0
    $totalCost = 0;
    // print_r($order);
    foreach($order as $row){
      //increase counter
      if($row[0][0]=='p'){
        unset($order[$countRow]);
      }elseif($row[1]>0){
         $totalCost = $totalCost + $row[1]*$row[2];
      }else{
        unset($order[$countRow]);
      }
      $countRow++;
    }
    if (!empty($order)){
      $_SESSION['totalCost'] = $totalCost;
      $_SESSION['line'] = $order;
      header('Location:ConfirmOrder.php');
    }else{
      echo "Please add an item to continue";
    }

  }

 ?>

<details class="card">
  <summary class='card-header'>
      Lunch Special
  </summary>
  <form class='form' method='get' action='AddOrder.php'>
    <div class="card-body>" style="padding:20px;">
      <?php
      if(file_exists($fileNameCheck )){
        foreach ($rowsLunch as $row){
      ?>
          <p><?php if(!empty($row[0])){
            echo $row[0];
            echo " $".$row[2];
            echo "<input class='form-control' type='number' value='0' min='0' max='5' name='a_".$row[0]."'>";
            echo "<input type='hidden' value='".$row[2]."' name='p_".$row[0]."'>";
          }?></p>
      <?php }
    }else{
      echo $output;
    }?>
    </div>
</details>
<br>

 <details class='card'>
  <summary class='card-header'>
    Hot Drinks
  </summary>
    <div class="card-body>" style="padding:20px;">
      <?php
        foreach ($rowsDrink as $row){
      ?>
        <p><?php if(!empty($row[0])){
          echo $row[0];
          echo " $".$row[1];
          echo "<input class='form-control' type='number' value='0' min='0' max='5' name='a_".$row[0]."'>";
          echo "<input type='hidden' value='".$row[1]."' name='p_".$row[0]."'>";
          ?>
      <?php  }?></p>
      <?php } ?>
    </div>

</details>
  <br>
  <input type='submit' name='submit' value='submit' class=' btn btn-primary btn-lg btn-block'>
  <br>
</form>


<?php
  include 'templates/footer.php';
?>
