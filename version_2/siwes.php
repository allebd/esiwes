<?php 
	include_once("includes/session.php");
	include_once("includes/zz.php"); 
    include_once("includes/functions.php");
    include_once("models/studentinfo.php");

    confirm_logged_in();

    $getcountry = "SELECT * FROM countries";
    $thecountry = $connection->query($getcountry);

    $getstate = "SELECT * FROM states";
    $thestate = $connection->query($getstate);

    $getpost = "SELECT * FROM siwespost WHERE siwesMat = '$matno' ORDER BY siwesPostId DESC LIMIT 1";
    $thepost = $connection->query($getpost);
	
    if($thepost)
    {
	    $postrow = $thepost->fetch_assoc();
	}

	$siwesCompName = isset($postrow['siwesCompName']) ? $postrow['siwesCompName'] : '';
	$siwesCompAdd = isset($postrow['siwesCompAdd']) ? $postrow['siwesCompAdd'] : '';
	$siwesCompCountry = isset($postrow['siwesCompCountry']) ? $postrow['siwesCompCountry'] : '';
	$siwesCompState = isset($postrow['siwesCompState']) ? $postrow['siwesCompState'] : '';
	$siwesSupervisor = isset($postrow['siwesSupervisor']) ? $postrow['siwesSupervisor'] : '';
	$siwesSupervisorNo = isset($postrow['siwesSupervisorNo']) ? $postrow['siwesSupervisorNo'] : '';
	$siwesSupervisorSkype = isset($postrow['siwesSupervisorSkype']) ? $postrow['siwesSupervisorSkype'] : '';
	$siwesCompLetter = isset($postrow['siwesCompLetter']) ? $postrow['siwesCompLetter'] : '';
	$siwesStudentSkype = isset($postrow['siwesStudentSkype']) ? $postrow['siwesStudentSkype'] : '';
?>
<?php require('views/header.php'); ?>

	<div id="page-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 page-content">
					<div class="white-container mb0">
						<form method='post' action="models/siwesposting.php" enctype='multipart/form-data'>
							<fieldset>								
								<legend>Company Information</legend>
								<div id='thegentable'>	
									<label>
										Name of Company/Establishment:
									</label>		
									<input type="text" name="siwesCompName" value='<?php echo $siwesCompName;?>' disabled>
									<label>
										Address of Company/Establishment:
									</label>					
									<textarea name="siwesCompAdd" disabled><?php echo $siwesCompAdd;?></textarea>
									<label>
										Country of Company/Establishment:
									</label>
									<input type="text" name="siwesCompCountry" value='<?php echo $siwesCompCountry;?>' disabled>
									<?php if($siwesCompState != ''): ?>
									<label>
										State of Company/Establishment:
									</label>
									<input type="text" name="siwesCompState" value='<?php echo $siwesCompState;?>' disabled>
									<?php endif; ?>
									<label>
										Supervisor Name:
									</label>
									<input type="text" name="siwesSupervisor" value='<?php echo $siwesSupervisor;?>' disabled>
									<label>
										Supervisor Phone No.:
									</label>
									<input type="number" name="siwesSupervisorNo" value='<?php echo $siwesSupervisorNo;?>' disabled>
									<label>
										Supervisor Skype ID:
									</label>
									<input type="text" name="siwesSupervisorSkype" value='<?php echo $siwesSupervisorSkype;?>' disabled><label>
										My Skype ID:
									</label>
									<input type="text" name="siwesStudentSkype" value='<?php echo $siwesStudentSkype;?>' disabled>
									<?php if($siwesCompLetter != ''): ?>
									<a href='models/downloadletter.php?letter=<?php echo $siwesCompLetter;?>' class="btn btn-default mt20 mb20" >Download Offer Letter</a>						
									<?php endif; ?>
									<?php if($siwesCompLetter == ''): ?>
									<label>No Offer Letter Added.</label>						
									<?php endif; ?>
									<br>
									<a href="#" id='shownew' class="btn btn-default">Edit</a>
								</div>
								<div id='thenew'>
									<label>
										Name of Company/Establishment:
									</label>		
									<input type="text" name="siwesCompName" value='<?php echo $siwesCompName;?>' required>
									<label>
										Address of Company/Establishment:
									</label>					
									<textarea name="siwesCompAdd" required><?php echo $siwesCompAdd;?></textarea>
									<label>
										Select Country of Company/Establishment:
									</label>
									<select id="thecountry" name="siwesCompCountry" >
										<option selected value="<?php echo $siwesCompCountry;?>"><?php echo $siwesCompCountry;?></option>
										<?php
											while($countryrow = $thecountry->fetch_assoc())
											{
										?>
										<option value="<?php echo $countryrow['countryname']; ?>"><?php echo $countryrow['countryname']; ?></option>
										<?php		
											}
										?>
									</select>
									<div id="thestate">
										<label>
											Select State of Company/Establishment:
										</label>
										<select name="siwesCompState" >
											<option selected value="<?php echo $postrow['siwesCompState'];?>"><?php echo $siwesCompState;?></option>
											<?php
												while($staterow = $thestate->fetch_assoc())
												{
											?>											
											<option value="<?php echo $staterow['statename']; ?>"><?php echo $staterow['statename']; ?></option>
											<?php		
												}
											?>
										</select>
									</div>
									<label>
										Supervisor Name:
									</label>
									<input type="text" name="siwesSupervisor" value='<?php echo $siwesSupervisor;?>' required>
									<label>
										Supervisor Phone No.:
									</label>
									<input type="number" name="siwesSupervisorNo" value='<?php echo $siwesSupervisorNo;?>' required>
									<label>
										Supervisor Skype ID:
									</label>
									<input type="text" name="siwesSupervisorSkype" value='<?php echo $siwesSupervisorSkype;?>'><label>
										My Skype ID:
									</label>
									<input type="text" name="siwesStudentSkype" value='<?php echo $siwesStudentSkype;?>'>
									<?php if($siwesCompLetter != ''): ?>
									<label>
										Change Offer Letter <span class='bred'>(Max Size: 3MB for file types .pdf .doc .docx)</span>
									</label>						
									<?php endif; ?>
									<?php if($siwesCompLetter == ''): ?>
									<label>
										Attach Offer Letter <span class='bred'>(Max Size: 3MB for file types .pdf .doc .docx)</span>
									</label>						
									<?php endif; ?>
									<input type="file" name="siwesCompLetter">
									<br>
									<input type="submit" name="submit" class="btn btn-default" value='Save'> <a href="#" id='hidenew' class="btn btn-primary" >Cancel</a>
								</div>
							</fieldset>
						</form>
					</div>
				</div>

				<div class="col-sm-4 page-sidebar">
					<aside>
						<div class="widget sidebar-widget white-container links-widget">
							<ul>
								<li><a href="#">Welcome <?php echo ucwords($fname);?></a></li>
								<li><a href="mylogbook.php">My Logbook</a></li>
								<li class="active"><a href="siwes.php">SIWES Settings</a></li>	
								<li><a href="models/logout.php">Log Out</a></li>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div> <!-- end .container -->
	</div> <!-- end #page-content -->

<?php require('views/footer.php'); ?>