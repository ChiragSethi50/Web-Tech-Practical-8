<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
$not_empty=array('menu_name','position','visible');
$errors=array();
foreach($not_empty as $field)
{
 if(!isset($_POST[$field])||empty($_POST[$field]))
 {
 $errors[]="{$field} can't be empty";
 }
}
$field_with_lengths=array('menu_name' => 30);
foreach($field_with_lengths as $fieldname => $max)
{
 if(strlen(trim($_POST['menu_name']))>$max)
 {
 $errors[]="{$fieldname} can't be larger than {$max}";
 }
}
if($errors)
{
 header("Location: new_subject.php");
 exit;
}
?>
<?php
 $menu_name=mysqli_real_escape_string($connection,$_POST['menu_name']);
 $position=mysqli_real_escape_string($connection,$_POST['position']);
 $visible=mysqli_real_escape_string($connection,$_POST['visible']);
 $query="INSERT INTO subjects (menu_name,position,visible) VALUES 
('{$menu_name}',{$position},{$visible})";
 if(mysqli_query($connection,$query))
 {
 header("Location: manage_content.php");
 exit;
 }
 else
 {
 echo "Subject creation failed";
 }?>
<?php mysqli_close($connection); ?>