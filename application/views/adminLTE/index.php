<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI-Timbang | <?php echo $this->uri->segment('1').' | '.$this->uri->segment('2'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/ionicons/css/ionicons.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.css">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/animate.css">
  <?php $this->load->view($plugtop); ?>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-purple layout-top-nav">
<div class="wrapper">
  <!-- Header -->
  <?php include('header.php') ?>
  <!-- /Header -->
  <!-- Main content -->
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
        <?php $this->load->view($content); ?>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content -->
  <!-- Footer -->
  <?php include('footer.php') ?>
  <!-- /Footer -->
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Wow.js -->
<script src="<?php echo base_url(); ?>assets/dist/js/wow.min.js"></script>
<!-- Sweetalert -->
<script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
  function hapus(kode,url)
  {
    swal({
    title: "Apa anda yahkin?",
    text: "ingin menghapus data <b>"+kode+"</b> ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#028ab5',
    confirmButtonText: 'Yes',
    cancelButtonText: "No",
    html: true,
    closeOnConfirm: false
    },
    function(){
      location.href=url;
    });
  }

  function hanyaAngka(e, decimal) {
    var key;
    var keychar;
     if (window.event) {
         key = window.event.keyCode;
     } else
     if (e) {
         key = e.which;
     } else return true;

    keychar = String.fromCharCode(key);
    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
        return true;
    } else
    if ((("0123456789").indexOf(keychar) > -1)) {
        return true;
    } else
    if (decimal && (keychar == ".")) {
        return true;
    } else return false;
    }

  new WOW().init();
</script>
<?php $this->load->view($plugbot); ?>
</body>
</html>
