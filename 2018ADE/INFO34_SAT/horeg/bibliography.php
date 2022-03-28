<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Data</title>
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

      $home = '';
      $research = '';
      $data = '';

    ?>
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
            <h1 class="mb-5">Bibliography</h1>
          </div>
        </div>
      </div>
    </header>
    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">
          <div class="col-lg-12 order-lg-1 my-auto showcase-text">
            <h2>Secondary Research Sources</h2>
            <ul class="lead mb-0">
              <li>Silva, Alessandro P., et al. PLoS ONE, Public Library of Science, 2015, www.ncbi.nlm.nih.gov/pmc/articles/PMC4372555/.</li>
              <li>“Exercise Helps You Think Better.” Karen Postal Ph.D., ABPP-CN, www.karenpostal.com/exercise-think-better/.</li>
              <li>“How Exercise Increases Concentration.” FitStyler, 22 Feb. 2016, www.fitstyler.com.au/how-exercise-increases-concentration/.</li>
              <li>“how sport and physical activity enhance children’s learning.” Brain Boost, March 2015, www.dsr.wa.gov.au/docs/default-source/file-support-and-advice/file-research-and-policies/brain-boost-how-sport-and-physical-activity-enhance-children%27s-learning.pdf?sfvrsn=4</li>
              <li>“Brain boost: Sport and physical activity enhance children’s learning.” Dr Karen Martin, School of Population Health, The University of Western Australia, May 2010, www.dsr.wa.gov.au/docs/default-source/file-support-and-advice/file-research-and-policies/brain-boost-sport-and-physical-activity.pdf?sfvrsn=0</li>
            </ul>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-12 order-lg-1 text-white showcase-img" style="background-image: url('img/athlete-barbell.jpg');"></div>
        </div>
      </div>
    </section>
    <!-- Testimonials -->
    <section class="testimonials text-center bg-light">
      <div class="container">
        <h2 class="mb-5">Coding Resources</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <a href="https://getbootstrap.com/">
                <img class="img-fluid rounded-circle mb-3" src="img/bootstrap-social-logo.jpg" alt="">
              </a>
              <h5>Bootstrap</h5>
              <p class="font-weight-light mb-0">Otto, Mark, and Jacob Thornton. “Bootstrap.” Components · Bootstrap, getbootstrap.com/.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <a href="https://www.chartjs.org/">
                <img class="img-fluid rounded-circle mb-3" src="img/chartjs.jpg" alt="">
              </a>
              <h5>Chart.js</h5>
              <p class="font-weight-light mb-0">“Chart.js.” Chart.js | Open Source HTML5 Charts for Your Website, www.chartjs.org/.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <a href="https://startbootstrap.com/">
                <img class="img-fluid rounded-circle mb-3" src="img/startBootstrap.jpg" alt="">
              </a>
              <h5>Start Bootstrap</h5>
              <p class="font-weight-light mb-0">Bootstrap. “Start Bootstrap.” Start Bootstrap, startbootstrap.com/.</p>
            </div>
          </div>
        </div>
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
