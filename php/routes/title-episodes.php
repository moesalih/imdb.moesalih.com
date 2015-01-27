<?php

$result["episodes_"] = trim(pq("div.article.list")->html());


?>

<div class="container">

	<section class=""><?php echo $result["episodes_"]; ?></section>

</div>

