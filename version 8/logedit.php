<?php 
	include_once("includes/session.php");
	include_once("includes/zz.php"); 
    include_once("includes/functions.php");
    include_once("models/studentinfo.php");  

    confirm_logged_in();

    $logbookId = $_SESSION['mylogid'];

    $getlogs = "SELECT * FROM logbook WHERE logbookId = '$logbookId'";
    $thelogs = mysql_query($getlogs);
?>
<?php require('views/header.php'); ?>

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="white-container mb0">
						<?php while($logrow = mysql_fetch_array($thelogs)){ ?>
							<form method='post' action="models/editworkdone.php?logging=<?php echo $logbookId;?>" enctype='multipart/form-data' class='pb50'>
								<fieldset>
									<legend>Work Done on <?php echo date_format(date_create($logrow['logbookDate']), 'l F j, Y');?></legend>	
										<label>
											Description of Work Done:
										</label>
										<textarea name="logbookDesc" id="logbookDesc" rows='5' required><?php echo $logrow['logbookDesc'];?></textarea>
                                        <script>
                                            CKEDITOR.replace('logbookDesc');
                                        </script>
										<label class='mt20'>
											Update attachment where necessary (For your Sketches, Diagrams and Graphs, upload a document with file types .pdf .doc .docx .xls .xlsx, Max Size: 3mb):
										</label>
										<input type="file" name="logbookAttach">
									<br>
									<input type="submit" name="submit" class="btn btn-default" value='Save'> <a href="mylogbook.php" class="btn btn-primary" >Cancel</a>
								</fieldset>
							</form>
						<?php } ?>
					</div>
				</div>

				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container links-widget">
							<ul>
								<li class="active"><a href="#">Welcome <?php echo ucwords($fname);?></a></li>
								<li><a href="siwes.php">SIWES Settings</a></li>			
								<li><a href="models/logout.php">Log Out</a></li>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>