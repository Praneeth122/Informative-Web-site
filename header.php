<?php

$page_id = $pageDetails["page_id"];
if ($_GET["id"] <> "") {
    // if we are on page.php page. get the parent id and fetch their related subpages
    $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE status = 'A' AND parent = :parent ORDER BY sort_order ASC";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":parent", db_prepare_input($pageDetails["parent"]));
        $stmt->execute();
        $pagesResults = $stmt->fetchAll();
    } catch (Exception $ex) {
       echo errorMessage($ex->getMessage());
    }

} elseif ($page_id <> "") {
    // On any other Page get the page id and fetch their related subpages
   $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE status = 'A' AND parent = :parent ORDER BY sort_order ASC";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":parent", db_prepare_input($page_id));
        $stmt->execute();
        $pagesResults = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo errorMessage($ex->getMessage());
    }
   
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo stripslashes($pageDetails["page_title"]); ?> - <?php echo SITE_NAME; ?></title>
        <link rel="icon" href="" type=""/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="<?php echo stripslashes($pageDetails["meta_desc"]); ?>" />
        <meta name="keywords" content="<?php echo stripslashes($pageDetails["meta_keywords"]); ?>" />
        <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="bootstrap-4.1.3/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
        <link rel="stylesheet" href="sidebar.css">

    <!-- Font Awesome JS -->
        <script defer src="fontawesome/svg-with-js/js/fa-solid.js"></script>
        <script defer src="fontawesome/svg-with-js/js/fontawesome.js"></script>

      
     
    </head>
    <body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Tamil Nadu science & Tech Center</h3>
                <strong>TNSTC</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index.php" >
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="about.php">
                        <i class="fas fa-briefcase"></i>
                        About
                    </a>
                     <?php
         if ($currentPage != "index" and $currentPage != "about") {
            try {
                $stmt = $DB->prepare("SELECT * FROM " . TABLE_TAGLINE . " WHERE 1 LIMIT 1");
                $stmt->bindValue(":pname", $pageAlias);
                $stmt->execute();
                $details = $stmt->fetchAll();
            } catch (Exception $ex) {
                echo errorMessage($ex->getMessage());
            }
            ?> 
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-copy"></i>
                        SubTopics
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                       <?php foreach ($pagesResults as $rs) { ?>
                                <li><a href="page.php?id=<?php echo easy_crypt($rs["page_alias"]); ?>"><?php echo stripslashes($rs["page_title"]); ?></a></li>
                            <?php } ?>
                    </ul>
                </li>
            <?php }?>
                <li>
                    <a href="Quiz/home.php">
                        <i class="fas fa-question"></i>
                        Quiz
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        Contact
                    </a>
                </li>
            </ul>
        </nav>
    <div id="content">
        <?php
         if ($currentPage == "index") {
            try {
                $stmt = $DB->prepare("SELECT * FROM " . TABLE_TAGLINE . " WHERE 1 LIMIT 1");
                $stmt->bindValue(":pname", $pageAlias);
                $stmt->execute();
                $details = $stmt->fetchAll();
            } catch (Exception $ex) {
                echo errorMessage($ex->getMessage());
            }
            ?>
        <div class="banner" >
            <div class="banner-content">
                <h1 style="font-size: 70px"><?php echo stripslashes($details[0]["tagline1"]);?></h1>
                <p style="color: #000000"><?php echo stripslashes($details[0]["tagline2"]);?></p>
            </div>
        </div>
        <?php } ?>

        <!-- ********************************************************* -->
  