(function($){
	$(document).ready(function(){
		// scrap all products from the page
		function sendPairs(){
			console.log("hello dude");
		}
		// calling the scrap function
		sendPairs();

		// sending ajax request to save-flipkart-data.php
		// $.post(root_url+"/snapdeal/save-snapdeal-data.php",{data: arrayToSend});
		$.post(root_url+"/snapdeal/save-snapdeal-data.php");

	});
})(jQuery);