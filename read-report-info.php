<?php
 include 'header.php';
 

 if(isset($_GET['id'])){
  $report_info=$report_obj->view_report_by_rep_id($_GET['id']);
  


     
 }else{
  header('Location: index.php');
 }
 
 
 ?>
<div class="container " > 
 <div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
<div class="container"> 
    <div class="row content">   
  <div class="row content">

       
          
           
             <a  href="index.php"  class="button button-purple mt-12 pull-right">View report List</a> 
     
 <h3>View report Info</h3>
       
    
     <hr/>
   
   
 
      
    <label>Report ID:</label>
   <?php  if(isset($report_info['rep_id'])){echo $report_info['rep_id']; }?>

<br/>
    <label>Report Name:</label>
  <?php  if(isset($report_info['rep_name'])){echo $report_info['rep_name'];} ?>
    
    <br/>
    <label >Report Author:</label>
      <?php  if(isset($report_info['rep_author'])){echo $report_info['rep_author'];} ?>
    <br/>

  <label >Report Type</label>
   <?php  if(isset($report_info['rep_type'])){echo $report_info['rep_type'];} ?>
  <br/>
    <label >Report Date:</label>
      <?php  if(isset($report_info['rep_date'])){echo $report_info['rep_date'];} ?>
    <br/>

          

    <a href="<?php echo 'update-report-info.php?id='.$report_info["rep_id"] ?>" class="button button-blue">Edit</a>

   
  
     
   
  </div>
     
</div>
<hr/>
 <?php
 include 'footer.php';
 ?>

