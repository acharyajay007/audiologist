<?php 
session_start();
include('../include/define.php');
include('../include/function.class.php');
include('../include/class.application.php');
$fn=new Functions();
$db=$fn->connect();
$application=new Application();
?>