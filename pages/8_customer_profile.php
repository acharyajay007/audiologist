<?php 
if(isset($_REQUEST['customer']) && $_REQUEST['customer']!="")
{
	$customer=$_REQUEST['customer'];
	$customer_info=$application->rp_getData("customer","*","number='".$customer."'");
	if($customer_info)
	{
		$customer_info=mysql_fetch_assoc($customer_info);
?>
	
<h2 class="text-center tm10">Customer Profile</h2>
<hr/>
<div class="row">
<div class="col-sm-1">
</div>
<div class="col-sm-10">
<form class="form-horizontal">
  <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Customer Number*</label>
   <div class="col-sm-6">
	<label class="col-sm-3 control-label" for="formGroupInputLarge"><?php echo $customer_info['number'] ?></label>
	</div>
	
  </div>
 <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Previous Test</label>
   <div class="col-sm-8 list-group">
	<label class="col-sm-3 control-label" for=""><a class="next-page notAnchor selector" data-page-id="8">Consultation</a>&nbsp;</label>
	<label class="col-sm-3 control-label" for="formGroupInputLarge"><a class="notAnchor selector">Fitting</a>&nbsp;</label>&nbsp;
	<label class="col-sm-3 control-label" for="formGroupInputLarge"><a class="notAnchor selector">Check up</a></label>
	</div>
	
  </div>
 
</form>
</div>
</div>
<?php 
	}
}
?>