<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unit 3/4 SD</title>
<link href="twoColFixLt.css" rel="stylesheet" type="text/css">

<style>
	body, html, .container{
		overflow-y:hidden;
		background: #5686a4;
	}
	iframe{
		width: 100%;
		height: 90vh;
		overflow-y: scroll;
	}
	small{
		text-transform:uppercase;
		font-size: 12px;
	}
	.banner {
		width: 100%;
		height: 80px;
		position: fixed;
		padding: 0;
	}
	.banner h1{
		font-family: Georgia;
		color: white;
	}
	.sidebar1, .content {
		margin-top: 80px;
		/*overflow-y: scroll;*/
	}

</style>
<script src="idle.js"></script>
</head>

<body>

<div class="container">
	<div class="banner">
	  <h1>Unit 3/4 Software Development</h1>
    </div>
  <div class="sidebar1">

  	<p>SAT - Meet a need or opportunity
    </p>
    <ul class="nav">
      <li><a href="daviej_animal_fights/about.php" target='main_iframe'>Animal Fights<br><small>Who rules the animal kingdom, now?</small></a></li>
      <li><a href="doylem_tictactoe/index.php" target='main_iframe'>Tic-Tac-Toe<br><small>An old favourite, re-imagined</small></a></li>
      <li><a href="edwardst_podracing/index.php" target='main_iframe'>Now, this is Pod Racing<br><small>Ride your luck</small></a></li>
      <li><a href="flavellt_EZ_Cash_1.0/index.php" target='main_iframe'>EZ Cash 1.0<br><small>Make your fortune</small></a></li>
      <li><a href="lindsayk_music_maker/index.php" target='main_iframe'>Music Maker<br><small>Random Music Generator</small></a></li>
      <li><a href="adamsh_GreenwayCafe/Index.php" target='main_iframe'>Greenways Cafe Online<br><small>Place your order here</small></a></li>
      <li><a href="bouwmeesterj_/index.php" target='main_iframe'>Online Licence<br><small>Get your hours up</small></a></li>
    </ul>

    <!-- end .sidebar1 --></div>
 	<div class="content">
    <iframe name='main_iframe' src='default_main.html'>

	</iframe>
    <!-- end .content --></div>
  <!-- end .container --></div>
	<script>
		var awayCallback = function(){
			alert("reset");
		};
	</script>
</body>
</html>
