<?php


/*
$result["name"] = trim(pq("div.article.list .subpage_title_block h3 a")->text());
$result["link"] = trim(pq("div.article.list .subpage_title_block h3 a")->attr("href"));
$result["details"] = trim(pq("div.article.list .subpage_title_block h3 span.nobr")->text(), " \n\t()");
*/


$pqData = pq("div.article.list");

phpQuery::each($pqData->find(".list_item"), function($i, $dom) {
	$episodeNumber = pq($dom)->find(".hover-over-image div")->remove()->text();
	
	if (preg_match("/^S(\d+), Ep(\d+)$/", $episodeNumber, $tokens)) {
		$episodeNumber = $tokens[1] . "x" . $tokens[2];
		pq($dom)->find("strong a")->prepend($episodeNumber . ": ");
	}
});

$result["data_"] = trim($pqData->html());

?>



<script>

	$(function() {
		$("select#bySeason").change(function() {
			window.location.href = "?season=" + $(this).val();
		});
		$("select#byYear").change(function() {
			window.location.href = "?year=" + $(this).val();
		});
	});
	
</script>


<div class="container">

	<?php echo $result["data_"]; ?>

</div>

