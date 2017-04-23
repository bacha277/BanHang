<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Hệ thống điện máy</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/boxOver.js"></script>
<style>
.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
</head>
<body>
<div id="main_container">
<?php
include 'connect.php';
?>
    
  <?php
  include 'includes/header.php';
  ?>
    
  <div id="main_content">
  
    <?php
    include './includes/menu.php';
    ?>

         <?php
    include './includes/left.php';
    ?>
    <!-- end of left content -->

    <?php
    if(isset($_REQUEST['page']))
    {
        $page = $_REQUEST['page'];
        switch($page)
        {
            case 'products':
                include 'includes/products.php';
                break;
            case 'news':
                break;
            case 'contact':
                break;
            case 'pr_detail':
                include 'includes/product_detail.php';
                break;
        }
    }
    else
        include './includes/center.php';
    ?>
    <!-- end of center content -->

       <?php
    include './includes/right.php';
    ?>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
    <?php
    include './includes/footer.php';
    ?>
</div>
     
</html>
