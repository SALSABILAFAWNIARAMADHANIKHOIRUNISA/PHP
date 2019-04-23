<?php
$koneksi = mysqli_connect("localhost","root","","olshop");

if (mysqli_connect_errno()) {
  echo mysqli_connect_error();
}

if (isset($_POST["action"])) {
  $id_penjual = $_POST["id_penjual"];
  $nama = $_POST["nama"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($_POST["action"] == "insert") {
    // tampung data file
    // if (isset($_FILES["image"])) {
    //   // tampung informasi dari data file
    //   $path = pathinfo($_FILES["image"]["name"]);
    //   $ekstensi = $path["extension"];
    //   // merangkai penamaan file yang disimpan
    //   $filename = $id_barang."-".rand(1,1000).".".$ekstensi;
    //   // rand -> mengambil nilai random 1-1000, exp: 123-800.jpg
    //   move_uploaded_file($_FILES["image"]["tmp_name"],"image_barang/".$filename);
    // }
    $sql = "insert into penjual values ('$id_penjual','$nama','$username','$password')";
  } elseif ($_POST["action"] == "update") {
    // mengambil dari database
    $sql = "select * from penjual where id_penjual='$id_penjual'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
    // if (!empty($_FILES["image"]["name"])) {
    //   if (file_exists("image_barang/".$hasil["image"])) {
    //     unlink("image_barang/".$hasil["image"]);
    //   }
    //
    //   $path = pathinfo($_FILES["image"]["name"]);
    //   $ekstensi = $path["extension"];
    //   // merangkai penamaan file yang disimpan
    //   $filename = $id_barang."-".rand(1,1000).".".$ekstensi;
    //   // rand -> mengambil nilai random 1-1000, exp: 123-800.jpg
    //   move_uploaded_file($_FILES["image"]["tmp_name"],"image_barang/".$filename);
    //   $sql = "update pembeli set nama='$nama', alamat='$alamat', username='$username',password='$password' where id_pembeli='$id_pembeli'";
    // } else {
      $sql = "update penjual set nama='$nama', username='$username',password='$password' where id_penjual='$id_penjuali'";
    // }

  }

  echo $sql;
  mysqli_query($koneksi,$sql);
  header("location:template_os.php?page=penjual.php");
}
if (isset($_GET["hapus"])) {
  $id_barang = $_GET["id_penjual"];
  $sql = "select * from penjual where id_pembeli='$id_penjual'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  // if (file_exists("image_barang/".$hasil["image"])) {
  // mengecek keberadaan file
    // unlink("image_barang/".$hasil["image"]);
    // menghapus file
  // }
  $sql = "delete from barang where id_barang='$id_barang'";
  mysqli_query($koneksi,$sql);
  header("location:template_os.php?page=barang.php");
}
 ?>
