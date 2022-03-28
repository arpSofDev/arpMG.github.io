<?php
session_start();
$title = "Supervising Drivers";
include 'templates/head.php';
include 'id_check.php';


//setup
include_once("connections/crud.php");
$sat_db = new Crud();
$sat_db->connect('localhost', 'sat_2018_bouw002', 'ade', 'ade');

if(isset($_GET['update'])){
    parse_str($_SERVER['QUERY_STRING'], $arInsert);
    unset($arInsert['update']); //get rid of it from array

    $sat_db->create('supervising_drivers', $arInsert);

    header("Location: drivers.php");
}



?>
<body>
    <div style="height: 100vh;" class="container border">
        <?php include 'templates/header.php'; ?>
        <?php include 'templates/modals.php'; ?>
            <div class="driver_main">
                <a href="drivers.php"><i class="fas fa-arrow-left fa-2x"></i></a>
                <h3>New Supervising Driver Details</h3><br>
                <form autocomplete="off">
                    <div class="form-row">
                        <div class="col">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname" placeholder="First name" required>
                        </div>
                        <div class="col">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" name="surname" placeholder="Last name" required>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                    </div>
                    <div class="form-group">
                        <label for="license_number">License Number</label>
                        <input type="number" required onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" id="license_number" name="license_number" placeholder="License Number">
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
