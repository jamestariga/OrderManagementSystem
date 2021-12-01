<?php
 include 'header.php';
 if(isset($_GET['id'])){
  $report_info=$report_obj->delete_report_info_by_id($_GET['id']);
 
     
 }else{
  header('Location: reports.php');
 }
 
 ?>
