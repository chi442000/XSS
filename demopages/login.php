<?php 
    //lay du lieu tu form gui len
    $u = $_POST['username'];
    $p = $_POST['password'];
    //ket noi den csdl
    $db = mysqli_connect("localhost", "root", "", "csdldemo");
    //truy van du lieu - tim user va password nhan duoc co trong csdl ko?
    $sql = "select * from users where username='$u' and password='$p'";
    //thuc thi truy van
    $rs = mysqli_query($db, $sql);
    if (mysqli_num_rows($rs)>0){
        // echo "<h1>Dang nhap thanh cong</h1>";
        header("Location: dashboard.php");
    }else{
        echo "<h2>Dang nhap that bai</h2>";
        require_once('index.php');
    }

?>

