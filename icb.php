<?php 
// 
// Author: Anurag Singh
// DOC: 27/01/2015
	/**
	* Init Class for website
	*/
	class Icb {
		
		function __construct(){
			// scraping flipkart
			// $this->scrapFlipkart();

			// scrapping snapdeal
			$this->scrapSnapdeal();
		}

		public function scrapFlipkart(){
			$flipUrl = "http://www.flipkart.com/automotive/pr?sid=0hx&ajax=true&start=";
			require dirname(__FILE__) . "/includes/class-flipkart-directory-scrapper.php";
			$flipScrap = new FlipkartDirectoryScrapper($flipUrl);
		}

		public function scrapSnapdeal(){
			// snapdeal helmets
			// http://www.snapdeal.com/products/automotive-helmets?sort=plrty&start=

			// snapdeal bike accessory
			// http://www.snapdeal.com/products/automotive-bike-accessories?sort=plrty&start=

			// snapdeal car audio and gps
			// http://www.snapdeal.com/products/automotive-car-audio-video?sort=plrty&start=

			// snapdeal car accessory
			// http://www.snapdeal.com/products/automotive-car-interior?sort=plrty&start=

			// snapdeal tyres and alloys
			// http://www.snapdeal.com/products/automotive-car-wheels-tyres?sort=plrty&start=

			// Snapdeal car care
			// http://www.snapdeal.com/products/automotive-car-care?sort=plrty&start=

			// Snapdeal Parts and Spares
			// http://www.snapdeal.com/products/automotive-car-care?sort=plrty&start=

			$snapUrl = "http://www.snapdeal.com/products/automotive-helmets?sort=plrty&start=";
			$snapUrl2 = "http://www.snapdeal.com/products/automotive-bike-accessories?sort=plrty&start=";
			require dirname(__FILE__) . "/includes/class-snapdeal-directory-scrapper.php";
			$snapScrap = new SnapdealDirectoryScrapper($snapUrl2);
		}
	}

	// defining global variables
	$url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
	$url .= $_SERVER['SERVER_NAME'];
	$url .= $_SERVER['REQUEST_URI'];
	$root = dirname($url);
	define('ROOT_URL', $root);

	$icb = new Icb();
	?>