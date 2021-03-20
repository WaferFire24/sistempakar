<?php
switch($page){
	case 'proses_konsultasi':
		include "konsultasi_proses.php";
		break;
	case 'konsultasi':
		include "konsultasi.php";
		break;
	case 'riwayat':
		include "riwayat.php";
		break;
	case 'update_riwayat':
		include "riwayat_update.php";
		break;
	case 'user':
		include "user.php";
		break;
	case 'update_user':
		include "user_update.php";
		break;
	case 'dokter':
		include "dokter.php";
		break;
	case 'update_dokter':
		include "dokter_update.php";
		break;
	case 'admin':
		include "admin.php";
		break;
	case 'update_admin':
		include "admin_update.php";
		break;
	case 'gejala':
		include "gejala.php";
		break;
	case 'update_gejala':
		include "gejala_update.php";
		break;
	case 'penyakit':
		include "penyakit.php";
		break;
	case 'update_penyakit':
		include "penyakit_update.php";
		break;
	case 'rule':
		include "rule.php";
		break;
	case 'update_rule':
		include "rule_update.php";
		break;
	case 'password':
		include "password.php";
		break;

	default:
		include "beranda.php";
		break;
}
