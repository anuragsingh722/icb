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
			$flipUrl = "http://www.flipkart.com/automotive/pr?sid=0hx&start=1&ajax=true";
			require dirname(__FILE__) . "/includes/class-flipkart-directory-scrapper.php";
			$flipScrap = new FlipkartDirectoryScrapper($flipUrl);

			// $flipScrap->loadDom();
			// $flipScrap->scrape();
		}
	}

	$icb = new Icb();
?>