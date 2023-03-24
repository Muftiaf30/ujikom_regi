<?php
    include 'config.php';
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;
    $sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_assoc($query);
    $level = "siswa";
    $_SESSION['level'] = $data['level'];
    if ((strcmp($username,$data['username'])==0) && (strcmp($password,$data['password'])==0)) {
        
        if (strcmp($level,$data['level'])==0) {
            echo "<script type='text/javascript'>alert('Login Berhasil')</script>";
            echo "<script language='javascript' type='text/javascript'> location.href='#'</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'> location.href='beranda.php'</script>";
        }
    } else {
        header("Location:index.html");
    }
?>