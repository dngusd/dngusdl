<?php
  if ( isset($_POST['id']) && isset($_POST['password']) && isset($_POST['password_confirm'])) {
      $username = htmlentities($_POST['nickname']);
      $id = htmlentities($_POST[ 'id' ]);
      $password = htmlentities($_POST[ 'password' ]);
      $password_confirm = $_POST[ 'password_confirm' ];
    $jb_conn = mysqli_connect( 'localhost', 'whkim712', 'white.1245', 'dngusdldl' );
    $jb_sql = "SELECT id FROM login WHERE id = '$id';";
    $jb_result = mysqli_query( $jb_conn, $jb_sql );
    $jb_resultt = mysqli_fetch_array($jb_result);
    if ( $jb_resultt ) {
        echo "<script>alert('사용자이름이 중복되었습니다.');location.href='register.html';</script>";
    } elseif ( $password != $password_confirm ) {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');location.href='register.html';</script>";
    } else {
      $encrypted_password = hash( "sha256" , $password);
      $jb_sql_add_user = "INSERT INTO login ( id, password,name ) VALUES ( '{$id}', '{$encrypted_password}', '{$username}');";
      mysqli_query( $jb_conn, $jb_sql_add_user );
      echo "<script>alert('회원가입이 완료되었습니다!');location.href='index.php';</script>";
    } 
  }
?>