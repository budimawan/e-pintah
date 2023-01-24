 <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h3 class="text-center">Welcome <?= $user['role_id'] ?></h3>
            <div class="row">
              
              <div class="card mb-6" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
                    
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-tex"><?= $user['full_name']; ?></h5>
                      <p class="card-text"><small class="text-muted"><?= $user['email']; ?>.</small></p>

                      <p class="card-text">Bergabung sebagai <?= $user['role_id'] ?> pada tanggal <?= date('d F Y', strtotime($user['date_created'])); ?>.</p>
                      <p class="card-text"><small class="text-muted">Terakhir masuk : <?= $user['date_created']; ?>. </small></p>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
          <!-- content-wrapper ends -->
       