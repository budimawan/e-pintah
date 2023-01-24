 <!-- partial -->
        <div class="main-panel" style="margin: -20px 0px 0px 0px;">
          <div class="content-wrapper">
            <h3 class="text-center">Welcome <?= $user['user_name'] ?></h3>
            <h6 class="text-center" >
              <?php if ($user['role_id'] == 1){
                echo "User " . $user['instansi'];
              } if ($user['role_id'] == 2){
                echo "Admin " . $user['instansi'] ;
              } if ($user['role_id'] == 3){
                echo "Super Admin " . $user['instansi'] ;
              } ?>
            </h6>

              <?= $this->session->flashdata('message');?>
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger text-center" role="alert">
                  <?= validation_errors(); ?> 
                </div>
              <?php endif; ?>                   
            
            <div class="form-group row">
              <div class="card col-sm-6" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img img-thumbnail" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-tex"><?= $user['full_name']; ?></h5>
                      <p class="card-text"><small class="text-muted"><?= $user['email']; ?>.</small></p>
                      <p class="card-text">Bergabung sebagai <?php if ($user['role_id'] == 1){
                                                                echo "User " ;
                                                              } if ($user['role_id'] == 2){
                                                                echo "Admin " ;
                                                              } if ($user['role_id'] == 3){
                                                                echo "Super Admin " ;
                                                              } ?> pada tanggal <?= date('d F Y', strtotime($user['date_created'])); ?>.</p>
                      <p class="card-text"><small class="text-muted">Terakhir perbarui identitas : <?= date('d F Y', strtotime($user['last_update'])); ?>, Pukul  <?= date('h:i:sa', strtotime($user['last_update'])); ?></small></p>
                    </div>
                  </div>
                  <a href="" data-toggle="modal" data-target="#newMenuModal"><label class="btn btn-primary mb-2 btn-fw btn-sm"><small>Edit User Data</small></label></a>
                </div>
              </div>
              <div class="col-sm-1"></div>
              <div class="card col-sm-5">
                <div class="text-center">GANTI PASSWORD</div>                  
                  <?php echo form_open_multipart('superadmin/gantipassword');?>
                  <div class="row no-gutters">

                  <div class=" row col-sm-12">
                    <label for="" class="col-sm-4 col-form-label"><small>Old Password</small></label>
                    <div class="col-sm-8">
                      <input type="Password" class="form-control" id="pas_lama" name="pas_lama" placeholder="sandi lama" required="">
                    </div>
                  </div>

                  <div class=" row col-sm-12">
                    <label for="" class="col-sm-4 col-form-label"><small>New Password</small></label>
                    <div class="col-sm-8">
                      <input type="Password" class="form-control" id="pas_baru" name="pas_baru" placeholder="sandi baru" required="">
                    </div>
                  </div>

                  <div class=" row col-sm-12">
                    <label for="" class="col-sm-4 col-form-label"><small>Repeat Password</small></label>
                    <div class="col-sm-8">
                      <input type="Password" class="form-control" id="pas_baru2" name="pas_baru2" placeholder="ulangi sandi baru" required="">
                    </div>
                  </div>

                  <a class="btn">
                    <button data-target=""data-toggle="modal" type="submit" class="btn btn-primary mr-2 btn-sm"><i class="mdi mdi-arrow-right-bold btn-icon-prepend"></i><small>create</small></button>
                  </a>
                  <a href="<?= base_url();?>superadmin" class="btn">
                    <button type="button" class="btn btn-success btn-fw btn-sm"><i class="mdi mdi-refresh btn-icon-prepend"></i><small>Refresh</small></button>
                  </a>

                  </div>
                  <?php echo form_close(); ?>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->

<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="newMenuModalLabel">Edit Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('superadmin/updatedatauser');?>
    
        <div class="modal-body">

          <div class="form-group">
            <label for="">Email :</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email" readonly="" value="<?= $user['email']; ?>">
          </div>
          <div class="form-group">
            <label for="">First Name :</label>
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="nama depan" required="" value="<?= $user['user_name']; ?>">
          </div>
          <div class="form-group">
            <label for="">Full Name :</label>
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="nama lengkap" required="" value="<?= $user['full_name']; ?>">
          </div>
          <div class="form-group">
            <label for="">Phone Number :</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="kontak" required="" value="<?= $user['phone']; ?>">
          </div>
          <div class="form-group ">
            <label for="">Company/Instantion :</label>
            <input type="text" class="form-control" id="instansi" name="instansi" placeholder="instansi" required="" value="<?= $user['instansi']; ?>">
          </div>
          <div class="form-group ">
            <label for="">Instansi Addres :</label>
            <input type="text" class="form-control" id="kel" name="kel" placeholder="kelurahan" required="" value="<?= $user['kel']; ?>">
            <input type="text" class="form-control" id="kec" name="kec" placeholder="kecamatan" required="" value="<?= $user['kec']; ?>">
          </div>
          <div class="form-group col-sm-12">
            <label for="">Photo Profile :</label>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/profile/') . $user['image'];?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <div class="">
                      <input type="file" class="file-upload-default" id="img" name="img" value="<?= $user['image'];?>">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" readonly="" placeholder="Tidak ada foto dipilih" id="img2" name="img2" value="<?= $user['image'];?>">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Select Foto</button>
                        </span>
                      </div>
                      <div class="input-group col-xs-12">
                        <small>
                        <span class="input-group-append">
                          <i>max width x height = 700x700 Px <br>max size = 2 Mb </i>
                        </span>
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>          
            </div>
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        
      
      <?php echo form_close(); ?>

    </div>
  </div>
</div>
       