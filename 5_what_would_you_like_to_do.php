<?php 
$page_id=4;
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
				<h2 class="text-center tm10">What would you like to do?</h2>
				<hr/>
				<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-2">
					<center>
					<a  data-page-id="6" class="btn btn-round next-page"><img src="img/new_customer.png"></a>
					<br/><br/><a  href="7_add_a_new_customer.php" data-page-id="6"  class="noAnchor selector next-page">Add New Customer</a>
					</center>
				</div>
				<div class="col-sm-1">
					 					
				</div>
				<div class="col-sm-2">
					<center>
					<a data-page-id="5" class="btn btn-round next-page"><img src="img/search_customer.png"></a>
					<br/><br/><a href="6_search_customer.php" data-page-id="5" class="noAnchor selector next-page"> Search Customer</a>
					</center>
				</div>
				<div class="col-sm-3">
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
