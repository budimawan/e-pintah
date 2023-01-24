<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'db_epintah'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$table_name = 'sales';

$sql = 'SELECT email, nama_lengkap, ktp_no, status, tgl_ajuan FROM pengajuan_a WHERE id=$id ';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('ERROR: Tabel ' . $table_name . ' gagal dibuat: ' . mysqli_error($conn));
}