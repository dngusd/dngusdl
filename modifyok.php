<?php
    session_start();
    $idx = htmlentities($_GET['index']);
    $title = htmlentities($_POST['title']);
    $cont = htmlentities($_POST['contents']);
    $link = mysqli_connect( 'localhost', 'whkim712', 'white.1245', 'dngusdldl' );
    $sql = "UPDATE board SET title = '$title' , cont = '$cont' WHERE idx = '$idx' ";
    if(mysqli_query($link, $sql)) {
        echo "<script>alert('글이 수정되었습니다.');location.href='/';</script>";
    }
    else {
        echo "<script>alert('글 수정에 실패하였습니다.');history.back();</script>";
    }
?>