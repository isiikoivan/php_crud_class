<?php
require('header.php');
$id=$_GET['id'];
$del = new Delete();
 $del->deleting($pdo,$id,'test.php');
?>