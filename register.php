<?php
  $username = $_POST[ 'id' ];
  $password = $_POST[ 'password' ];
  $password_confirm = $_POST[ 'password_confirm' ];
  if ( !is_null( $username ) ) {
    $jb_conn = mysqli_connect( 'localhost', 'root', '', 'dngusdldl' );
    $jb_sql = "SELECT id FROM login WHERE id = '$username';";
    $jb_result = mysqli_query( $jb_conn, $jb_sql );
    while ( $jb_row = mysqli_fetch_array( $jb_result ) ) {
      $username_e = $jb_row[ 'username' ];
    }
    if ( $id == $username_e ) {
      $wu = 1;
    } elseif ( $password != $password_confirm ) {
      $wp = 1;
    } else {
      $encrypted_password = password_hash( $password, PASSWORD_DEFAULT);
      $jb_sql_add_user = "INSERT INTO login ( id, password ) VALUES ( '$username', '$encrypted_password' );";
      mysqli_query( $jb_conn, $jb_sql_add_user );
      echo "<script>alert('회원가입이 완료되었습니다!');location.href='index.html';</script>"
    } 
    if ( $wu == 1 ) {
        echo "<script>alert('사용자이름이 중복되었습니다.');location.href='register.html';</script>";
      }
      if ( $wp == 1 ) {
        echo "<script>alert('비밀번호가 일치하지 않습니다.');location.href='register.html';</script>";
      }
  }
?>