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
      if (isset($_SESSION['id'])) {
        $jb_conn = mysqli_connect( 'localhost', 'whkim712', 'white.1245', 'dngusdldl' );
        $jb_sql = "SELECT name FROM login WHERE id = '{$_SESSION['id']}'";
        $result = mysqli_fetch_array(mysqli_query($jb_conn,$jb_sql));
        echo "<p>{$result['name']}님 환영합니다.</p>";
        echo "<a href='logout.php'>로그아웃하기</a>";
      }
      else{
          echo "<a href='login.html'>로그인하기</a>";
          echo "<a href='register.html'>회원가입하기</a>";
      }
    ?>
</head>
<body>
  <div class="board_wrap">
      <div class="board_title">
          <strong>wu._.hy0의 게시판</strong>
          <p>wu._.hy0의 개인 개시판입니다.</p>
            <div class="write_btn">
            <a href="write.html">글쓰기</a>
            </div>
      </div>
      <table class="list-table">
          <thead>
              <tr>
                  <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">글쓴이</th>
                    <th width="100">작성일</th>
                </tr>
          </thead>
          <?php
            $sql = "select * from board order by idx desc"; 
            $link = mysqli_connect("localhost","whkim712","white.1245","dngusdldl");
            $result = mysqli_query($link,$sql);
              while($board = mysqli_fetch_assoc($result))
              { 
                echo "<tbody>
                  <tr>
                    <td width='70'>{$board['idx']}</td>
                    <td width='500'><a href='view.php?vieww={$board['idx']}'>{$board['title']}</a></td>
                    <td width='120'>{$board['name']}</td>
                    <td width='100'>{$board['date']}</td>
                  </tr>
                </tbody>";
              }
              ?>
      </table>
    </div>
  </body>
</html>