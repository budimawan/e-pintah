<!doctype html>
<html>
<head>
    <title>This is the title of the webpage!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style type="text/css">

    </style>
</head>
<body>

    <?php
/**
* Created by PhpStorm.
* User: ano
* Date: 3/2/18
* Time: 3:25 PM
*/
if (!empty($_GET)) {//pemilihan kondisi ini akan di eksekusi apabila variabel POST tidak kosong.
    $key = htmlspecialchars($_GET["key"]);
    $ciphertext = base64_decode(htmlspecialchars($_GET["ciphertext"]));
}
//fungsi masih belum dipanngil :D
$decrypted = rc4($key, $ciphertext);
//membuat fungsi rc4

$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'db_epintah'; // Nama Database

// $db_host = 'localhost'; // Nama Server
// $db_user = 'epintahb_budi_epintah'; // User Server
// $db_pass = 'muhammadbudi1234'; // Password Server
// $db_name = 'epintahb_db_epintah'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$table_name = 'sales';

$sql = " SELECT email, nama_lengkap, ktp_no, status, tgl_ajuan, luas FROM pengajuan_a WHERE chipertext='$decrypted' ";
		
$query = mysqli_query($conn, $sql);



if (!$query) {
	die ('ERROR: Tabel ' . $table_name . ' gagal dibuat: ' . mysqli_error($conn));

}

$row = mysqli_fetch_assoc($query)

?>
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 14px">Text sebelum decrypt :</h5>
                    <h5 class="card-title" style="font-size: 14px; text-align: right;" ><b><?php echo "$ciphertext";?></b></h5>
                    <h5 class="card-title" style="font-size: 14px">Text sesudah decrypt :</h5>
                    <h5 class="card-title" style="font-size: 14px; text-align: right;" ><b><?php echo "$decrypted";?></b></h5>
                    <br>
                    <h5 class="card-title" style="font-size: 16px">Data :</h5>
                        <p class="card-text" style="font-size: 14px">
                                                     
                            <table>
                            <tr>
                                <td><small>Email</small></td>
                                <td><small>:</small></td>
                                <td><?= $row['email'];?></small></td>
                            </tr>

                            <tr>
                                <td><small>Nama</small></td>
                                <td><small>:</small></td>
                                <td><small><?= $row['nama_lengkap'];?></small></td>
                            </tr>

                            
                            <tr>
                                <td><small>Luas</small></td>
                                <td><small>:</small></td>
                                <td><small><?= $row['luas'];?></small></td>
                            </tr>

                            <tr>
                                <td><small>NIK</small></td>
                                <td><small>:</small></td>
                                <td><small><?= $row['ktp_no'];?></small></td>
                            </tr>

                            <tr>
                                <td><small>Date</small></td>
                                <td><small>:</small></td>
                                <td><small><?= $row['tgl_ajuan'];?></small></td>
                            </tr>

                            <tr>
                                <td><small>Status</small></td>
                                <td><small>: </small></td>
                                <td><small><?php if ($row['status']==2){
                                    echo "REGISTERED";
                                }else{
                                    echo "NOT VALID";
                                }?></small></td>
                            </tr>
                            
                            </table>

                            <tr>
                                <td><h5><?php if ($row['status']==2){
                                    echo "REGISTERED!";
                                }else{
                                    echo "NOT REGISTERED!";
                                }?></td>
                            </tr>

                        </p>
                </div>
            </div>
        </div>
        <div class="col">      
        </div>
    </div>
</div>


<?php
function rc4($key_str, $data_str)
{//proses enkripsi dan dekripsi dilakukan didalam skrip ini,apabila fungsi dipanggil, kunci dan data teks akan di masukkkan dalam
    //key_str dan data_str
    //insial awal untuk kunci dan data teks
    $kunci = array();
    $data = array();
    //merubah / convert string dari key_str dan data_str ke ASCII masuk dalam array kunci dan data
    for ($a = 0; $a < strlen($key_str); $a++) {
    $kunci[] = ord($key_str{$a});//ord akan convert string satu persatu ke ASCII
}
for ($b = 0; $b < strlen($data_str); $b++) {
$data[] = ord($data_str{$b});//sama dengan for pertama, convert to ASCII
}
//membuat kunci 256bit
for ($knc = 0; $knc < 256; $knc++) {
$state[] = $knc;//membuat array kunci sampai 256
}

//tahap saling menukar nilai data ke indek lain
$len = count($kunci);
$index1 = $index2 = 0; //inisial index1 dan index2 awal sebagai pointer
for ($hitung = 0; $hitung < 256; $hitung++) {
    $index2 = ($kunci[$index1] + $state[$hitung] + $index2) % 256;
$tmp = $state[$hitung]; // mengirim state indek hitung ke variabel smentara
$state[$hitung] = $state[$index2];
$state[$index2] = $tmp; //mengirim nilai dari tmp ke state index2
$index1 = ($index1 + 1) % $len;
}
//enkripsi dengan rc4
$len = count($data);//data dihitung panjang indeksnya
$ix = $iy = 0; //inisial 2 variabel sebagai pointer
for ($hitung1 = 0; $hitung1 < $len; $hitung1++) {
    $ix = ($ix + 1) % 256;
    $iy = ($state[$ix] + $iy) % 256;
$tmp = $state[$ix];//menyetor data ke variabel sementara
$state[$ix] = $state[$iy]; //menukar data
$state[$iy] = $tmp;//menukar data
$data[$hitung1] ^= $state[($state[$ix] + $state[$iy]) % 256]; //operasi ekslusiv or (XOR) yang hasilnya akan di masukkan ke dalam data index hitung1
}

//data waktu di enkripsi maupun dekripsi masih dalam bentuk ASCII.
//convert ke string
$data_str = "";
for ($i = 0; $i < $len; $i++) {
    $data_str .= chr($data[$i]);
}
return $data_str;
//saatnya untuk di uji coba. :D
}
?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>
