<?php 
	include_once("includes/session.php");
	include_once("includes/zz.php"); 
    include_once("includes/functions.php");

    confirm_adminlogged_in();

    $logbookId = $_SESSION['commentedit'];

    $getpost = "SELECT * FROM  logbook INNER JOIN reglist ON logbook.logbookMat = reglist.matno INNER JOIN siwespost ON reglist.matno = siwespost.siwesMat WHERE logbookId = '$logbookId' ";
    $thepost = $connection->query($getpost);
?>
<?php require('views/header.php'); ?>

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="white-container mb0">
						<?php while($stdntrow = $thepost->fetch_assoc()){ ?>
							<form method='post' action="models/commented.php?logging=<?php echo $logbookId; ?>&amp;ad=<?php echo $stdntrow['logbookMat']; ?>" class='pb50'>
								<fieldset>
									<legend>Work Done on <?php echo date_format(date_create($stdntrow['logbookDate']), 'l F j, Y');?> by <?php echo ucwords($stdntrow['sname']);?> <?php echo ucwords($stdntrow['fname']);?> <?php echo ucwords($stdntrow['mname']);?></legend>	
										<label>
											Description of Work Done:
										</label>
										<p><?php echo $stdntrow['logbookDesc'];?></p>
										<label>
											Supervisor's Comment:
										</label>
										<textarea name="logbookComment" id="logbookComment" rows='2' required><?php echo $stdntrow['logbookComment'];?></textarea>
                                        <script>
                                            CKEDITOR.replace('logbookComment');
                                        </script>
									<br>
									<input type="submit" name="submit" class="btn btn-default" value='Comment'> <a href="workdone.php?ad=<?php echo $stdntrow['logbookMat'];?>" class="btn btn-primary" >Cancel</a>
								</fieldset>
							</form>
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