<?php INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php"; 

  	$id = $_POST['user_id'];
	$pw = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);
  	$name = $_POST['user_name'];
	$intro = $_POST['user_intro'];
  	$birth = $_POST['birth_date'];

	$user_name = mq("SELECT * FROM `user` WHERE `user_id` = ?", [$id])->fetch();

	$filename = $_FILES['uploadedFile']['name'];
	$dir = $_SERVER['DOCUMENT_ROOT']."/css/image/";
	$tmpName = $_FILES['uploadedFile']['tmp_name'];

	move_uploaded_file($tmpName, $dir.$filename);

	if ($user_name) {
		echo "<script>alert('중복된 아이디입니다.')</script>";
		echo "<script>history.back();</script>";
		exit;
	}
	
	if (mb_strlen($id) > 20) {
		echo "<script>alert('아이디는 20자 이하로 작성해주세요.')</script>";
		echo "<script>history.back();</script>";
		exit;
	}

	if (mb_strlen($name) > 7) {	
		echo "<script>alert('이름은 7자 이하로 작성해주세요.')</script>";
		echo "<script>history.back();</script>";
		exit;
	}

	if (mb_strlen($intro) > 25) {
		echo "<script>alert('한줄소개는 25자 이하로 작성해주세요.')</script>";
		echo "<script>history.back();</script>";
		exit;
	}

	mq("INSERT INTO `user` SET
		`user_id` = ?,
		`user_pw` = ?,
		`user_name` = ?,
		`user_intro` = ?,
		`intro_img` = ?,
		`birth_date` = ?", [
			$id,
			$pw,
			$name,
			$intro,
			$filename,
			$birth
		]
	);

	echo "<script>alert('회원가입이 완료되었습니다.')</script>";
	echo "<script>location.href = '/'</script>";
?>