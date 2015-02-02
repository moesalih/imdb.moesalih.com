<?php

$pqList = pq("div.article.listo");
$data_ = cleanLinks($pqList->html());
$data_ = str_replace('<td>...</td>', '', $data_);
$data_ = str_replace('<td colspan="2"></td>', '', $data_);
$result["data_"] = $data_;

?>



<div class="container">

	<?php echo $result["data_"]; ?>

</div>
