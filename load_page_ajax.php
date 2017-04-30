<?php 
$page_id=(isset($_REQUEST['page_id']) && $_REQUEST['page_id']!="" && $_REQUEST['page_id']!=-1)?$_REQUEST['page_id']:-1;
if($page_id!=-1)
{
include("connect.php");
include("top.php");
?>

    <!-- Page Content -->
    <div class="container">
		<div class="row">
		<div class="col-sm-1 side-navigation side-navigation-left" style="">
			<?php 
				if($previous_page->page_id!=-1)
				{
			?>
					<a class="previous-page" data-page-id="<?php echo $previous_page->page_id; ?>" data-page-url="<?php echo $previous_page->page_url; ?>"><img src="img/left.png"></a>
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
				<?php include($application->page_url); ?>
			</header>
		  </div>
		  
		</div>	
		</div>
		
		<div class="col-sm-1 side-navigation side-navigation-right" style="">
			<?php 
			if($next_page->page_id!=-1)
			{
			?>
					<a class="next-page" data-page-id="<?php echo $next_page->page_id; ?>" data-page-url="<?php echo $next_page->page_url; ?>"><img src="img/right.png"></a>
			<?php 
			}
			?>
		</div>	
		</div>	

    </div>

	<!-- /.container -->
	<?php 
}
else
{
	
}
