<?php 
	// load Frontend-UI here
	// Author: Anurag Singh
	// DOC: 28/01/2015

	/**
	* Public facing script
	*/
	// defining global variables
	$url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
	$url .= $_SERVER['SERVER_NAME'];
	$url .= $_SERVER['REQUEST_URI'];
	$root = $url;
	define('ROOT_URL', $root);

	class IcbPublic{
		
		function __construct(){
			
		}

		public function loadHeader(){
			include_once ROOT_URL . "views/header.html.php";
		}
		public function loadFooter(){
			include_once ROOT_URL . "views/footer.html.php";
		}
		public function loadLandingPage(){

		}
	} //class ends

	$icbPublic = new IcbPublic();
	$icbPublic->loadHeader();
	$icbPublic->loadLandingPage();
	$icbPublic->loadFooter();
?>