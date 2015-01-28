<?php

$pqList = pq("div.article.listo");

$result["data_"] = $pqList->html();

?>



<div class="container">

	<?php echo $result["data_"]; ?>

</div>
