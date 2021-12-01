  <style>
  .mt-2{

	  font-family: geneva;
	  font-size: 1.2rem;
	  
  }
  .dropdown{
width: 100%;
  color: #fff;
  border: none;
  border-bottom: 0.065rem solid #fff;
  outline: none;
background: transparent;
  }
  
  
  
  </style>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
   	<a href="./" class="brand-link">
        <?php if($_SESSION['login_type'] == 1): ?>
          <h3 class="text-center p-0 m-0"><b>ADMIN</b></h3>
          <?php elseif($_SESSION['login_type'] == 2): ?>
            <h3 class="text-center p-0 m-0"><b>STAFF</b></h3>
          <?php else: ?>
            <h3 class="text-center p-0 m-0"><b>USER</b></h3> 
        <?php endif; ?>

    </a>
      
    </div>
	
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>     
          <?php if($_SESSION['login_type'] == 1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_branch">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Branch
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_branch" class="nav-link nav-new_branch tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=branch_list" class="nav-link nav-branch_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_staff">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Branch Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_staff" class="nav-link nav-new_staff tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=staff_list" class="nav-link nav-staff_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if($_SESSION['login_type'] != 3): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_parcel">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			
            <ul class="nav nav-treeview">
              <li class="nav-item">
			          <?php if($_SESSION['login_type'] == 1): ?>
                  <a href="./index.php?page=new_parcel" class="nav-link nav-new_parcel tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Add New</p>
                  </a>
				      	<?php endif; ?>
              </li>

            <li class="nav-item">			  
              <li class="nav-item">
                <a href="./index.php?page=parcel_list" class="nav-link nav-parcel_list nav-small tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List All</p>
                </a>
              </li>
              <?php 
              $status_arr = array("New","Currently Being Processed","Partially Done","Completed","Cancelled");
            foreach($status_arr as $k =>$v):
              ?>
              <li class="nav-item">
                <a href="./index.php?page=parcel_list&s=<?php echo $k ?>" class="nav-link nav-parcel_list_<?php echo $k ?> tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p><?php echo $v ?></p>
                </a>
              </li>  	  
            <?php endforeach; ?>
          <?php endif; ?>
            </ul>
          </li>
           <li class="nav-item dropdown">
            <a href="./index.php?page=track" class="nav-link nav-track">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Track Order
              </p>
            </a>
          </li>  
      <!-- If the user is an admin, they are able to see the 'Reports' button on the sidebar -->
		  <?php if($_SESSION['login_type'] == 1): ?> 
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_parcel">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
		
            <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="./index.php?page=create_report" class="nav-link nav-new_report tree-item">
              <i class="fas fa-angle-right nav-icon"></i>
                <p>Add Report</p>
            </a>
          </li>
			
          <li class="nav-item">
           <a href="./index.php?page=reports" class="nav-link nav-parcel_list nav-small tree-item">
            <i class="fas fa-angle-right nav-icon"></i>
             <p>List All Reports</p>
              </a>
          </li>

			<!-- Customers cannot see the reports button -->
		  <?php endif; ?> 
          </ul>
	
      </nav>
    </div>
  </aside>
