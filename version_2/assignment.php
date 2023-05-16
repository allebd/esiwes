<?php 
	include_once("includes/session.php");
	include_once("includes/zz.php"); 
    include_once("includes/functions.php");

    confirm_adminlogged_in();

    $staffno = $_SESSION['staffno'];
    $getadmins = "SELECT * FROM stafflist INNER JOIN staffrole ON stafflist.staffId = staffrole.staffNum WHERE staffdelete = '' AND staffId NOT IN ('$staffno')";
    $theadmins = $connection->query($getadmins);

    $serial = 1;
    $inc = 1;
?>
<?php require('views/header.php'); ?>

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="white-container mb30">
						<div id='thegentable' class='pb90'>
							<h6>All Supervisors</h6>

							<?php if($theadmins->num_rows < 1) {?>
							<p class='pt20 mb90 pb210'>No Supervisor added yet.</p>
							<?php }else{?>
							<table class="table-hover">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Name</th>
										<th>Number of Students</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									<?php while($adminrow = $theadmins->fetch_assoc()){ ?>
									<tr>
										<td><?php echo $serial;?></td>									
										<td><?php echo ucwords($adminrow['sname']);?> <?php echo ucwords($adminrow['fname']);?> <?php echo ucwords($adminrow['mname']);?></td>
										<?php 
											$thestaff = $adminrow['staffNum'];
											$getsdntno = "SELECT * FROM siwespost WHERE siwesOfficer = '$thestaff'";
	    									$thestdnts = $connection->query($getsdntno); 
	    									if($thestdnts)
	    									{
	    										$stdnts = $thestdnts->num_rows; 
	    									}else{
	    										$stdnts = 0;
	    									}
	    								?>
										<td><?php echo $stdnts;?></td>
										<td><a href="models/studentview.php?ad=<?php echo $adminrow['staffNum'];?>" class='btn btn-primary'>View Students</a></td>
									</tr>
									<?php $serial = $serial + $inc; ?>
									<?php } ?>
								</tbody>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container links-widget">
							<ul>
								<li><a href="#">Welcome <?php echo $_SESSION['fname'];?></a></li>
								<li><a href="dashboard.php">Supervisors</a></li>
								<li class="active"><a href="assignment.php">Supervisor's Assignments</a></li>
								<li><a href="models/mystudentview.php">My Students</a></li>
								<li><a href="models/adminlogout.php">Log Out</a></li>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>