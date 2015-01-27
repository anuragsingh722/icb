<?php 
define('ROOT_URL', dirname(dirname(__FILE__)));
echo ROOT_URL;
require_once ROOT_URL . "/includes/dbConnect.php";


$arrayToSend = json_decode($_POST['data']);

function saveData($arrayToSend){
	for($i=0;$i<count($arrayToSend);$i++){
		$pid = $arrayToSend[$i][0];
		echo "pid: ".$pid;
		$price = $arrayToSend[$i][1];
		echo "price".$price;
		$image= $arrayToSend[$i][2];
		echo "image".$image;
		$prod = mysql_real_escape_string($arrayToSend[$i][3]);


		$sel = "SELECT id, pid, price FROM icb.`snap_cat` WHERE pid ='$pid'";
		$sql_sel = mysql_query($sel) or die(mysql_error());

		if($arr_sel = mysql_fetch_array($sql_sel)){
			$id = $arr_sel['id'];
			$pid_db = $arr_sel['pid'];
			$price_db = $arr_sel['price'];
			if($price_db != $price){
				$up = "UPDATE icb.`snap_cat` SET price = '$price' WHERE id = '$id'";
				$sql_up = mysql_query($up) or die(mysql_error());
			}

		}
		else{
			$in = "INSERT INTO icb.`snap_cat`(pid, price, prod, image) VALUES('$pid', '$price', '$prod', '$image')";
			$sql_in = mysql_query($in) or die(mysql_error());
		}
	}
}

saveData($arrayToSend);

?>