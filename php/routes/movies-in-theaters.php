<?php

$pqLists = pq("div.list.detail.sub-list");


$lists = array();
foreach($pqLists as $list) {

	$movies = array();
	foreach(pq($list)->find(".list_item") as $movie) {
		$movies[] = parseResult(array(
			"image" => proxyImages(pq($movie)->find("img")->attr("src")),
			"name" => trim(pq($movie)->find("h4[itemprop='name'] a")->text()),
			"link" => pq($movie)->find("a")->attr("href"),
		));
	}

	$lists[] = array(
		"name" => pq($list)->find("h3")->text(),
		"movies" => $movies,
	);

}
$result["lists"] = array_reverse($lists);

?>



<div class="container-fluid">

	<?php foreach ($result["lists"] as $list) { ?>
		<section class="text-center">
			<h2><?php echo $list["name"]; ?></h2>
			<?php displayResults($list["movies"]); ?>
		</section>
		<hr class="seperator" />
	<?php } ?>

</div>
