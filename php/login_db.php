<?php INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php"; 

	$id = $_POST['user_id'];
	$pw = $_POST['user_pw'];

	$login = mq("SELECT * FROM `user` WHERE `user_id` = ?", [$id])->fetch();

	if (!$login) {
		echo "<script>alert('존재하지 않는 아이디입니다. 다시 한 번 확인해주세요.'); history.back();</script>";
		exit;
	}

	$hash_pw = $login['user_pw'];

	if (password_verify($pw, $hash_pw)) {
		
		$_SESSION['user_id'] = $login["user_id"];
		$_SESSION['user_name'] = $login["user_name"];

		echo "<script>alert('로그인 되었습니다.'); location.href='/';</script>";

	} else { // 비밀번호가 다를 경우 돌아간다
		echo "<script>alert('비밀번호가 맞지 않습니다. 다시 한 번 확인해주세요.'); history.back();</script>";
	}
?>