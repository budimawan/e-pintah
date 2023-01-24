<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
    <?= $title; ?>
  </title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url(''); ?>assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="<?= base_url(''); ?>assets/vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?= base_url(''); ?>assets/css/coming-soon.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url(''); ?>assets/images/favicon.png" />

</head>

<body>

  <div class="overlay"></div>
  <video  autoplay="autoplay" muted="muted" loop="loop">
    <source src="<?= base_url('');?>assets/mp4/bg.mp4" type="video/mp4">
  </video>

  <div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100"> 
      <div class="row h-100">
        <div class="col-12 my-auto">
          <div class="masthead-content text-white py-5 py-md-0">
            <img src="http://localhost/e-pintah/assets/images/logo_bpn_1.png">
            <h1 class="mb-3">E-LAYANAN</h1>
            <p class="mb-5">Aplikasi layanan prasertifikasi tanah instansi pemerintah (E-Layanan), merupakan aplikasi pengajuan tanah-tanah milik instansi pemerintah secara elektronik/digital.</p>
            <?= $this->session->flashdata('message');?>

            <form class="action=" method="post" action="<?=base_url('auth');?>">
            <div class="form-group">
              <input type="text" class="form-control form-control-user" id="email" placeholder="Email" name="email" value="<?= set_value('email');?>">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            <hr>
            <div class="input-group">
                <button class="btn btn-secondary" type="submit" id="submit">Login Now</button>
            </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
      <li class="list-unstyled-item">
        <a href="https://twitter.com/budi_dharmawna">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="list-unstyled-item">
        <a href="https://www.facebook.com/budi.mawan1">
          <i class="fab fa-facebook-f"></i>
        </a>
      </li>
      <li class="list-unstyled-item">
        <a href="https://www.instagram.com/mdharmawan8">
          <i class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url(''); ?>assets/vendors/jquery/jquery.min.js"></script>
  <script src="<?= base_url(''); ?>assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?= base_url(''); ?>assets/js/coming-soon.min.js"></script>

</body>

</html>
