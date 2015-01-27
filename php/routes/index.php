

<form class="main-search" role="search" action="/find">
	<input class="form-control input-lg" name="q" type="text" size="20" placeholder="Search movies, TV shows, names..." value="<?php echo $route == "/find" ? $_GET["q"] : ""; ?>" autocomplete="off" />
</form>




<?php

include("movies-in-theaters.php");

?>
