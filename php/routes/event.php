<?php

$result["header_"] = pq("div#header")->html();


$pqMain = pq("div#main");
$pqMain->find("*")->removeAttr("style");

$data_ = cleanLinks($pqMain->html());
$data_ = str_replace("<blockquote>", "<div>", $data_);
$data_ = str_replace("</blockquote>", "</div>", $data_);

$result["data_"] = $data_;

?>



<div class="container">

	<?php echo $result["header_"]; ?>
	<?php echo $result["data_"]; ?>

</div>
