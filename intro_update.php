<?php
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/include/sub_header.php";

	if (!isset($_SESSION['user_id'])) {
		echo "<script>alert('로그인 후 이용해주세요.')</script>";
		echo "<script>location.href = '/'</script>";
  }

	$id = $_SESSION['user_id'];

	$user = mq("SELECT * FROM `user` WHERE `user_id` = ?", [$id])->fetch();
?>

    	<div class="sub-visual">

			<div class="sub-visual-img">
				<div class="sub-visual-text">
					<h1 class="sub-visual-title" style="color: white;">한줄 소개 변경</h1>
					<p>한줄 소개를 변경할 수 있는 페이지입니다.</p>
				</div>
			</div>

    	</div> <!-- sub-visual end -->

		<div class="intro-update rap">
			
			<form action="/php/intro_update_db.php" method="POST">
				<div>
					<h2>변경할 한줄 소개</h2>
					<input type="text" id="user_intro" name="user_intro" autocomplete="off" value="<?php echo $user['user_intro'] ?>" placeholder="변경할 한줄 소개" required>
				</div>
				
				<input type="text" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" readonly hidden>

				<div>
					<button type="submit">한줄 소개 변경하기</button>
				</div>
			</form>
			
		</div> <!-- intro-update end -->

		<footer class="sub-footer" style="bottom: -20%;">
			Copyright &copy; 2023 KJH. All Rights Reserved.
		</footer>
		
	</div> <!-- wrap end -->
	
</body>
</html>
