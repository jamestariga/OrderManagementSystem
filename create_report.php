<?php error_reporting(0); ?>
<?php require_once 'header.php';
if (isset($_POST['create_report'])) {
    $report_obj->create_report_info($_POST);
}
?>


<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
<div class="container"> 
    <div class="row content">

  <div id="msg" class=""></div>
	
          <div class="col-md-12">
        <form method="post" action="">
            <div class="form-group">
                <label for="email_address">Report Name:</label>
                <input type="text" class="form-control" name="rep_name" id="rep_name" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="contact">Report Author:</label>
                <input type="text" class="form-control" name="rep_author" id="rep_author"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="gender">Report Type:</label>
                <select class="form-control" name="rep_type" id="rep_type">
                    <option value="" selected>Select</option>
					<option value="Number of Orders Processed">Numbers of Orders Processed</option>
					<option value="Total Same Income Generated">Total Sale Income Generated</option>
					<option value="Number of Orders Processed by Employee">Number of Orders Processed by Employee</option>
					<option value="Total Sale Income Processed By Employee">Total Sale Income Processed by Employee</option>
					<option value="Employee Performance Ranking">Employee Performance Ranking</option>
				</select>
            </div> 
            <div class="form-group">
                <label for="country">Report Date:</label>
                <input type="date" name="rep_date" id="rep_date" class="form-control"  maxlength="50">
            </div>
			<center>
            <input type="submit" class="button button-green  pull-right" name="create_report" value="Submit" />
	
			
        </form> 
    </div>
</div>
</div>
</div>
</div>
</div>

<hr/>
<?php
include 'footer.php';
?>
