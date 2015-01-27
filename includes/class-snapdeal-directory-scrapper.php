<?php 
// AUTHOR: ANURAG SINGH
// DOC: 27/01/2015

/**
* Snapdeal scrapper
*/
class SnapdealDirectoryScrapper {
	
	// directory url for Snapdeal
	protected $url;
	public $scrape;

	function __construct($url){
		$this->$url = $url;
		$this->loadDom($url);
		$this->scrape();
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
	private function loadDom($url){
		$complete_page = "";
		$start = 1;
		$ping_url = $url.$start;
		$page = $this->curl($ping_url);
		while($page){
			$start+=20;
			$ping_url = $url.$start;
			$page = $this->curl($ping_url);
			$complete_page .= $page;
		}
		echo $complete_page;
	}

	// function to scrape product details on directory
	private function scrape(){
		echo "<script type='text/javascript'>".
		"var root_url = '".ROOT_URL."';".
		"</script>";
		echo "<script type='text/javascript' src='" . ROOT_URL . "/public/js/jquery.js" ."'></script> \n";
		echo "<script type='text/javascript' src='" . ROOT_URL . "/snapdeal/js/snapdeal-directory-scrap.js" ."'></script>";
	}
}
?>