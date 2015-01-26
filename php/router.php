<?php

if (preg_match("/^\/find$/", $route)) {
	include("routes/find.php");
}
else if (preg_match("/^\/title\/tt\d+\/$/", $route)) {
	include("routes/title.php");
}
else if (preg_match("/^\/name\/nm\d+\/$/", $route)) {
	include("routes/name.php");
}



?>