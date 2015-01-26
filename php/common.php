<?php

//include("px.017.php");
require('phpQuery/phpQuery.php');



ini_set('display_errors', 1);


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

function proxyImages($input) {
	$input = preg_replace("/V1_S.*_AL_/", "V1_SX512_AL_", $input);

	$proxy = "https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?url=$1&container=focus&refresh=5184000";
	return preg_replace("/(http:\/\/ia.media-imdb.com\/images\/.*\.(jpg|png))/", $proxy, $input);
}


function cleanH4($pq) {
	foreach($pq->find("h4") as $item) {
		pq($item)->text(trim(pq($item)->text(), ":"));
	}
	
}






$route = $_SERVER["REDIRECT_URL"];
$path = $_SERVER["REQUEST_URI"];
$response = curl("http://www.imdb.com" . $path);
//$px = new px($response);
//$html = file_get_contents('http://www.imdb.com/title/tt0816692/');
$doc = phpQuery::newDocument($response);
$result = array();






?>