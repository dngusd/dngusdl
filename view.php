<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wu._.hy0의 게시판</title>
    <link rel="stylesheet" href="css/css.css">
    <?php
        session_start();
        $idx = $_GET['vieww'];
        $link = mysqli_connect("localhost","whkim712","white.1245","dngusdldl");
        $sqlans = "SELECT * from board where idx={$idx}";
        $result = mysqli_fetch_array(mysqli_query($link,$sqlans));
    ?>
</head>
<body>
    <div class="board_wrap">
        <div class="board_title">
            <strong>wu._.hy0의 게시판</strong>
            <p>wu._.hy0의 개인 개시판입니다.</p>
        </div>
        <div class="board_view_wrap">
            <div class="board_view">
                <div class="title">
                    <?php
                        echo $result['title'];
                    ?>
                </div>
                <div class="info">
                    <dl>
                        <dt>번호 : </dt>
                        <dt>
                            <?php
                                echo $result['idx'];
                            ?>
                        </dt>
                    </dl>
                    <dl>
                        <dt>글쓴이 : </dt>
                        <dt>
                        <?php
                                echo $result['name'];
                            ?>
                        </dt>
                    </dl>
                    <dl>
                        <dt>작성일 : </dt>
                        <dt>
                        <?php
                                echo $result['date'];
                            ?>
                        </dt>
                    </dl>
                </div>
                <div class="cont">
                    <?php
                        echo nl2br($result['cont']);
                    ?>  
                </div>
            </div>
            <div class="bt_wrap">
                <a href="index.php" class="on">목록</a>
            <?php
                if (isset($_SESSION['id']) && $_SESSION['id'] == $result['id']) {
                    echo "<a href='modify.php?vieww={$board['idx']}>수정</a>";
                    echo "<a href=''>삭제</a>";
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>