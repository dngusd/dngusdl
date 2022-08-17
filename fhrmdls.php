<?php
$id=$_POST["id"];
$password=$_POST["password"];
$link=mysqli_connect("localhost","root","","dngusdldl");
$sqlans="select * from login where id='{$id}' && password='{$password}'";

if(mysqli_query($link,$sqlans)){
//로그인 성공

}
else {
//로그인 실패
    echo "<script>alert('로그인에 실패하였습니다!');location.href='login.html';</script>";
}
?>