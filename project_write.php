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
					<h1 class="sub-visual-title" style="color: white;">과제 등록</h1>
					<p>과제를 등록할 수 있는 페이지입니다.</p>
				</div>
			</div>

		</div> <!-- sub-visual end -->

		<div class="project-write rap">
			
			<form action="/php/project_write_db.php" method="POST">
				<div>
					<h2>과제명</h2>
					<input type="text" id="project_title" name="project_title" autocomplete="off" placeholder="과제명 작성" required>
				</div>

				<div>
					<h2>과목명</h2>
					<input type="text" id="project_subject" name="project_subject" autocomplete="off" placeholder="과목명 작성" required>
				</div>

				<div>
					<h2>과제 유형</h2>
					<select name="project_type" id="project_type">
						<option value="프로젝트">프로젝트</option>
						<option value="에세이">에세이</option>
						<option value="보고서">보고서</option>
						<option value="시험 대체과제">시험 대체과제</option>
						<option value="기타">기타</option>
					</select>
				</div>

				<div>
					<h2>마감일자</h2>
					<input type="date" id="due_date" name="due_date" required>
				</div>
			
				<input type="text" id="project_user_id" name="project_user_id" value="<?php echo $_SESSION['user_id'] ?>" readonly hidden>

				<div>
					<button type="submit">과제 등록하기</button>
				</div>
			</form>
			
		</div> <!-- project-write end -->

		<footer class="sub-footer" style="bottom: -80%;">
			Copyright &copy; 2023 KJH. All Rights Reserved.
		</footer>
		
	</div> <!-- wrap end -->

	<script>
		let date = new Date();
		let year = date.getFullYear();
		let month = date.getMonth() + 1;
		let day = date.getDate();

		if (month < 10) {
			month = '0'+month; 
		}

		if (day < 10) {
			day = '0'+day;
		}

		let minDate = year + '-' + month + '-' + day;

		$("input[name=due_date]").attr("min", minDate);
	</script>
	
</body>
</html>
