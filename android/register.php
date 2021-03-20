<?php
include '../koneksi.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
$response = array();

if (isset($input['nama_lengkap']) && isset($input['username']) && isset($input['password'])) {

    $nama_lengkap = $input['nama_lengkap'];
    $username = $input['username'];
    $password = $input['password'];
    $level = 'User';

    if (mysqli_num_rows(mysqli_query($con, "select * from pengguna where username='" . $username . "'")) > 0) {
        $response["status"] = 1;
        $response["message"] = "Username sudah digunakan";
    } else {
        $q = "insert into pengguna(nama_lengkap,username,password,level) values ('" . $nama_lengkap . "','" . $username . "','" . $password . "','" . $level . "')";
        mysqli_query($con, $q);
        $response["status"] = 0;
        $response["message"] = "Register berhasil";
    }
} else {
    $response["status"] = 2;
    $response["message"] = "Parameter ada yang kosong";
}
echo json_encode($response);
