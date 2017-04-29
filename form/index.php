<?php 
include("connect.php");
$mode=(isset($_REQUEST['m']))?$_REQUEST['m']:"";
if($mode!="")
{
	if($mode=='register_audiologist')
	{
		$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:"";
		$sname=isset($_REQUEST['sname'])?$_REQUEST['sname']:"";
		$title=isset($_REQUEST['title'])?$_REQUEST['title']:"";
		$shop=isset($_REQUEST['shop'])?$_REQUEST['shop']:"";
		$brand=isset($_REQUEST['brand'])?$_REQUEST['brand']:"";
		if($fname!="" && $sname!="" && $title!="" && $shop!="" && $brand!="")
		{
			
			$isRegistered=$application->register($title,$fname,$sname,$shop,$brand,"");
			if($isRegistered)
			{
				$reply=array("a"=>1,"m"=>"Audiologist registered!!","redirect_page"=>1,"redirect_page_url"=>"2_login.php");
				echo json_encode($reply);	
			}
			else
			{
				$reply=array("a"=>0,"m"=>"Duplication Audiologist Record Found!!");
				echo json_encode($reply);	
			}
		}
		else
		{
			$reply=array("a"=>0,"m"=>"Required Information not found!!");
			echo json_encode($reply);
		}
	}
	else if($mode=='edit_audiologist')
	{
		$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:"";
		$sname=isset($_REQUEST['sname'])?$_REQUEST['sname']:"";
		$title=isset($_REQUEST['title'])?$_REQUEST['title']:"";
		$shop=isset($_REQUEST['shop'])?$_REQUEST['shop']:"";
		$brand=isset($_REQUEST['brand'])?$_REQUEST['brand']:"";
		$id=isset($_REQUEST['id'])?$_REQUEST['id']:"";
		if($fname!="" && $sname!="" && $title!="" && $shop!="" && $brand!="" && $id!="")
		{
			
			$isUpdated=$application->editProfile($id,$title,$fname,$sname,$shop,$brand,"");
			if($isUpdated)
			{
				$reply=array("a"=>1,"m"=>"Audiologist profile updated!!","redirect_page"=>4,"redirect_page_url"=>"5_what_would_you_like_to_do.php");
				echo json_encode($reply);	
			}
			else
			{
				$reply=array("a"=>0,"m"=>"Duplication Audiologist Record Found!!");
				echo json_encode($reply);	
			}
		}
		else
		{
			$reply=array("a"=>0,"m"=>"Required Information not found!!");
			echo json_encode($reply);
		}
	}
	else if($mode=="login_audiologist")
	{
		$audiologist=isset($_REQUEST['audiologist'])?$_REQUEST['audiologist']:"";
		$shop=isset($_REQUEST['shop'])?$_REQUEST['shop']:"";
		$brand=isset($_REQUEST['brand'])?$_REQUEST['brand']:"";
		if($audiologist!="" && $shop!="" && $brand!="")
		{
			
			$isLoggedIn=$application->login($audiologist,$shop,$brand);
			if($isLoggedIn)
			{
				$reply=array("a"=>1,"m"=>"Logged In Successfully!!","redirect_page"=>4,"redirect_page_url"=>"5_what_would_you_like_to_do.php");
				echo json_encode($reply);	
			}
			else
			{
				$reply=array("a"=>0,"m"=>"No Record Found!!");
				echo json_encode($reply);	
			}
		}
		else
		{
			$reply=array("a"=>0,"m"=>"Required Information Not Found!!");
			echo json_encode($reply);
		}
	}
	else if($mode=="add_customer")
	{
		$customer=isset($_REQUEST['customer'])?$_REQUEST['customer']:"";
		$audiologist_id=isset($_SESSION[SITE_SESS."_AUDIOLOGIST_ID"])?$_SESSION[SITE_SESS."_AUDIOLOGIST_ID"]:"";
		$selected_clinic=isset($_SESSION[SITE_SESS."_SELECTED_AUDIOLOGIST_CLINIC"])?$_SESSION[SITE_SESS."_SELECTED_AUDIOLOGIST_CLINIC"]:"";
		$selected_brand=isset($_SESSION[SITE_SESS."_SELECTED_AUDIOLOGIST_BRAND"])?$_SESSION[SITE_SESS."_SELECTED_AUDIOLOGIST_BRAND"]:"";
		if($customer!="")
		{
			
			$isCustomerAdded=$application->addCustomer($customer,$audiologist_id,$selected_clinic,$selected_brand);
			if($isCustomerAdded)
			{
				$reply=array("a"=>1,"m"=>"Customer Added Successfully!!");
				echo json_encode($reply);	
			}
			else
			{
				$reply=array("a"=>0,"m"=>"Duplicate Record Found!!");
				echo json_encode($reply);	
			}
		}
		else
		{
			$reply=array("a"=>0,"m"=>"Required Information Not Found!!");
			echo json_encode($reply);
		}
	}
	else if($mode=="search_customer")
	{
		$customer=isset($_REQUEST['customer'])?$_REQUEST['customer']:"";
		if($customer!="")
		{
			
			$customers=$application->searchCustomer($customer);
			if(!empty($customers))
			{
				foreach($customers as $customer )
				{
					?>
					<li class="list-group-item noBorder"><a class="noAnchor selector view-customer" data-page-id="7" href="8_customer_profile.php?customer=<?php echo $customer ?>" data-customer-id="<?php echo $customer ?>"><?php echo $customer ?></a></li>
					<?php 
				}				
			}
			else
			{
				?>
				<li class="list-group-item">No Result Found!!</li>
				<?php 
			}
		}
		else
		{
			$reply=array("a"=>0,"m"=>"Required Information Not Found!!");
			echo json_encode($reply);
		}
	}
	else
	{
		$reply=array("a"=>0,"m"=>"Internal Error!!");
		echo json_encode($reply);
	}
	
}
else
{
	$reply=array("a"=>0,"m"=>"Internal Error!!");
	echo json_encode($reply);
}

?>