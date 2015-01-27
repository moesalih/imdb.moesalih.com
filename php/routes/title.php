<?php

$result["image"] = pq("#img_primary img[itemprop='image']")->attr("src");
$result["image"] = proxyImages($result["image"]);


$result["name"] = pq("h1 span[itemprop='name']")->text();
$result["year"] = pq("h1 span.nobr")->text();
$result["year"] = trim($result["year"], "()");

$result["contentRating"] = pq("span[itemprop='contentRating']")->attr("content");
$result["duration"] = trim(pq("div.infobar time[itemprop='duration']")->text());
$result["genres"] = pqArrayToPhpArray(pq("span[itemprop='genre']"));

$result["ratingValue"] = pq("span[itemprop='ratingValue']")->text();
$result["ratingCount"] = pq("span[itemprop='ratingCount']")->text();
$result["metascore"] = trim(pq("div[itemprop='aggregateRating'] a")->eq(1)->text());
$result["metascore"] = explode("/", $result["metascore"]);
$result["metascore"] = intval($result["metascore"][0]);

$pqDirector = pq("div[itemprop='director']");
cleanH4($pqDirector);
$result["directors_"] = trim($pqDirector->html());
//$result["directors_"] = str_replace(", ", "<br />", $result["directors_"]);

$pqCreator = pq("div[itemprop='creator']");
cleanH4($pqCreator);
$result["creators_"] = trim($pqCreator->html());
//$result["creators_"] = str_replace(", ", "<br />", $result["creators_"]);

$result["actors_"] = trim(pq("div[itemprop='actors']")->html());
$result["description_"] = trim(pq("p[itemprop='description']")->html());



$result["trailer"] = "";

$pqEpisodes = pq("div.article #title-episode-widget")->parent();
$pqEpisodes->find("hr")->remove();
$result["episodes_"] = trim($pqEpisodes->html());

$result["awards_"] = trim(pq("div.article#titleAwardsRanks")->html());
$result["cast_"] = trim(pq("div.article#titleCast")->html());

$pqStoryline = pq("div.article#titleStoryLine");
$pqStoryline->find("> div.see-more")->removeClass("see-more");
$result["storyline_"] = trim($pqStoryline->html());

$result["details_"] = trim(pq("div.article#titleDetails")->html());
$result["didyouknow_"] = trim(pq("div.article#titleDidYouKnow")->html());


?>



<section class="overview">

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 text-center">
				<div class="poster"><img src="<?php echo $result["image"]; ?>" /></div>
		<!--
				<button class="button" {{action 'play'}}>Play</button>
				<a {{bind-attr href=YoutubeTrailerUrl}} target="youtube" class="button">Trailer</a>
		-->
			</div>
			<div class="col-sm-8">
				<h1 class=""><?php echo $result["name"]; ?></h1>
				
				<div class="details">
					<span class="year" ><?php echo $result["year"]; ?></span>
					<span><?php echo implode(" / ", $result["genres"]); ?></span>
				</div>
				<div class="details">
					<?php if ($result["ratingValue"]) { ?><span class="rating"><i class="fa fa-star"></i> <?php echo $result["ratingValue"]; ?></span><?php } ?>
<!-- 					<?php if ($result["metascore"]) { ?><span class="rating">Metascore: <?php echo $result["metascore"]; ?>%</span><?php } ?> -->
					<span><?php echo $result["duration"]; ?></span>
					<span class="label label-default"><?php echo $result["contentRating"]; ?></span>
				</div>
		
				<div class="description"><?php echo $result["description_"]; ?></div>
				<div><?php echo $result["directors_"]; ?></div>
				<div><?php echo $result["creators_"]; ?></div>
				
				
			</div>
		</div>
	</div>




<!--
	<div class="image"><img src="<?php echo $result["image"]; ?>" /></div>
	<h1 class="text-center"><?php echo $result["name"]; ?></h1>

	<div class="details text-center">
		<span><?php echo $result["year"]; ?></span>
		<span><?php echo implode(", ", $result["genres"]); ?></span>
		<span><?php echo $result["contentRating"]; ?></span>
		<span><?php echo $result["duration"]; ?></span>
	</div>

	<div class="details text-center">
		<span class="rating"><i class="fa fa-star"></i> <?php echo $result["ratingValue"]; ?></span>
		<span class="rating">META: </i> <?php echo $result["metascore"]; ?></span>
	</div>

	
	<div class="description"><?php echo $result["description"]; ?></div>
	<div><?php echo $result["directors_"]; ?></div>
	<div><?php echo $result["creators_"]; ?></div>
-->

</section>


<?php if ($result["episodes_"]) echo '<section class="episodes"><div class="container">' . $result["episodes_"] . '</div></section>';	?>
<?php if ($result["awards_"]) echo '<section class="awards">' . $result["awards_"] . '</section>';	?>

<section class="cast"><?php echo $result["cast_"]; ?></section>
<hr class="seperator" />

<div class="container">

	<section class=""><?php echo $result["storyline_"]; ?></section>
	<hr class="seperator" />
	<section class=""><?php echo $result["details_"]; ?></section>
	<hr class="seperator" />
	<section class=""><?php echo $result["didyouknow_"]; ?></section>

</div>

