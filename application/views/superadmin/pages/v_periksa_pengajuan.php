  <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> <small>Permohonan Hak Pakai <?= $pengajuan['instansi'] ?> Tanggal <?php echo date('d-M-Y',strtotime($pengajuan["tgl_ajuan"]))?></small> </h3>
              
              <a href="<?= base_url();?>Pengajuanterkirim/cetakpdf/<?= $pengajuan['id'];?>" class="btn disabled" >
                <button type="button" class="btn btn-outline-success "><i class="mdi mdi-printer btn-icon-prepend"></i><small>Print</small></button>
              </a>

            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">

                              <div class="col-sm-12 text-warning">
                                <div class="form-group">
                                  <label for="exampleTextarea1">Notes :</label>
                                  <p><i>"<?= $pengajuan['cat_c']?>"</i></p>
                                </div>
                              </div>

                              <hr color = white size = “2” width = “80%”>
                              <hr color = white size = “2” width = “80%”>

                              <p class="text-right"><?= $pengajuan['kecamatan'] ?>, Tgl <?php echo date('d-m-Y',strtotime($pengajuan["tgl_ajuan"]))?></p>
                              <h4 class="card-title ">PERMOHONAN HAK PAKAI</h4>

                              <div class="col-sm-3 text-right offset-sm-2"></div>
                              <div class="col-sm-4 offset-sm-8 text-left">
                                <p class="card-description" style="margin: 0px 0px 0px 0px;">Kepada Yth.</p>
                                <p class="card-description" style="margin: 0px 0px 0px 0px;">Bapak/Ibu Kepala Kantor Pertanahan</p>
                                <p class="card-description" style="margin: 0px 0px 0px 0px;">di-</p>
                                <p class="card-description" style="margin: 0px 0px 20px 20px;">Andoolo</p>
                              </div>
                              <p class="card-description"> Yang bertanda tangan di bawah ini kami <strong><b><?= $pengajuan['instansi'] ?></b></strong>, alamat Desa/Kel <strong><b><?= $pengajuan['kelurahan'] ?></b></strong> Kecamatan <strong><b><?= $pengajuan['kecamatan'] ?></b></strong>, dalam hal ini bertindak untuk dan atas nama <?= $user['instansi']?>, dengan ini mengajukan permohonan hak PAKAI dengan keterangan sebagai berikut :</p>

                              <h6 class="card-description" style="margin: 0px 0px -2px 0px;">A. MENGENAI DIRI PEMOHON</h6>
                              
                               <?php echo form_open_multipart('Periksapengajuan/koreksiPengajuan/');?>

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
                                    <label class="card-description col-form-label"><strong><b>,  <?php echo date('d-m-Y',strtotime($tgl))?></b></strong></label>
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

                                <!-- form_koreksi -->
                                <div class="card-description  row text-warning">
                                  <label for="exampleInput3" class="col-sm-12 col-form-label text-center">KOREKSI : </label>
                                  <p><small>Pilihlah option di bawah (valid/unvalid), lalu masukkan koreksi anda terhadap data pengajuan di atas. Jika data sudah valid maka tulis di kolom koreksi <u>"data sudah valid"</u></small></p>
                                  <div class="col-md-2">
                                    <div class="custom-control custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation2" name="r_koreksi_a" required value="valid">
                                      <label class="custom-control-label" for="customControlValidation2">Data valid</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                      <input type="radio" class="custom-control-input" id="customControlValidation3" name="r_koreksi_a" required value="unvalid">
                                      <label class="custom-control-label" for="customControlValidation3">Data Unvalid</label>
                                      <div class="invalid-feedback">More example invalid feedback text</div>
                                    </div>    
                                  </div>
                                  <div class="col-sm-10">
                                    <textarea type="text" class="form-control text-warning" id="koreksi_a" name="koreksi_a" placeholder="masukkan koreksi anda !" rows="6" required=""></textarea>
                                    <div class="invalid-feedback">
                                       Anda harus mengisi field ini
                                    </div>
                                  </div>
                                </div>
                                <!-- end_form_koreksi -->

                                <hr color = white size = “2” width = “80%”>
                                <hr color = white size = “2” width = “80%”>

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
                                    <label class="card-description col-form-label"><strong><b><?= $pengajuan['luas']?> M<sup>2</sup> </b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Surat Ukur </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label">Tanggal <strong><b><?php echo date('d-m-Y',strtotime($pengajuan["su_tgl"]))?></b></strong> Nomor  <strong><b><?= $pengajuan['su_no']?></b></strong></label>
                                  </div>
                                </div>

                                <div class="form-group  row" style="margin: 0px 0px -5px 0px;">
                                  <label class="card-description col-sm-3 col-form-label">- Peta Bidang </label>
                                  <div class="col-sm-1">
                                    <label class="card-description col-form-label">:</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <label class="card-description col-form-label">Tanggal <strong><b><?php echo date('d-m-Y',strtotime($pengajuan["pb_tgl"]))?></b></strong> Nomor  <strong><b><?= $pengajuan['pb_no']?></b></strong></label>
                                  </div>
                                </div>

                                <h5 class="card-description card-title" style="margin: 8px 0px 0px 0px;">3. Batas-Batas Bidang Tanah : </h5>

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

                                <!-- form_koreksi -->
                                <div class="card-description  row text-warning">
                                  <label for="exampleInput3" class="col-sm-12 col-form-label text-center">KOREKSI : </label>
                                  <p><small>Pilihlah option di bawah (valid/unvalid), lalu masukkan koreksi anda terhadap data pengajuan di atas. Jika data sudah valid maka tulis di kolom koreksi <u>"data sudah valid"</u></small></p>
                                  <div class="col-md-2">
                                    <div class="custom-control custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation5" name="r_koreksi_b" required value="valid">
                                      <label class="custom-control-label" for="customControlValidation5">Data valid</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                      <input type="radio" class="custom-control-input" id="customControlValidation6" name="r_koreksi_b" required value="unvalid">
                                      <label class="custom-control-label" for="customControlValidation6">Data Unvalid</label>
                                      <div class="invalid-feedback">More example invalid feedback text</div>
                                    </div>    
                                  </div>
                                  <div class="col-sm-10">
                                    <textarea type="text" class="form-control text-warning" id="koreksi_b" name="koreksi_b" placeholder="masukkan koreksi anda !" rows="6" required=""></textarea>
                                    <div class="invalid-feedback">
                                       Anda harus mengisi field ini
                                    </div>
                                  </div>
                                </div>
                                <!-- end_form_koreksi -->

                                <hr color = white size = “2” width = “80%”>
                                <hr color = white size = “2” width = “80%”>
                              
                                <h6 class="card-description" style="margin: 20px 10px 15px 0px;">C. SURAT-SURAT YANG DILAMPIRAKAN </h6>

                                <h6 class="card-description" style="margin: 0px 0px 0px 0px;">1. Fotocopy KTP / Surat Tanda Kewarganegaraan : 1 lembar <a href="<?= base_url();?>Pengajuanterkirim/download_file/<?= $pengajuan['file_a']?>" class=" "><i class="mdi mdi-small mdi-file-document"></i><small>Lihat KTP</small></button>
                                </a></h6>

                                <h6 class="card-description " style="margin: 0px 0px 0px 0px;">2. Surat Bukti perolehan/penguasaan tanah : 1 lembar <a href="<?= base_url();?>Pengajuanterkirim/download_file/<?= $pengajuan['file_b']?>" class=""><i class="mdi mdi-small mdi-file-document"></i><small>Lihat Surat</small></button>
                                </a></h6>
                                
                                <h6 class="card-description " style="margin: 0px 0px 0px 0px;">3. Surat Pernyataan Asset & Surat-Surat /Data Pendudukung Lainnya (bila ada) : masing-masing 1 lembar <a href="<?= base_url();?>Pengajuanterkirim/download_file/<?= $pengajuan['file_c']?>" class="">
                                  <i class="mdi mdi-small mdi-file-document"></i><small>Lihat File</small></button>
                                </a></h6>

                                <h6 class="card-description " style="margin: 0px 0px 0px 0px;">4. Permohonan Hak Pakai : 1 lembar <a href="<?= base_url();?>Pengajuanterkirim/download_file/<?= $pengajuan['file_d']?>" class="">
                                  <i class="mdi mdi-small mdi-file-document"></i><small>Lihat Permohonan</small></button>
                                </a></h6>

                                  <br>
                                  <p class="card-description"> Apabila permohonan tersebut dikabulkan pemohon bersedia memenuhi/mematuhi syarat-syarat yang telah dan akan ditetapkan oleh pemerintah. Demikian keterangan dalam permohonan ini dibuat dengan sebenarnnya dan kami bertanggung jawab bilamana memberikan keterangan yang tidak benar dapat dituntut di hadapan yang berwajib. </p>

                                <!-- form_koreksi -->
                                <div class=" card-description row text-warning">
                                  <label for="exampleInput3" class="col-sm-12 col-form-label text-center">KOREKSI : </label>
                                  <p><small>Pilihlah option di bawah (valid/unvalid), lalu masukkan koreksi anda terhadap data pengajuan di atas. Jika data sudah valid maka tulis di kolom koreksi <u>"data sudah valid"</u></small></p>
                                  <div class="col-md-2">
                                    <div class="custom-control custom-radio">
                                      <input type="radio" class="custom-control-input" id="customControlValidation7" name="r_koreksi_c" required value="valid">
                                      <label class="custom-control-label" for="customControlValidation7">Data valid</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                      <input type="radio" class="custom-control-input" id="customControlValidation8" name="r_koreksi_c" required value="unvalid">
                                      <label class="custom-control-label" for="customControlValidation8">Data Unvalid</label>
                                      <div class="invalid-feedback">More example invalid feedback text</div>
                                    </div>    
                                  </div>
                                  <div class="col-sm-10">
                                    <textarea type="text" class="form-control text-warning" id="koreksi_c" name="koreksi_c" placeholder="masukkan koreksi anda !" rows="6" required=""></textarea>
                                    <div class="invalid-feedback">
                                       Anda harus mengisi field ini
                                    </div>
                                  </div>
                                </div>
                                <!-- end_form_koreksi -->

                                <hr color = white size = “2” width = “80%”>
                                <hr color = white size = “2” width = “80%”>
                                
                                <br>
                                <div class="row">
                                  <div class="form-group">
                                    <div class="form-check form-check-warning">
                                        <label class="form-check-label" for="invalidCheck"> 
                                          <p class="card-description"><small>Pastikan data anda telah memeriksa form pengajuan diatas dengan benar sebelum anda menekan tombol "Submint" !</small></p>
                                          <input type="checkbox" class="form-check-input" id="invalidCheck" required="">
                                         </label>
                                      </div>
                                    
                                    <a href="<?= base_url();?>Periksapengajuan/?>" class="btn">
                                      <button type="button" class="btn btn-outline-primary "><i class="mdi mdi-reply-all btn-icon-prepend"></i><small>Back</small></button>
                                    </a>
                                    <button data-target="#newMenuModal"data-toggle="modal" type="submit" class="btn btn-warning mr-2" onclick="return confirm('Pemriksaan form hanya dapat dilakukan satu kali. Apakah anda yakin dengan koreksi yang anda berikan?');">Submit</button>
                                  </div>
                                </div>
                                      
                              <!-- </form> -->
                              <?php echo form_close(); ?>    
                              <!-- </form> -->

                              <script>
                                      
                                (function() {
                                  'use strict';
                                  window.addEventListener('load', function() {
                                     
                                    var forms = document.getElementsByClassName('needs-validation');
                                     
                                    var validation = Array.prototype.filter.call(forms, function(form) {
                                      form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                          event.preventDefault();
                                          event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                      }, false);
                                    });
                                  }, false);
                                })();
                              </script>

                                  </div>
                                </div>
                              </div>

                              <!-- </form> -->
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
