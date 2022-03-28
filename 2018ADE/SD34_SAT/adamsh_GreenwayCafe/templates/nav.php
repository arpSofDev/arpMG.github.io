<?php
if($_SESSION['userStatus']!== false){
  ?>
  <nav class="navbar nav-tabs navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li>
          <img src="images/logo.png" width="40" height="40" alt="Mentone Grammar Logo">
        </li>
        <li class="nav-item">
          <a class='<?php echo $nav1; ?>' href="ViewOrders.php">View All Orders<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class='<?php echo $nav2; ?>' href="EditMenu.php">Edit Menu<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class='<?php echo $nav3; ?>' href="AddOrder.php">Add Order<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class='<?php echo $nav4; ?>' href="NewMenu.php">Add New Menu<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="LogOut" value="Log Out">
      </form>
    </div>
  </nav>
  <br>
  <?php
}

?>
