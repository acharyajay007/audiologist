
$.validate({});
$("#edit_audiologist_form").submit(function(event){
	event.preventDefault();
	if($(this).isValid())
	{
		var title=$("#title").val();
		var fname=$("#fname").val();
		var sname=$("#sname").val();
		var shop=$("#shop").val();
		var brand=$("#brand").val();
		var id=$("#submit").data("audiologist-id");
		$.ajax({
				url:"form/index.php",
				type:"POST",		
				data:{
					m:"edit_audiologist",
					fname:fname,
					sname:sname,
					title:title,
					shop:shop,
					brand:brand,			
					id:id,			
				},
				beforeSend:function(){
					$("#submit").attr("disabled","disabled");
				},
				success:function(result){
					var result=$.parseJSON(result);
					alert(result.m);
					if(result.a==1)
					{
						App.loadPage(result.redirect_page);
					}
					$("#submit").removeAttr("disabled");
				},
				error:function(){
					$("#submit").removeAttr("disabled");		
				}
				
			
			})
	}		
		
})
