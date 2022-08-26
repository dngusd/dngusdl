<?php
    session_start();
    $title = $_POST['title'];
    $cont = $_POST['contents'];
    $link = mysqli_connect( 'localhost', 'whkim712', 'white.1245', 'dngusdldl' );
    $id = $_SESSION['id'];
    $ququ = "INSERT into board (id, cont, title, date, name) values ('$id', '$cont','$title',now(),(select name from login where id='$id'))";
    if(mysqli_query($link,$ququ)) {
        echo "<script>alert('글이 작성되었습니다.');location.href='/';</script>";
        if ( $_POST[ "action" ] == "Upload" ) {
            $uploaded_file_name_tmp = $_FILES[ 'myfile' ][ 'tmp_name' ];
            $uploaded_file_name = $_FILES[ 'myfile' ][ 'name' ];
            $upload_folder = "~/uploads";
            move_uploaded_file( $uploaded_file_name_tmp, $upload_folder . $uploaded_file_name );
        }
    }
    else {
        echo "<script>alert('글 작성에 실패하였습니다.');history.back();</script>";
    }
?>