<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wu._.hy0의 게시판</title>
    <link rel="stylesheet" href="css/css.css">
    <a href="login.html">로그인</a>하기
    <a href="register.html">회원가입</a>하기
</head>
<body>
  <div class="board_wrap">
      <div class="board_title">
          <strong>wu._.hy0의 게시판</strong>
          <p>wu._.hy0의 개인 개시판입니다.</p>
            <div class="write_btn">
            <a href="write.php">글쓰기</a>
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
            $sql = "select * from board order by idx desc limit 0,10"; 
            $link = mysqli_connect("localhost","whkim712","white.1245","dngusdldl");
              while($board = mysqli_fetch_array(mysqli_query($link,$sql)))
              {
                $title=$board["title"]; 
                if(strlen($title)>30)
                { 
                  $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                }
              }
          ?>
          <tbody>
            <tr>
              <td width="70"><?php echo $board['idx']; ?></td>
              <td width="500"><a href=""><?php echo $title;?></a></td>
              <td width="120"><?php echo $board['name']?></td>
              <td width="100"><?php echo $board['date']?></td>
            </tr>
          </tbody>
        <?php  ?>
      </table>
    </div>
  </body>
</html>