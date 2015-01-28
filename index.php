<?php include("php/common.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title><?php echo pq("head title")->text(); ?></title>

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
	<body class="<?php echo $routeSlug; ?>">

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="/app.js"></script>



<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">imdb</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
	      <form class="navbar-form navbar-left" role="search" action="/find">
	        <div class="form-group">
					<input class="form-control" name="q" type="text" size="20" placeholder="Search" value="<?php echo $route == "/find" ? $_GET["q"] : ""; ?>" autocomplete="off" />
	        </div>
	      </form>

      </ul>
    </div>
  </div>
</nav>


<!--
		<div class="container-fluid">
			<div id="search">
				<form action="/find">
					<input class="form-control input-lg" name="q" type="text" placeholder="Search" value="<?php echo $route == "/find" ? $_GET["q"] : ""; ?>" autocomplete="off" />
				</form>
			</div>
		</div>
-->

		<main>
			<?php 
				if (isset($routeSlug)) {
					include("php/routes/$routeSlug.php");
				}
			?>
		</main>

<!--
			<pre><?php 
				echo $route."\n";
				print_r($_SERVER);
				echo htmlspecialchars(print_r($result, TRUE));
			?></pre>
-->

	</body>
</html>
