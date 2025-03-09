<?php
  INCLUDE $_SERVER['DOCUMENT_ROOT']."/php/lib.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>웹 다이어리</title>
	<link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.min.css">
	<script src="/js/jquery.js"></script>
	<script src="/js/app.js"></script>
</head>
<body>
    <input type="checkbox" name="login-modal" id="login-modal" hidden>
    <input type="checkbox" name="join-modal" id="join-modal" hidden>

    <div class="login">
		<div class="login-popup">
			<h2>로그인</h2>  
			<p>꾸준히 다이어리 쓰기, 당신도 할 수 있어요!</p>

            <form action="/php/login_db.php" method="POST">
                <div class="login-input">
                    <div>
                        <input type="text" id="user_id" name="user_id" autocomplete="off" placeholder="아이디" required>
                    </div>
                    <div>
                        <input type="password" id="user_pw" name="user_pw" autocomplete="off" placeholder="비밀번호" required>
                    </div>
                </div>
                
                <div class="login-bar"></div>

                <div class="login-btn">
                    <label for="login-modal">취소</label>
                    <button type="submit">로그인</button>
                </div>
            </form>
			
		</div> <!-- login-popup end -->
	</div> <!-- login end -->

    <div class="join">
		<div class="join-popup">
			<h2>회원가입</h2>  
			<p>꾸준히 다이어리 쓰기, 당신도 할 수 있어요!</p>

            <form action="/php/join_db.php" method="POST" enctype="multipart/form-data">
                <div class="join-input">
                    <div>
                        <input type="text" id="user_id" name="user_id" autocomplete="off" placeholder="아이디" required>
                    </div>
                    <div>
                        <input type="password" id="user_pw" name="user_pw" autocomplete="off" placeholder="비밀번호" required>
                    </div>
                    <div>
                        <input type="text" id="user_name" name="user_name" autocomplete="off" placeholder="이름" required>
                    </div>
                    <div>
                        <input type="text" id="user_intro" name="user_intro" autocomplete="off" placeholder="한줄소개 (25자 이하)" required>
                    </div>
                    <div>
                        <h5 style="text-align: left; margin-left: 30px; margin-top: 20px;">생년월일</h5>
                        <input type="date" id="birth_date" name="birth_date" autocomplete="off" placeholder="생일" required>
                    </div>
                    <div>
                        <h5 style="text-align: left; margin-left: 30px; margin-top: 20px;">다이어리 표지 업로드</h5>
                        <input type="file" name="uploadedFile" required>
                    </div>
                </div>

                <div class="join-bar"></div>

                <div class="join-btn">
                    <label for="join-modal">취소</label>
                    <button type="submit">회원가입</button>
                </div>
            </form>
			
		</div> <!-- join-popup end -->
	</div> <!-- join end -->
	
	<div id="wrap">
        <header class="main-header">
            <div class="rap">

                <div id="logo">
                    <a href="/">웹 다이어리</a>
                </div>

                <nav>
                    <?php 
                    if (!isset($_SESSION['user_id'])) {
                        echo '
                        <div class="user-btn">
                            <label for="login-modal" class="user-login-btn pointer">로그인</label>
                            <label for="join-modal" class="user-join-btn pointer">회원가입</label>
                        </div>
                        ';
                    }

                    if (isset($_SESSION['user_id'])) {
                        echo '
                        <div class="user-info">
                            <p>'.$_SESSION['user_name'].' 님 환영합니다.</p>
                            <a href="/php/logout_db.php" class="pointer">
                            로그아웃
                            </a>
                        </div>
                        ';
                    }
                    ?>
                </nav>

            </div> <!-- rap end -->

        </header>