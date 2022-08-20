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
    $link = mysqli_connect( 'localhost', 'whkim712', 'white.1245', 'dngusdldl' );
    $sql = "SELECT * from board WHERE idx = {$idx}";
    $board = mysqli_fetch_array(mysqli_query($link,$sql));
    ?>
</head>
<body>
    <div class="board_wrap">
        <div class="board_title">
            <strong>wu._.hy0의 게시판</strong>
            <p>wu._.hy0의 개인 개시판입니다.</p>
        </div>
        <div class="board_write_wrap">
            <form action="write.php" method="post">
                <div class="board_write">
                    <div class="title">
                        <dl>
                            <dt>제목</dt>
                            <dd><textarea name="title" placeholder="제목 입력"><?php echo $board['title'];?></textarea></dd>
                        </dl>
                    </div>
                    <div class="cont">
                        <textarea name="contents" placeholder="내용 입력"><?php echo $board['cont'];?></textarea>
                    </div>
                </div>
                <div class="bt_wrap">
                    <button type="submit">등록</button>
                    <button type="button" onclick="history.back()">수정 취소</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>