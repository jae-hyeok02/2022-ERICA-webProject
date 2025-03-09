<?php INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php"; 

	$intro = $_POST['user_intro'];
	$user_id = $_POST['user_id'];

	mq("UPDATE `user` SET `user_intro` = ? WHERE `user_id` = ?", [
		$intro,
		$user_id
	]);

	echo "<script>alert('한줄 소개 수정이 완료되었습니다.')</script>";
	echo "<script>location.href = '/'</script>";
?>

