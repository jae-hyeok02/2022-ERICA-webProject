<?php
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/include/sub_header.php";

	if (!isset($_SESSION['user_id'])) {
		echo "<script>alert('로그인 후 이용해주세요.')</script>";
		echo "<script>location.href = '/'</script>";
  	}

	$cnt = 1;
	$id = $_SESSION['user_id'];
	$project_cont = mq("SELECT * FROM `project` WHERE `project_user_id` = ? ORDER BY `due_date` ASC", [$id])->fetchAll();

	foreach ($project_cont as $key => $value) {
		$cnt += 1;
	}
?>

    	<div class="sub-visual">

			<div class="sub-visual-img">
				<div class="sub-visual-text">
					<h1 class="sub-visual-title" style="color: white;">과제 알리미</h1>
					<p>임박한 날짜 순으로 과제를 확인할 수 있는 페이지입니다.</p>
				</div>
      		</div>

    	</div> <!-- sub-visual end -->

		<div class="project-alarm rap">

			<table border="1">

				<thead>
					<tr>
						<th>번호</th>
						<th>과제명</th>
						<th>과목명</th>
						<th>과제 유형</th>
						<th>마감일자</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						foreach ($project_cont as $key => $value) {
							$cnt -= 1;

							echo "
								<tr>
									<td>".$cnt."</td>
									<td>
										".$value['project_title']."
										<button class='project_delete' onclick=location.href='/php/project_delete_db.php?idx=".$value['idx']."'>X</button>
									</td>
									<td>".$value['project_subject']."</td>
									<td>".$value['project_type']."</td>
									<td>".$value['due_date']."</td>
								</tr>
							";
						}
					?>
				</tbody>

			</table>

			<div>
				<button onclick="location.href='/project_write.php'">과제 등록하기</button>
			</div>
			
		</div> <!-- project-alarm end -->

		<footer class="sub-footer" style="bottom: -60%;">
			Copyright &copy; 2023 KJH. All Rights Reserved.
		</footer>
		
	</div> <!-- wrap end -->

</body>
</html>