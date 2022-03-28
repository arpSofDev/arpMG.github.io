<?php

/*
  Last Modified 20/08/2018
  Author: GSH
  changes:
  next:
*/

session_start();
if(!isset($_SESSION['data'])){
  $_SESSION['data'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Index</title>
    <link rel="shortcut icon" type="image/png" href="img/runningLogo.png"/>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css"> -->
    <link href="vendor/fonts/stylesheet.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">
    <?php
      date_default_timezone_set('Australia/Melbourne');

      //Open file for reading
      $file = new SplFileObject("data/data.csv");
      $file->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);

      $_SESSION['data'] = [];
      while(!$file->eof()){
        $_SESSION['data'][] = $file->fgetcsv();
      }
      $file = null;
      //get rid of empty element
      array_pop($_SESSION['data']);
      //$row = $file->fgetcsv();


        $count = "";
        $i = 0;
        foreach ($_SESSION['data'] as $row) {
            $count = $row[0];
            $i++;
        }
        $count = $count + 1;

        $csv[]=$count;

        $file = fopen("data/data.csv","w+");

        fputcsv($file, $csv);

        fclose($file);
    ?>
    <?php

      $home = 'active';
      $research = '';
      $data = '';

    ?>
    <style>
    #links:link {
      text-decoration: none;
      color: black;
    }
    #links:visited {
      text-decoration: none;
      color: black;
    }
    #links:hover {
      text-decoration: none;
      color: #157efb;
    }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <?php include_once('templates/header.php') ?>
    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Effects of exercise of concentration</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <p class="lead">As a part of the course for Informatics 3/4, I was required to create a research and then present my findings on a multimodal online solution (e.g. a website). I decided to choose my research topic to be the effects of exercise on a person's concentration levels.</p>
          </div>
        </div>
      </div>
    </header>
    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 order-lg-1 my-auto showcase-text">
            <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
              <h3>About the SAT</h3>
              <p class="lead mb-0">A School Assessed Task (SAT) is part of the VCE Informatics course. The SAT is a project that makes up 30% of our study score, and takes up most of the school year. This is then marked by our school teacher/s in order to rank us against our classmates, to then be ranked at the end of the year against other students from other schools completing the same subject.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <a href="research.php" id="links">
          <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/testing.jpg');" alt="testTubesImage"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
              <h2>The Research</h2>
              <p class="lead mb-0">This page explains what was discovered throughout the research and whether the hypothesis was supported or not</p>
            </div>
          </div>
        </a>
        <a href="data.php" id="links">
          <div class="row no-gutters">
            <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/glasses.jpg');" alt="glassesLookingAtCode"></div>
            <div class="col-lg-6 my-auto showcase-text">
              <h2>Data Collection And Analysis</h2>
              <p class="lead mb-0">This page explains how the data was collected and analysed.</p>
            </div>
          </div>
        </a>
      </div>
    </section>
    <!-- Call to Action -->
    <?php include_once('templates/action.php') ?>
    <!-- Footer -->
    <?php include_once('templates/footer.php') ?>
    <?php //Open file for reading
    $file = new SplFileObject("data/feedback.csv");
    $file->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY|SplFileObject::READ_AHEAD);

    $_SESSION['data'] = [];
    while(!$file->eof()){
      $_SESSION['data'][] = $file->fgetcsv();
    }
    $file = null;
    //get rid of empty element
    array_pop($_SESSION['data']);
    //$row = $file->fgetcsv();

    if(isset($_POST['submit'])){
      $feedback = $_POST['feedback'];

      $thing[]=$feedback;

      $file = fopen("data/feedback.csv","a");

      fputcsv($file, $thing);

      fclose($file);
    }?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
