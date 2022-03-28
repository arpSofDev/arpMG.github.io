<!DOCTYPE HTML>
<?php
  $heading = 'Confirm Order';
  include 'templates/header.php';
  $noOrderResponse = "";
  //Delete item if they press the delete button
  if(isset($_POST['ItemToDelete'])){
    if(!empty($_SESSION['line'])){
      //get number to delete from form
      $itemToDelete = $_POST['ItemToDelete'];
      //delete from array
      array_splice($_SESSION['line'], $itemToDelete,1);
    }
    if(empty($_SESSION['line'])){
      //tell them to go back if they have nothing left in their order
      $noOrderResponse = "You have no items left. Please press GO BACK to add an item.";
    }
  }
  //redirect users back to AddOrder
  if(isset($_POST['goBack'])){
    header('Location:AddOrder.php');
  }

  $order =[];
  //Go through each item in the array
  foreach($_SESSION['line'] as $row){
    //take away the a_ and start and all the _
    $a = str_replace("a_","",$row[0]);
    $a = str_replace("_"," ",$a);
    //create the line
    $addLine = [$a,$row[1],$row[2]];
    //put line in new array
    array_push($order,$addLine);
  }
  //set current time
  date_default_timezone_set("Australia/Victoria");
  $currentTime = date("h:i");
  $defaultTime = date('h:i',strtotime($currentTime . ' +15 minutes'));
  $maxTime = "15:00:00";


  if(isset($_POST['submit'])){
    //get name - if it is admin then get name from form
    //if not admin then get name used to login
    if($_SESSION['userStatus']==TRUE){
      $userName = $_POST['userName'];
    }else{
      $userName = $_SESSION['userName'];
    }
    //get the delivery details from form
    $deliveryType=$_POST['deliveryType'];
    if($deliveryType == 'Delivery'){
      $room = $_POST['room'];
    }else{
      $room='';
    }
    //get the other details from form
    $time = $_POST['time'];
    $notes = $_POST['notes'];
    //work out total cost
    $totalCost = 0;
    foreach($order as $row){
      $totalCost = $totalCost + $row[1]*$row[2];

    }
    //make line with all details (other than the order) in to add to csv file
    $finalOrder = [$userName,$deliveryType,$room, $time, $totalCost,'FALSE',$notes];
    //add the order
    foreach ($order as $row){
      $addLine = $row[0];
      array_push($finalOrder,$addLine);
      $addLine = $row[1];
      array_push($finalOrder,$addLine);
    }
    //check if order is empty and only put in line if it has something in it
    if(!empty($order)){
      $file = new SplfileObject('Orders/'.$date.'.csv','a');
      $file->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);
      $file->fputcsv($finalOrder);
      //if it is admin take them to the view orders page but if they aren't then take them back to add an order page
      if($_SESSION['userStatus']==TRUE){
        header('Location:ViewOrders.php');
      }else{
        $_SESSION['OrderComplete']="Your Order has been Sent!";
        header('Location:AddOrder.php');
      }
    }else{
      $noOrderResponse = "You have no items left. Please press GO BACK to add an item.";
    }
  }



?>
<div class='confirmOrder'>
<!-- <div style='position:center; padding-left: 10px; padding-right:10px'> -->
    <h4>Current Order</h4>
    <table class='table'>
      <thead>
        <tr>
          <th scope="col" class='tableHeader'>Item</th>
          <th scope="col" class='tableHeader'>Individual Price($)</th>
          <th scope="col" class='tableHeader'>Price ($)</th>
          <th scope="col" class='tableHeader'>Delete</th>
        </tr>
      </thead>
    <form name='deleteItem' method='post' action='ConfirmOrder.php'>
    <?php
    $i=0;
    $totalCost=0;

    foreach($order as $row){
      ?>
      <tr>
        <td class='text'><?php echo $row[1]." x ".$row[0]; ?></td>
        <td class='text'><?php echo $row[2]; ?></td>
        <td class='text'><?php echo number_format(($row[1]*$row[2]), 2, '.', '');?></td>
        <?php $totalCost = $totalCost + $row[2]*$row[1];?>

        <td>
          <button type='submit'  class='btn btn-outline-danger col-5' value='<?php echo $i; ?>' name='ItemToDelete' >Delete</button>
        </td>
      </tr>
      <?php
      $i++;
    }?>

    <tr>
        <td></td>
        <td><b>TOTAL COST</b></td>
        <td><b><?php echo '$'.number_format($totalCost, 2,'.','')?></b></td>
    </tr>
  </form>
  </table>
  <?php
      echo $noOrderResponse;
   ?>
</div>
<div class='orderDetailsDiv'>
  <h4>Order Details</h4>
  <form method='post' action='ConfirmOrder.php'>
    <?php
    //output field for name only if the admin is logged in
    if($_SESSION['userStatus']==TRUE){
      ?>
      <label for='userName' class='form-control-label'>Name</label>
      <input name='userName' class='form-control' type='text' required>
    <?php } ?>
      <label for='delivery' class='form-control-label'>Delivery Type</label><br>
      <input type="radio" class='form-control-radio' name="deliveryType" onChange='getValue(this)'id="PickUp" value="Pick Up" checked>
      <label class="form-check-label" for="pickUp">Pick Up</label><br>
      <input type="radio" class='form-control-radio' name="deliveryType" onChange='getValue(this)'id="delivery" value="Delivery">
      <label class="form-check-label" for="delivery">Delivery</label><br>
      <div id="deliveryDetails" style="display:none;">
        <label for='room' class='form-control-label'>Room</label>
        <input type="text" class='form-control' name='room'>
      </div>
      <label for='time' class='form-control-label'>Time</label>
      <input type='time' class='form-control' name='time' value='<?php echo $defaultTime;?>' min='<?php echo $defaultTime;?>' max='<?php echo $maxTime;?>'>
      <label for='notes' class='form-control-label'>Additional Notes</label>
      <input type='text' class='form-control' name='notes'>
      <br>
      <button class='btn btn-primary float-right col-2' name='submit' value="submit">SUBMIT ORDER</button>
    </form>
    <form method='post' action='ConfirmOrder.php'>
      <button name='goBack' class="btn btn-danger col-2" value='GO BACK'>GO BACK</button>
  </form>
</div>
<script type="text/javascript">
  function getValue(x) {
    if(x.value == 'Delivery'){
      document.getElementById("deliveryDetails").style.display = 'block';
    }
    else{
      document.getElementById("deliveryDetails").style.display = 'none';
    }
  }
</script>
<?php include 'templates/footer.php'; ?>
