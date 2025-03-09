<?php
	INCLUDE $_SERVER['DOCUMENT_ROOT']."/include/main_header.php";

	$id = $_SESSION['user_id'];

	$user = mq("SELECT * FROM `user` WHERE `user_id` = ?", [$id])->fetch();
?>
		
        <div class="visual">

            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="visual-img" style="background: url('/css/image/<?php echo $user['intro_img'] ?>');"></div>
            <?php endif ?>

            <?php if (!isset($_SESSION['user_id'])): ?>
                <div class="visual-img" style="background: url('/css/image/diary_cover1.jpg');"></div>
            <?php endif ?>

            <div class="visual-text">
                <?php

                    if (isset($_SESSION['user_id'])) {
                        echo '
                            <h1 id="one-line-intro" style="color: white;">'.$user['user_intro'].'</h1>
                            <p>'.$_SESSION['user_name'].' 님의 다이어리</p>
                        ';
                    }

                    if (!isset($_SESSION['user_id'])) {
                        echo '
                            <h1 id="one-line-intro" style="color: white;">로그인이 필요한 서비스입니다.</h1>
                            <p>로그인을 해주세요.</p>
                        ';
                    }
                ?>
            </div> <!-- visual-text end -->
            
        

            <div class="main-menu">
                <div class="rap">

                    <div class="main-menu-list">
                        <a href="/diary_write.php">
                            <div class="main-menu-icon">
                                <i class="fa fa-pencil-square-o"></i>
                            </div>
                            <p>일기 작성</p>
                        </a>
                    </div>

                    <div class="main-menu-list">
                        <a href="/diary_view.php">
                            <div class="main-menu-icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <p>일기 목록</p>
                        </a>
                    </div>

                    <div class="main-menu-list">
                        <a href="/project_alarm.php">
                            <div class="main-menu-icon">
                                <i class="fa fa-calendar-check-o "></i>
                            </div>
                            <p>과제 알리미</p>
                        </a>
                    </div>

                    <div class="main-menu-list">
                        <a href="/intro_update.php">
                            <div class="main-menu-icon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <p>한줄 소개 변경</p>
                        </a>
                    </div>

                    <div class="main-menu-list">
                        <a href="/bg_update.php">
                            <div class="main-menu-icon">
                                <i class="fa fa-image"></i>
                            </div>
                            <p>다이어리 표지 변경</p>
                        </a>
                    </div>

                </div> <!-- rap end -->
            </div> <!-- main-menu end -->

        </div> <!-- visual end -->

        <footer class="main-footer">
            Copyright &copy; 2023 KJH. All Rights Reserved.
        </footer>
		
	</div> <!-- wrap end -->
	

</body>
</html>