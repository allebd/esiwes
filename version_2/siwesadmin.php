<?php 
	include_once("includes/session.php");
	include_once("includes/zz.php"); 
    include_once("includes/functions.php"); 

	if(isset($_POST['submit']))
	{
		$staffno = $_POST['staffno'];
		$sname = $_POST['sname'];

            // Search for staff
            $getstaff = "SELECT * FROM stafflist INNER JOIN staffrole ON stafflist.staffId = staffrole.staffNum WHERE staffId='$staffno' AND sname='$sname'";
            $staff = $connection->query($getstaff);
            confirm_query($connection, $staff);

            if($staff->num_rows < 1)
            {
            	// Invalid staff
            	$incorrectLogin = 'Staff details not found';
            }else
            {
            	// Valid staff
            	$staffrow = $staff->fetch_assoc();
            	$_SESSION['staffRoleId'] = $staffrow['staffRoleId'];
            	$_SESSION['fname'] = $staffrow['fname'];
            	$_SESSION['adminroleid'] = $staffrow['staffRoleNo'];
            	$_SESSION['staffno'] = $staffrow['staffId'];
                $_SESSION['is_adminlogged_in'] = true;
                $adminid = $_SESSION['staffRoleId'];
                $logtime = date('Y-m-d H:i:s');

                $updating = "UPDATE staffrole SET loginTime = '$logtime' WHERE staffRoleId = '$adminid'";
        		$updated = $connection->query($updating);

        		if($_SESSION['adminroleid'] == 1)
                {
                	header("Location:dashboard.php");
                }else
                {
                	header("Location:models/mystudentview.php");
                }
            }
	}
?>
<?php require('views/header.php'); ?>

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="white-container">
						<div class="header-banner">
							<div class="flexslider header-slider">
								<ul class="slides">
									<li>
										<img src="assets/img/transparent.png" alt="">
										<div data-image="assets/img/content/lab.png"></div>
									</li>

									<li>
										<img src="assets/img/transparent.png" alt="">
										<div data-image="assets/img/content/architect.png"></div>
									</li>

									<li>
										<img src="assets/img/transparent.png" alt="">
										<div data-image="assets/img/content/scientist.jpg"></div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container contact-form-widget">
							<h5 class="widget-title">Sign In</h5>

							<div class="widget-content">
								<?php if(isset($incorrectLogin)): ?>
										<div class='alert alert-error'>
											<h6><?php echo $incorrectLogin;?></h6>
											<a href='#' class='close fa fa-times'></a>
										</div>
								<?php endif; ?>
								<form class="mt30" action='' method='POST'>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Staff No." name='staffno' required >
										<input type="password" class="form-control" placeholder="Surname" name='sname' required >
									</div>

									<button type="submit" class="btn btn-default" name='submit'><i class="fa fa-lock"></i> Sign In</button>
								</form>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>