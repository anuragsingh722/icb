(function($){
	$(document).ready(function(){
		// scrap all products from the page
		function sendPairs(){
			arrayToSend = [];
			if($('.product_grid_box').length > 0){
				var slider = $('.product_grid_box');
				var sliderLength = slider.length;
				var link;
				var price;
				var PID;
				var prod;
				var image;

				for(i=0;i<sliderLength;i++){
					PID = "";
					price = "";
					prod = "";
					image = "";
					if($('.product_grid_box:eq('+ i +')').find('.product-title').length > 0){
						prod = $('.product_grid_box:eq('+ i +')').find('.product-title a:eq(0)').text().trim();
					}
					if($('.product_grid_box:eq('+ i +')').find('.outerImg').length > 0){
						image = $('.product_grid_box:eq('+ i +')').find('.outerImg img:eq(0)').attr('lazysrc');
					}
					if(image == "" || typeof(image)=="undefined"){
						image = $('.product_grid_box:eq('+ i +')').find('.outerImg img:eq(0)').attr('src');
					}
					if($('.product_grid_box:eq('+ i +')').find('a').length > 0){
						link = $('.product_grid_box:eq('+ i +')').find('a:eq(0)').attr('href');
						if(link.split("void(0)").length > 1){
							link = $('.product_grid_box:eq('+ i +')').find('a:eq(1)').attr('href');

						}
						if(link != ""){ 
							if(link.split("#").length > 1)  {
								link = link.split("#")[0];
							}
							if(link.split("?").length > 1)  {
								link = link.split("?")[0];
							}
							if(link.split("/").length > 1)  {
								link = link.split("/");
								PID = link[link.length -1];
							}
							else{
								link = "";
								PID = "";
							}
						}

						if(PID != ""){
							if(PID != parseInt(PID)){
								PID = "";
							}
						}


						if(PID != ""){
							if($('.product_grid_box:eq('+ i +')').find('.product-price').length > 0){
								if($('.product_grid_box:eq('+ i +')').find('.product-price #price').length > 0){
									price = $('.product_grid_box:eq('+  i +')').find('.product-price #price').text();
									if(price.split("Rs").length > 1){
										price = price.split("Rs");
										price = price[1];
									}
								}
								else if($('.product_grid_box:eq('+ i +')').find('.product-price strike').length > 0){
									if($('.product_grid_box:eq('+  i +')').find('.product-price').html().split('</strike>').length > 1){
										price = $('.product_grid_box:eq('+  i +')').find('.product-price').html().split('</strike>')[1];
										if(price.split("Rs").length > 1){
											price = price.split("Rs");
											price = price[1];
										}
										if(price.split('</div>').length > 1){
											price = price.split('</div')[0];
										}
									}
								}
								else{
									price = $('.product_grid_box:eq('+ i +')').find('.product-price').text();
								}
								if(price.split("Rs").length > 1){
									price = price.split("Rs");
									price = price[1];
								}
								price = price.split(",").join("").trim();

							}
						}

						else{
							price = "";
						} //prce ends
				      } // if 2 ends
				      if(PID != "" && price != ""){
				      	arrayToSend.push([PID, price, image, prod]);
				      	console.log(arrayToSend);
				      }

		    } //for loop ends
		    
		  } //1st if ends
		  arrayToSend = JSON.stringify(arrayToSend);
		}
		// calling the scrap function
		sendPairs();

		// sending ajax request to save-flipkart-data.php
		$.post(root_url+"/snapdeal/save-snapdeal-data.php",{data: arrayToSend});
		// $.post(root_url+"/snapdeal/save-snapdeal-data.php");

	});
})(jQuery);