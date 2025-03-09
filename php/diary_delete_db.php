<?php 
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php";
	
	$idx = $_GET['idx'];
	
	mq("DELETE FROM `diary` WHERE `idx` = ?", [$idx]);

	echo "<script>alert('일기 삭제가 완료되었습니다.')</script>";
  	echo "<script>location.href = '/diary_view.php'</script>";
 ?>