  <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Pengaturan Users <?= $roll['role'] ?> </h3>
            </div>

            <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card">
                  <div class="card-body">

          <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card">
                  <div class="card-body">

                    <?php if (validation_errors()) : ?>
                      <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                      </div>
                    <?php endif; ?>
                    
                    <?= $this->session->flashdata('message');?>

                    <div class=" grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          
                          <div class="table-responsive">

                            <a href="" data-toggle="modal" data-target="#newMenuModal"><label class="btn btn-primary mb-3 ">Add New Menu</label></a>
                            <table class="table table-hover table-sm">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>USER NAME</th>
                                  <th>FULL NAME</th>
                                  <th>EMAIL</th>
                                  <th>USERS ROLL</th>
                                  <th>DATE CREATE</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php $i = 1; ?>
                                <?php foreach ($users as $u ) : ?>
                                <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $u['user_name'] ?></td>
                                  <td><?= $u['full_name'] ?></td>
                                  <td><?= $u['email'] ?></td>
                                  <td><?= $u['role'] ?></td>
                                  <td><?= $u['date_created'] ?></td>
                                  <td>
                                    <a href="">
                                      <label class="btn btn-warning badge badge-warning">edit</label>
                                    </a>
                                    <a href="">
                                      <label class="btn btn-dangger badge badge-danger">delet</label>
                                    </a>
                                  </td>
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

<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Tambahkan User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('edituser'); ?>" method="post">
        <div class="modal-body">

          <div class="form-group">
            <select name="user_role" id="user_role" class="form-control">
              <option name="user_role">Select Id Menu</option>

              <?php foreach($roll_id as $r) : ?>
                <option value="<?= $r['id']; ?>"> <?= $r['role']; ?> </option>
              <?php endforeach ; ?>

            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
          </div>
          <div class="form-group col-sm-12">
            <input type="text" class="form-control col-sm-6" id="password" name="password" placeholder="Password">
            <input type="text" class="form-control col-sm-6" id="password2" name="password2" placeholder="Repat Password">
          </div>
          <div class="form-group ">
            <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi">
          </div>
          <div class="form-group ">
            <input type="text" class="form-control" id="kel" name="kel" placeholder="Keluarahan">
          </div>
          <div class="form-group ">
            <input type="text" class="form-control" id="kec" name="kec" placeholder="Kecamatan">
          </div>
          <div class="form-group col-sm-12">
            <div class="form-check form-check-flat form-check-primary">
              <label for="is_active" class="form-check-label">
              <input type="checkbox" class="form-check-input" id="is_active" name="is_active" placeholder="Active" value="1" checked>
                Active? <i class="input-helper"></i>
              </label>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        
      </form>

    </div>
  </div>
</div>