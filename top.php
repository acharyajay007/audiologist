<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top custom-nav" role="navigation">
        <div class="">
        <div class="row">
		
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header  col-sm-2">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo SITETITLE ?>
				
				</a>
				
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php 
						if($application->page_toolbar)
						{
				?>               
			   <ul class="nav navbar-nav navbar-left col-sm-7">
					

                    <li>
                        <a href="7_add_a_new_customer.php"  class="next-page" data-page-id="6" >New Customer</a>
                    </li>
                    <li>
                        <a href="6_search_customer.php" class="next-page" data-page-id="5">Search Customer</a>
                    </li>   					
					
                    
                </ul>
				 <ul class="nav navbar-nav col-sm-3">
					
                   
					<li class="pull-right">
                        <a href="logout.php">Logout</a>
                    </li>
					<li class="pull-right">
                        <a href="4_edit_audiologist.php" class="next-page" data-page-id="3">Audiologist Details</a>
                    </li>
				
                    
                </ul>
					<?php 
						}
					?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        </div>
		<div class="folder-point"></div>
        <!-- /.container -->
    </nav>