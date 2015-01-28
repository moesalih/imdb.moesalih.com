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
else if (preg_match("/^\/name\/nm\d+\/$/", $route)) {
	$routeSlug = "name";
}
else {
	$routeSlug = "default";
}




?>