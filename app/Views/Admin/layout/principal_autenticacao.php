<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food Delivery | <?php $this->renderSection('titulo') ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo site_url('admin/'); ?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo site_url('admin/'); ?>vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo site_url('admin/'); ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo site_url('admin/'); ?>css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo site_url('admin/'); ?>images/favicon.png" />
</head>

<body>
  <div class="container-scroller">

   <!-- Essa section renderizará os conteudos específicos da view que estender esse layout -->
   <?php $this->renderSection('conteudo') ?>

   
   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo site_url('admin/'); ?>vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo site_url('admin/'); ?>vendors/chart.js/Chart.min.js"></script>
  <script src="<?php echo site_url('admin/'); ?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo site_url('admin/'); ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo site_url('admin/'); ?>js/off-canvas.js"></script>
  <script src="<?php echo site_url('admin/'); ?>js/hoverable-collapse.js"></script>
  <script src="<?php echo site_url('admin/'); ?>js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo site_url('admin/'); ?>js/dashboard.js"></script>
  <script src="<?php echo site_url('admin/'); ?>js/data-table.js"></script>
  <script src="<?php echo site_url('admin/'); ?>js/jquery.dataTables.js"></script>
  <script src="<?php echo site_url('admin/'); ?>js/dataTables.bootstrap4.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- End custom js for this page-->

  <script src="<?php echo site_url('admin/'); ?>js/jquery.cookie.js" type="text/javascript"></script>

    <!-- Essa section renderizará os scripts específicos da view que estender esse layout -->
    <?php $this->renderSection('scripts') ?>
</body>

</html>
