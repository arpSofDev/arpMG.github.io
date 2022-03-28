<?php
  $nav1 = 'nav-link';
  $nav2 = 'nav-link';
  $nav3 = 'nav-link';
  $nav4 = 'nav-link active';
  $heading = 'Add a new Menu';
  include('templates/header.php');
  include('templates/nav.php');



  if(isset($_GET['submit'])){
    //get date for the new menu
    $newDate = date('d-m-y',strToTime($_GET['date']));
    $fileNameCheck = 'menu/menu'.$newDate.'.csv';
    //put everything in form into array
    parse_str($_SERVER['QUERY_STRING'],$newMenu);
    $i=0;
    //put each line menu item, description, amount and price into a line and put in csv file
    foreach ($newMenu['itemName'] as $itemName){
      if(!empty($itemName)){
        $itemPrice = $newMenu['itemPrice'][$i];
        $itemAmount = $newMenu['itemAmount'][$i];
        $itemDescription = $newMenu['itemDescription'][$i];
        $line= [$itemName,$itemDescription,$itemPrice,$itemAmount];

        if(file_exists($fileNameCheck )){
          //open file with menu
          $file = new SplfileObject($fileNameCheck, 'a');
          $file->fputcsv($line);
        }else{
          $file = new SplfileObject($fileNameCheck,'x+');
          $file->fputcsv($line);
        }
      }
      $i++;
    }
  }

?>

<br>
<div class='card'>
  <div class="card-header">
    <p class='card-heading'>New Lunch Item</p>
  </div>

    <div class="card-body">
      <div class='form-col'>
        <form class="form" action="NewMenu.php" method="get">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class='form-row'>
                <div class="col-3">
                  <label for="date" >Pick date for Menu</label>
                  <input type="date" class='form-control' name="date" min='' required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-7">
                  <label for='itemName'>Item Name</label>
                  <input type='text' class='form-control' name='itemName[0]' required>
                </div>
                <div class="col">
                  <label for="itemPrice" >Item Price ($)</label>
                  <input type="number" class='form-control' name="itemPrice[0]" step='0.5' min='0' required>
                </div>
                <div class="col">
                  <label for='itemAmount'>Amount of Item</label>
                  <input type="number" class='form-control' name="itemAmount[0]"  min='0' max='100' step='1' required>
                </div>
              </div>
              <label for="itemDescription">Item Description</label>
              <input type="text" class='form-control' name="itemDescription[0]" required>
              <br>
            </li>
          </ul>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-row">
                <div class="col-7">
                  <label for='itemName'>Item Name</label>
                  <input type='text' class='form-control' name='itemName[1]' >
                </div>
                <div class="col">
                  <label for="itemPrice" >Item Price ($)</label>
                  <input type="number" class='form-control' name="itemPrice[1]" step='0.5' min='0'>
                </div>
                <div class="col">
                  <label for='itemAmount'>Amount of Item</label>
                  <input type="number" class='form-control' name="itemAmount[1]"  min='0' max='100' step='1'>
                </div>
              </div>
              <label for="itemDescription">Item Description</label>
              <input type="text" class='form-control' name="itemDescription[1]" >
              <br>
            </li>
          </ul>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-row">
                <div class="col-7">
                  <label for='itemName'>Item Name</label>
                  <input type='text' class='form-control' name='itemName[2]' >
                </div>
                <div class="col">
                  <label for="itemPrice" >Item Price ($)</label>
                  <input type="number" class='form-control' name="itemPrice[2]" step='0.5' min='0'>
                </div>
                <div class="col">
                  <label for='itemAmount'>Amount of Item</label>
                  <input type="number" class='form-control' name="itemAmount[2]"  min='0' max='100' step='1'>
                </div>
              </div>
              <label for="itemDescription">Item Description</label>
              <input type="text" class='form-control' name="itemDescription[2]" >
              <br>
            </li>
          </ul>
          <input type='submit' name='submit' value='Add Menu' class='btn btn-primary btn-block'>
        </form>
      </div>
    </div>
</div>
 <?php
  include('templates/footer.php');
?>
