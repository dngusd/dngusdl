<?php
$id=htmlentities($_POST["id"]);
$password=$_POST["password"];
$encrypted_password = hash( "sha256" , $password);
$link=mysqli_connect("localhost","whkim712","white.1245","dngusdldl");
$sqlans="SELECT * from login where id='{$id}' && password='{$encrypted_password}'";

if(mysqli_fetch_array(mysqli_query($link,$sqlans))){
//로그인 성공
    session_start();
    $_SESSION["id"]=$id;
    echo "<script>alert('환영합니다!');location.href='index.php';</script>";
}
else {
//로그인 실패
    echo "<script>alert('{$password}');location.href='login.html';</script>";
}
?>