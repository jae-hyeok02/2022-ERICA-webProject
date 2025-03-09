<?php
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/include/sub_header.php";

	if (!isset($_SESSION['user_id'])) {
		echo "<script>alert('로그인 후 이용해주세요.')</script>";
		echo "<script>location.href = '/'</script>";
  	}

	$idx = $_GET['idx'];
	$id = $_SESSION['user_id'];

	$cur_diary_cont = mq("SELECT * FROM `diary` WHERE `idx` = ?", [$idx])->fetch();
	$couple = mq("SELECT * FROM `user` WHERE `user_id` = ?", [$cur_diary_cont['diary_couple_id']])->fetch();
?>

		<div class="sub-visual">

			<div class="sub-visual-img">
				<div class="sub-visual-text">
					<h1 class="sub-visual-title" style="color: #fff;">일기 열람</h1>
					<p>내가 선택한 일기를 열람할 수 있는 페이지입니다.</p>
				</div>
			</div>

		</div> <!-- sub-visual end -->

		<div class="diary-view-detail rap">
		
			<div>
				<h2>제목</h2>
				<p><?php echo $cur_diary_cont['diary_title']; ?></p>
			</div>

			<div>
				<h2>내용</h2>
				<p><?php echo $cur_diary_cont['diary_cont']; ?></p>
			</div>

			<div>
				<h2>작성자</h2>
				<p><?php echo $cur_diary_cont['diary_writer_name']; ?></p>
			</div>

			<div>
				<h2>일기 유형 / 공유 상대</h2>
				<p><?php echo $cur_diary_cont['diary_type']; ?> / 
				<?php echo ($cur_diary_cont['diary_type'] == "커플일기" ? $cur_diary_cont['diary_couple_id']." (".$couple['user_name'].")" : "없음"); ?></p>
			</div>

			<div>
				<h2>작성 날짜</h2>
				<p><?php echo $cur_diary_cont['diary_write_date']; ?></p>
			</div>

			<div>
				<button onclick="location.href='/diary_view.php'">목록으로</button>
				<button onclick="location.href='/php/diary_delete_db.php?idx=<?php echo $idx ?>'">삭제하기</button>
			</div>
			
		</div> <!-- diary-view-detail -->

		<footer class="sub-footer" style="bottom: -123%;">
			Copyright &copy; 2023 KJH. All Rights Reserved.
		</footer>
		
	</div> <!-- wrap end -->

</body>
</html>
