<?php

$pqList = pq("div.list.detail");


$movies = array();
foreach(pq($pqList)->find(".list_item") as $movie) {
	$movies[] = parseResult(array(
		"image" => proxyImages(pq($movie)->find("img")->attr("src")),
		"name" => trim(pq($movie)->find("h4[itemprop='name'] a")->text()),
		"link" => cleanLinks(pq($movie)->find("a")->attr("href")),
		"rating" => trim(pq($movie)->find("[itemprop='ratingValue']")->attr("content")),
	));
}
	
$result["movies"] = $movies;

?>



<div class="container-fluid">

	<section class="text-center">
		<div class="seperator"><span><?php echo "Coming Soon"; ?></span></div>
		<?php displayResults($result["movies"]); ?>
	</section>

</div>
