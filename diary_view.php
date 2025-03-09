<?php
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/include/sub_header.php";

	if (!isset($_SESSION['user_id'])) {
		echo "<script>alert('로그인 후 이용해주세요.')</script>";
		echo "<script>location.href = '/'</script>";
  	}

	$cnt = 1;
	$id = $_SESSION['user_id'];
	$diary_cont = mq("SELECT * FROM `diary` WHERE `diary_writer_id` = ? OR `diary_couple_id` = ? ORDER BY `idx` DESC", [$id, $id])->fetchAll();

	foreach ($diary_cont as $key => $value) {
		$cnt += 1;
	}
?>

		<div class="sub-visual">

			<div class="sub-visual-img">
				<div class="sub-visual-text">
					<!-- <h1 id="one-line-intro" style="color: white;">로그인을 해주세요.</h1> -->
					<h1 class="sub-visual-title" style="color: white;">일기 목록</h1>
					<p>내가 작성한 일기 목록을 열람할 수 있는 페이지입니다.</p>
				</div>
			</div>

		</div> <!-- sub-visual end -->

		<div class="diary-content rap">

			<table border="1">

				<thead>
					<tr>
						<th>번호</th>
						<th>일기 제목</th>
						<th>작성자</th>
						<th>일기 유형</th>
						<th>작성일</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						foreach ($diary_cont as $key => $value) {
							$cnt -= 1;

							echo '
								<tr>
									<td>'.$cnt.'</td>
									<td class="pointer">
										<a href="/diary_view_detail.php?idx='.$value['idx'].'">'.$value['diary_title'].'</a>
									</td>
									<td>'.$value['diary_writer_name'].'</td>
									<td>'.$value['diary_type'].'</td>
									<td>'.$value['diary_write_date'].'</td>
								</tr>
							';
						}
					?>
				</tbody>

			</table>

			<div>
				<button onclick="location.href='/diary_write.php'">작성하기</button>
			</div>
			
		</div> <!-- diary-content end -->

		<footer class="sub-footer" style="bottom: -60%;">
			Copyright &copy; 2023 KJH. All Rights Reserved.
		</footer>
		
	</div> <!-- wrap end -->

</body>
</html>