$.validate({});
$("#add_customer_form").submit(function(event){
	event.preventDefault();
	if($(this).isValid())
	{
		var customer=$("#customer").val();
		$.ajax({
				url:"form/index.php",
				type:"POST",		
				data:{
					m:"add_customer",
					customer:customer,						
				},
				beforeSend:function(){
					$("#submit").attr("disabled","disabled");
				},
				success:function(result){
					var result=$.parseJSON(result);
					alert(result.m);
					$("#customer").val("");
					$("#submit").removeAttr("disabled");
				},
				error:function(){
					$("#submit").removeAttr("disabled");		
				}
				
			
			})
	}		
		
})
