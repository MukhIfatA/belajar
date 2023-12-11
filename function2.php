<?php

//connect
$conn = mysqli_connect("localhost", "root", "", "phpdasar");



function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;

}
;

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM data_pribadi_1 WHERE ID = $id");
  return mysqli_affected_rows($conn);
}
;




// function ubah($data){
//   global $db;
//   $id = $data["ID"];
// $nama= $data["nama"];
// $jenis_kelamin= $data["jenis_kelamin"];
// $tempat_lahir= $data["tempat_lahir"];
// $tgl_lahir= $data["tgl_lahir"];
// $alamat= $data["alamat"];
// $no_telp= $data["no_telp"];
// $kartu_pengenal_NIK = $data["kartu_pengenal_NIK"];
// $NIK_kadaluwarsa = $data["NIK_kadaluwarsa"];
// $status_kawin = $data["status_kawin"];
// $agama = $data["agama"];
// $tinggi_badan = $data["tinggi_badan"];
// $berat_badan = $data["berat_badan"];
// $email = $data["email"];
// $query ="UPDATE data_pribadi_1 SET 
//     nama ='$nama',
//     jenis_kelamin = '$jenis_kelamin',
//     tempat_lahir ='$tempat_lahir',
//     tgl_lahir ='$tgl_lahir',
//     alamat ='$alamat',
//     no_telp ='$no_telp',
//     kartu_pengenal_NIK = '$kartu_pengenal_NIK',
//     NIK_kadaluwarsa ='$NIK_kadaluwarsa',
//     status_kawin ='$status_kawin',
//     agama ='$agama',
//     tinggi_badan ='$tinggi_badan',
//     berat_badan ='$berat_badan',
//     email ='$email'
//     WHERE ID = '$id'
//    ";
//    mysqli_query($db , $query);
//    return mysqli_affected_rows($db);
// }


// function ubah2($data){
//   global $db;
//   $id = $data["ID_data_pribadi"];
// $nama_keluarga= $data["nama_keluarga"];
// $jenis_kelamin_keluarga= $data["jenis_kelamin_keluarga"];
// $tempat_lahir_keluarga= $data["tempat_lahir_keluarga"];
// $tgl_lahir_keluarga= $data["tgl_lahir_keluarga"];
// $pendidikan_keluarga= $data["pendidikan_keluarga"];
// $pekerjaan_keluarga= $data["pekerjaan_keluarga"];
// $status_dalam_keluarga = $data["status_dalam_keluarga"];
// $query ="UPDATE data_keluarga SET 
//     nama_keluarga ='$nama_keluarga',
//     jenis_kelamin_keluarga = '$jenis_kelamin_keluarga',
//     tempat_lahir_keluarga ='$tempat_lahir_keluarga',
//     tgl_lahir_keluarga ='$tgl_lahir_keluarga',
//     pendidikan_keluarga ='$pendidikan_keluarga',
//     pekerjaan_keluarga ='$pekerjaan_keluarga',
//     status_dalam_keluarga ='$status_dalam_keluarga'
//     WHERE ID_data_pribadi = '$id'
//    ";
//    mysqli_query($db , $query);
//    return mysqli_affected_rows($db);
// };

function regristrasi($data)
{
  global $conn;

  $username = stripslashes($data["username"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);


  //cek jikalau ada username duplikat
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script> 
    alert('user sudah ada');
    </script>";
    return false;
  }

  //cek konfirmasi pw
  if ($password !== $password2) {
    echo "<script> alert('konfirmasi pasword tidak sesuai!');
    </script>";
    return false;
  }

  //enskirpsi paassword
  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambahkan user baru ke database

  mysqli_query($conn, "INSERT INTO user VALUES('', '$username','$password')");

  return mysqli_affected_rows($conn);
}
?>