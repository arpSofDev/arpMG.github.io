<?php
session_start();
$title = "In Progress";
include 'templates/head.php';
include 'id_check.php';

//setup
include_once("connections/crud.php");
$sat_db = new Crud();
$sat_db->connect('localhost', 'sat_2018_bouw002', 'ade', 'ade');

//get supervising drivers
$sql = "SELECT * FROM `supervising_drivers`
        WHERE `user_id` = ".$_SESSION['user_id'];
$drivers_rs = $sat_db->query($sql)->fetchAll();



$trip = [];
$showBegin = true;
if(isset($_GET['begin'])){  // when trip begins
    $showBegin = false;
    $_SESSION['startOdo'] = $_GET['begin_odo'];   // get beginning odometer
    $_SESSION['beginTime'] = time();    //get start time
}

if(isset($_GET['end'])){
    $showBegin = false;
    $endOdo = $_GET['end_odo'];

    $_SESSION['endTime'] = time();    // get end time
    $time = round((($_SESSION['endTime'] - $_SESSION['beginTime'])*10)/60); // 10x speed
    if($time>120){
        $time = 120;  //prevent users from logging trips longer than 2 hours
    }


    // get trip details
    $trip['user_id'] = $_SESSION['user_id'];
    $trip['sd_id'] = $_GET['driver'];
    $trip['duration'] = $time;
    $trip['distance'] = $endOdo - $_SESSION['startOdo'];
    $trip['date'] = date("Y-m-d");
    $trip['light'] = $_GET['light'];
    $trip['traffic'] = $_GET['traffic'];
    $trip['weather'] = $_GET['weather'];
    $trip['road_type'] = $_GET['road'];
    $trip['parking'] = $_GET['parking'];
    if($trip['parking'] !== 1){
        $trip['parking'] = 0;
    }

    // pass trip[] into DB
    $sat_db->create('trips', $trip);

    // clear session
    unset($_SESSION['startOdo']);
    unset($_SESSION['endTime']);
    unset($_SESSION['beginTime']);

    // return to home page
    header('Location: home.php');

}

?>
<script>

function formChange(){

    if(document.getElementById('light').value!==""){
        var lightFilled = true;
    }
    if(document.getElementById('road').value!==""){
        var roadFilled = true;
    }
    if(document.getElementById('traffic').value!==""){
        var trafficFilled = true;
    }
    if(document.getElementById('driver').value!==""){
        var driverFilled = true;
    }

    // if all required fields are filled
    if(lightFilled && roadFilled && trafficFilled && driverFilled){

        // make the button available
        document.getElementById("endButton").disabled = false;
    }

}


</script>
<body>
    <div style="height: 100vh;" class="container col-sm-6 border">
        <?php include 'templates/header.php'; ?>
        <?php include 'templates/modals.php'; ?>
        <div class="main">
            <h2 class="text-center display-4">Elapsed time:</h2>
            <h1 class="text-center display-4"><time>00hrs 00min 00secs</time></h1>
            <hr>

            <!-- 2 hours reached -->
            <div class="modal fade" id="autoEnd" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Time limit reached</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    2 hour time limit reached. Trip automatically ended.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  </div>
                </div>
              </div>
            </div>

            <form>
                <div class="form-row col-10 mx-auto">
                    <div class="form-group col-md-6">
                        <label for="light">Time of day</label>
                        <select class="form-control light" id="light" name="light" onChange="formChange()" required>
                            <option value="select" selected disabled>Please select</option>
                            <option value="day">Day</option>
                            <option value="dawn_dusk">Dawn/Dusk</option>
                            <option value="night">Night</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="traffic">Traffic</label>
                        <select class="form-control traffic" id="traffic" name="traffic" onChange="formChange()" required>
                            <option value="" selected disabled>Please select</option>
                            <option value="light">Light</option>
                            <option value="moderate">Moderate</option>
                            <option value="heavy">Heavy</option>
                        </select>
                    </div>
                </div>

                <div class="form-row col-10 mx-auto">
                    <div class="form-group col-md-6">
                        <label for="light">Primary road type</label>
                        <select class="form-control road" id="road" name="road" onChange="formChange()" required>
                            <option value="" selected disabled>Please select</option>
                            <option value="local-streets">Local streets</option>
                            <option value="main-roads">Main roads</option>
                            <option value="inner-city">Inner city</option>
                            <option value="freeway">Freeway</option>
                            <option value="rural-highway">Rural highway</option>
                            <option value="rural-other">Rural other</option>
                            <option value="gravel">Gravel</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="driver">Supervising driver</label>
                        <select class="form-control driver" id="driver" name="driver" onChange="formChange()" required>
                            <option value="" selected disabled>Please select</option>
                            <?php
                                foreach ($drivers_rs as $driver){
                                    echo "<option value='".$driver['id']."'>".$driver['firstname']." ".$driver['surname']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="row justify-content-around">
                        <div class="col-10">
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="parking" name="parking" value="1">
                                <label class="custom-control-label" for="parking">Parking</label>
                            </div>
                        </div>
                        <div class="col-2">
                          <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio1" name="weather" value="dry" class="custom-control-input" checked>
                              <label class="custom-control-label" for="customRadio1">Dry</label>
                          </div>
                          <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio2" name="weather" value="wet" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio2">Wet</label>
                          </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="text-center"><button type="button" disabled id="endButton" data-toggle="modal" data-target="#endTripModal" class="btn btn-lg col-sm-10 btn-danger">End trip</button></div>

                <!-- end odometer -->
                <div class="modal fade" id="endOdoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Odometer</h5>

                      </div>
                      <div class="modal-body">
                          <p class="text-center">Please enter the final odometer reading.</p>

                            <input type="number" class="form-control mx-auto col-6" step="1" name="end_odo" min="<?php echo $_SESSION['startOdo'];?>" required>
                            <br>
                        <div class="text-center"><button type="submit" name="end" class="btn btn-primary">Enter</button></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

        </div>

        <?php include 'templates/footer.php'; ?>
        <script>
            $(function() {
                var showBegin = "<?php echo $showBegin; ?>";

                if(showBegin){
                    $('#beginOdoModal').modal('show');
                }
                else{
                    $('#beginOdoModal').modal('hide');
                    timer();
                }






            });
        </script>
    </body>
</html>
