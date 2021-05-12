<?php
require('crud.php');
$access=new Crud();
$access->dbconnect('localhost','registering','root',"");
$ret =new Retrive();

$del = new Delete();
error_reporting(0);

//$dlting=$del->deleting($access->dbconnect('localhost','registering','root',""),$id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link rel="stylesheet" href="assests/css/bootstrap/bootstrap.min.css" type="text/css">
    <title>hackthone</title>
</head>
<body class="bg-info">