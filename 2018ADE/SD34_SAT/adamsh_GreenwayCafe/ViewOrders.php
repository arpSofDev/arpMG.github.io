<?php
  //set nav names so the right nav item is selected
  $nav1 = 'nav-link active';
  $nav2 = 'nav-link';
  $nav3 = 'nav-link';
  $nav4 = 'nav-link';
  $heading = 'View Orders';
  //include nav and header sections
  include 'templates/header.php';
  include 'templates/nav.php';
  //create variable which has the name the days order file
  $fileNameCheck = 'Orders/'.$date.'.csv';
  //if file exists then open that file, if file doesn't exist then create file
  if(file_exists($fileNameCheck )){
    //open file with orders
    $fileOrders = new SplfileObject($fileNameCheck,'a+');
  }
  else{
    //create file
    $fileOrders = new SplfileObject($fileNameCheck,'x+');
  }
  //skips file row if it has nothing in it
  $fileOrders->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);
  //create an array which holds the orders in it
  $rowsOrders=[];
  while(!$fileOrders->eof()){
      $rowsOrders[] = $fileOrders->fgetcsv();
  }

  if(isset($_POST['OrderToDelete'])){
    //get the row number
    $rowCheck = $_POST['OrderToDelete'];
    //change it from FALSE to TRUE
    $rowsOrders[$rowCheck][5] = 'TRUE';
    //open file to re write
    $fileOrders = new SplFileObject('Orders/'.$date.'.csv',"w+");
    //put the orders back into the file
    foreach ($rowsOrders as $row) {
      if(!empty($row[0])){
        $fileOrders->fputcsv($row);
      }
    }
  }

?>

<table class='table'>
  <thead>
  <tr>
    <th scope="col" class='tableHeader'>Username</th>
    <th scope="col" class='tableHeader'>Order</th>
    <th scope="col" class='tableHeader'>Notes</th>
    <th scope="col" class='tableHeader'>Delivery Details</th>
    <th scope="col" class='tableHeader'>Time</th>
    <th scope="col" class='tableHeader'>Cost</th>
    <th scope="col" class='tableHeader'>Completed</th>
  </tr>
</thead>
<tbody>
  <form method='post' action='ViewOrders.php'>
      <?php
        $j=0;
        foreach ($rowsOrders as $row){
          //have each line check if the Status is TRUE. If it is then give it the class checkOrder
          if(!empty($row[0])){
            if($row[5]=='TRUE'){
              ?>
              <tr class='checkOrder'>
              <?php
            }else{
              ?>
              <tr>
              <?php
            }
            ?>

            <td class='text'><?php echo $row[0];?></td>
            <td class='text'><?php
              $i=7;
              for($i>7;!empty($row[$i]);$i++){
                echo $row[$i+1]." x ".$row[$i];
                $i++;
                ?> <br> <?php
              }?>
            </td>
            <td class='text'><?php echo $row[6];?></td>
            <td class='text'><?php
              if(!empty($row[2])){
                echo $row[1]," - ".$row[2];
              }else{
                echo $row[1];
              }
               ?>
            </td>

            <td class='text'><?php echo $row[3]; ?></td>
            <td class='text'><?php echo '$'.$row[4]; ?></td>
            <td class='text'>
              <!-- <div class="form-check "> -->
                <button class="btn btn-outline-secondary position-centre"  type="submit" value='<?php echo $j++; ?>' name='OrderToDelete' >Completed</button>
              <!-- </div> -->
            </td>
          </tr>

            <?php }
            ?>
        </div>
      <?php
      }
      ?>
    </form>
</tbody>
</table>


<?php
include 'templates/footer.php';
?>
