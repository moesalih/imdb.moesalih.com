<?php

$result["image"] = pq("#img_primary img[itemprop='image']")->attr("src");
$result["image"] = proxyImages($result["image"]);
if (!$result["image"]) $result["image"] = PLACEHOLDER_IMAGE;


$result["tvHeader"] = pq("h2.tv_header")->html();
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
$result["directors_"] = cleanLinks($pqDirector->html());

$pqCreator = pq("div[itemprop='creator']");
cleanH4($pqCreator);
$result["creators_"] = cleanLinks($pqCreator->html());

$result["actors_"] = cleanLinks(pq("div[itemprop='actors']")->html());
$result["description_"] = cleanLinks(pq("p[itemprop='description']")->html());



$result["trailer"] = cleanLinks(pq("a[itemprop='trailer']")->attr("href"));


$pqEpisodes = pq("div.article #title-episode-widget")->parent();
$pqEpisodes->find("hr")->remove();

$result["episodes_"] = array();
$result["episodes_"]["seasons"] = cleanLinks($pqEpisodes->find(".seasons-and-year-nav div")->eq(2)->html());
$result["episodes_"]["years"] = cleanLinks($pqEpisodes->find(".seasons-and-year-nav div")->eq(3)->html());

//$result["episodes_"] = trim($pqEpisodes->html());

$result["awards_"] = cleanLinks(pq("div.article#titleAwardsRanks")->html());
$result["cast_"] = cleanLinks(pq("div.article#titleCast")->html());

$pqStoryline = pq("div.article#titleStoryLine");
$pqStoryline->find("> div.see-more")->removeClass("see-more");
$result["storyline_"] = cleanLinks($pqStoryline->html());

$result["details_"] = cleanLinks(pq("div.article#titleDetails")->html());
$result["didyouknow_"] = cleanLinks(pq("div.article#titleDidYouKnow")->html());


?>



<section class="overview">

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 text-center">
				<div class="poster"><img src="<?php echo $result["image"]; ?>" /></div>
			</div>
			<div class="col-sm-8">
				<?php if ($result["tvHeader"]) { ?><span class="tvHeader"><?php echo $result["tvHeader"]; ?></span><?php } ?>
				<h1 class=""><?php echo $result["name"]; ?></h1>
				
				<div class="details">
					<span class="year" ><?php echo $result["year"]; ?></span>
					<span><?php echo implode(" / ", $result["genres"]); ?></span>
				</div>
				<div class="details">
					<?php if ($result["ratingValue"]) { ?><span class="rating label"><i class="fa fa-star"></i> <?php echo $result["ratingValue"]; ?></span><?php } ?>
<!-- 					<?php if ($result["metascore"]) { ?><span class="rating">Metascore: <?php echo $result["metascore"]; ?>%</span><?php } ?> -->
					<span class="label"><?php echo $result["contentRating"]; ?></span>
					<span><?php echo $result["duration"]; ?></span>
				</div>
		
				<div class="description"><?php echo $result["description_"]; ?></div>
				<div><?php echo $result["directors_"]; ?></div>
				<div><?php echo $result["creators_"]; ?></div>
				
				<?php if ($result["episodes_"]["seasons"]) echo '<h4 class="inline">Seasons</h4>' . $result["episodes_"]["seasons"] . '';	?>
				<?php if ($result["episodes_"]["years"]) echo '<h4>Years</h4>' . $result["episodes_"]["years"] . '';	?>
				
				<?php if ($result["trailer"]) { ?>
					<br /><br />
					<button type="button" class="btn btn-default" data-toggle="modal" data-target=".trailer-modal">Watch Trailer</button>
					<div class="modal fade trailer-modal" tabindex="-1" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<iframe src="http://www.imdb.com<?php echo $result["trailer"]; ?>imdb/embed?autoplay=false&width=640" width="640" height="360" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" frameborder="no" scrolling="no"></iframe>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

</section>


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

