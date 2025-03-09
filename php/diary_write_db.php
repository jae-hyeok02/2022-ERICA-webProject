<?php INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php"; 

	$title = $_POST['diary_title'];
	$cont = $_POST['diary_cont'];
	$type = $_POST['diary_type'];
	$writer_id = $_POST['diary_writer_id'];
	$couple_id = $_POST['diary_couple_id'];

	$user_name = mq("SELECT * FROM `user` WHERE `user_id` = ?", [$writer_id])->fetch()['user_name'];

	mq("INSERT INTO `diary` SET
		`diary_title` = ?,
		`diary_cont` = ?,
		`diary_type` = ?,
		`diary_writer_id` = ?,
		`diary_writer_name` = ?,
		`diary_couple_id` = ?", [
			$title,
			$cont,
			$type,
			$writer_id,
			$user_name,
			$couple_id
		]
	);

	echo "<script>alert('일기 작성이 완료되었습니다.')</script>";
	echo "<script>location.href = '/diary_view.php'</script>";
?>