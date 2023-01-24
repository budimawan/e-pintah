  <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Permohonan Hak Pakai </h3>
              <a href="<?= base_url();?>Pengajuan/download_blanko" class="btn">
                <button type="button" class="btn btn-outline-warning "><i class="mdi mdi-file-pdf"></i><small>Download Form</small></button>
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

                              <?= $this->session->flashdata('message');?>

                              <h4 class="card-title text-warning">pengajuan baru</h4>
                              <p class="card-description text-warning" style="margin: -18px 0px 0px 0px;"><small>Persiapkan dokumen dokumen pendukung seperti : KTP, Surat Bukti Perolehan/Penguasaan Tanah, Surat Permohonan Hak Pakai, Surat Pernyataan Asset & Data Pendudukung Lainnya (bila ada). Setiap pengajuan yang terkirim hanya dapat di batalkan atau di edit apabila admin kantor pertanahan kabupaten konawe selatan telah memeriksa form pengajuan anda, pastikan data yang anda ajukan telah benar agar pengajuan anda valid ! </code></small>
                              </p>

                              <hr color = white size = “2” width = “80%”>
                              <hr color = white size = “2” width = “80%”>

                              <?php echo form_open_multipart('pengajuan/ajukan');?>

                              <p class="card-description"> Yang bertanda tangan di bawah ini kami 
                                <input type="text" class="" id="nama_lengkap2" name="nama_lengkap2" placeholder="Nama Pemohon" required="">, alamat Desa/Kel 
                                <input type="text" class="" id="kel2" name="kel2" placeholder="Nama kelurahan" required=""> Kecamatan/Kota 
                                <input type="text" class="" id="kec2" name="kec2" placeholder="Nama kecamatan" required="">, dalam hal ini bertindak untuk dan atas nama <?= $user['instansi']?>, dengan ini mengajukan permohonan hak PAKAI dengan keterangan sebagai berikut :
                              </p>

                              <hr>
                              <hr>
                              <h4 class="card-title text-center">A. MENGENAI DIRI PEMOHON</h4>
                              
                                <div class="form-group row">
                                  <label for="exampleInput1" class="col-sm-3 col-form-label">a. Nama lengkap</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap tanpa title" required="">
                                      <div class="invalid-feedback">
                                        Masukkan nama lengkap anda !
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput2" class="col-sm-3 col-form-label">b. Tempat/ Tgl. Lahir </label>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat." required="">
                                    <div class="invalid-feedback">
                                      Masukkan tempat lahir anda !
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="date" class="form-control" id="ttl" name="ttl" placeholder="Tanggal." required="">
                                    <div class="invalid-feedback">
                                      Masukkan tanggal lahir anda !
                                    </div>
                                  </div>
                                  <div class="col-sm-6"></div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput3" class="col-sm-3 col-form-label">c. Kewarganegaraan </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="negara" name="negara" placeholder="Kewarganegaraan" value="Indonesia" required="">
                                    <div class="invalid-feedback">
                                      Warganegara harus Indonesia !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput4" class="col-sm-12 col-form-label">d. Kartu Tanda Penduduk atau Dokumen Kependudukan lainnya </label>
                                  <label for="exampleInput4" class="col-sm-2 col-form-label">- Tanggal & Nomor </label>
                                  <div class="col-sm-1"></div>
                                  <div class="col-sm-3">
                                    <input type="date" class="form-control" id="ktp_tgl" name="ktp_tgl" placeholder="Tanggal" required="">
                                    <div class="invalid-feedback">
                                      Masukkan tanggal KTP anda !
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="number" class="form-control" id="ktp_no" name="ktp_no" placeholder="Nomor" required="">
                                    <div class="invalid-feedback">
                                      Masukkan nomor KTP anda !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput5" class="col-sm-3 col-form-label">e. Pekerjaan </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required="">
                                    <div class="invalid-feedback">
                                      Masukkan pekerjaan anda !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput5" class="col-sm-3 col-form-label">f. Tempat tinggal </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required="">
                                    <div class="invalid-feedback">
                                      Masukkan alamat anda !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput5" class="col-sm-12 col-form-label">Dalam hal ini bertindak untuk dan atas nama :  <strong><?= $user['instansi'] ?></strong></label>
                                </div>

                                <hr>
                                <hr>
                                <h4 class="card-title text-center">B. MENGENAI TANAH YANG DIMOHON </h4>
                                <h5 class="card-title">1. Letaknya : </h5>
                                <div class="form-group row">
                                  <label for="exampleInput1" class="col-sm-3 col-form-label">- Jalan </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="letak_jalan" name="letak_jalan" placeholder="Jalan" required="">
                                    <div class="invalid-feedback">
                                      Masukkan alamat jalan tanah yang dimohon !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput2" class="col-sm-3 col-form-label">- Desa/Kelurahan </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="letak_kel" name="letak_kel" placeholder="Desa/kel." required="">
                                    <div class="invalid-feedback">
                                      Masukkan alamat kelurahan tanah yang dimohon !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput3" class="col-sm-3 col-form-label">- Kecamatan </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="letak_kec" name="letak_kec" placeholder="Kec." required="">
                                    <div class="invalid-feedback">
                                      Masukkan lokasi kecamatan tanah yang dimohon !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput3" class="col-sm-3 col-form-label">- Kabupaten </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="letak_kab" name="letak_kab" placeholder="kabupaten" value="Konawe Selatan" required="" >
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput3" class="col-sm-3 col-form-label">- Provinsi </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="letak_prov" name="letak_prov" placeholder="provinsi" value="Sulawesi Tenggara" required="">
                                  </div>
                                </div>

                                <h5 class="card-title" class="col-sm-3">2. Luas   : </h5>
                                <div class="form-group row">
                                  <label for="exampleInput1" class="col-sm-3 col-form-label">- Luasan ± </label>
                                  <div class="col-sm-9">
                                    <input type="number" class="form-control" id="luas" name="luas" placeholder="± ...... M2" required="">
                                    <div class="invalid-feedback">
                                      Masukkan luasan tanah yang dimohon !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput4" class="col-sm-3 col-form-label">- Surat Ukur </label>
                                  <div class="col-sm-3">
                                    <input type="date" class="form-control" id="su_tgl" name="su_tgl" placeholder="Tanggal" >
                                    <!-- <div class="invalid-feedback">
                                      Masukkan tanggal surat ukur !
                                    </div> -->
                                  </div>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="su_no" name="su_no" placeholder="Nomor" >
                                    <!-- <div class="invalid-feedback">
                                      Masukkan nomor surat ukur !
                                    </div> -->
                                  </div>
                                  <div class="col-sm2"></div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput4" class="col-sm-3 col-form-label">- Peta Bidang </label>
                                  <div class="col-sm-3">
                                    <input type="date" class="form-control" id="pb_tgl" name="pb_tgl" placeholder="Tanggal" >
                                    <!-- <div class="invalid-feedback">
                                      Masukkan tanggal peta bidang !
                                    </div> -->
                                  </div>
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control" id="pb_no" name="pb_no" placeholder="Nomor" >
                                    <!-- <div class="invalid-feedback">
                                      Masukkan nomor peta bidang !
                                    </div> -->
                                  </div>
                                  <div class="col-sm2"></div>
                                </div>

                                <h5 class="card-title">3. Batas-Batas Bidang Tanah : </h5>
                                <div class="form-group row">
                                  <label for="exampleInput1" class="col-sm-3 col-form-label">- Utara </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="batas_u" name="batas_u" placeholder="Utara " required="">
                                    <div class="invalid-feedback">
                                      Masukkan batas utara !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput2" class="col-sm-3 col-form-label">- Timur </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="batas_t" name="batas_t" placeholder="Timur" required="">
                                    <div class="invalid-feedback">
                                      Masukkan batas timur !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput3" class="col-sm-3 col-form-label">- Selatan </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="batas_s" name="batas_s" placeholder="Selatan" required="">
                                    <div class="invalid-feedback">
                                      Masukkan batas selatan !
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput3" class="col-sm-3 col-form-label">- Barat </label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="batas_b" name="batas_b" placeholder="Barat" required="">
                                    <div class="invalid-feedback">
                                      Masukkan batas barat !
                                    </div>
                                  </div>
                                </div>

                                <h5 class="card-title">4. Status Tanah (Hak yang melekat di atas tanah) : <strong>Tanah Negara dikuasai </strong></h5>
                                <h5 class="card-title">5. Jenis dan Keadaan Tanah : <strong>Tanah Kering</strong>  </h5>
                                <h5 class="card-title">6. Peruntukan & Penguasaan :  </h5>
                                <div class="form-group row">
                                  <label for="exampleInput3" class="col-sm-12 col-form-label" >- Dipergunakan Untuk </label>
                                  <div class="col-sm-12">
                                    <textarea type="text" class="form-control" id="cat_a" name="cat_a" placeholder="Dipergunakan Untuk?" rows="5" required=""></textarea>
                                    <div class="invalid-feedback">
                                       Anda harus mengisi field ini
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label for="exampleInput3" class="col-sm-12 col-form-label">- Jelaskan riwayat perolehan/Penguasaannya </label>
                                  <div class="col-sm-12">
                                    <textarea type="text" class="form-control" id="cat_b" name="cat_b" placeholder="Riwayat penguasaan?" rows="5" required=""></textarea>
                                    <div class="invalid-feedback">
                                       Anda harus mengisi field ini
                                    </div>
                                  </div>
                                </div>
                              
                                <hr>
                                <hr>
                                <h4 class="card-title text-center">D. SURAT-SURAT YANG DILAMPIRAKAN</h4>

                                <div class="form-group">
                                   <p class="card-description" for="invalidCheck"> Scan KTP dalam format (.pdf) contoh : <b><strong>KTP.pdf</strong></b>, lalu pastikan file tersebut memiliki ukuran file tidak lebih dari 2046 KB / 2 MB. </p>
                                    <label><b>File 1). </b> KTP </label>
                                    <div class="col-sm-6">
                                    <input type="file" class="file-upload-default" id="file_a" name="file_a">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" readonly="" placeholder="Tidak ada file dipilih">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Pilih File</button>
                                      </span>
                                    </div>
                                    </div>
                                    <div class="col-sm-6"></div>
                                  </div>

                                <hr>
                                <div class="form-group">
                                   <p class="card-description" for="invalidCheck"> Scan Surat Bukti perolehan/penguasaan tanah dengan format (.pdf) contoh : <b><strong>Surat_penguasaan_tanah.pdf</strong></b>, lalu pastikan file tersebut memiliki ukuran file tidak lebih dari 2046 KB / 2 MB. </p>
                                  <label><b>File 2). </b> Surat Bukti Perolehan/Penguasaan Tanah </label>
                                  <div class="col-sm-6">
                                    <input type="file" class="file-upload-default" id="file_b" name="file_b">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" readonly="" placeholder="Tidak ada file dipilih">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Pilih File</button>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-sm-6"></div>
                                  </div>

                                <hr>
                                <div class="form-group">
                                   <p class="card-description" for="invalidCheck"> Gabungkan file scan 1.Surat Pernyataan Asset, 2.Surat-Surat/Data Pendudukung Lainnya (bila ada), dalam satu file dengan format (.pdf) contoh : <b><strong>file_scan_gabung.pdf</strong></b>, lalu pastikan file tersebut memiliki ukuran file tidak lebih dari 2046 KB / 2 MB. </p>
                                  <label><b>File 3). </b> Surat Pernyataan Asset & Data Pendudukung Lainnya (bila ada) </label>
                                  <div class="col-sm-6">
                                    <input type="file" class="file-upload-default" id="file_c" name="file_c">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" readonly="" placeholder="Tidak ada file dipilih">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Pilih File</button>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-sm-6"></div>
                                  </div>

                                <hr>
                                <div class="form-group">
                                   <p class="card-description" for="invalidCheck"> Scan Blangko Permohonan Hak Pakai yang sudah tertanda tangan dengan format (.pdf) contoh : <b><strong>Permohonan_hak_pakai.pdf</strong></b>, lalu pastikan file tersebut memiliki ukuran file tidak lebih dari 2046 KB / 2 MB. </p>
                                  <label><b>File 4). </b> Permohonan Hak Pakai </label>
                                  <div class="col-sm-6">
                                    <input type="file" class="file-upload-default" id="file_d" name="file_d">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" readonly="" placeholder="Tidak ada file dipilih">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Pilih File</button>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-sm-6"></div>
                                  </div>
                                  
                                  <hr>
                                  <hr>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="form-check form-check-warning">
                                        <label class="form-check-label" for="invalidCheck"> 
                                          <p class="card-description" for="invalidCheck"> Apabila permohonan tersebut dikabulkan pemohon bersedia memenuhi/mematuhi syarat-syarat yang telah dan akan ditetapkan oleh pemerintah. </p>
                                          <input type="checkbox" class="form-check-input" id="invalidCheck" required="">
                                        </label>
                                        <div class="invalid-feedback">
                                          You must agree before submitting.
                                        </div>
                                      </div>
                                      <div class="form-check form-check-warning">
                                        <label class="form-check-label" for="invalidCheck2"> 
                                          <p class="card-description" for="invalidCheck2"> Demikian keterangan dalam permohonan ini dibuat dengan sebenarnnya dan kami bertanggung jawab bilamana memberikan keterangan yang tidak benar dapat dituntut di hadapan yang berwajib. </p>
                                          <input type="checkbox" class="form-check-input" id="invalidCheck2" required="">
                                         </label>
                                      </div>
                                    </div>
                                  </div>

                                <hr color = white size = “2” width = “80%”>
                                <hr color = white size = “2” width = “80%”>
                                <div class="form-group col-md-6">
                                  <label for="exampleTextarea1">Catatan</label>
                                  <textarea class="form-control" id="cat_c" rows="4" name="cat_c" placeholder="catatan!"></textarea>
                                </div>

                                <div class="col-md-6" class="form-group">
                                  <button data-target="#newMenuModal"data-toggle="modal" type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>
                                      
                              <?php echo form_close(); ?>

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
