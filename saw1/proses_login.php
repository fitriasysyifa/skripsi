<?php

    require_once'function/koneksi.php';
    // variable pendefinisian kredensial

    $sql = "SELECT * FROM admin";
    $query = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($query);
    $usernamelogin = $row['username'];
    $passwordlogin = $row['password'];

    var_dump($usernamelogin);
    var_dump($passwordlogin);

    // memulai session
    session_start();

    // mengambil isian dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // pengecekan kredensial login
    if ($username == $usernamelogin && $password == $passwordlogin) {
        session_start();
        $_SESSION['username'] = $username;
        $alert = "";
        header("Location: index.php");
    }else{
        header("location: login.php");
    }
?>