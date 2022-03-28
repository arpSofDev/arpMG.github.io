<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unit 3/4 Informatics</title>
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
	.sidebar1 p{
		color: white;
	}

</style>
<script src="idle.js"></script>
</head>

<body>

<div class="container">
	<div class="banner">
	  <h1>Unit 3/4 Informatics</h1>
    </div>
  <div class="sidebar1">

  	<p>SAT - Investigate and present an hypothesis</p>
    <ul class="nav">
      <li><a href="bouwmeesterj/index.php" target='main_iframe'>Bitcoin<br><small>James Bouwmeester</small></a></li>
      <li><a href="edwardst/index.php" target='main_iframe'>Short Term Memory<br><small>Tim Edwards</small></a></li>
      <li><a href="eusticej/index.html" target='main_iframe'>Electrical Cars<br><small>James Eustice</small></a></li>
      <li><a href="griffithso/index.php" target='main_iframe'>Social Media & Mental Health<br><small>Owen Griffiths</small></a></li>
      <li><a href="horeg/index.php" target='main_iframe'>Effects of Exercise on Concentration<br><small>Geordie Hore</small></a></li>
      <li><a href="howel/index.html" target='main_iframe'>Crime and Affluence<br><small>Lachlan Howe</small></a></li>
      <li><a href="littlefordh/index.html" target='main_iframe'>Human Impact on the Environment<br><small>Harry Littleford</small></a></li>
      <li><a href="lowej/index.html" target='main_iframe'>Music Taste and Personality<br><small>Jude Lowe</small></a></li>
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
