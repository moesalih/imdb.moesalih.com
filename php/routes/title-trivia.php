<?php

$pqData = pq("div.article.listo");
$data_ = cleanLinks($pqData->html());
$result["data_"] = $data_;

?>



<div class="container">

	<?php echo $result["data_"]; ?>

</div>
