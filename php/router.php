<?php

if ($route == "/") {
	$routeSlug = "index";
}
else if (preg_match("/^\/movies-in-theaters\/$/", $route)) {
	$routeSlug = "movies-in-theaters";
}
else if (preg_match("/^\/movies-coming-soon\/$/", $route)) {
	$routeSlug = "movies-coming-soon";
}
else if (preg_match("/^\/find$/", $route)) {
	$routeSlug = "find";
}
else if (preg_match("/^\/title\/tt\d+\/$/", $route)) {
	$routeSlug = "title";
}
else if (preg_match("/^\/title\/tt\d+\/episodes$/", $route)) {
	$routeSlug = "title-episodes";
}
else if (preg_match("/^\/title\/tt\d+\/fullcredits$/", $route)) {
	$routeSlug = "title-fullcredits";
}
else if (preg_match("/^\/title\/tt\d+\/trivia$/", $route)) {
	$routeSlug = "title-trivia";
}
else if (preg_match("/^\/title\/tt\d+\/awards$/", $route)) {
	$routeSlug = "-awards";
}
else if (preg_match("/^\/name\/nm\d+\/$/", $route)) {
	$routeSlug = "name";
}
else if (preg_match("/^\/name\/nm\d+\/awards$/", $route)) {
	$routeSlug = "-awards";
}
else if ($route == "/about") {
	$routeSlug = "about";
	$title = "About this concept - IMDb";
}
else {
	$routeSlug = "default";
}

?>