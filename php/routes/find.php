<?php

$pqResults = pq("div.article");
$pqResults->find("h1")->remove();

$result["results_"] = trim($pqResults->html());
$result["results_"] = proxyImages($result["results_"]);
$result["results_"] = preg_replace("/V1_S.*_AL_/", "V1_SX256_AL_", $result["results_"]);



?>


<div class="container">

	<section class="results"><?php echo $result["results_"]; ?></section>

</div>
