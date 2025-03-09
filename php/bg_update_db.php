<?php INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php"; 

	$user_id = $_POST['user_id'];

	$filename = $_FILES['uploadedFile']['name'];
	$dir = $_SERVER['DOCUMENT_ROOT']."/css/image/";
	$tmpName = $_FILES['uploadedFile']['tmp_name'];

	move_uploaded_file($tmpName, $dir.$filename);

	mq("UPDATE `user` SET `intro_img` = ? WHERE `user_id` = ?", [
		$filename,
		$user_id
	]);

	echo "<script>alert('다이어리 표지 수정이 완료되었습니다.')</script>";
	echo "<script>location.href = '/'</script>";
?>

