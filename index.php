<?php include("php/common.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>IMDB</title>

		<link rel="shortcut icon" type="image/png" href="/images/icon.png" />
		<link rel="apple-touch-icon" href="/images/icon.png"/>

		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
		<link href="/app.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
			
		<div class="container-fluid">
			<div id="search">
				<form action="/find">
					<input class="form-control input-lg" name="q" type="text" placeholder="Search" value="<?php echo $route == "/find" ? $_GET["q"] : ""; ?>" autocomplete="off" />
				</form>
			</div>
		</div>

		<?php include("php/router.php"); ?>

<!--
			<pre><?php 
				echo $route."\n";
				print_r($_SERVER);
				echo htmlspecialchars(print_r($result, TRUE));
			?></pre>
-->

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="/app.js"></script>
	</body>
</html>
