<?php 
	require_once("includes/session.php");
	require_once("includes/zz.php"); 
    require_once("includes/functions.php"); 

	if(isset($_POST['submit']))
	{
		$matno = $_POST['matno'];
		$fno = $_POST['regno'];

            // Search for matric
            $getstdnt = "SELECT * FROM reglist WHERE matno='$matno' AND fno='$fno'";
			$stdnt = $connection->query($getstdnt);
            confirm_query($connection, $stdnt);

            if($stdnt->num_rows < 1)
            {
            	// Invalid Matric Number
            	$incorrectLogin = 'Matric No. or Reg No. Incorrect';
            }else
            {
            	// Valid Matric Number
            	$_SESSION['matno'] = $matno;
                $_SESSION['is_logged_in'] = true;
            	header("Location:mylogbook.php");
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
										<input type="text" class="form-control" placeholder="Username" name='matno' required >
										<input type="password" class="form-control" placeholder="Password" name='regno' required >
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