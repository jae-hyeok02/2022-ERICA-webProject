<?php
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/include/sub_header.php";

	if (!isset($_SESSION['user_id'])) {
		echo "<script>alert('로그인 후 이용해주세요.')</script>";
		echo "<script>location.href = '/'</script>";
  	}
?>

		<div class="sub-visual">

			<div class="sub-visual-img">
				<div class="sub-visual-text">
					<h1 class="sub-visual-title" style="color: white;">다이어리 표지 변경</h1>
					<p>다이어리 표지를 변경할 수 있는 페이지입니다.</p>
				</div>
			</div>

		</div> <!-- sub-visual end -->

		<div class="bg-update rap">
			
			<form action="/php/bg_update_db.php" method="POST" enctype="multipart/form-data">
				<div>
					<h2>변경할 다이어리 표지 업로드</h2>
					<input type="file" name="uploadedFile" required>
				</div>
				
				<input type="text" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" readonly hidden>

				<div>
					<button type="submit">다이어리 표지 변경하기</button>
				</div>
			</form>
			
		</div> <!-- bg-update end -->

		<footer class="sub-footer" style="bottom: -20%;">
			Copyright &copy; 2023 KJH. All Rights Reserved.
		</footer>
			
	</div> <!-- wrap end -->
	
</body>
</html>
