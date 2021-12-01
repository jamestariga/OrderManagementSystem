<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary " href="./index.php?page=new_parcel"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
			
		
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup> -->
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Reference Number</th>
						<th>Sender Name</th>
						<th>Recipient Name</th>
						<th>Status</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$month = "";
					if(rep_month = "jan") {
						$month = "2021-01-01 AND 2021-01-31";
					} elseif(rep_month = "feb") {
						$month = "2021-02-01 AND 2021-01-28";
					} elseif(rep_month = "mar") {
						$month = "2021-03-01 AND 2021-03-31";
					} elseif(rep_month = "apr") {
						$month = "2021-04-01 AND 2021-01-30";
					} elseif(rep_month = "may") {
						$month = "2021-05-01 AND 2021-05-31";
					} elseif(rep_month = "jun") {
						$month = "2021-06-01 AND 2021-01-30";
					} elseif(rep_month = "jul") {
						$month = "2021-07-01 AND 2021-07-31";
					} elseif(rep_month = "aug") {
						$month = "2021-08-01 AND 2021-08-31";
					} elseif(rep_month = "sep") {
						$month = "2021-09-01 AND 2021-09-30";
					} elseif(rep_month = "oct") {
						$month = "2021-10-01 AND 2021-10-30";
					} elseif(rep_month = "nov") {
						$month = "2021-11-01 AND 2021-11-30";
					} else {
						$month = "2021-12-01 AND 2021-12-31";
					

					?>
					<?php
					$i = 1;
					$where = "";
					if(isset($_GET['s'])){
						$where = " where status = {$_GET['s']} ";
					}
					if($_SESSION['login_type'] != 1 ){
						if(empty($where))
							$where = " where ";
						else
							$where .= " and ";
						$where .= " (from_branch_id = {$_SESSION['login_branch_id']} or to_branch_id = {$_SESSION['login_branch_id']}) ";
					}
					$qry = $conn->query("SELECT * from parcels where date_created BETWEEN '2021-04-01' AND '2021-04-31'");
					while($row= $qry->fetch_assoc()):
					?>

					
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td><b><?php echo ($row['reference_number']) ?></b></td>
						<td><b><?php echo ucwords($row['sender_name']) ?></b></td>
						<td><b><?php echo ucwords($row['recipient_name']) ?></b></td>
						<td class="text-center">
							<?php 
							switch ($row['status']) {
								case '1':
									echo "<span class='badge badge-pill badge-info'>New</span>";
									break;
								case '2':
									echo "<span class='badge badge-pill badge-info'>Currently Being Processed</span>";
									break;
								case '3':
									echo "<span class='badge badge-pill badge-primary'>Partially Completed</span>";
									break;
								case '4':
									echo "<span class='badge badge-pill badge-primary'>Completed</span>";
									break;
								case '5':
									echo "<span class='badge badge-pill badge-primary'>Cancelled</span>";
									break;
				
								default:
									echo "<span class='badge badge-pill badge-info'>New</span>";
									
									break;
							}

							?>
						</td>
						<td><b><?php echo ($row['date_created']) ?></b></td>
						
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>
