<?php 
// AUTHOR: ANURAG SINGH
// DOC: 27/01/2015

/**
* Flipkart scrapper
*/
class FlipkartDirectoryScrapper {
	
	// directory url for flipkart
	protected $url;
	public $scrape;

	function __construct($url){
		$this->$url = $url;
	}

	private function curl($url){
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 10.10; labnol;) ctrlq.org");
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$html = curl_exec($curl);
		curl_close($curl);
		return $html;
	}

	// function to load DOM into a page
	private function loadDom(){
		$page = $this->curl($this->url);
		return $page;
	}

	// function to scrape product details on directory
	private function scrape(){
		echo "<script type='text/javascript' src='" . dirname(__FILE__) . "public/js/jquery.js" .'></script>';
		echo "<script type='text/javascript' src='" . dirname(__FILE__) . "flipkart/js/flipkart-directory-scrap.js" .'></script>';
	}


}
?>