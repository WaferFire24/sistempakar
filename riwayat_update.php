<?php
$link_data = '?page=riwayat';

$action = empty($_GET['action']) ? '' : $_GET['action'];

if ($action == 'delete') {
    $id = $_GET['id'];
    mysqli_query($con, "delete from riwayat where id_riwayat='" . $id . "'");
    exit("<script>location.href='" . $link_data . "';</script>");
}
