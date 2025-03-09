<?php 
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php";
	
	$idx = $_GET['idx'];
	
	mq("DELETE FROM `project` WHERE `idx` = ?", [$idx]);

	echo "<script>alert('과제 삭제가 완료되었습니다.')</script>";
  	echo "<script>location.href = '/project_alarm.php'</script>";
?>

 