<?php
    session_start();
    $title = htmlentities($_POST['title']);
    $cont = htmlentities($_POST['contents']);
    $link = mysqli_connect( 'localhost', 'whkim712', 'white.1245', 'dngusdldl' );
    $id = $_SESSION['id'];
    $ququ = "INSERT into board (id, cont, title, date, name) values ('$id', '$cont','$title',now(),(select name from login where id='$id'))";
    if(mysqli_query($link,$ququ)) {
        echo "<script>alert('글이 작성되었습니다.');location.href='/';</script>";
        if ( isset($_FILE['myfile']) ) {
            $uploaded_file_name_tmp = $_FILES[ 'myfile' ][ 'tmp_name' ];
            $uploaded_file_name = $_FILES[ 'myfile' ][ 'name' ];
            $upload_folder = "./uploads";
            $filename = iconv("UTF-8", "EUC-KR",$_FILES['myfile']['name']);
            $ext = explode(".", strtolower($filename));

            
    $cnt = count($ext)-1;
    if($ext[$cnt] === ""){
    if(preg_match("/php|php3|php4|htm|inc|html/", $ext[$cnt-1])){
           echo "업로드할 수 없는 파일 유형입니다.";
       exit();
    }
    } else if(preg_match("/php|php3|php4|htm|inc|html/", $ext[$cnt])){
         echo "업로드할 수 없는 파일 유형입니다.";
            exit();
        } 
            move_uploaded_file( $uploaded_file_name_tmp, $upload_folder.$uploaded_file_name );
        }
    }
    else {
        echo "<script>alert('글 작성에 실패하였습니다.');history.back();</script>";
    }
?>
