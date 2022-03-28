<?php
session_start();
$title = "Home";
include 'templates/head.php';
include 'id_check.php';

//setup
include_once("connections/crud.php");
$sat_db = new Crud();
$sat_db->connect('localhost', 'sat_2018_bouw002', 'ade', 'ade');


//get user's name
$sql = "SELECT `users`.`firstname`
        FROM `users`
        WHERE `users`.`id` = ".$_SESSION['user_id'];
$firstname_rs = $sat_db->query($sql)->fetch();
$firstname = array_values($firstname_rs)[0];
$_SESSION['firstname'] = $firstname;

$sql = "SELECT `users`.`surname`
        FROM `users`
        WHERE `users`.`id` = ".$_SESSION['user_id'];
$surname_rs = $sat_db->query($sql)->fetch();
$surname = array_values($surname_rs)[0];
$_SESSION['surname'] = $surname;

//getting total duration
$sql = "SELECT SUM(`trips`.`duration`)
        FROM `users`
            LEFT JOIN `trips` ON `trips`.`user_id` = `users`.`id`
        WHERE `trips`.`user_id`=".$_SESSION['user_id'];
$total_duration_rs = $sat_db->query($sql)->fetch();
$total_duration = array_values($total_duration_rs)[0];
if(empty($total_duration)){
    $total_duration = 0;
}

//changing duration to hours and minutes
$duration_hours = sprintf("%02d", floor($total_duration / 60));
$duration_minutes = sprintf("%02d", fmod($total_duration , 60));

//check if a supervising driver exists
$sql = "SELECT *
        FROM `supervising_drivers`
        WHERE `user_id` =".$_SESSION['user_id'];
$drivers_rs = $sat_db->query($sql)->fetch();


?>
<body>
    <div style="height: 100vh;" class="container border">
        <?php include 'templates/header.php'; ?>
        <?php include 'templates/modals.php'; ?>
            <div class="main">
                <p class="text-center"><?php echo $_SESSION['firstname']." ". $_SESSION['surname'];?></p>
                <hr>

                <h3 class="home_display text-center display-4">Total duration:</h3>
                <h1 class="display-2 text-center">
                    <?php echo $duration_hours ."hrs ".$duration_minutes."mins"; ?></p>
                </h1>
                <br>


                <div class="text-center"><a href="#"><button type="button" data-toggle="modal" data-target="#beginTripModal" class="btn btn-lg col-sm-10 btn-<?php if(empty($drivers_rs)){echo "secondary";}else{echo "success";} ?>" <?php if(empty($drivers_rs)){echo "disabled";} ?>>Begin trip</button></a></div>
                <!-- error message if there are no drivers -->
                <?php if(empty($drivers_rs)){echo "<br>
                    <div class='alert alert-danger mx-auto col-sm-12' role='alert'>
                        <p class='text-center'>Please register a supervising driver before beginning a trip.<br>
                        Do this on the supervising drivers page.</p>
                    </div>"

                ;} ?>
            </div>

        </div>
        <?php include 'templates/nav.php'; ?>
        <?php include 'templates/footer.php'; ?>
    </body>
</html>
