<?php

require('phpQuery/phpQuery.php');



ini_set('display_errors', 1);

define('PLACEHOLDER_IMAGE', "http://zapp.trakt.us/images/poster-dark.jpg");



function curl($url) {
	$ch = curl_init($url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);

	$response = curl_exec($ch);     
	$info = curl_getinfo($ch);     

	$headers = substr($response, 0, $info["header_size"]);

	if (preg_match('/Location: \/(.*)/', $headers, $matches)) {
		//echo "TODO: redirect";
		header("Location: http://" . $_SERVER["HTTP_HOST"] . "/" . $matches[1]);
		exit;
	}

	$body = $info["size_download"] ? substr($response, $info["header_size"], $info["size_download"]) : "";
	
	return $body;
}


function pqArrayToPhpArray($pq) {
	$array = array();
	foreach($pq as $item) {
		$array[] = trim(pq($item)->text());
	}
	return $array;
}

function cleanH4($pq) {
	foreach($pq->find("h4") as $item) {
		pq($item)->text(trim(pq($item)->text(), ":"));
	}
	
}

function proxyImages($input) {
	$input = preg_replace("/V1_S.*_AL_/", "V1_SX512_AL_", $input);
	$input = str_replace("http://ia.media-imdb.com/images/G/01/imdb/images/nopicture/32x44/film-3119741174._CB379391527_.png", PLACEHOLDER_IMAGE, $input);

	$proxy = "https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?url=$1&container=focus&refresh=5184000";
	return preg_replace("/(http:\/\/ia.media-imdb.com\/images\/.*\.(jpg|png))/", $proxy, $input);
}

function cleanLinks($input) {
	$input = htmlspecialchars_decode($input);
	$input = preg_replace("/[\?&]ref_=[a-zA-Z0-9_]+/", "", $input);
	return $input;
}



function parseResult($item) {
	if (preg_match("/^([^\(\)]*) \((\d+)\)$/", $item["name"], $nameTokens)) {
		$item["name"] = $nameTokens[1];
		$item["year"] = $nameTokens[2];
	}
	return $item;
}

function displayResults($list) {
	foreach ($list as $result) { ?>
		<a class="result" href="<?php echo $result["link"]; ?>">
			<div class="poster"><img src="<?php echo $result["image"]; ?>" /></div>
			<div><?php echo $result["name"]; ?></div>
			<div class="details">
				<?php echo isset($result["year"]) ? '<span class="year">' . $result["year"] . '</span>' : ""; ?>
				<?php echo isset($result["rating"]) && $result["rating"] ? '<span class="rating label"><i class="fa fa-star"></i> ' . $result["rating"] . '</span>'  : ""; ?>
			</div>
		</a>
	<?php }
}







$path = $_SERVER["REQUEST_URI"];


//$route = isset($_SERVER["REDIRECT_URL"]) ? $_SERVER["REDIRECT_URL"] : "";
$route = $_SERVER["REQUEST_URI"];
$routeTokens = explode("?", $route);
$route = $routeTokens[0];
//if ($route == "/") $path = "/movies-in-theaters/";


$response = curl("http://www.imdb.com" . $path);
//$px = new px($response);
//$html = file_get_contents('http://www.imdb.com/title/tt0816692/');
$doc = phpQuery::newDocument($response);
$result = array();




include("router.php");

?>