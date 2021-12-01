<?php  require_once 'header.php';
include 'db_connect.php'; 
if (isset($_POST['create_report'])) {
    $report_obj->create_report_info($_POST);
	} 
	?>

<style>
  textarea{
    resize: none;
  }
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-parcel">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div id="msg" class=""></div>
        <div class="row">
          <div class="col-md-6">
               <div class="form-group">
                <label for="email_address">Report Name:</label>
                <input type="text" class="form-control" name="rep_name" id="rep_name" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="contact">Report Author:</label>
                <input type="text" class="form-control" name="rep_author" id="rep_author"  maxlength="50">
            </div>
          </div>
          <div class="col-md-6">
               <div class="form-group">
                <label for="country">Report Date:</label>
                <input type="date" name="rep_date" id="rep_date" class="form-control"  maxlength="50">
            </div>
              <div class="form-group">
                <label for="" class="control-label">Report Type</label><br>
                <select>
				<option value="1">Numbers of Orders Processed</option>
				<option value="2">Total Sale Income Generated</option>
				<option value="3">Number of Orders Processed by Employee</option>
				<option value="4">Total Sale Income Processed by Employee</option>
				<option value="5">Employee Performance Ranking</option>
				</select>
              </div>
             
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
             <center><h3> report gets generated here,  save button on the bottom will save it to the database and will be accessible in the 'all reports' tab ... or something idk i'll work on it B)</h3><center>
            </div>
          </div>
        </div>
       
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<input type="submit" class="button button-green  pull-right" name="create_report" value="Submit"/>
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=reports">Cancel</a>
  		</div>
  	</div>
	</div>
</div>
