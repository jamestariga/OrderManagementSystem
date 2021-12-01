<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM branches")->num_rows; ?></h3>

                <p>Total Branches</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels")->num_rows; ?></h3>

                <p>Total Parcels</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM users where type != 1")->num_rows; ?></h3>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <hr>
          <?php 
              $status_arr = array("New", "Currently Being Processed", "Partially Completed", "Completed", "Cancelled");
               foreach($status_arr as $k =>$v):
          ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels where status = {$k} ")->num_rows; ?></h3>

                <p><?php echo $v ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
            <?php endforeach; ?>
      </div>

<?php elseif($_SESSION['login_type'] == 2): ?> <!-- I added this section: basically if a Staff member (login type '2') has logged in, it'll just show "Welcome Staff (name)" on the homepage -->
	 <div class="col-12">
			  <div class="card">
				<div class="card-body">
					Welcome Staff <?php echo $_SESSION['login_name'] ?>!
				</div>
			  </div>
		  </div>


<?php else: ?> <!-- I edited this section so that if the login type is not 1 or 2 (basically 3, the customer type) then it'll show "Welcome User (name)" on the homepage -->
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome User <?php echo $_SESSION['login_email'] ?>!
          	</div>
          </div>
      </div>
          
<?php endif; ?>
