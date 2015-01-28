<?php

$pqList = pq("div.article.listo");


/*
$movies = array();
foreach(pq($pqList)->find(".list_item") as $movie) {
	$movies[] = parseResult(array(
		"image" => proxyImages(pq($movie)->find("img")->attr("src")),
		"name" => trim(pq($movie)->find("h4[itemprop='name'] a")->text()),
		"link" => pq($movie)->find("a")->attr("href"),
		"rating" => trim(pq($movie)->find("[itemprop='ratingValue']")->attr("content")),
	));
}
*/
	
$result["data"] = $pqList->html();

?>



<div class="container">

	<?php echo $result["data"]; ?>

</div>
