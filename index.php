<?php

require("libs/config.php");
$pageDetails = getPageDetailsByName($currentPage);
include("header.php");
?>
<div class="box1">
   <h2><?php echo stripslashes($pageDetails["page_title"]); ?></h2>
        <?php echo stripslashes($pageDetails["page_desc"]); ?>
</div>
<div class="box2">
  <div class="row">
    <div class="col-md-4 col-sm-6">
      <div class="thumbnail">
        <a href=history.php>
          <img src="Style/Thumbnail/T2.jpg" style="width:100%; border: 3px solid #F9812A; padding: 1px;">
          <div class="caption" >
            <p>History of Electronics</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="thumbnail">
        <a href=semiconductors.php>
          <img src="Style/Thumbnail/T7.jpg" style="width:100%; border: 3px solid #F9812A; padding: 1px;" >
          <div class="caption">
            <p>Semiconductors</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="thumbnail">
        <a href=quantum.php>
          <img src="Style/Thumbnail/T4.jpg" style="width:100%; border: 3px solid #F9812A; padding: 1px;">
          <div class="caption" >
            <p>Quantum Computing</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="thumbnail">
        <a href=parallel.php>
          <img src="Style/Thumbnail/T6.jpg" style="width:100%; border: 3px solid #F9812A; padding: 1px;">
          <div class="caption" >
            <p>Parallel Processing</p>
          </div>
        </a>
      </div>
    </div>


    <!--------------------------Insert New Topic Thumbnail Above this line-------------------------

    <div class="col-md-4 col-sm-6">
      <div class="thumbnail">
        <a href=page alias here.php>
          <img src="image source here" style="width:100%; border: 3px solid #F9812A; padding: 1px">
          <div class="caption" >
            <p>Topic name here</p>
          </div>
        </a>
      </div>
    </div>

    ---------------Copy The Template above this line and paste above previous line----------------->
  </div>
</div>
<?php
include("footer.php");
?>