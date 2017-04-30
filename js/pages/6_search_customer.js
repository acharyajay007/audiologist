$.validate({});
$("#search_customer_form").submit(function(event){
	event.preventDefault();
	if($(this).isValid())
	{
		var customer=$("#customer").val();
		$.ajax({
				url:"form/index.php",
				type:"POST",		
				data:{
					m:"search_customer",
					customer:customer,						
				},
				beforeSend:function(){
					$("#submit").attr("disabled","disabled");
				},
				success:function(result){
					$("#search-container").html(result);
					$("#submit").removeAttr("disabled");
				},
				error:function(){
					$("#submit").removeAttr("disabled");		
				}
				
			
			})
	}		
		
})
