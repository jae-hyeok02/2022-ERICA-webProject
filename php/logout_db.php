<?php 
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php";
	session_destroy();

	echo "<script>alert('로그아웃 되었습니다.')</script>";
 	echo "<script>location.href = '/'</script>"
 ?>