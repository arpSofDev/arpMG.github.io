<?php if(!isset($activepage)){
    $activepage = "index";
  }
  ?>
<nav>
  <ul class="nav nav-pills nav-fill">
    <li class="nav-item">
      <a class="nav-link <?php if($activepage == 'index'){echo 'active';} ?>" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if($activepage == 'hypothesis'){echo 'active';} ?>" href="hypothesis.php">Hypothesis</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if($activepage == 'findings'){echo 'active';} ?>" href="findings.php">findings</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if($activepage == 'conclusion'){echo 'active';} ?>" href="conclusion.php">conclusion</a>
    </li>
  </ul>
</nav>
