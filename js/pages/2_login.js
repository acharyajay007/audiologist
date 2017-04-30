$.validate({});
$("#login_audiologist_form").submit(function(event){
	event.preventDefault();
	if($(this).isValid())
	{
		var audiologist=$("#audiologist").val();
		var shop=$("#shop").val();
		var brand=$("#brand").val();
		$.ajax({
				url:"form/index.php",
				type:"POST",		
				data:{
					m:"login_audiologist",
					audiologist:audiologist,
					shop:shop,
					brand:brand,			
				},
				beforeSend:function(){
					$("#submit").attr("disabled","disabled");
				},
				success:function(result){
					var result=$.parseJSON(result);
					alert(result.m);
					if(result.a==1)
					{
						//App.loadPage(result.redirect_page);
						App.loadPageURL(result.redirect_page_url);
					}
					$("#submit").removeAttr("disabled");
				},
				error:function(){
					$("#submit").removeAttr("disabled");		
				}
				
			
			})
	}		
		
})
