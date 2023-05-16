<?php 
	include_once("includes/session.php");
	include_once("includes/zz.php"); 
    include_once("includes/functions.php");

    confirm_adminlogged_in();

    $supervisor = $_SESSION['supervisor'];

    $getstdnts = "SELECT * FROM reglist INNER JOIN siwespost ON reglist.matno = siwespost.siwesMat WHERE siwesOfficer = '$supervisor'";
    $thestdnts = mysql_query($getstdnts);

    $getmystdnts = "SELECT * FROM reglist INNER JOIN siwespost ON reglist.matno = siwespost.siwesMat WHERE siwesOfficer = ''";
    $themystdnts = mysql_query($getmystdnts);

    $getstaff = "SELECT * FROM stafflist WHERE staffId = '$supervisor'";
    $thestaff = mysql_query($getstaff);

    $serial = 1;
    $inc = 1;
?>
<?php require('views/header.php'); ?>

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="white-container mb40">
						<div id='thegentable' class='pb90'>
							<?php while($staffrow = mysql_fetch_array($thestaff)){ ?>
							<h6>All Students of <?php echo ucwords($staffrow['sname']);?> <?php echo ucwords($staffrow['fname']);?> <?php echo ucwords($staffrow['mname']);?></h6>
							<?php } ?>
							<?php if($_SESSION['adminroleid'] == 1):?>
							<a href="#" id='shownew' class="btn btn-default">Add Student</a>
							<?php endif; ?>

							<?php if(mysql_num_rows($thestdnts) < 1) {?>
							<p class='pt20 mb90 pb210'>No Student added yet.</p>
							<?php }else{?>
							<table class="table-hover">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Matric</th>
										<th>Name</th>
										<th>Program</th>
										<th>Level</th>
										<th></th>
										<?php if($_SESSION['adminroleid'] == 1):?>
										<th></th>
										<?php endif; ?>
									</tr>
								</thead>

								<tbody>
									<?php while($stdntrow = mysql_fetch_array($thestdnts)){ ?>
									<tr>
										<td><?php echo $serial;?></td>		
										<td><?php echo $stdntrow['matno'];?></td>							
										<td><?php echo ucwords($stdntrow['sname']);?> <?php echo ucwords($stdntrow['fname']);?> <?php echo ucwords($stdntrow['mname']);?></td>
										<td><?php echo ucwords($stdntrow['program']);?></td>
										<td><?php echo $stdntrow['level'];?></td>
										<td><a href="workdone.php?ad=<?php echo $stdntrow['siwesMat'];?>" class='btn btn-primary'>View Work Done</a></td>
										<?php if($_SESSION['adminroleid'] == 1):?>
										<th><a href="models/deletestudent.php?ad=<?php echo $stdntrow['siwesMat'];?>" class='btn btn-primary fa fa-trash-o' title='Delete'></a></td></th>
										<?php endif; ?>
									</tr>
									<?php $serial = $serial + $inc; ?>
									<?php } ?>
								</tbody>
							</table>
							<?php } ?>
						</div>
						<div id='thenew' class='pb60 mb60'>
							<form method='post' action="models/newstudent.php" class='pb50'>
								<fieldset>
									<legend>New Student</legend>
										<?php if(mysql_num_rows($themystdnts) < 1) {?>
											<p>All students have been assigned a supervisor.</p>
										<?php }else{?>
											<label>
												Student Name:
											</label>		
											<select name='stdntmatno' required>
												<option disabled selected>---Select Student Name---</option>
												<?php while($mystdntsrow = mysql_fetch_array($themystdnts)){ ?>
												<option value='<?php echo $mystdntsrow['matno'];?>'><?php echo ucwords($mystdntsrow['sname']);?> <?php echo ucwords($mystdntsrow['fname']);?> <?php echo ucwords($mystdntsrow['mname']);?></option>
												<?php } ?>
											</select>
											<br>
											<input type="submit" name="submit" class="btn btn-default" value='Save'>
										<?php } ?>
											<a href="#" id='hidenew' class="btn btn-primary" >Cancel</a>
								</fieldset>
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container links-widget">
							<ul>
								<?php if($_SESSION['adminroleid'] == 1){ ?>
								<li><a href="#">Welcome <?php echo $_SESSION['fname'];?></a></li>
								<?php }else{ ?>
								<li class="active"><a href="#">Welcome <?php echo $_SESSION['fname'];?></a></li>
								<?php } ?>
								<?php if($_SESSION['adminroleid'] == 1){ ?>
								<li><a href="dashboard.php">Supervisors</a></li>
								<?php if($_SESSION['supervisor'] != $_SESSION['staffno']){?>
								<li class="active"><a href="assignment.php">Supervisor's Assignments</a></li>
								<?php }else{ ?>
								<li><a href="assignment.php">Supervisor's Assignments</a></li>
								<?php } ?>
								<?php if($_SESSION['supervisor'] != $_SESSION['staffno']){?>
								<li><a href="models/mystudentview.php">My Students</a></li>
								<?php }else{ ?>
								<li class="active"><a href="models/mystudentview.php">My Students</a></li>
								<?php } ?>	
								<?php } ?>								
								<li><a href="models/adminlogout.php">Log Out</a></li>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>