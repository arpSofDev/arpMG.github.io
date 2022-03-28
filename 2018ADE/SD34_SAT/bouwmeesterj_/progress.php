<?php
session_start();
$title = "Progress";
include 'templates/head.php';
include 'id_check.php';


//setup
include_once("connections/crud.php");
$sat_db = new Crud();
$sat_db->connect('localhost', 'sat_2018_bouw002', 'ade', 'ade');


//get total duration
$sql = "SELECT SUM(`trips`.`duration`)
        FROM `users`
            LEFT JOIN `trips` ON `trips`.`user_id` = `users`.`id`
        WHERE `trips`.`user_id`=".$_SESSION['user_id'];
$total_duration_rs = $sat_db->query($sql)->fetch();
$total_duration = array_values($total_duration_rs)[0];
if(empty($total_duration)){
    $total_duration = 0;
}

//get night duration
$sql = "SELECT SUM(`trips`.`duration`)
        FROM `users`
            LEFT JOIN `trips` ON `trips`.`user_id` = `users`.`id`
        WHERE (`trips`.`user_id`=".$_SESSION['user_id'].") AND `trips`.`light` = 'Night'";
$night_duration_rs = $sat_db->query($sql)->fetch();
$night_duration = array_values($night_duration_rs)[0];
if(empty($night_duration)){
    $night_duration = 0;
}

//converting duration to hours and minutes
$duration_hours = floor($total_duration / 60);
$duration_minutes = fmod($total_duration , 60);
$night_hours = floor($night_duration / 60);
$night_minutes = fmod($night_duration , 60);


//get current month
$month = date('Y-m');
$month_str = date('F');

//getting duration for this month
$sql = "SELECT SUM(`trips`.`duration`)
        FROM `users`
            LEFT JOIN `trips` ON `trips`.`user_id` = `users`.`id`
        WHERE (`trips`.`user_id`=".$_SESSION['user_id'].") AND (`trips`.`date` LIKE '".$month."%')";
$month_duration_rs = $sat_db->query($sql)->fetch();
$month_duration = array_values($month_duration_rs)[0];
if(empty($month_duration)){
    $month_duration = 0;
}

//calculating percentage towards goal
$done = false;
$progress = 0;
if($month_duration >= 300){ // if 5 hour goal reached
    $progress = 1;
    $done = true;
}
else{
    $progress = floor(($month_duration / 300)*100)/100;
    $remaining = 300 - $month_duration;
    $remaining_hrs = floor($remaining / 60);
    $remaining_mins = fmod($remaining , 60);
}



?>
<body>
    <div style="height: 100vh;" class="container border">
        <?php include 'templates/header.php'; ?>
        <?php include 'templates/modals.php'; ?>
            <div class="main">

                <div class="row">
                    <div class="col">
                        <p class="text-center font-30">Total driving time:<br>
                        <?php echo $duration_hours ."hrs ".$duration_minutes."mins"; ?></p>
                    </div>
                    <div class="col">
                        <p class="text-center font-30">Total night hours:<br>
                        <?php echo $night_hours ."hrs ".$night_minutes."mins"; ?></p>
                    </div>
                </div>
                <hr>

                <div class="mx-auto col-6">
                    <p class="text-center font-30"><?php echo $month_str; ?>
                    <p id="text"></p>
                    <div class="mx-auto">
                        <div class="canvas-holder" style="margin-left:-30px;">
                            <canvas id="canvas" width="300" height="300"></canvas>
                            <div id="canvas-data"></div>
                            <div id="canvas-text" style="margin-top: 45px;">of 5hr monthly goal</div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto col-9">
                    <p class="text-center">
                    <?php
                        if($done){  // if 5 hour goal achieved
                            echo "You have reached the 5 hour goal for this month";
                        }
                        else{
                            echo $remaining_hrs."hrs ".$remaining_mins."mins remaining this month";
                        }
                    ?>
                    </p>
                </div>
            </div>
        </div>

        <?php include 'templates/nav.php'; ?>
        <?php include 'templates/footer.php'; ?>
        <script>
        // circle progress bar - taken from https://www.npmjs.com/package/circle-progress-bar

        var canvas = document.getElementById('canvas');

        canvas.addEventListener('circleProgressBar.afterDraw', function (e) {
            var span = document.getElementById('canvas-data');
            span.innerText = (e.detail.self.getValue() * 100).toFixed(0) + '%';
        }, false);


        canvas.addEventListener('circleProgressBar.afterFrameDraw', function (e) {
            var span = document.getElementById('canvas-data');
            var currentValue = (e.detail.self.getValue() * e.detail.progress * 100).toFixed(0) + '%';
            var currentSpanValue = span.innerText;
            if (currentSpanValue != currentValue) {
                span.innerText = currentValue;
            }
        }, false);

        var rainbowColors = ['#03bc50', '#4B0082', '#FF0000', '#00FF00', '#FFFF00'];


        var colors = ['#b3ffb3', '#66ff66', '#1aff1a'];
        var circleProgressBar = new CircleProgressBar(canvas, {colors: colors});
        circleProgressBar.setValue("<?php print($progress); ?>");
        </script>
    </body>
</html>
