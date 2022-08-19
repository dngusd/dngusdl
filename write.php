<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wu._.hy0의 게시판</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
    <div class="board_wrap">
        <div class="board_title">
            <strong>wu._.hy0의 게시판</strong>
            <p>wu._.hy0의 개인 개시판입니다.</p>
        </div>
        <div class="board_write_wrap">
            <div class="board_write">
                <div class="title">
                    <dl>
                        <dt>제목</dt>
                        <dd><input type="text" name="title" placeholder="제목 입력"></dd>
                    </dl>
                </div>
                <div class="cont">
                    <textarea name="contents" placeholder="내용 입력"></textarea>
                </div>
            </div>
            <div class=" bt_wrap">
                <a href="#" class="on">등록</a>
                <a href="#">취소</a>
            </div>
            <?php
  if ( isset($_POST['id']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {
      $username = $_POST['user'];
      $password = $_POST[ 'password' ];
      $title = $_POST[ 'title' ];
      $content = $_POST[ 'content' ];
    $jb_conn = mysqli_connect( 'localhost', 'whkim712', 'white.1245', 'dngusdldl' );
    $jb_sql = "SELECT  FROM board WHERE id = '$id';";
    $jb_result = mysqli_query( $jb_conn, $jb_sql );
    $jb_resultt = mysqli_fetch_array($jb_result);
    if ( $jb_resultt ) {
        echo "<script>alert('사용자이름이 중복되었습니다.');location.href='register.html';</script>";
    } elseif ( $password != $password_confirm ) {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');location.href='register.html';</script>";
    } else {
      $encrypted_password = password_hash( $password, PASSWORD_DEFAULT);
      $jb_sql_add_user = "INSERT INTO login ( id, password,name ) VALUES ( '{$id}', '{$encrypted_password}', '{$username}');";
      mysqli_query( $jb_conn, $jb_sql_add_user );
      echo "<script>alert('회원가입이 완료되었습니다!');location.href='index.php';</script>";
    } 
  }
?>
        </div>
    </div>
</body>
</html>