<?php INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php"; 

	$title = $_POST['project_title'];
	$subject = $_POST['project_subject'];
	$type = $_POST['project_type'];
	$user_id = $_POST['project_user_id'];
	$due_date = $_POST['due_date'];

	mq("INSERT INTO `project` SET
		`project_title` = ?,
		`project_subject` = ?,
		`project_type` = ?,
		`project_user_id` = ?,
		`due_date` = ?", [
			$title,
			$subject,
			$type,
			$user_id,
			$due_date
		]
	);

	echo "<script>alert('과제 작성이 완료되었습니다.')</script>";
	echo "<script>location.href = '/project_alarm.php'</script>";
?>