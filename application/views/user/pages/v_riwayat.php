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
                    
                    <h4 class="card-title text-center">pengajuan terkirim</h4>
                    <p class="card-description"><small>Table dibawah ini berisi riwayat/history pengajuan yang pernah anda lakukan. Setiap pengajuan yang terkirim hanya dapat di batalkan atau di edit apabila admin kantor pertanahan kota kendari telah memeriksa form pengajuan anda, pastikan data yang anda ajukan telah benar ! </code></small>
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
                                    <th class="text-center text-warning"><small>NAMA PEMOHON</small></th>
                                    <th class="text-center text-warning"><small>TANGGAL <br> DIAJUKAN</small></th>
                                    <th class="text-center text-warning"><small>LUAS TANAH</small></th>
                                    <th class="text-center text-warning"><small>KEGUNAAN</small></th>
                                    <th class="text-center text-warning"><small>STATUS</small></th>
                                    <th class="text-center text-warning"><small>AKSI</small></th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <?php $i = 1; ?>
                                  <?php foreach ($pengajuan as $m ) : ?>
                                  <tr >
                                      <td scope="row" class="<?php if ($m['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($m['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?= $i; ?>
                                      </td>
                                      <td class="<?php if ($m['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($m['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?= $m['nama_lengkap'] ?><br>NIK. <?= $m['ktp_no'] ?></small>
                                      </td>
                                      <td class="<?php if ($m['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($m['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?php echo date('d-M-Y',strtotime($m["tgl_ajuan"]))?></small>
                                      </td>
                                      <td class="<?php if ($m['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($m['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small>Luas : &plusmn <?= $m['luas'] ?>  M<sup>2</sup><br>No. Surat Ukur : <?= $m['su_no'] ?></small>
                                      </td> 
                                      <td class="<?php if ($m['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($m['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small><?= $m['cat_a'] ?></sup></small>
                                      </td>
                                      <td class="<?php if ($m['peng_status'] == "unvalid"){
                                        echo "table-danger";
                                        } if ($m['peng_status'] == "valid"){
                                          echo "table-success";}?>">
                                          <small>#. <?= $m['peng_status'] ?><br>#. <?= $m['status_periksa']?></small>
                                      </td>

                                      <!-- aksi -->
                                      <td>
                                        <a href="<?= base_url();?>Pengajuanterkirim/lihat/<?= $m['id'];?>" class="btn">
                                          <button type="button" class="btn btn-outline-success "><i class="mdi mdi-eye btn-icon-prepend"></i><small>view</small></button>
                                        </a> <br>
                                        <a href="<?= base_url();?>Pengajuanterkirim/edit/<?= $m['id'];?>" class="btn 
                                            <?php if ($m['status_periksa'] == "belum diperiksa" || $m['status_periksa'] == "Belum Diperiksa"){
                                                echo "disabled";
                                              } if ($m['peng_status'] == "valid"){
                                                echo "disabled";
                                              }?>
                                          ">
                                          <button type="button" class="btn btn-outline-warning" 
                                            <?php if ($m['status_periksa'] == "belum diperiksa" || $m['status_periksa'] == "Belum Diperiksa"){
                                                  echo "hidden";
                                                } if ($m['peng_status'] == "valid"){
                                                  echo "hidden";
                                                }?>
                                          ><i class="mdi mdi-table-edit btn-icon-prepend"></i><small>edit</small></button>
                                        </a> <br>
                                        <a href="<?= base_url();?>Pengajuanterkirim/hapus/<?= $m['id'];?>" onclick="return confirm('Apakah anda yakin menghapus pengajuan ini?');" class="btn 
                                            <?php if ($m['status_periksa'] == "belum diperiksa" || $m['status_periksa'] == "Belum Diperiksa"){
                                                echo "disabled";
                                              } if ($m['peng_status'] == "valid"){
                                                echo "disabled";
                                              }?>
                                          ">
                                          <button type="button" class="btn btn-outline-danger " 
                                            <?php if ($m['status_periksa'] == "belum diperiksa" || $m['status_periksa'] == "Belum Diperiksa"){
                                                  echo "hidden";
                                                } if ($m['peng_status'] == "valid"){
                                                  echo "hidden";
                                                }?>
                                          ><i class="mdi mdi-alert btn-icon-prepend"></i><small>delete</small></button>
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