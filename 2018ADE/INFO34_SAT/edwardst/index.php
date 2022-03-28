<?php $activepage = 'index' ; ?>
<?php include('templates/header.php'); ?>

<div class="container-fluid">
  <div class="sub">
    <h2>About my research</h2>
  </div>
    <div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active"><h5 class="sub2">how i collected data</h5>
        <a href="data.php">
          <img class="d-block w-100" src="images/data.jpg" alt="how I collected data">
        </a>
      </div>
      <div class="carousel-item"><h5 class="sub2">try out the survey</h5>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLScXq6ohhF_u38RzKLxsYE6RqYAJfwd5xxMkIdeuQxeL087CHA/viewform?usp=sf_link">
          <img class="d-block w-100" src="images/survey.jpg" alt="survey">
        </a>
      </div>
      <div class="carousel-item"><h5 class="sub2">privacy information</h5>
        <a href="privacy.php">
          <img class="d-block w-100" src="images/lock.jpg" alt="Privacy statement">
        </a>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


</div>

  <?php include('templates/footer.php'); ?>
