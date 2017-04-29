<?php 
session_start();
include('include/define.php');
require_once('include/function.class.php');
require_once('include/class.application.php');
$db=new Functions();
$db=$db->connect();
$application=new Application($page_id);
$previous_page=new Application($application->previous_page_id);
$next_page=new Application($application->next_page_id);
?>