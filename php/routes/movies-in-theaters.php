<?php

$pqLists = pq("div.list.detail.sub-list");


$lists = array();
foreach($pqLists as $list) {

	$movies = array();
	foreach(pq($list)->find(".list_item") as $movie) {
		$movies[] = parseResult(array(
			"image" => proxyImages(pq($movie)->find("img")->attr("src")),
			"name" => trim(pq($movie)->find("h4[itemprop='name'] a")->text()),
			"link" => cleanLinks(pq($movie)->find("a")->attr("href")),
			"rating" => trim(pq($movie)->find("[itemprop='ratingValue']")->attr("content")),
		));
	}

	$lists[] = array(
		"name" => trim(pq($list)->find("h3")->text(), " \t\n\r\0\x0B\xC2\xA0"),
		"movies" => $movies,
	);

}
$result["lists"] = array_reverse($lists);

?>



<div class="container-fluid">

	<?php foreach ($result["lists"] as $list) { ?>
		<section class="text-center">
			<h2 class="seperator"><span><?php echo $list["name"]; ?></span></h2>
			<?php displayResults($list["movies"]); ?>
		</section>
	<?php } ?>

</div>
