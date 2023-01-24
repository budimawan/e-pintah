<!DOCTYPE html>
<html>
<head><title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-PiNTAh</title>
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url(''); ?>assets/images/favicon.png" />
</title></head>
<body>
            <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">

                              <?= $this->session->flashdata('message');?>

                              <p class="text-right"><?= $user['kec'] ?>, Tgl <?php echo date('d-m-Y',strtotime($pengajuan["tgl_ajuan"]))?></p>
                              <h4 class="card-title ">PERMOHONAN HAK PAKAI</h4>

                              <div class="col-sm-3 text-right offset-sm-2"></div>
                              <div class="col-sm-4 offset-sm-8 text-left">
                                <p class="card-description" style="margin: 0px 0px 0px 0px;">Kepada Yth.</p>
                                <p class="card-description" style="margin: 0px 0px 0px 0px;">Bapak/Ibu Kepala Kantor Pertanahan</p>
                                <p class="card-description" style="margin: 0px 0px 0px 0px;">di-</p>
                                <p class="card-description" style="margin: 0px 0px 20px 20px;">Andoolo</p>
                              </div>
                              <p class="card-description"> Yang bertanda tangan di bawah ini kami <strong><b><?= $user['instansi'] ?></b></strong>, alamat Desa/Kel <strong><b><?= $user['kel'] ?></b></strong> Kecamatan <strong><b><?= $user['kec'] ?></b></strong>, dalam hal ini bertindak untuk dan atas nama Pemerintah Kabupaten Konawe Selatan, dengan ini mengajukan permohonan hak PAKAI dengan keterangan sebagai berikut :</p>

                              <h6 class="card-description" style="margin: 0px 0px -2px 0px;">A. MENGENAI DIRI PEMOHON</h6>
                              
                              <?php echo form_open_multipart('pengajuanterkirim/editPengajuan/');?>

                                <div class="form-group row">
                                  <div class="col-md-11"></div>
                                  <div class="col-sm-1">
                                    <input type="text" class="form-control" id="id" name="id" placeholder="Nama lengkap tanpa title" required="" value="<?= $pengajuan['id']?>" hidden>
                                      <div class="invalid-feedback">
                                        Masukkan nama lengkap anda !
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">a. Nama lengkap</label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['nama_lengkap']?></b></strong></label>
                                  </div>
                                </div>

                                <?php 
                                  $data = $pengajuan['ttl'];
                                  $e= explode(',', $data);
                                  $tmp = ($e[0]);
                                  $tgl = ($e[1]);
                                ?>

                                <div class="form-group row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">b. Tempat/ Tgl. Lahir</label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $tmp?> </b></strong></label>
                                    <label class="card-description col-form-label"><strong><b>,  <?php echo date('Y-m-d',strtotime($tgl))?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">c. Kewarganegaraan </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['negara']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-12 col-form-label">d. Kartu Tanda Penduduk atau Dokumen Kependudukan lainnya </label>
                                    <label class="card-description col-sm-3 col-form-label" >- Tanggal </label>
                                    <div class="col-sm-1">
                                      <label class="card-description col-form-label">:</label>
                                    </div>
                                    <div class="col-sm-8">
                                      <label class="card-description col-form-label"><strong><b><?= $pengajuan['ktp_no']?></b></strong></label>
                                    </div>
                                  <label class="card-description col-sm-3 col-form-label" style="margin: 0px 0px 0px 0px;">- Tanggal </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?php echo date('d-M-Y',strtotime($pengajuan["ktp_tgl"]))?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">e. Pekerjaan </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['pekerjaan']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">f. Tempat tinggal </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['alamat']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput5" class="card-description col-sm-12 col-form-label">Dalam hal ini bertindak untuk dan atas nama   <strong><b> <?= $user['instansi'] ?></b></strong></label>
                                </div>

                                <h6 class="card-description" style="margin: 0px 10px 23px 0px;">B. MENGENAI TANAH YANG DIMOHON</h6>
                                <h5 class="card-description card-title" style="margin: 0px 0px 0px 0px;">1. Letaknya : </h5>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Jalan </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['letak_jalan']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Desa/Kelurahan </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['letak_kel']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Kecamatan </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['letak_kec']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Kabupaten </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['letak_kab']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Provinsi </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['letak_prov']?></b></strong></label>
                                  </div>
                                </div>

                                <h5 class="card-description card-title" style="margin: 8px 0px 0px 0px;">2. Luas   : </h5>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Luasan ± </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['luas']?> M2 </b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Surat Ukur </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label">Tanggal <strong><b><?php echo date('Y-m-d',strtotime($pengajuan["su_tgl"]))?></b></strong> Nomor  <strong><b><?= $pengajuan['su_no']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Peta Bidang </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label">Tanggal <strong><b><?php echo date('Y-m-d',strtotime($pengajuan["pb_tgl"]))?></b></strong> Nomor  <strong><b><?= $pengajuan['pb_no']?></b></strong></label>
                                  </div>
                                </div>

                                <h5 class="card-description card-title" style="margin: 8px 0px 0px 0px;">3. Batasan-Batasannya : </h5>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Utara </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['batas_u']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Timur </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['batas_t']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Selatan </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['batas_s']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Barat </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['batas_b']?></b></strong></label>
                                  </div>
                                </div>

                                <h5 class="card-description card-title" style="margin: 8px 0px 0px 0px;">4. Status Tanah (Hak yang melekat di atas tanah) : <strong><b>Tanah Negara dikuasai </b></h5>

                                <h5 class="card-description card-title" style="margin: 8px 0px 0px 0px;">5. Jenis dan Keadaan Tanah : <b><strong>Tanah Kering</strong></b></h5>
                                
                                <h5 class="card-description card-title" style="margin: 8px 0px 0px 0px;">6. Peruntukan & Penguasaan :</h5>
                                
                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Dipergunakan Untuk </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['cat_a']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Jelaskan riwayat perolehan/Penguasaannya </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['cat_b']?></b></strong></label>
                                  </div>
                                </div>
                              
                                <h6 class="card-description" style="margin: 10px 10px 15px 0px;">D. SURAT-SURAT YANG DILAMPIRAKAN </h6>

                                <h5 class="card-description card-title" style="margin: 0px 0px 0px 0px;">File 1. (KTP Pemohon)</h5>
                                <div class="form-group">
                                   <p class="card-description" for="invalidCheck"> Scan KTP dalam format (.pdf) contoh : <b><strong>KTP.pdf</strong></b>, lalu pastikan file tersebut memiliki ukuran file tidak lebih dari 2046 KB / 2 MB. </p>
                                    <div class="col-sm-6">
                                    <input type="file" class="file-upload-default" id="file_a" name="file_a">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" Readonly placeholder="Tidak ada file dipilih" value="<?= $pengajuan['file_a']?>" id="file_a" name="file_a">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Pilih File</button>
                                      </span>
                                    </div>
                                    </div>
                                    <div class="col-sm-6"></div>
                                  </div>

                                <h5 class="card-description card-title" style="margin: 0px 0px 0px 0px;">File 2. (Surat Bukti Perolehan/Penguasaan Tanah) </h5>
                                <div class="form-group">
                                   <p class="card-description" for="invalidCheck"> Scan Surat Bukti perolehan/penguasaan tanah dengan format (.pdf) contoh : <b><strong>Surat_penguasaan_tanah.pdf</strong></b>, lalu pastikan file tersebut memiliki ukuran file tidak lebih dari 2046 KB / 2 MB. </p>
                                  <div class="col-sm-6">
                                    <input type="file" class="file-upload-default" id="file_b" name="file_b">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" Readonly placeholder="Tidak ada file dipilih" value="<?= $pengajuan['file_b']?>" id="file_b" name="file_b">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Pilih File</button>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-sm-6"></div>
                                  </div>

                                <h5 class="card-description card-title" style="margin: 0px 0px 0px 0px;">File 3. (Surat Pernyataan Asset Data Pendudukung Lainnya bila ada) </h5>
                                <div class="form-group">
                                   <p class="card-description" for="invalidCheck"> Gabungkan file scan 1.Surat Pernyataan Asset, 2.Surat-Surat /Data Pendudukung Lainnya (bila ada), dalam satu file dengan format (.pdf) contoh : <b><strong>file_scan_gabung.pdf</strong></b>, lalu pastikan file tersebut memiliki ukuran file tidak lebih dari 2046 KB / 2 MB. </p>
                                  <div class="col-sm-6">
                                    <input type="file" class="file-upload-default" id="file_c" name="file_c">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" Readonly placeholder="Tidak ada file dipilih" value="<?= $pengajuan['file_c']?>" id="file_c" name="file_c">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Pilih File</button>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-sm-6"></div>
                                  </div> 

                                <!-- <div class="form-group">
                                  <label for="exampleTextarea1">Catatan</label>
                                  <textarea class="form-control" id="cat_c" rows="4" name="cat_c" placeholder="catatan!" > <?= $pengajuan['cat_c']?> </textarea>
                                </div> -->
                              
                                  <br>
                                  <p class="card-description"> Apabila permohonan tersebut dikabulkan pemohon bersedia memenuhi/mematuhi syarat-syarat yang telah dan akan ditetapkan oleh pemerintah. Demikian keterangan dalam permohonan ini dibuat dengan sebenarnnya dan kami bertanggung jawab bilamana memberikan keterangan yang tidak benar dapat dituntut di hadapan yang berwajib. </p>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>

            <script src="<?= base_url(''); ?>assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="<?= base_url(''); ?> assets/vendors/chart.js/Chart.min.js"></script>
            <script src="<?= base_url(''); ?> assets/vendors/progressbar.js/progressbar.min.js"></script>
            <script src="<?= base_url(''); ?>assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
            <script src="<?= base_url(''); ?>assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="<?= base_url(''); ?>assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="<?= base_url(''); ?>assets/js/off-canvas.js"></script>
            <script src="<?= base_url(''); ?>assets/js/hoverable-collapse.js"></script>
            <script src="<?= base_url(''); ?>assets/js/misc.js"></script>
            <script src="<?= base_url(''); ?>assets/js/settings.js"></script>
            <script src="<?= base_url(''); ?>assets/js/todolist.js"></script>
            
            <script src="<?= base_url(''); ?>assets/js/file-upload.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page -->
            <script src="<?= base_url(''); ?>assets/js/dashboard.js"></script>

</body></html>

