<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");//mengambil data admin
$data2 = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");//mengambil data user
// menghitung jumlah data yang ditemukan
$q= mysqli_fetch_array($data); //cek username admin
$q2=mysqli_fetch_array($data2); //cek usernamer user
if (mysqli_num_rows($data)> 0) { //login admin
    $_SESSION['username'] = $q['username'];
    $_SESSION['password'] = $q['password'];
    header("location:index_utama.php");
}
elseif (mysqli_num_rows($data2) >0) { //login user
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
  header("location:index_utama.php");
}else { //jika gagal akan kembali ke halaman login
    header("location:login.php?pesan=gagal");
}

?>