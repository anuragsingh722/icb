(function($){
	$(document).ready(function(){
		// scrap all products from the page
		function sendPairs(){
			arrayToSend = [];
			var slider = $('.product-unit');
			var sliderLength = slider.length;
			var link;
			var price;
			var image;
			var prod;
			for(i=0;i<sliderLength;i++){
				price = "";
				PID = "";
				image = "";
				prod = "";
				if($('.product-unit:eq(' + i + ')').find('.pu-visual-section img').length > 0){
					image = $('.product-unit:eq(' + i + ')').find('.pu-visual-section img').attr('src');
				}
				if($('.product-unit:eq(' + i + ')').find('.pu-title').length > 0){
					prod = $('.product-unit:eq(' + i + ')').find('.pu-title').text().trim();
					if(prod.split("...").length > 1){
						prod = $('.product-unit:eq(' + i + ')').find('.pu-title a').attr('title').trim();

					}
				}
				var link = $('.product-unit:eq(' + i + ')').find('a:eq(0)').attr("href");
				if(link !=undefined){
					link = link.split("pid=")[1];
					if(link != undefined){
						PID = link.split("&")[0];
						if($('.product-unit:eq(' + i + ')').find('.more-listing-options .fk-bold').length > 0){
							price = $('.product-unit:eq(' + i + ')').find('.more-listing-options .fk-bold:eq(0)').text().trim();
							if(price.split("Rs.").length > 1){
								price = price.split("Rs.")[1];
							}
							if(price.split("Rs").length > 1){
								price = price.split("Rs")[1];
							}
							price = price.split(",").join("").trim();
						}
						else if($('.product-unit:eq(' + i + ')').find('.pu-final').length > 0){
							price = $('.product-unit:eq(' + i + ')').find('.pu-final').text().split(",").join("").trim();
							if(price.split("Rs.").length > 1){
								price = price.split("Rs.")[1];
							}
							else if(price.split("Rs").length > 1){
								price = price.split("Rs")[1];
							}
						}
						else{
							price = "";
						}

						price = parseFloat(price);
						arrayToSend.push([PID, price, image, prod]);
					}
				}
			} 
			window.result = arrayToSend.slice();
			arrayToSend = JSON.stringify(arrayToSend);
			console.log(arrayToSend);
		}
		// calling the scrap function
		sendPairs();

		// sending ajax request to save-flipkart-data.php
		$.post(root_url+"/flipkart/save-flipkart-data.php",{data: arrayToSend});

	});
})(jQuery);