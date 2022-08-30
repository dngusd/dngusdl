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
        echo "<p>{$_SESSION['id']}님 환영합니다.</p>";
        echo "<a href='logout.php'>로그아웃하기</a>";
      }
      else{
          echo "<a href='login.html'>로그인하기</a>";
          echo "<a href='register.html'>회원가입하기</a>";
      }
    

        error_reporting(E_ALL); 
        ini_set("display_errors",1);
        ?>
</head>
<body>
  <div class="board_wrap">
      <div class="board_title">
          <strong>wu._.hy0의 게시판</strong>
          <p>wu._.hy0의 개인 개시판입니다.</p>
            <div class="write_btn">
              <?php
              if (isset($_SESSION['id'])) {
                echo "<a href='write.html'>글쓰기</a>";
              }
              ?>
            </div>
      </div>
      <table class="list-table">
        <div id="search_box">
      <form action="index.php" method="get">
        <select name="catgo">
          <option value="title">제목</option>
          <option value="name">글쓴이</option>
          <option value="content">내용</option>
        </select>
        <input type="text" name="search" size="40" required="required" /> <button>검색</button>
        <?php
          if(isset($_GET['search'])) {
          $sql2 = mq("select * from board where $catagory like '%$search_con%' order");
          while($board = $sql2->fetch_array()){
           
          $title=$board["title"]; 
            if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
            $sql3 = mq("select * from board where idx='".$board['idx']."'");
            $rep_count = mysqli_num_rows($sql3);
          }
        ?>
      </form>
      </div>
        <form action="index.php" method="POST">
        <input type="radio" name="newold" value="1">최신순
        <input type="radio" name="newold" value="2">오래된순
        </form>
          <thead>
              <tr>
                  <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">글쓴이</th>
                    <th width="100">작성일</th>
                </tr>
          </thead>
              
          <?php

          $orderset='desc';
            if(isset($_POST['newold'])&&$_POST['newold']=='2')
              $orserset='asc';
           
              
              
              $sql = "select * from board order by idx $orderset"; 
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