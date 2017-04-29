<?php 
$id=$_SESSION[SITE_SESS."_AUDIOLOGIST_ID"];
$title=$_SESSION[SITE_SESS."_AUDIOLOGIST_TITLE"];
$fname=$_SESSION[SITE_SESS."_AUDIOLOGIST_FIRSTNAME"];
$sname=$_SESSION[SITE_SESS."_AUDIOLOGIST_SURNAME"];
$shop=$_SESSION[SITE_SESS."_AUDIOLOGIST_CLINIC_ID"];
$brand=$_SESSION[SITE_SESS."_AUDIOLOGIST_BRAND_ID"];
$photo=$_SESSION[SITE_SESS."_AUDIOLOGIST_PHOTO"];
?>
<h2 class="text-center tm10">Edit details new audiologist</h2>
<hr/>
<div class="row">
<div class="col-sm-1">

</div>
<div class="col-sm-10">
<form class="form-horizontal" action="#" id="edit_audiologist_form" name="edit_audiologist_form">
  <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Title*</label>
    <div class="col-sm-6">
      <select name="title" id="title" data-validation="required" data-validation-error-msg="Title required!!" class="form-control" type="text"  placeholder="">
		<option value="">Choose</option>
		<option <?php echo ($title=="Dr")?"selected":"" ?> value="Dr">Dr</option>
		<option <?php echo ($title=="Mr")?"selected":"" ?> value="Mr">Mr</option>
		<option <?php echo ($title=="Ms")?"selected":"" ?> value="Ms">Ms</option>
		<option <?php echo ($title=="Miss")?"selected":"" ?> value="Miss">Miss</option>
		<option <?php echo ($title=="Mrs")?"selected":"" ?> value="Mrs">Mrs</option>
	  </select>
    </div>	
  </div>
  <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">First name*</label>
    <div class="col-sm-6">
      <input name="fname" id="fname" class="form-control" data-validation="required" data-validation-error-msg="Firstname required!!" type="text" value="<?php echo $fname ?>"  placeholder="">
    </div>
  </div>
  <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Surname*</label>
    <div class="col-sm-6">
     <input name="sname" id="sname" class="form-control" data-validation="required" data-validation-error-msg="Surname required!!" type="text" value="<?php echo $sname ?>"  placeholder="">
    </div>
  </div>
  <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Shop*</label>
    <div class="col-sm-6">
      <select name="shop" id="shop" class="form-control" data-validation="required" data-validation-error-msg="Shop required!!" type="text"  placeholder="Large input">
		<option value="">Choose</option>
		<option <?php echo ($shop=="Shop1")?"selected":"" ?> value="Shop1">Shop 1</option>
		<option <?php echo ($shop=="Shop2")?"selected":"" ?> value="Shop2">Shop 2</option>
		<option <?php echo ($shop=="Shop3")?"selected":"" ?> value="Shop3">Shop 3</option>
	  </select>
    </div>
  </div>
  <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Brand*</label>
    <div class="col-sm-6">
      <select name="brand" id="brand" class="form-control" data-validation="required" data-validation-error-msg="Brand required!!" type="text"  placeholder="Large input">
		<option value="">Choose</option>
		<option <?php echo ($brand=="Bay Audiology")?"selected":"" ?> value="Bay Audiology">Bay Audiology</option>
		<option <?php echo ($brand=="Dilworth Hearing")?"selected":"" ?> value="Dilworth Hearing">Dilworth Hearing</option>
	  </select>
    </div>
  </div>
  <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Upload Photo</label>
    <div class="col-sm-6">
	  <input name="photo" id="photo" class="hidden" type="file" name="profile_photo">
      <div class="upload-photo">
		<center><img src="img/upload_image.png"/></center>
	  </div>
    </div>
  </div>
   <div class="form-group form-group-lg" style="margin-top:50px;">
  <div class="col-sm-3">
  </div>
  <div class="col-sm-6">
	<button name="submit" id="submit" type="submit" data-audiologist-id="<?php echo $id; ?>" class="btn btn-normal pull-right">Save</button>
  <br/>
   <br/>  
   <br/>  
  <p class="pull-right" style="font-size:12px">* Required</p>
  </div>
  </div>
</form>
</div>
</div>
<?php	if($application->page_js!="")
	{
		?>
		<script src="<?php echo $application->page_js; ?>"></script>
		<?php 
	}
?>
