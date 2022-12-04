	<?php include("header.php");?>
				<div class="row justify-content-center">
				<div class="col-lg-6">
							<?php if(isset($_GET['updated'])){?>
							<div class="alert alert-info">
								Profile Information Updated!
							</div>
							<?php } ?>
		                    <form method="post">
                             <?php while($val = $account->fetch_object()){	?>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name</label> 
                                <div class="col-8">
                                  <input id="name" name="fname" value="<?php echo $val->firstname;?>" class="form-control here" type="text">
                                </div>
                              </div>
							  <br>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label> 
                                <div class="col-8">
                                  <input id="lastname" name="lastname" value="<?php echo $val->lastname;?>" class="form-control here" type="text">
                                </div>
                              </div>
							  <br> 
							  <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Mobile Number</label> 
                                <div class="col-8">
                                  <input id="lastname" name="contact" value="<?php echo $val->contact;?>" class="form-control here" type="text">
                                </div>
                              </div>
							  <br> 
							  <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Address</label> 
                                <div class="col-8">
                                  <textarea name="address" value="" class="form-control here" type="text"><?php echo $val->address;?></textarea>
                                </div>
                              </div>
							  <br>
                             <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">User Name </label> 
                                <div class="col-8">
                                  <input id="username" name="username" value="<?php echo $val->username;?>" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                             <br>
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label"> Password</label> 
                                <div class="col-8">
                                  <input id="newpass" name="password" value="<?php echo $val->password;?>" class="form-control here" type="password">
                                </div>
                              </div> 
							    <br>
							
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="update-profile" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                            </form>
							<hr>
							<form method ="post"  enctype="multipart/form-data">
								<h4><b> Verification Documents </b></h4>
								<div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label"> Upload Valid ID (e.g Driver's License ,National ID , etc.) 
								</label> 
                                <div class="col-8">
								  <?php if($val->valid_id !="") { ?>  <a href="../admin/assets/documents/<?php echo $val->valid_id;?>" target="_blank"> <b> VIEW FILE - <?php echo $val->valid_id;?> </b></a> <?php } ?>
                                  <input id="file" name="valid_id"  class="form-control here" type="file">
                                  <input name="valid_id1"  class="form-control here" type="hidden" value="<?php echo $val->valid_id;?>">
                                </div>
                                </div> 
								<div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">Business Permit</label> 
                                <div class="col-8">
								  <?php if($val->business_permit !="") { ?>  <a href="../admin/assets/documents/<?php echo $val->business_permit;?>" target="_blank"> <b> VIEW FILE - <?php echo $val->business_permit;?> </b></a> <?php } ?>
                                  <input id="file" name="business_permit"  class="form-control here" type="file">
                                  <input name="business_permit1"  class="form-control here" type="hidden" value="<?php echo $val->business_permit;?>">
                                </div>
                                </div>
								<div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">Upload any pictures of you containing latest date</label> 
                                <div class="col-8">
								  <?php if($val->proof !="") { ?>  <a href="../admin/assets/documents/<?php echo $val->proof;?>" target="_blank"> <b> VIEW FILE - <?php echo $val->proof;?> </b></a> <?php } ?>
                                  <input id="file" name="proof"  class="form-control here" type="file">
                                  <input name="proof1"  class="form-control here" type="hidden" value="<?php echo $val->proof;?>">
                                </div>
                                </div> 
								  <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="update-verification" type="submit" class="btn btn-primary">Update Verification</button>
                                </div>
                              </div>
						</form>
						 <?php } ?>
            </div>
        </div>
     
    </div>
   
	<?php include("footer.php");?>