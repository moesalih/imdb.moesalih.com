<?php

$result["image"] = pq("img[itemprop='image']")->attr("src");
$result["image"] = proxyImages($result["image"]);

$result["name"] = pq("h1 span[itemprop='name']")->text();

$result["job"] = pqArrayToPhpArray(pq("div#name-job-categories a span"));

$result["description_"] = cleanLinks(pq("div[itemprop='description']")->html());


$pqAwards = pq("div.article.highlighted")->eq(0);
$result["awards_"] = cleanLinks($pqAwards->remove()->html());


$pqKnownFor = pq("div.article #knownfor");
$knownFor = array();
foreach($pqKnownFor->children() as $item) {
	$knownFor[] = parseResult(array(
		"image" => proxyImages(pq($item)->find("img")->attr("src")),
		"name" => trim(pq($item)->text()),
		"link" => cleanLinks(pq($item)->find("a")->attr("href")),
	));
}
$pqKnownFor->parent()->remove();
$result["knownfor"] = $knownFor;





$pqMain = pq("div#maindetails_center_bottom");
$pqMain->find(".mediastrip_big")->parent()->remove();
$pqMain->find("> div.article > div.see-more")->removeClass("see-more");
//$pqMain->find("*")->attr("style", "");
$pqMain->find("> div.article")->wrap("<section></section>");
$pqMain->find("> section")->after("<hr class='seperator'></hr>");
$result["main_"] = cleanLinks($pqMain->html());

?>



<script>

	function toggleFilmoCategory(a) {
		//console.log("toggleFilmoCategory", a);
		$(a).next().slideToggle();
		$("span#hide-"+$(a).attr("data-category")).toggle();
		$("span#show-"+$(a).attr("data-category")).toggle();
	}

</script>


<section class="overview">

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 text-center">
				<div class="poster"><img src="<?php echo $result["image"]; ?>" /></div>
			</div>
			<div class="col-sm-8">
				<h1 class=""><?php echo $result["name"]; ?></h1>
				
				<div class="details">
					<span><?php echo implode(" / ", $result["job"]); ?></span>
				</div>
		
				<div class="description"><?php echo $result["description_"]; ?></div>
				
			</div>
		</div>
	</div>
	
</section>


<?php if ($result["awards_"]) echo '<section class="awards">' . $result["awards_"] . '</section>';	?>

<?php if ($result["knownfor"]) { ?>
	<section class="knownfor">
		<div class="container-fluid">
			<h2>Known For</h2>
			<?php displayResults($result["knownfor"]); ?>
		</div>
	</section>
<?php } ?>


<div class="container">
	<?php echo $result["main_"]; ?>
</div>

