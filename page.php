<?php

require("libs/config.php");
$page = easy_decrypt($_GET["id"]);
$pageDetails = getPageDetailsByName($page);
include("header.php");
?>
<div class="box3">
   <h2><?php echo stripslashes($pageDetails["page_title"]); ?></h2>
       <?php echo stripslashes($pageDetails["page_desc"]); ?>
</div>
<?php
include("footer.php");
?>