<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php find_selected_page(); ?>
<?php
if (!$current_subject) {
redirect_to("manage_content.php");
}
?>
<?php
if (isset($_POST['submit'])) {
$required_fields = array("menu_name", "position", "visible");
validate_presences($required_fields);
$fields_with_max_lengths = array("menu_name" => 30);
validate_max_lengths($fields_with_max_lengths);
if (empty($errors)) {
$id = $current_subject["id"];
$menu_name = mysql_prep($_POST["menu_name"]);
$position = (int) $_POST["position"];
$visible = (int) $_POST["visible"];
$query = "UPDATE subjects SET ";
$query .= "menu_name = '{$menu_name}', ";
$query .= "position = {$position}, ";
$query .= "visible = {$visible} ";
$query .= "WHERE id = {$id} ";
$query .= "LIMIT 1";
$result = mysqli_query($connection, $query);
if ($result && mysqli_affected_rows($connection) >= 0) {
// Success
$_SESSION["message"] = "Subject updated.";
redirect_to("manage_content.php");
} else {
// Failure
$message = "Subject update failed.";
}
}
} ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
 <div id="navigation">
<?php echo navigation($current_subject, $current_page); ?>
 </div>
 <div id="page">
<?php // $message is just a variable, doesn't use the SESSION
if (!empty($message)) {
echo "<div class=\"message\">" . htmlentities($message) . 
"</div>";
}
?>
<?php echo form_errors($errors); ?>
<h2>Edit Subject: <?php echo 
htmlentities($current_subject["menu_name"]); ?></h2>
<form action="edit_subject.php?subject=<?php echo 
urlencode($current_subject["id"]); ?>" method="post">
<p>Menu name:
<input type="text" name="menu_name" value="<?php echo 
htmlentities($current_subject["menu_name"]); ?>" />
</p>
<p>Position:
<select name="position">
<?php
$query .= "position = {$position}, ";
$query .= "visible = {$visible} ";
$query .= "WHERE id = {$id} ";
$query .= "LIMIT 1";
$result = mysqli_query($connection, $query);
if ($result && mysqli_affected_rows($connection) >= 0) {
// Success
$_SESSION["message"] = "Subject updated.";
redirect_to("manage_content.php");
} else {
// Failure
$message = "Subject update failed.";
}
}
} ?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
 <div id="navigation">
<?php echo navigation($current_subject, $current_page); ?>
 </div>
 <div id="page">
<?php // $message is just a variable, doesn't use the SESSION
if (!empty($message)) {
echo "<div class=\"message\">" . htmlentities($message) . 
"</div>";
}
?>
<?php echo form_errors($errors); ?>
<h2>Edit Subject: <?php echo 
htmlentities($current_subject["menu_name"]); ?></h2>
<form action="edit_subject.php?subject=<?php echo 
urlencode($current_subject["id"]); ?>" method="post">
<p>Menu name:
<input type="text" name="menu_name" value="<?php echo 
htmlentities($current_subject["menu_name"]); ?>" />
</p>
<p>Position:
<select name="position">
<?php
<?php include("../includes/layouts/footer.php"); ?>