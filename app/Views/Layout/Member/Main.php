<!DOCTYPE html>
<html>

<head>
  <!-- Site made with Mobirise Website Builder v5.1.4, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.1.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?= base_url('mobi/assets/images/logo.png" type="image/x-icon') ?>">
  <meta name="description" content="">


  <title>Tryout</title>
  <link rel="stylesheet" href="<?= base_url('mobi/assets/web/assets/mobirise-icons2/mobirise2.css') ?>">
  <link rel="stylesheet" href="<?= base_url('mobi/assets/web/assets/mobirise-icons/mobirise-icons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('mobi/assets/tether/tether.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('mobi/assets/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('mobi/assets/bootstrap/css/bootstrap-grid.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('mobi/assets/bootstrap/css/bootstrap-reboot.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('mobi/assets/dropdown/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('mobi/assets/socicon/css/styles.css') ?>">
  <link rel="stylesheet" href="<?= base_url('dist/css/icons/font-awesome/css/fontawesome-all.css') ?>">
  <link rel="stylesheet" href="<?= base_url('mobi/assets/theme/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('mobi/assets/mobirise/css/mbr-additional.css') ?>">
  <link rel="preload" as="style" href="<?= base_url('mobi/assets/mobirise/css/mbr-additional.css') ?>">

</head>

<body>

  <?= $this->include('Layout/Member/Header') ?>

  <?php 
  
  if (isset($sub_header) && !empty($sub_header)):
    echo $this->include('Layout/Member/'.$sub_header);
  endif; 
  
  ?>

  <?= $this->renderSection('content') ?>

  <?= $this->include('Layout/Member/Footer') ?>

  <script src="<?= base_url('mobi/assets/web/assets/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('mobi/assets/popper/popper.min.js') ?>"></script>
  <script src="<?= base_url('mobi/assets/tether/tether.min.js') ?>"></script>
  <script src="<?= base_url('mobi/assets/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('mobi/assets/smoothscroll/smooth-scroll.js') ?>"></script>
  <script src="<?= base_url('mobi/assets/dropdown/js/nav-dropdown.js') ?>"></script>
  <script src="<?= base_url('mobi/assets/dropdown/js/navbar-dropdown.js') ?>"></script>
  <script src="<?= base_url('mobi/assets/touchswipe/jquery.touch-swipe.min.js') ?>"></script>
  <script src="<?= base_url('mobi/assets/theme/js/script.js') ?>"></script>


</body>

</html>