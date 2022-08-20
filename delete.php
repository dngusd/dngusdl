<?php
    $idx = $_GET['vieww'];
    $link = mysqli_connect( 'localhost', 'whkim712', 'white.1245', 'dngusdldl' );
    $sql = "DELETE * from board WHERE idx = '$idx'";

    if(mysqli_query($link, $sql)) {
        echo "<script>alert('글이 삭제되었습니다.');location.href='/';</script>";
    }
    else {
        echo "<script>alert('글 삭제에 실패하였습니다.');history.back();</script>";
    }
?>