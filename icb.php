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
			$this->scrapFlipkart();
		}

		public function scrapFlipkart(){
			$flipUrl = "http://www.flipkart.com/automotive/pr?sid=0hx&ajax=true&start=";
			require dirname(__FILE__) . "/includes/class-flipkart-directory-scrapper.php";
			$flipScrap = new FlipkartDirectoryScrapper($flipUrl);
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