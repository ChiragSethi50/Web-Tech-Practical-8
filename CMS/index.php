<!DOCTYPE html>
<html lang="en">
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<?php $layout_context = "public"; ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(true); ?>
<div id="main">
 <div id="navigation">
<?php echo public_navigation($current_subject, $current_page); ?>
</div>
 <div id="page">
<?php if ($current_page) { ?>
<h2><?php echo htmlentities($current_page["menu_name"]); 
?></h2>
<?php echo nl2br(htmlentities($current_page["content"])); ?>
<?php } else { ?>
<p>Welcome!</p>
<?php }?>
 </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
</body>
</html>