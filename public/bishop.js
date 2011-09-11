jQuery(document).ready(function() {
	
//alert("hey");

jQuery(".foo").live("click", function() {
	
	alert("hey");

	
		$.ajax({
					async: false,
                    type: "PUT",
                    url: '/index.php/people/2',
					
                    success: function(msg) {
                        // do nothing
                        },
                    error: function() {
                        alert("Failed to re-order members!");
                    }
                });

			});

});