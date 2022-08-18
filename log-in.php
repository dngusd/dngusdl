<?php
$id=$_POST["id"];
$password=$_POST["password"];
$link=mysqli_connect("localhost","whkim712","white.1245","dngusdldl");
$sqlans="select * from login where id='{$id}' && password='{$password}'";

if(mysqli_query($link,$sqlans)){
//로그인 성공
    session_start();
    $_SESSION["id"]=$id;
    echo "<script>alert('환영합니다!');location.href='index.html';</script>";
}
else {
//로그인 실패
    echo "<script>alert('로그인에 실패하였습니다!');location.href='login.html';</script>";
}
?>