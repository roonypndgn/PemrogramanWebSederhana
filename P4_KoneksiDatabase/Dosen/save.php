
<?php
$folder="foto/";
    //gunakanya untuk menjalankan terlebih dahulu koneksinya
    include('koneksi.php');
    session_start();
    $username=$_SESSION['username'];
    $tmp_name=$_FILES['foto']['tmp_name'];
    $nama_file=$_FILES['foto']['name'];

    $nim=$_POST['nidn'];
    $nama=$_POST['nama'];
    $gender=$_POST['gender'];
    $jabatan=$_POST['jabatan'];
    $email=$_POST['email'];
    $ponsel=$_POST['ponsel'];

    $target_file=$folder.$nama_file;
    move_uploaded_file($tmp_name, $target_file);
    
    //memasukkan query sql
    $sql="insert into dosen values ('$nim','$nama','$gender','$jabatan','$email','$ponsel','$nama_file','$username')";
    $result=$conn->query($sql);
    if($result){
        header("location:read.php");
    }else{
        echo "Gagal";
    }

    
?>