<?php
session_start();
$title = "Supervising Drivers";
include 'templates/head.php';
include 'id_check.php';
if(!isset($_GET['id'])){ // if a driver id is not selected
    header("Location: drivers.php");  // go to the drivers page
}

//setup
include_once("connections/crud.php");
$sat_db = new Crud();
$sat_db->connect('localhost', 'sat_2018_bouw002', 'ade', 'ade');

if(isset($_GET['update'])){ // update details
    parse_str($_SERVER['QUERY_STRING'], $arUpdate);
    unset($arUpdate['update']); //get rid of it from array

    $sat_db->update('supervising_drivers', $arUpdate['id'], $arUpdate);

    header("Location: drivers.php");
}

if(isset($_GET['id'])){ // on page load
    $id = filter_input(INPUT_GET, 'id');
    $sql = "SELECT * FROM `supervising_drivers` WHERE `id` = '$id'";
    $drivers_rs = $sat_db->query($sql)->fetch();
}else{

}



?>
<body>
    <div style="height: 100vh;" class="container border">
        <?php include 'templates/header.php'; ?>
        <?php include 'templates/modals.php'; ?>
            <div class="driver_main">
                <a href="drivers.php"><i class="fas fa-arrow-left fa-2x"></i></a>
                <h3>Edit Supervising Driver Details</h3><br>
                <form autocomplete="off">
                    <input type="hidden" name="id" value="<?php echo $drivers_rs['id']; ?>">
                    <div class="form-row">
                        <div class="col">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname" placeholder="First name" value="<?php echo $drivers_rs['firstname']; ?>" required>
                        </div>
                        <div class="col">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" name="surname" placeholder="Last name" value="<?php echo $drivers_rs['surname']; ?>" required>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" value="<?php echo $drivers_rs['phone']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="license_number">License Number</label>
                        <input type="number" required onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" id="license_number" name="license_number" placeholder="License Number" value="<?php echo $drivers_rs['license_number']; ?>">
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <div class="form-group col-md-12 mx-auto">
                        <label for="submit"> </label>
                        <button type="submit" name="update" class="btn btn-primary form-control">Submit</button>
                    </div>

                </form>
            </div>

        </div>
        <?php include 'templates/nav.php'; ?>
        <?php include 'templates/footer.php'; ?>
    </body>
</html>
