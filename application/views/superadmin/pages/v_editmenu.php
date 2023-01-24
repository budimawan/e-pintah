  <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Pengaturan Menu <?= $roll['role'] ?> </h3>
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
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>MENU</th>
                                  <th>TITLE</th>
                                  <th>URL</th>
                                  <th>ACTIVATION</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m ) : ?>
                                <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $m['menu'] ?></td>
                                  <td><?= $m['title'] ?></td>
                                  <td><?= $m['url'] ?></td>
                                  <td><?= $m['is_active'] ?></td>
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
        <h5 class="modal-title" id="newMenuModalLabel">Tambahkan Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('editmenu'); ?>" method="post">
        <div class="modal-body">

          <div class="form-group">
            <select name="menu_id" id="menu_id" class="form-control">
              <option name="menu_id">Select Id Menu</option>

              <?php foreach($menu_id as $m) : ?>
                <option value="<?= $m['id']; ?>"> <?= $m['menu']; ?> </option>
              <?php endforeach ; ?>

            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Nama Menu">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Link Menu">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
          </div>
          <div class="form-group">
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