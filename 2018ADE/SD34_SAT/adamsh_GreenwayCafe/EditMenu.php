<?php
//set nav names so the right nav item is selected
$nav1 = 'nav-link';
$nav2 = 'nav-link active';
$nav3 = 'nav-link';
$nav4 = 'nav-link';
$heading = 'Edit Menu';
//$_SESSION['editMenuDate']=date("d-m-y");
$_SESSION['editMenuDate2']=null;
$editMenuDateCheck = FALSE;
//include the header and nav pages
include 'templates/header.php';
include 'templates/nav.php';
//set a date in a different format to $date
$date2=date('y-m-d');
//create variable with file name
$fileNameCheck = 'menu/menu'.$date.'.csv';
if(isset($_POST['submitDate'])){
  //get dates in different formats
  $editMenuDate = date('d-m-y',strToTime($_POST['dateEditMenu']));
  $editMenuDateCheck = TRUE;
  $_SESSION['editMenuDate']=$editMenuDate;
  $editMenuDate2= date('y-m-d',strToTime($_POST['dateEditMenu']));
  $fileNameCheck = 'menu/menu'.$editMenuDate.'.csv';
}

if(file_exists($fileNameCheck )){
  //open file with orders

  $fileMenu = new SplfileObject($fileNameCheck, "a+");
  //skips row if it has nothing in it
  $fileMenu->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);
  //create an array which holds the orders in it
  $rows=[];
  while(!$fileMenu->eof()){
      $rows[] = $fileMenu->fgetcsv();
  }

}else{
  $output = "You have no menu for that date";
}
//Update menu file after submitting form
if(isset($_GET['submit'])){
  parse_str($_SERVER['QUERY_STRING'],$newMenu);
  $j=0;
  //open file in "w" mode (write and truncate)
  $fileEdit= new SplfileObject('menu/menu'.$_SESSION['editMenuDate'].'.csv', 'w');
  //go through array from form
  foreach($newMenu['itemName'] as $row){
    if(!empty($row)){
      //get each item from array
      $newItemName = $newMenu['itemName'][$j];
      $newItemDescription = $newMenu['itemDescription'][$j];
      $newItemPrice = $newMenu['itemPrice'][$j];
      $newItemAmount = $newMenu['itemAmount'][$j];
      //put new into a line

      $line = [$newItemName,$newItemDescription,$newItemPrice,$newItemAmount];

      //write line into file
      $fileEdit->fputcsv($line);
      //increase counter
      $j = $j+1;
    }
  }

  header('Location:EditMenu.php');
}

?>

<br>

<form method="post" class='form' name='dateForm'>
  <ul class="list-group list-group-flush">
    <label for="date" >Pick date for Menu</label>
    <div class='form-row'>
      <div class="col-2">
        <input type="date" class='form-control' name="dateEditMenu" value="">
      </div>
      <div class="col">
        <input type='submit' name='submitDate' class='btn btn-outline-primary col-1'value='Go'>
      </div>
    </div>
  </ul>
  <br>
</form>
<div class='card'>
  <div class='card-header'>Lunch Menu
    <?php
    if($editMenuDateCheck == FALSE){
      echo '- <b>Please Pick a date</b>';
    }else{
      echo '('.$editMenuDate.')';
    }
  ?>
   </div>
  <div class='card-body'>

    <form name='EditMenuForm' class='form' method='get' >
    <?php
      $i=0;
      if(file_exists($fileNameCheck )){
        foreach ($rows as $row){
          if(!empty($row[0])){ ?>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="form-row">
                  <div class="col-7">
                    <label for='itemName'>Item Name</label>
                    <input type='text' class='form-control' name='itemName[<?php echo $i;?>]' value='<?php echo $row[0] ?>'>
                  </div>
                  <div class="col">
                    <label for="itemPrice" >Item Price ($)</label>
                    <input type="number" class='form-control' name="itemPrice[<?php echo $i;?>]" value="<?php echo $row[2]; ?>" min='0.00' step='0.05'>
                  </div>
                  <div class="col">
                    <label for='itemAmount'>Amount of Item</label>
                    <input type="number" class='form-control' name="itemAmount[<?php echo $i;?>]" value="<?php echo $row[3];?>" min='1' max='100' step='1'>
                  </div>
                </div>
                <label for="itemDescription">Item Description</label>
                <input type="text" class='form-control' name="itemDescription[<?php echo $i;?>]" value="<?php echo $row[1]; ?>">
                <br>
              </li>
            </ul>

          <?php
            $i=$i+1;

          }

        }
        ?>
        <input type="submit" class='btn btn-primary btn-lg btn-block' name="submit" value="Save">
        </form>
        <?php
      }else{
        echo $output;
      }?>

  </div>
</div>



<?php
include 'templates/footer.php' ?>
