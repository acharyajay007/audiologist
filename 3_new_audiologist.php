<?php 
$page_id=2;
include("connect.php");
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
				<h2 class="text-center tm10">Add details new audiologist</h2>
				<hr/>
				<div class="row">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-10">
				<form class="form-horizontal" action="#" id="new_audiologist_form" name="new_audiologist_form">
				  <div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">Title*</label>
					<div class="col-sm-6">
					  <select name="title" id="title" data-validation="required" data-validation-error-msg="Title required!!" class="form-control" type="text" id="formGroupInputLarge" placeholder="">
						<option value="">Choose</option>
						<option value="Dr">Dr</option>
						<option value="Mr">Mr</option>
						<option value="Ms">Ms</option>
						<option value="Miss">Miss</option>
						<option value="Mrs">Mrs</option>
					  </select>
					</div>	
				  </div>
				  <div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">First name*</label>
					<div class="col-sm-6">
					  <input name="fname" id="fname" class="form-control" data-validation="required" data-validation-error-msg="Firstname required!!" type="text" id="formGroupInputLarge" placeholder="">
					</div>
				  </div>
				  <div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">Surname*</label>
					<div class="col-sm-6">
					 <input name="sname" id="sname" class="form-control" data-validation="required" data-validation-error-msg="Surname required!!" type="text" id="formGroupInputLarge" placeholder="">
					</div>
				  </div>
				  <div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">Clinic*</label>
					<div class="col-sm-6">
					  <select name="shop" id="shop" class="form-control" data-validation="required" data-validation-error-msg="Shop required!!" type="text" id="formGroupInputLarge" placeholder="Large input">
						<option value="">Choose</option>
						<option value="Shop1">Shop 1</option>
						<option value="Shop2">Shop 2</option>
						<option value="Shop3">Shop 3</option>
					  </select>
					</div>
				  </div>
				  <div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">Brand*</label>
					<div class="col-sm-6">
					  <select name="brand" id="brand" class="form-control" data-validation="required" data-validation-error-msg="Brand required!!" type="text" id="formGroupInputLarge" placeholder="Large input">
						<option value="">Choose</option>
						<option value="Bay Audiology">Bay Audiology</option>
						<option value="Dilworth Hearing">Dilworth Hearing</option>
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
					<button name="submit" id="submit" type="submit" class="btn btn-normal pull-right">Save</button>
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
	if($application->page_js!="")
	{
		?>
		<script src="<?php echo $application->page_js; ?>"></script>
		<?php 
	}
?>

  
</body>

</html>
