

<form class="main-search" role="search" action="/find">
	<input class="form-control input-lg" name="q" type="text" size="20" placeholder="Search movies, TV shows, names..." value="<?php echo $route == "/find" ? $_GET["q"] : ""; ?>" autocomplete="off" />
</form>


<br />

<div class="text-center">
	<a href="/movies-in-theaters/">In Theaters</a> / 
	<a href="/movies-coming-soon/">Coming Soon</a>
</div>

