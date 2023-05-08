<?php 
	include_once("includes/session.php");
	include_once("includes/zz.php"); 
    include_once("includes/functions.php");    
    include_once("models/studentinfo.php");

    confirm_logged_in();

    $theError = $_GET['error'];
    if($theError == 'attachment')
    {
    	$messageError = 'Invalid File.';
    }else if($theError == 'description')
    {
    	$messageError = 'No work done entered.';
    }else{
    	header("Location:mylogbook.php");
    }

    $getlogs = "SELECT * FROM logbook WHERE logbookDelete = '' AND logbookMat = '$matno' ORDER BY logbookId DESC";
    $thelogs = mysql_query($getlogs);

    $serial = 1;
    $inc = 1;
?>
<?php require('views/header.php'); ?>

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="white-container mb0">
						<div class='alert alert-error'>
							<h6><?php echo $messageError; ?></h6>
							<a href='#' class='close fa fa-times'></a>
						</div>
						<div id='thegentable' class='pb90'>
							<h6>All Work Done</h6>
							<a href="#" id='shownew' class="btn btn-default">Add New Work Done</a>

							<?php if(mysql_num_rows($thelogs) < 1) {?>
							<p class='pt20 mb90 pb210'>No Work Done added yet.</p>
							<?php }else{?>
							<table class="table-hover">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Date</th>
										<th>Description</th>
										<th></th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									<?php while($logrow = mysql_fetch_array($thelogs)){ ?>
									<tr>
										<td><?php echo $serial;?></td>				
										<td><?php echo date_format(date_create($logrow['logbookDate']), 'l F j, Y');?></td>
										<td><?php echo $logrow['logbookDesc'];?>
											<?php if($logrow['logbookAttach'] != ''): ?>
												<p><a href='models/downloadfile.php?thedocument=<?php echo $logrow['logbookAttach'];?>' class="btn btn-default" >Download Attachment</a></p><br>							
											<?php endif; ?>
										</td>
										<td><a href="models/logedit.php?log=<?php echo $logrow['logbookId'];?>" class='btn btn-primary fa fa-edit' title='Edit'></a></td>
										<td><a data-href="models/logdelete.php?log=<?php echo $logrow['logbookId'];?>" data-toggle="modal" data-target="#confirm-delete" href="#" class='btn btn-primary fa fa-trash-o' title='Delete'></a></td>
										
										<!-- Modal Confirmation -->
					                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					                            <div class="modal-dialog">
					                                <div class="modal-content">
					                                    <form method='post' class='theform' action=''>
					                                        <div class="modal-header">
					                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                                            <h4 class="modal-title m0">Confirmation</h4>
					                                        </div>
					                                        <div class="modal-body">
					                                            <p class='black'>Are you sure, you want to delete this work done? If Yes, Give a reason below</p>

					                                            <label>Reason</label>
					                                            <textarea required name='reason' id='reason' ></textarea>
					                                        </div>
					                                        <div class="modal-footer">
					                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					                                            <button type="submit" class="btn btn-danger themodal danger">Delete</button>                                                                    
					                                        </div>
					                                    </form>
					                                </div>
					                            </div>
					                        </div>
					                    <!-- End of Modal Confirmation -->

									</tr>
									<?php $serial = $serial + $inc; ?>
									<?php } ?>
								</tbody>
							</table>
							<?php } ?>
						</div>
						<div id='thenew' class='pb60'>
							<form method='post' action="models/newworkdone.php" enctype='multipart/form-data' class='pb50'>
								<fieldset>
									<legend>New Work Done</legend>	
										<label>
											Description of Work Done:
										</label>
										<textarea name="logbookDesc" id="logbookDesc" rows='5' required></textarea>
                                        <script>
                                            CKEDITOR.replace('logbookDesc');
                                        </script>
										<label class='mt20'>
											Attachment where necessary (For your Sketches, Diagrams and Graphs, upload a document with file types .pdf .doc .docx .xls .xlsx, Max Size: 3mb):
										</label>
										<input type="file" name="logbookAttach">
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