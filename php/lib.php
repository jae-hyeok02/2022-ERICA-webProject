<?php error_reporting(0);

	session_start();

	date_default_timezone_set("Asia/Seoul");

	$db = new PDO("mysql:host=localhost; charset=utf8; dbname=web_diary", "root", "");

	function mq($q, $arr = []){
		global $db;

		$query = $db->prepare($q);
		$query->execute($arr);

		return $query;
	}
?>