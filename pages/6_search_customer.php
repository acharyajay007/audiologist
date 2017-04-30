<h2 class="text-center tm10">Search customers</h2>
<hr/>
<div class="row">
<div class="col-sm-1">
</div>
<div class="col-sm-10">
<form class="form-horizontal" id="search_customer_form" submit="#" >
  <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Customer Number*</label>
   <div class="col-sm-6">
	 <input class="form-control" type="text" name="customer" id="customer" data-validation="required" data-validation-error-msg="Customer number required!!">
	</div>
	<div class="col-sm-3">
	  <button class="btn btn-normal pull-right" type="submit" name="submit" id="submit">Search</button>
	  <br/>
	   <br/>  
    </div>
  </div>
   <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Search Result</label>
	<ul class="col-sm-6" id="search-container">
		
	</ul>
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
