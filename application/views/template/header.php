<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-LAYANAN</title>
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url(''); ?>assets/images/favicon.png" />
  </head>
  
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="<?= base_url('assets/images/favicon2.png');?>" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('assets/images/favicon1.png');?>" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="<?= base_url('assets/img/profile/') . $user['image'];?>" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"> <?= $user['user_name'] ?> </h5>
                  <span><?= $user['email']?></span>
                </div>
              </div>
              <!-- <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a> -->
              <!-- <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown"> -->
                <!-- <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a> -->
                <!-- <div class="dropdown-divider"></div> -->
                <!-- <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a> -->
                <!-- <div class="dropdown-divider"></div> --> 
              <!-- </div> -->
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Menu</span>
          </li>


          <?php 
            // kenapa sessionnya tidak masuk? masih misteri  
            // $role_id = $this->session->userdata('role_id');
            $role_id = $user['role_id'];

            $queryMenu = "SELECT `user_menu`.`id`, `menu` 
                          FROM `user_menu` JOIN `users_access_menu` 
                          ON `user_menu`.`id` = `users_access_menu`.`menu_id` 
                          WHERE `users_access_menu`.`role_id` = $role_id
                         ORDER BY `users_access_menu`.`menu_id` ASC ";

            $menu = $this->db->query($queryMenu)->result_array();
            
          ?>

          <?php foreach ($menu as $m) : ?>
            

            <?php 

            $menuId = $m['id'];

            $querySubMenu = "SELECT * 
                          FROM `user_sub_menu` JOIN `user_menu` 
                          ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                          WHERE `user_sub_menu`.`menu_id` = $menuId
                         AND `user_sub_menu`.`is_active` = 1";

            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

              <?php foreach($subMenu as $sm) : ?>

                <li class="nav-item menu-items">
                  <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <span class="menu-icon">
                      <i class="<?= $sm['icon']?>"></i>
                    </span>
                    <span class="menu-title"><?= $sm['title']?></span>
                  </a>
                </li>

              <?php endforeach ?>
 

          <?php endforeach; ?>
          
        </ul>
      </nav>
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/favicon1.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                    
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image'];?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"> <?= $user['full_name'] ?> </p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="<?= base_url('auth/logout');?>">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">E-LAYANAN 2020</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
