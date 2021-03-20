<?php
$page = isset($_GET['page']) ? $_GET['page'] : "";
$level = isset($_SESSION['LOG_LEVEL']) ? $_SESSION['LOG_LEVEL'] : "";
?>
<li <?php if ($page == "") echo 'class="active"'; ?>><a href="./"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
<li><a href="home" target="_blank"><i class="fa fa-rss"></i> <span>Tentang</span></a></li>

<?php if ($level == "Admin") { ?>
    <li <?php if ($page == "admin" || $page == "update_admin") echo 'class="active"'; ?>><a href="?page=admin"><i class="fa fa-user"></i> <span>Admin</span></a></li>
    <li <?php if ($page == "dokter" || $page == "update_dokter") echo 'class="active"'; ?>><a href="?page=dokter"><i class="fa fa-user-md"></i> <span>Dokter</span></a></li>
    <li <?php if ($page == "user" || $page == "update_user") echo 'class="active"'; ?>><a href="?page=user"><i class="fa fa-users"></i> <span>User</span></a></li>
    <li <?php if ($page == "riwayat" || $page == "update_riwayat") echo 'class="active"'; ?>><a href="?page=riwayat"><i class="fa fa-history"></i> <span>Riwayat Diagnosa</span></a></li>

<?php } elseif ($level == "Dokter") { ?>
    <li <?php if ($page == "gejala" || $page == "update_gejala") echo 'class="active"'; ?>><a href="?page=gejala"><i class="fa fa-heartbeat"></i> <span>Gejala</span></a></li>
    <li <?php if ($page == "penyakit" || $page == "update_penyakit") echo 'class="active"'; ?>><a href="?page=penyakit"><i class="fa fa-medkit"></i> <span>Penyakit</span></a></li>
    <li <?php if ($page == "rule" || $page == "update_rule") echo 'class="active"'; ?>><a href="?page=rule"><i class="fa fa-book"></i> <span>Aturan</span></a></li>
    <li <?php if ($page == "riwayat" || $page == "update_riwayat") echo 'class="active"'; ?>><a href="?page=riwayat"><i class="fa fa-history"></i> <span>Riwayat Diagnosa</span></a></li>

<?php } elseif ($level == "User") { ?>
    <li <?php if ($page == "konsultasi") echo 'class="active"'; ?>><a href="?page=konsultasi"><i class="fa fa-check"></i> <span>Konsultasi</span></a></li>
    <li <?php if ($page == "riwayat" || $page == "update_riwayat") echo 'class="active"'; ?>><a href="?page=riwayat"><i class="fa fa-history"></i> <span>Riwayat Diagnosa</span></a></li>

<?php } ?>

<li <?php if ($page == "password") echo 'class="active"'; ?>><a href="?page=password"><i class="fa fa-unlock-alt"></i> <span>Ubah Password</span></a></li>
<li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>