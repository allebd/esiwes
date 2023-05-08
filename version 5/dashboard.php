<?php 
	include_once("includes/session.php");
	include_once("includes/zz.php"); 
    include_once("includes/functions.php");

    confirm_adminlogged_in();

    $staffno = $_SESSION['staffno'];
    $getadmins = "SELECT * FROM stafflist INNER JOIN staffrole ON stafflist.staffno = staffrole.staffNum INNER JOIN roles ON staffrole.staffRoleNo = roles.roleId WHERE staffdelete = '' AND staffno NOT IN ('$staffno')";
    $theadmins = mysql_query($getadmins);

    $getroles = "SELECT * FROM roles";
    $theroles = mysql_query($getroles);

    $getstaff = "SELECT * FROM stafflist WHERE staffno NOT IN ('$staffno')";
    $thestaff = mysql_query($getstaff);

    $serial = 1;
    $inc = 1;
?>
<?php require('views/header.php'); ?>

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="white-container mb0">
						<div id='thegentable' class='pb90'>
							<h6>All Supervisors</h6>
							<a href="#" id='shownew' class="btn btn-default">Add New Supervisor</a>

							<?php if(mysql_num_rows($theadmins) < 1) {?>
							<p class='pt20 mb90 pb210'>No Supervisor added yet.</p>
							<?php }else{?>
							<table class="table-hover">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Name</th>
										<th>Role</th>
										<th>Last Login</th>
										<th></th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									<?php while($adminrow = mysql_fetch_array($theadmins)){ ?>
									<tr>
										<td><?php echo $serial;?></td>									
										<td><?php echo ucwords($adminrow['sname']);?> <?php echo ucwords($adminrow['fname']);?> <?php echo ucwords($adminrow['mname']);?></td>
										<td><?php echo ucwords($adminrow['roleName']);?></td>
										<td><?php echo $adminrow['loginTime'];?></td>
										<td><a href="models/adminedit.php?ad=<?php echo $adminrow['staffRoleId'];?>" class='btn btn-primary fa fa-edit' title='Edit'></a></td>
										<td><a href="models/admindelete.php?ad=<?php echo $adminrow['staffRoleId'];?>" class='btn btn-primary fa fa-trash-o' title='Delete'></a></td>
									</tr>
									<?php $serial = $serial + $inc; ?>
									<?php } ?>
								</tbody>
							</table>
							<?php } ?>
						</div>
						<div id='thenew' class='pb60'>
							<form method='post' action="models/newadmin.php" class='pb50'>
								<fieldset>
									<legend>New Supervisor</legend>	
										<label>
											Staff Name:
										</label>
										<select name='staff' required>
											<option disabled selected>---Select Staff Type---</option>
											<?php while($staffrow = mysql_fetch_array($thestaff)){ ?>
											<option value='<?php echo $staffrow['staffno'];?>'><?php echo ucwords($staffrow['sname']);?> <?php echo ucwords($staffrow['fname']);?> <?php echo ucwords($staffrow['mname']);?></option>
											<?php } ?>
										</select>
										<label>
											Role:
										</label>		
										<select name='role' required>
											<option disabled selected>---Select Role Type---</option>
											<?php while($rolerow = mysql_fetch_array($theroles)){ ?>
											<option value='<?php echo $rolerow['roleId'];?>'><?php echo $rolerow['roleName'];?></option>
											<?php } ?>
										</select>
									<br>
									<input type="submit" name="submit" class="btn btn-default" value='Save'> <a href="#" id='hidenew' class="btn btn-primary" >Cancel</a>
								</fieldset>
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container links-widget">
							<ul>
								<li class="active"><a href="#">Welcome <?php echo $_SESSION['fname'];?></a></li>
								<li><a href="assignment.php">Supervisor Assignments</a></li>
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