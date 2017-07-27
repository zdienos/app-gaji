  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo site_url('Home'); ?>" class="navbar-brand"><b>SI-G</b>aji</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('Home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <?php if($this->session->userdata('ses_user_jabatan') == '1'): ?>
            <li><a href="<?php echo site_url('User'); ?>"><i class="fa fa-user"></i> User</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-hourglass-half"></i> Data Lembur <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('Detail_lembur'); ?>"><i class='fa fa-circle-o'></i>Jenis Lembur</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('Ket_lembur'); ?>"><i class='fa fa-circle-o'></i>Ket Lembur</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url('Jabatan'); ?>"><i class="fa fa-briefcase"></i> Jabatan</a></li>
            <li><a href="<?php echo site_url('Karyawan'); ?>"><i class="fa fa-group"></i> Karyawan</a></li>
            <li><a href="<?php echo site_url('Gaji_lembur'); ?>"><i class="fa fa-dollar"></i> Gaji Lembur <?php echo date('Y'); ?></a></li>
          <?php endif; ?>
          <!--
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-balance-scale"></i> Timbang <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('Timbang'); ?>"><i class='fa fa-circle-o'></i>Lihat Timbang</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('Timbang/add'); ?>"><i class='fa fa-circle-o'></i>Mulai Timbang</a></li>
              </ul>
            </li>
          -->
          <li><a href="<?php echo site_url('Report_lembur'); ?>"><i class="fa fa-print"></i> Report Lembur</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $this->session->userdata('ses_user_nama'); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $this->session->userdata('ses_user_nama'); ?> - <?php echo ($this->session->userdata('ses_user_jabatan') == 1) ? 'Admin' : 'User'; ?>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?php echo site_url('Login/logout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Keluar</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
