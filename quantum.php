<?php
require("libs/config.php");
$pageDetails = getPageDetailsByName($currentPage);
include("header.php");
?>
<div class="box3">
   <h2 style="font-size: 40px;"><?php echo stripslashes($pageDetails["page_title"]); ?></h2>
       <?php echo stripslashes($pageDetails["page_desc"]); ?>
</div>
<?php
include("footer.php");