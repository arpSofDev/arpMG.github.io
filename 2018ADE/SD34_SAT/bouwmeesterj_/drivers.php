<?php
session_start();
$title = "Supervising Drivers";
include 'templates/head.php';
include 'id_check.php';


//setup
include_once("connections/crud.php");
$sat_db = new Crud();
$sat_db->connect('localhost', 'sat_2018_bouw002', 'ade', 'ade');



//getting supervising drivers
$sql = "SELECT * FROM `supervising_drivers`
        WHERE `user_id` = ".$_SESSION['user_id'];
$drivers_rs = $sat_db->query($sql)->fetchAll();

?>
<body>
    <div style="height: 100vh;" class="container border">
        <?php include 'templates/header.php'; ?>
        <?php include 'templates/modals.php'; ?>
            <div class="main">
                <p class="text-center"><?php echo $_SESSION['firstname']." ". $_SESSION['surname'];?></p>

                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Phone</th>
                        <th>License No.</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($drivers_rs as $driver){
                        echo "<tr>";
                        echo "<td>".$driver['firstname']."</td>";
                        echo "<td>".$driver['surname']."</td>";
                        echo "<td>".$driver['phone']."</td>";
                        echo "<td>".$driver['license_number']."</td>";
                        echo "<td><a href='drivers_edit.php?id=".$driver['id']."'>Edit</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                </table>
                <div class="text-center"><a href="drivers_new.php"><button class="btn btn-lg col-sm-10 btn-success"><i class="fas fa-plus"></i>  New</button></a></div>
            </div>

        </div>
        <?php include 'templates/nav.php'; ?>
        <?php include 'templates/footer.php'; ?>
    </body>
</html>
