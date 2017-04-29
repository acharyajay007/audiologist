<h2 class="text-center tm10">
Add a new customer
</h2>
<hr/>
<div class="row">
<div class="col-sm-1">
</div>
<div class="col-sm-10">
<form class="form-horizontal" id="add_customer_form">
  <div class="form-group form-group-lg">
    <label class="col-sm-3 control-label" for="formGroupInputLarge">Customer Number*</label>
   <div class="col-sm-6">
	 <input class="form-control" name="customer" id="customer" type="text" id="formGroupInputLarge" placeholder="" data-validation="required,number" data-validation-error-msg="Valid customer number required"/>
	</div>
	<div class="col-sm-3">
	  <button name="submit" name="submit" id="submit" class="btn btn-normal pull-right">Add</button>
	  <br/>
	   <br/>  
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
