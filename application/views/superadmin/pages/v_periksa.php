  <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Riwayat Pengajuan</h3>

            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card">
                  <div class="card-body">

                    <?= $this->session->flashdata('message');?>
                    
                    <h4 class="card-title text-center">periksa pengajuan</h4>
                    <p class="card-description"><small>Table dibawah ini berisi riwayat/history pengajuan yang pernah dilakukan oleh OPD yang terdaftar aktif pada sistem pengajuan E-PINTAH. Setiap pengajuan form yang diajukan oleh OPD hanya dapat dilakukan pemeriksaan apabila status pengajuan <i>"terkirim"</i>, periksalah form yang terkirim dengan baik untuk menghindari kesalahan pemeriksaan form ! </code></small>
                    </p>

                    <div class="row">
                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title"><small>History Table</small></h4>
                           
                            <div class="table-responsive">
                              <table class="table table-bordered table-contextual table-responsive table-sm">
                                <thead>
                                  <tr class="bg-dark">
                                    <th class="text-center text-warning"><small>NO</small></th>
                                    <th class="text-center text-warning"><small>AKUN</small></th>
                                    <th class="text-center text-warning"><small>NAMA PEMOHON</small></th>
                                    <th class="text-center text-warning"><small>TANGGAL <br> DIAJUKAN</small></th>
                                    <th class="text-center text-warning"><small>LUAS TANAH</small></th>
                                    <th class="text-center text-warning"><small>KEGUNAAN</small></th>
                                    <th class="text-center text-warning"><small>STATUS</small></th>
                                    <th class="text-center text-warning"><small>LAST UPDATE</small></th>
                                    <th width="90px" class="text-center text-warning" ><small>AKSI</small></th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <?php $i = 1; ?>
                                  <?php foreach ($pengajuan as $d ) : ?>
                                  <tr >
                                      <td scope="row" class="<?php if ($d['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($d['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?= $i; ?>
                                      </td>
                                      <td scope="row" class="<?php if ($d['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($d['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?= $d['email'] ?></small>
                                      </td>
                                      <td class="<?php if ($d['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($d['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?= $d['nama_lengkap'] ?><br>NIK. <?= $d['ktp_no'] ?></small>
                                      </td>
                                      <td class="<?php if ($d['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($d['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?php echo date('d-M-Y',strtotime($d["tgl_ajuan"]))?></small>
                                      </td>
                                      <td class="<?php if ($d['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($d['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small>Luas : &plusmn <?= $d['luas'] ?> M<sup>2</sup><br>No. Surat Ukur :<br><?= $d['su_no'] ?></small>
                                      </td> 
                                      <td class="<?php if ($d['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($d['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?= $d['cat_a'] ?></small>
                                      </td> 
                                      <td class="<?php if ($d['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($d['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small>#. <?= $d['peng_status'] ?><br>#. <?= $d['status_periksa']?></small>
                                      </td>
                                      <td class="<?php if ($d['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($d['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?php echo date('d-M-Y',strtotime($d["tgl_update"]))?><br><?php echo date('h:i:sa',strtotime($d["tgl_update"]))?></small>
                                      </td>
                                      <!-- aksi -->
                                      <td>
                                        <a href="<?= base_url();?>Periksapengajuan/lihat/<?= $d['id'];?>" class="btn btn-xs">
                                          <button type="button" class="btn btn-outline-success btn-sm"><i class="mdi mdi-eye btn-icon-prepend"></i><small>view</small></button>
                                        </a> <br>
                                        <a href="<?= base_url();?>Periksapengajuan/periksa/<?= $d['id'];?>" class="btn-xs btn 
                                            <?php if ($d['status_periksa'] == "sudah diperiksa" || $d['status_periksa'] == "Sudah Diperiksa"){
                                                echo "disabled";
                                              }?>
                                          ">
                                          <button type="button" class="btn btn-outline-warning btn-sm"><i class="mdi mdi-table-edit btn-icon-prepend"></i><small>periksa</small></button>
                                        </a> <br>
                                        <a href="<?= base_url();?>Periksapengajuan/hapus/<?= $d['id'];?>" hidden onclick="return confirm('Apakah anda yakin menghapus pengajuan ini?');" class="btn-xs btn 
                                            <?php if ($d['status_periksa'] == "belum diperiksa" || $d['status_periksa'] == "Belum Diperiksa"){
                                                echo "disabled";
                                              }?>
                                          ">
                                          <button type="button" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-alert btn-icon-prepend"></i><small>delet</small></button>
                                        </a>
                                      </td>
                                      <!-- ens_aksi -->
                                  </tr>
                                  <?php $i++; ?>
                                  <?php endforeach; ?>

                                </tbody>
                              </table>
                              </div>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>