<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?phpconfirm_logged_in(); ?>
<?php
if(isset($_GET['subj']))
{
 $sel_subj=$_GET['subj'];
 $sel_page="";
}
else
{
 if(isset($_GET['page']))
 {
 $sel_page=$_GET['page'];
 $sel_subj="";
 }
 else
 {
 $sel_subj="";
 $sel_page="";
 }
}
if($sel_subj)
{
 $sel_subject=find_subject_by_id($sel_subj);
}
if($sel_page)
{
 $sele_page=find_page_by_id($sel_page);
}
?>
<?php include("../includes/layouts/header.php"); ?>
 <div id="main">
 <div id="navigation">
 <br />
<a href="admin.php">&laquo; Main menu</a><br />
 <?php navigation_c($sel_subj,$sel_page); ?>
 <a href="new_subject.php">+Add a new subject</a>
 </div>
 <div id="page">
 <h2>
 <?php
 if(isset($sel_subject["menu_name"]))
 {
 echo $sel_subject["menu_name"];
 }
 else if(isset($sele_page["menu_name"]))
 {
 echo $sele_page["menu_name"];
 }
 else
 {
 echo "Select an option or add it";
 }
 ?>
 </h2>
 <div class="page_content">
 <?php
 if(isset($sele_page["content"]))
 {
 echo $sele_page["content"];
 }
 if($sel_page=='7')
 {
 echo "<a href="."index.php?page=8".">dealer page</a>";
 }
 echo "<br>";
 if($sel_page)
 {
 echo "<a href="."edit_page.php?page=$sel_page ".">Edit 
{$sele_page['menu_name']}</a>";
 }
 if($sel_subj)
 {
 echo "<a href="."edit_subject.php?subject=$sel_subj ".">Edit 
{$sel_subject['menu_name']}</a>";
 }
 ?>
 </div>
 </div>
 </div>
 <?php require("../includes/layouts/footer.php"); ?>