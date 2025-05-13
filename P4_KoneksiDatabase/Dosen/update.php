<?php
    include('koneksi.php');
    $nim=$_POST['nim'];
    $nama=$_POST['nama'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $ponsel=$_POST['ponsel'];

    $sql="update data_mahasiswa set nama='$nama', 
    gender='$gender', email='$email', ponsel='$ponsel' 
    where nim='$nim'";
    $exe= $conn -> query($sql);
    if($exe){
        header("location:read.php");
    }
?>