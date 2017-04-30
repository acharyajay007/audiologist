var App = function() {

    var handleInit = function() {
			$("#page_data_container").on("click","div.upload-photo",function(){
				$(this).parent().children("input[type=file]").click();
			})
			/*$("#page_data_container").on("click","a.next-page",function(){
				var next_page_id=$(this).data("page-id");
				if(next_page_id!=-1)
				{
					loadPage(next_page_id);
				}
			})
			$("#page_data_container").on("click","a.previous-page",function(){
				var previous_page_id=$(this).data("page-id");
				if(previous_page_id!=-1)
				{
					loadPage(previous_page_id);
				}
			});
			$("#page_data_container").on("click","a.view-customer",function(){
			    var page_id=$(this).data("page-id");
			    var customer_id=$(this).data("customer-id");
				viewCustomer(page_id,customer_id);
			});*/
			
	};
	var loadPage=function(page_id)
	{
		$.ajax({
			url:"load_page_ajax.php",
			data:{
				page_id:page_id,
			},
			success:function(result){
				if(result!="")
				{
					$("#page_data_container").html(result);
				}
				else
				{
					alert("Internal Error!");
				}
			},
			error:function(){
				alert("Internal Error!");
			}
		});
	};
	var loadPageURL=function(page_url)
	{
		window.location.href=page_url;
	};
	var viewCustomer=function(page_id,customer_id)
	{
		$.ajax({
			url:"load_page_ajax.php",
			data:{				
				page_id:page_id,
				customer:customer_id,
			},
			success:function(result){
				if(result!="")
				{
					$("#page_data_container").html(result);
				}
				else
				{
					alert("Internal Error!");
				}
			},
			error:function(){
				alert("Internal Error!");
			}
		});
	};
    return {

        init: function() {
            handleInit();  
        },
		loadPage:function(page_id)
		{
			loadPage(page_id);
		},
		loadPageURL:function(page_id)
		{
			loadPageURL(page_id);
		},
		getURLParameter: function(paramName) {
            var searchString = window.location.search.substring(1),
                i, val, params = searchString.split("&");

            for (i = 0; i < params.length; i++) {
                val = params[i].split("=");
                if (val[0] == paramName) {
                    return unescape(val[1]);
                }
            }
            return null;
        },

      
}
}();

jQuery(document).ready(function() {    
   App.init(); 
});