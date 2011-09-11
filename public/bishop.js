jQuery(document).ready(function() {
	
	jQuery("form").live("submit", function() {
		if ($(this).attr("method") == "put") {
			$(this).attr("method","post");
			$(this).append('<input type="hidden" name="_method" value="put" />');
		}
	});
	

});