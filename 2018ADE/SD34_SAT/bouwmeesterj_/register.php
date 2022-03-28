<script>
    function success_register(){
        alert("Congratulations, you have sucessfully registered.");
        window.location.href = "home.php";
    }
    function fail_register(){
        alert("Error, that license number is already taken. Please try again.");
    }
</script>
<?php
session_start();
include_once("connections/crud.php");
$sat_db = new Crud();
$sat_db->connect('localhost', 'sat_2018_bouw002', 'ade', 'ade');

$data = [];
$error = "";
if(isset($_POST['register'])){

    //collect and filter inputs
    $data['surname'] = filter_input(INPUT_POST, 'surname');
    $data['firstname'] = filter_input(INPUT_POST, 'firstname');
    $data['id'] = filter_input(INPUT_POST, 'id');
    $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //check if user id already exists
    $sql = "SELECT * FROM `users` WHERE `users`.`id` = ".$data['id'];
    $users_rs = $sat_db->query($sql)->fetchAll();
    if(!empty($users_rs)){
        $error = "true";
    }

    if(empty($error)){
        $sat_db->create('users', $data);
        $_SESSION['user_id'] = $data['id'];
        $error = "success";
    }
    else{

    }

}

?>
<?php
$title = "Register";
include 'templates/head.php';
?>
<body>
    <div style="height: 100vh;" class="container border">
        <?php include 'templates/header.php'; ?>
        <?php include 'templates/modals.php'; ?>
            <div class="register_main">
                <a href="index.php"><i class="fas fa-arrow-left fa-2x" id="margin-left"></i></a>
                <h1 class="text-center">Register</h1>
                <form class="col-12 mx-auto" method="post" autocomplete="off">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">First name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="id">License number</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="License number" maxlength="10">
                    </div>
                    <br>
                    <div class="text-center form-group">
                        <button type="submit" class="btn btn-primary col-12" name="register">Register</button>
                    </div>
                </form>
            </div>
    </div>
    <?php include 'templates/footer.php'; ?>
<script>
    $(function() {

        var error = "<?php echo $error; ?>";

        if(error === "true"){
            $('#regoErrorModal').modal('show');
        }
        else if(error === "success"){
            $('#regoSuccessModal').modal('show');

        }

    });
</script>
