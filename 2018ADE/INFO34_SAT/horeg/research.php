<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Research</title>
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
    <script src="connections/test.js"></script>
    <?php

      $home = '';
      $research = 'active';
      $data = '';


      if(isset($_POST['AvC'])){
        $EvC = "btn-outline-dark";
        $AvC = "btn-outline-dark disabled";
        $AvE = "btn-outline-dark";
      }else if(isset($_POST['AvE'])){
        $EvC = "btn-outline-dark";
        $AvE = "btn-outline-dark disabled";
        $AvC = "btn-outline-dark";
      }else{
        $AvC = "btn-outline-dark";
        $EvC = "btn-outline-dark disabled";
        $AvE = "btn-outline-dark";
      }
    ?>
    <style>
      canvas{
        -moz-user-select: none;
		    -webkit-user-select: none;
		    -ms-user-select: none;
        margin-bottom: 20px;
        margin-left: 20px;
      }
      #buttons{
        margin: auto;
        width: 600px;
      }
      #middle{
        margin: auto;
        width: 600px;
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
            <h1 class="mb-5">Results</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <p class="lead">This page explains what was discovered throughout the research and whether the hypothesis was supported or not</p>
          </div>
        </div>
      </div>
    </header>
    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">
          <div class="col-lg-12 order-lg-1 my-auto showcase-text">
            <h2>Hypothesis and Variables</h2>
            <p class="lead mb-0">As the amount of exercise people do per day increases, so does their concentration level. People between the ages of 16 – 25 will require more exercise to maintain the same amount of concentration levels as those outside of that age group.</p>
            <br>
            <p class="lead mb-0">Independent variable: Amount of exercise and age of people<br>Dependent variable: Concentration levels</p>
            <br>
            <p class="lead mb-0">This hypothesis was based on the secondary research conducted while choosing a research topic. The research showed that exercise had a strong correlation with concentration levels. I then decided to try add another factor, age groups, as I thought that results may vary between people of different ages.</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-12 text-white showcase-img" style="background-image: url('img/biker.jpg');"></div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/athlete_barbell.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>In This Study</h2>
              <ul class="lead mb-0">
                <li>No correlation was found between improvement in concentration levels and the amount of exercise completed by an individual per week.</li>
                <li>However younger respondents were shown to have a higher concentration than those who were older.</li>
              </ul>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-12 order-lg-1 my-auto showcase-text">
            <h2>Key findings</h2>
            <ul class="lead mb-0">
              <li>People who do 12 hours or more a week had a worse concentration on average than those who did less than 12 hours.</li>
              <li>There was no correlation between the amount of exercise completed per week and their concentration levels.</li>
              <li>Most people compete 2 – 5 hours of exercise a week.</li>
              <li>Many students did believe that their concentration did increase after completing exercise. Even though this is shown to not be the case.</li>
              <li>Respondents averaged 5.33 hours of exercise a week and averaged a concentration score of 55.16 out of a maximum of 100.</li>
              <li>People below the age of 35 scored on average better in their concentration compared to those over the age of 35.</li>
              <li>On average concentration levels decrease over time as people age.</li>
              <li>After completing a Chi square test, it was discovered that there is little to no correlation between the amount of exercise someone completes per week and their concentration.</li>
            </ul>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-12 order-lg-1 text-white showcase-img">
            <div id="middle">
              <div id="buttons">
                <form method="post" action="research.php#middle" id="graphs">
                  <button type="submit" class="btn <?php echo $EvC; ?>" name="EvC" value="Exercise vs Concentration">Exercise vs Concentration</button>
                  <button type="submit" class="btn <?php echo $AvC; ?>" name="AvC" value="Age vs Concentration">Age vs Concentration</button>
                  <button type="submit" class="btn <?php echo $AvE; ?>" name="AvE" value="Age vs Exercise">Age vs Exercise</button>
                </form>
              </div>
              <div id="change">
                <canvas name="graphs" id="chartjs-0" class="chartjs" width="700" height="600" style="display: block; height: 243px; width: 486px;"></canvas>
              </div>
            </div>
          </div>
          <!--<div class="col-lg-6 order-lg-2 my-auto showcase-text">
            <h2>Conclusion</h2>
            <p class="lead mb-0">No direct correlation was found between the amount of exercise and concentration levels. Even though this was the case, it was found that younger people have a better concentration level than those who are aged above 35, regardless of exercise levels. Doing over 12 hours of exercise a week was worse for concentration compared to those who did less than 12 hour a week. People under the age of 25 have better concentration levels than those who were older than 25. Even though the data collected did not support this, many people felt that more exercise would help with their concentration.</p>
          </div>-->
        </div>
        <div class="row no-gutters">
          <div class="col-lg-12 text-white showcase-img" style="background-image: url('img/boxer.jpg');"></div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-12 order-lg-2 my-auto showcase-text">
            <h2>Conclusion</h2>
              <p class="lead mb-0">No direct correlation was found between the amount of exercise and concentration levels. Even though this was the case, it was found that younger people have a better concentration level than those who are aged above 35, regardless of exercise levels. Doing over 12 hours of exercise a week was worse for concentration compared to those who did less than 12 hour a week. People under the age of 25 have better concentration levels than those who were older than 25. Even though the data collected did not support this, many people felt that more exercise would help with their concentration.</p>
              <br>
              <p class="lead mb-0">The results may have differed from the results shown in the secondary research due to the ways I collected my data or the way in which I analysed my collected data. The data collected was also largely based on the truthfulness of the responses to the asked questions, and therefore may be largely incorrect. A better way to collect data could have been used but it would have been too hard to implement and therefore the chosen data collection method was used.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonials -->
    <section class="testimonials text-center bg-light">
      <div class="container">
        <h2 class="mb-5">Who this will effect...</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/students.jpg" alt="">
              <h5>Students</h5>
              <p class="font-weight-light mb-0">They have to be aware that their concentration is slightly effected by their exercise.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/worker.jpg" alt="">
              <h5>Adults</h5>
              <p class="font-weight-light mb-0">They have good concentration between the ages of 30 - 60, but will decline after that.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/elderly.jpg" alt="">
              <h5>Elderly</h5>
              <p class="font-weight-light mb-0">Must be aware that their concentration decreases over time.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Call to Action -->
    <?php include_once('templates/action.php') ?>
    <!-- Footer -->
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
    <?php include_once('templates/footer.php') ?>
    <!-- Graph JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
    <script src="vendor/Chartjs/Chart.min.js"></script>

    <?php

      if(isset($_POST['AvC'])){
        echo "<script>
        var ctx = document.getElementById('chartjs-0').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['<19', '19-25', '26-30', '31-35', '36-40', '41-45', '46-50', '51-55', '56-60', '61-65', '66-70', '71-75'],
                datasets: [{
                    label: 'concentration test score',
                    fill: false,
                    pointBackgroundColor: 'rgba(255,99,132,1)',
                    data: [61.29, 66.25, 56.4, 60.3, 52.54, 53, 53.61, 53, 52, 42.5, 28, 36],
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                title: {
                  display: true,
                  text: 'Age and Average concentration level'
                },
                tooltips: {
                  mode: 'index',
                  intersect: false
                },
                hover: {
                  mode: 'nearest',
                  intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                          display: true,
                          labelString: 'Age group'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel: {
                          display: true,
                          labelString: 'Score (out of 100)'
                        }
                    }]
                }
            }
        });
        </script>";

      }else if(isset($_POST['AvE'])){
        echo "<script>
        var ctx = document.getElementById('chartjs-0').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['<19', '19-25', '26-30', '31-35', '36-40', '41-45', '46-50', '51-55', '56-60', '61-65', '66-70', '71-75'],
                datasets: [{
                    label: 'Amount of exercise',
                    fill: false,
                    pointBackgroundColor: 'rgba(255,99,132,1)',
                    data: [8.43, 3.5, 3.95, 3.7, 6.23, 4.29, 4.89, 4.69, 10, 4, 12, 5],
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                title: {
                  display: true,
                  text: 'Age and Exercise'
                },
                tooltips: {
                  mode: 'index',
                  intersect: false
                },
                hover: {
                  mode: 'nearest',
                  intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                          display: true,
                          labelString: 'Age group'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel: {
                          display: true,
                          labelString: 'Exercise (hours)'
                        }
                    }]
                }
            }
        });
        </script>";

      }else{
        echo "<script>
        var ctx = document.getElementById('chartjs-0').getContext('2d');
        var scatterChart = new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'concentration test score',
                    fill: false,
                    pointBackgroundColor: 'rgba(255,99,132,1)',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [{
                        x: 0,
                        y: 64
                    }, {
                        x: 0.5,
                        y: 36
                    }, {
                        x: 1,
                        y: 60
                    }, {
                        x: 2,
                        y: 53.66
                    }, {
                        x: 2.5,
                        y: 58
                    }, {
                        x: 3,
                        y: 53.2
                    }, {
                        x: 3.5,
                        y: 63
                    }, {
                        x: 4,
                        y: 50.25
                    }, {
                        x: 4.5,
                        y: 74
                    }, {
                        x: 5,
                        y: 54.5
                    }, {
                        x: 6,
                        y: 56.66
                    }, {
                        x: 7,
                        y: 53.57
                    }, {
                        x: 8,
                        y: 73.33
                    }, {
                        x: 9,
                        y: 53.5
                    }, {
                        x: 10,
                        y: 70
                    }, {
                        x: 12,
                        y: 47.5
                    }, {
                        x: 13,
                        y: 58
                    }, {
                        x: 14,
                        y: 50.5
                    }, {
                        x: 20,
                        y: 41
                    }, {
                        x: 30,
                        y: 40
                    }]
                }]
            },
            options: {
              tooltips: {
                mode: 'index',
                intersect: false
              },
              hover: {
                mode: 'nearest',
                intersect: true
              },
              title: {
                  display: true,
                  text: 'Excerise and Average concentration level'
                },
                scales: {
                    xAxes: [{
                        type: 'linear',
                        position: 'bottom',
                        scaleLabel: {
                          display: true,
                          labelString: 'Amount of exercise (hours)'
                        }
                    }]
                }
            }
        });
        </script>";
      }

    ?>


    <script src="vendor/Chartjs/Chart.bundle.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script> -->
    <script src="connections/test.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
