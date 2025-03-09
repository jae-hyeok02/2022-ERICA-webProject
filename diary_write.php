<?php
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/include/sub_header.php";

	if (!isset($_SESSION['user_id'])) {
		echo "<script>alert('로그인 후 이용해주세요.')</script>";
		echo "<script>location.href = '/'</script>";
  }

	$id = $_SESSION['user_id'];

	$couple = mq("SELECT * FROM `user` WHERE `user_id` NOT IN (?)", [$id])->fetchAll();
?>

		<div class="sub-visual">

			<div class="sub-visual-img">
				<div class="sub-visual-text">
					<h1 class="sub-visual-title" style="color: white;">일기 작성</h1>
					<p>일기를 작성할 수 있는 페이지입니다.</p>
				</div>
			</div>

		</div> <!-- sub-visual end -->

		<div class="diary-write rap">
			
			<form action="/php/diary_write_db.php" method="POST">
				<div>
					<h2>제목</h2>
					<input type="text" id="diary_title" name="diary_title" autocomplete="off" placeholder="제목 작성" required>
				</div>

				<div>
					<h2>분류 (개인일기/커플일기)</h2>
					<select name="diary_type" id="diary_type">
						<option value="개인일기">개인일기</option>
						<option value="커플일기">커플일기</option>
					</select>
				</div>

				<div>
					<h2>일기를 공유할 상대 선택</h2>
					<select name="diary_couple_id" id="diary_couple_id" disabled>
						<?php
							foreach ($couple as $key => $value) {
								echo '<option value="'.$value['user_id'].'">'.$value['user_id'].' ('.$value['user_name'].')</option>';
							}
						?>
					</select>
				</div>

				<div>
					<h2>내용</h2>
					<textarea name="diary_cont" id="diary_cont" cols="30" rows="10" placeholder="내용 작성" required></textarea>
				</div>
				
				<input type="text" id="diary_writer_id" name="diary_writer_id" value="<?php echo $_SESSION['user_id'] ?>" readonly hidden>

				<div>
					<button type="submit">작성하기</button>
				</div>
			</form>
			
		</div> <!-- diary-write end -->

		<footer class="sub-footer" style="bottom: -90%;">
			Copyright &copy; 2023 KJH. All Rights Reserved.
		</footer>
		
	</div> <!-- wrap end -->

	<script>
		$("select[name=diary_type]").on("change", function() {

			if (this.value === "개인일기") {
				$("select[name=diary_couple_id]").attr("disabled", true); 
			} else {
				$("select[name=diary_couple_id]").removeAttr("disabled"); 
			}
		});
	</script>
	
</body>
</html>
