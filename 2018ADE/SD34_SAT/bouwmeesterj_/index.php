<?php
session_start();
include_once("connections/crud.php");
$sat_db = new Crud();
$sat_db->connect('localhost', 'sat_2018_bouw002', 'ade', 'ade');

$title = "Log in";
include 'templates/head.php';


$data = [];
$error = false;
if(isset($_POST['login'])){

    //get inputs
    $data['user_id'] = filter_input(INPUT_POST, 'user_id');
    $data['password'] = filter_input(INPUT_POST, 'password');

    //if user id exists
    $sql = "SELECT * FROM `users` WHERE `users`.`id` = ".$data['user_id'];
    $users_rs = $sat_db->query($sql)->fetchAll();
    if(!empty($users_rs)){  //user id exists
        //get stored password from db
        $sql = "SELECT `users`.`password` FROM `users` WHERE `users`.`id` = ".$data['user_id'];
        $password_rs = $sat_db->query($sql)->fetch();
        $password = array_values($password_rs)[0];


        //if passwords match
        if(password_verify($data['password'], $password)){  //passwords match
            $_SESSION['user_id'] = $data['user_id'];  //set session variable
            header('Location: home.php');   //go to home page
        }
        else{   //passwords don't match
            $error = true;
        }

    }
    else{   //user id doesn't exist
        $error = true;
    }
}

?>
<body>
    <div style="height: 100vh;" class="container border">
        <?php include 'templates/header.php'; ?>
        <?php include 'templates/modals.php'; ?>

        <div class="login_main">

                <h1 class="text-center">Log in</h3><br>
                <form class="col-sm-12 mx-auto" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="user_id">License Number</label>
                            <input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" id="user_id" name="user_id" placeholder="Enter license number">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    </div>
                    <br>
                    <div class="text-center form-group">
                        <button type="submit" name="login" class="btn btn-primary col-12">Log In</button>
                    </div>
                    <br>
                    <a href="register.php"><p class="text-center">Don't have an account? Register here.</p></a>

                    <p class="small text-center">Or try it out using the test account 12345678 / testing</p>
                </form>

        </div>
    </div>

<?php include 'templates/footer.php'; ?>

<script>
    $(function() {

        var error = "<?php echo $error; ?>";

        if(error){  // if error exists
            $('#loginErrorModal').modal('show');  // show the error modal
        }

    });
</script>
