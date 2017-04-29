<?php 
$page_id=3;
include("connect.php");
$id=(isset($_SESSION[SITE_SESS."_AUDIOLOGIST_ID"])&& $_SESSION[SITE_SESS."_AUDIOLOGIST_ID"]!="")?$_SESSION[SITE_SESS."_AUDIOLOGIST_ID"]:"";
$title=$_SESSION[SITE_SESS."_AUDIOLOGIST_TITLE"];
$fname=$_SESSION[SITE_SESS."_AUDIOLOGIST_FIRSTNAME"];
$sname=$_SESSION[SITE_SESS."_AUDIOLOGIST_SURNAME"];
$shop=$_SESSION[SITE_SESS."_AUDIOLOGIST_CLINIC_ID"];
$brand=$_SESSION[SITE_SESS."_AUDIOLOGIST_BRAND_ID"];
$photo=$_SESSION[SITE_SESS."_AUDIOLOGIST_PHOTO"];
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo SITETITLE."-".$application->page_title; ?></title>

    <?php 
		include("include_css.php");
	?>
</head>

<body>

	<div id="page_data_container">
	
    <?php 
		include("top.php");
	?>

    <!-- Page Content -->
    <div class="container">
		<div class="row">
		<div class="col-sm-1 side-navigation side-navigation-left" style="">
			<?php 
				if($previous_page->page_id!="" && $previous_page->page_id!=-1)
				{
			?>
					<a class="previous-page" data-page-id="<?php echo $previous_page->page_id; ?>" href="<?php echo $previous_page->page_url; ?>"><img src="img/left.png"></a>
			<?php 
				}
			?>
		</div>
		<div class="col-sm-10">
        <!-- Jumbotron Header -->
		<ul class="nav nav-tabs pull-right">
		  <li class="active"><a href="#"><?php echo $application->page_title; ?></a></li>
		</ul>
        <div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
			<header class="jumbotron hero-spacer" style="background-color:<?php echo $application->page_template['background_color'] ?>;color:<?php echo $application->page_template['color'] ?>;">				
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
						<label class="col-sm-3 control-label" for="formGroupInputLarge">Clinic*</label>
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
			</header>
		  </div>
		  
		</div>	
		</div>
		
		<div class="col-sm-1 side-navigation side-navigation-right" style="">
			<?php 
			if($next_page->page_id!="" &&  $next_page->page_id!=-1)
			{
			?>
				<a class="next-page" data-page-id="<?php echo $next_page->page_id; ?>" href="<?php echo $next_page->page_url; ?>"><img src="img/right.png"></a>
			<?php 
			}
			?>
		</div>	
		</div>	

    </div>

	<!-- /.container -->
	</div>
<?php 
	include("include_js.php");
?>
  
</body>

</html>

<?php	if($application->page_js!="")
	{
		?>
		<script src="<?php echo $application->page_js; ?>"></script>
		<?php 
	}
?>
