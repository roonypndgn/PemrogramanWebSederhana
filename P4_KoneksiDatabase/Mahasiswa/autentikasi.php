<?php 
    include("koneksi.php");
    $id=$_POST['user'];
    $pw=$_POST['pass'];
    $sql="select * from login where username='$id' and password='$pw'";
    $exe=$conn->query($sql);
    $banyak=$exe->num_rows;
    if($banyak==1){
        session_start();
        $_SESSION['username']=$id;
        $_SESSION['login']=true;
        header("location:read.php");

    }else{
        echo "Username dan Password Salah";
    }
?>