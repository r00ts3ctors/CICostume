<?php $this->load->view('template/header'); ?>
<!-- Preloader -->
<!-- <div class="preloader-it"> <div class="loader-pendulums"></div> </div> -->
<!-- /Preloader -->
<div class="hk-wrapper hk-vertical-nav">
  <?php $this->load->view('template/menuatas'); ?>
  <?php $this->load->view('template/menu'); ?>
  <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
  <div class="hk-pg-wrapper">
    <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
      <div class="row">
        <?php $this->load->view($konten); ?>
        <?php $this->load->view('template/footercopy'); ?>
      </div>
    </div>
<?php $this->load->view('template/footer'); ?>
