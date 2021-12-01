<?php include'db_connect.php'; 
require_once 'header.php';
$report_list = $report_obj->report_list();?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary " href="./index.php?page=create_report"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				 <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="10%">
					<col width="15%">
					<col width="25%">
					<col width="8%">
				</colgroup
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Report Name</th>
						<th>Author</th>
						<th>Date</th>
						<th>Report Type</th>
						<th>Action</th>

	
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$where = "";
					if(isset($_GET['s'])){
						$where = " where status = {$_GET['s']} ";
					}
					if($_SESSION['login_type'] == 3){
						if(empty($where))
							$where = " where ";
						else
							$where .= " and ";
						$where .= " (from_branch_id = {$_SESSION['login_branch_id']} or to_branch_id = {$_SESSION['login_branch_id']}) ";
					}
					$qry = $conn->query("SELECT * from reports $where ");
					while($row= $qry->fetch_assoc()):
					?>
					
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td><b><?php echo ucwords($row['rep_name']) ?></b></td>
						<td><b><?php echo ucwords($row['rep_author']) ?></b></td>
						<td><b><?php echo ucwords($row['rep_date']) ?></b></td>
						<td><b><?php echo ucwords($row['rep_type']) ?></b></td>
					
			<td class="text-right">
				<!--	<center><a href="<?php echo 'read-report-info.php?id=' . $row["rep_id"] ?>" class="button button-green">View</a>
					|| -->
                    <a  href="<?php echo 'delete-report-info.php?id=' . $row["rep_id"] ?>" class="button button-red">Delete</a>  
					</center>
       
                </td>
						</td>
						
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
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.view_parcel').click(function(){
			uni_modal("Parcel's Details","view_parcel.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_parcel').click(function(){
	_conf("Are you sure to delete this parcel?","delete_parcel",[$(this).attr('data-id')])
	})
	})
	function delete_parcel($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_parcel',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>