<?php 
	include_once("includes/session.php");
	include_once("includes/zz.php"); 
    include_once("includes/functions.php");

    confirm_adminlogged_in();

    $matno = $_GET['ad'];

    $getpost = "SELECT * FROM logbook INNER JOIN reglist ON logbook.logbookMat = reglist.matno INNER JOIN siwespost ON reglist.matno = siwespost.siwesMat WHERE logbookMat = '$matno' ORDER BY logbookId DESC";
    $thepost = $connection->query($getpost);

    $getsiwes = "SELECT * FROM logbook INNER JOIN reglist ON logbook.logbookMat = reglist.matno INNER JOIN siwespost ON reglist.matno = siwespost.siwesMat WHERE siwesMat = '$matno' ORDER BY siwesPostId DESC LIMIT 1";
    $siwespost = $connection->query($getsiwes);

    $serial = 1;
    $inc = 1;
?>
<?php require('views/header.php'); ?>

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="white-container mb0">
						<a href="students.php" class="btn btn-default">View all Students</a>
						<?php while($siwesrow = $siwespost->fetch_assoc()){ ?>
							<h6><?php echo ucwords($siwesrow['sname']);?> <?php echo ucwords($siwesrow['fname']);?> <?php echo ucwords($siwesrow['mname']);?></h6>
							<strong><?php echo $siwesrow['siwesCompName'];?></strong> 
							<p>
								<?php echo $siwesrow['siwesCompAdd'];?>
								<?php if($siwesrow['siwesCompState'] != ''){echo '<br>'.$siwesrow['siwesCompState'];}?>
								<?php echo '<br>'.$siwesrow['siwesCompCountry'];?>
							</p>	
						<?php } ?>
						<?php if($thepost->num_rows < 1) {?>
							<p class='pt20 mb90 pb210'>No Work Done added yet.</p>
						<?php }else{?>
							<table class="table-hover">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Date</th>
										<th>Description</th>
										<th>Comment</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>	
								<?php while($stdntrow = $thepost->fetch_assoc()){ ?>							
									<tr>
										<td><?php echo $serial;?></td>		
										<td><?php echo date_format(date_create($stdntrow['logbookDate']), 'l F j, Y');?></td>
										<td>
											<?php echo $stdntrow['logbookDesc'];?>
											<?php if($stdntrow['logbookAttach'] != ''): ?>
												<p><a href='models/downloadfile.php?thedocument=<?php echo $stdntrow['logbookAttach'];?>' class="btn btn-default" >Download Attachment</a></p><br>							
											<?php endif; ?>
										</td>											
										<td><?php echo $stdntrow['logbookComment'];?></td>
										<td><a href="models/editcomment.php?ad=<?php echo $stdntrow['logbookId'];?>" class='btn btn-primary fa fa-edit' title='Edit Comment'></a></td>										
										<td><a href="models/deletecomment.php?logging=<?php echo $stdntrow['logbookId'];?>&amp;ad=<?php echo $stdntrow['logbookMat']; ?>" class='btn btn-primary fa fa-trash-o' title='Delete Comment'></a></td>
									</tr>
									<?php $serial = $serial + $inc; ?>
								<?php } ?>
								</tbody>
							</table>
						<?php } ?>
					</div>
				</div>

				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container links-widget">
							<ul>
								<li><a href="#">Welcome <?php echo $_SESSION['fname'];?></a></li>								
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
								<?php }else{ ?>	
								<li class="active"><a href="students.php">My Students</a></li>		
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