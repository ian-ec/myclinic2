<!doctype html>
<html>

<head>

  <meta charset="utf-8" />
  <title><?= $parameter->aplication_name ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/plugins/images/favicon.ico">

  <link href="<?= base_url() ?>assets/plugins/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url() ?>assets/plugins/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/plugins/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/plugins/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/plugins/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/libs/%40chenfengyuan/datepicker/datepicker.min.css">

  <!-- Sweet Alert 2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/animate.min.css">

  <!-- Summernote css -->
  <link href="<?= base_url() ?>assets/plugins/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
  <!-- Bootstrap Css -->
  <link href="<?= base_url() ?>assets/plugins/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="<?= base_url() ?>assets/plugins/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?= base_url() ?>assets/plugins/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- Loading Css-->
  <link href="<?= base_url() ?>assets/plugins/css/loading.css" rel="stylesheet" type="text/css" />

  <!-- DataTables -->
  <link href="<?= base_url() ?>assets/plugins/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url() ?>assets/plugins/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <!-- Responsive datatable examples -->
  <link href="<?= base_url() ?>assets/plugins/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <!-- <style>
    body {
      font-family: Poppins, sans-serif;
    }
  </style> -->

</head>


<body onload="hide_loading();" data-sidebar="dark">

  <!-- <body data-layout="horizontal" data-topbar="dark"> -->

  <!-- Begin page -->
  <div id="layout-wrapper">
    <header id="page-topbar">
      <div class="navbar-header">
        <div class="d-flex">
          <!-- LOGO -->
          <div class="navbar-brand-box">
            <a href="<?= site_url('dashboard') ?>" class="logo logo-dark">
              <span class="logo-sm">
                <img src="<?= base_url() ?>assets/plugins/images/logo.svg" alt="" height="22">
              </span>
              <span class="logo-lg">
                <img src="<?= base_url() ?>assets/plugins/images/logo-dark.png" alt="" height="17">
              </span>
            </a>

            <a href="<?= site_url('dashboard') ?>" class="logo logo-light">
              <span class="logo-sm">
                <img src="<?= base_url() ?>assets/plugins/images/logo-light.svg" alt="" height="22">
              </span>
              <span class="logo-lg">
                <img src="<?= base_url() ?>assets/plugins/images/logo-light.png" alt="" height="19">
              </span>
            </a>
          </div>

          <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
          </button>

        </div>

        <div class="d-flex">

          <div class="dropdown d-none d-lg-inline-block ml-1">
            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
              <i class="bx bx-fullscreen"></i>
            </button>
          </div>

          <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/plugins/images/users/avatar-1.jpg" alt="Header Avatar">
              <span class="d-none d-xl-inline-block ml-1" key="t-henry"><?= ucfirst($this->fungsi->user_login()->username) ?></span>
              <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- item-->
              <a class="dropdown-item" href="<?= site_url('profile/info/' . $this->fungsi->user_login()->user_id) ?>"><i class="bx bx-user font-size-16 align-middle mr-1"></i> <span key="t-profile">Profile</span></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="<?= site_url('auth/logout') ?>"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> <span key="t-logout">Logout</span></a>
            </div>
          </div>

        </div>
      </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

      <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">MENU UTAMA</li>
            <li class="<?= $this->uri->segment(1) == 'dashboard' ? ' mm-active' : '' ?>">
              <a href="<?= site_url('dashboard') ?>" class="<?= $this->uri->segment(1) == 'dashboard' ? ' mm-active' : '' ?>">
                <i class="fas fa-home"></i>
                <span key="t-dashboards">Dashboard</span>
              </a>
            </li>
            <li class="<?= $this->uri->segment(1) == 'registrasi' ||
                          $this->uri->segment(1) == 'tindakan'
                          ? ' mm-active' : '' ?>">
              <a href="javascript: void(0);" class="waves-effect has-arrow <?= $this->uri->segment(1) == 'registrasi' ||
                                                                              $this->uri->segment(1) == 'tindakan' ||
                                                                              $this->uri->segment(1) == 'soap'
                                                                              ? ' mm-active' : '' ?>">
                <i class="fas fa-stethoscope"></i>
                <span key="t-dashboards">Billing</span>
              </a>
              <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?= site_url('registrasi') ?>" key="t-default" <?= $this->uri->segment(1) == 'registrasi' ? 'class="mm-active"' : '' ?>>Registrasi Masuk</a></li>
                <li><a href="<?= site_url('tindakan') ?>" key="t-default" <?= $this->uri->segment(1) == 'tindakan' ? 'class="mm-active"' : '' ?>>Tindakan</a></li>
                <li><a href="<?= site_url('soap') ?>" key="t-default" <?= $this->uri->segment(1) == 'soap' ? 'class="mm-active"' : '' ?>>Catatan Pasien</a></li>
              </ul>
            </li>
            <li class="<?= $this->uri->segment(1) == 'pembelian' ||
                          $this->uri->segment(1) == 'penjualan' ||
                          $this->uri->segment(1) == 'retur' ||
                          $this->uri->segment(1) == 'adjustment'
                          ? ' mm-active' : '' ?>">
              <a href="javascript: void(0);" class="waves-effect has-arrow <?= $this->uri->segment(1) == 'pembelian' ||
                                                                              $this->uri->segment(1) == 'penjualan' ||
                                                                              $this->uri->segment(1) == 'retur' ||
                                                                              $this->uri->segment(1) == 'adjustment'
                                                                              ? ' mm-active' : '' ?>">
                <i class="fas fa-tablets"></i>
                <span key="t-dashboards">Farmasi</span>
              </a>
              <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?= site_url('pembelian') ?>" key="t-default" <?= $this->uri->segment(1) == 'pembelian' ? 'class="mm-active"' : '' ?>>Pembelian</a></li>
                <li><a href="<?= site_url('penjualan') ?>" key="t-default" <?= $this->uri->segment(1) == 'penjualan' ? 'class="mm-active"' : '' ?>>Penjualan</a></li>
                <li><a href="<?= site_url('retur') ?>" key="t-default" <?= $this->uri->segment(1) == 'retur' ? 'class="mm-active"' : '' ?>>Retur Pembelian</a></li>
                <li><a href="<?= site_url('adjustment') ?>" key="t-default" <?= $this->uri->segment(1) == 'adjustment' ? 'class="mm-active"' : '' ?>>Adjustment</a></li>
              </ul>
            </li>
            <li class="<?= $this->uri->segment(1) == 'kasir'
                          ? ' mm-active' : '' ?>">
              <a href="javascript: void(0);" class="waves-effect has-arrow <?= $this->uri->segment(1) == 'kasir'
                                                                              ? ' mm-active' : '' ?>">
                <i class="far fa-money-bill-alt"></i>
                <span key="t-dashboards">Pembayaran</span>
              </a>
              <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?= site_url('kasir') ?>" key="t-default" <?= $this->uri->segment(1) == 'kasir' ? 'class="mm-active"' : '' ?>>Registrasi Keluar</a></li>
              </ul>
            </li>
            <li class="<?= $this->uri->segment(1) == 'order_piutang' ||
                          $this->uri->segment(1) == 'pelunasan_piutang'
                          ? ' mm-active' : '' ?>">
              <a href="javascript: void(0);" class="waves-effect has-arrow <?= $this->uri->segment(1) == 'order_piutang' ||
                                                                              $this->uri->segment(1) == 'pelunasan_piutang'
                                                                              ? ' mm-active' : '' ?>">
                <i class="fas fa-file-invoice-dollar"></i>
                <span key="t-dashboards">Akunting</span>
              </a>
              <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?= site_url('order_piutang') ?>" key="t-default" <?= $this->uri->segment(1) == 'order_piutang' ? 'class="mm-active"' : '' ?>>Order Piutang</a></li>
                <li><a href="<?= site_url('pelunasan_piutang') ?>" key="t-default" <?= $this->uri->segment(1) == 'pelunasan_piutang' ? 'class="mm-active"' : '' ?>>Pelunasan Piutang</a></li>
              </ul>
            </li>
            <li class="menu-title" key="t-menu">LAPORAN INFORMASI</li>
            <li class="<?= $this->uri->segment(1) == 'info_tindakan' ||
                          $this->uri->segment(1) == 'info_soap' ||
                          $this->uri->segment(1) == 'info_pembelian' ||
                          $this->uri->segment(1) == 'info_penjualan' ||
                          $this->uri->segment(1) == 'info_adjustment' ||
                          $this->uri->segment(1) == 'info_retur' ||
                          $this->uri->segment(1) == 'info_registrasi_keluar' ||
                          $this->uri->segment(1) == 'info_piutang_pasien' ||
                          $this->uri->segment(1) == 'info_laba_rugi'
                          ? ' mm-active' : '' ?>">
              <a href="javascript: void(0);" class="waves-effect has-arrow <?= $this->uri->segment(1) == 'info_tindakan' ||
                                                                              $this->uri->segment(1) == 'info_soap' ||
                                                                              $this->uri->segment(1) == 'info_pembelian' ||
                                                                              $this->uri->segment(1) == 'info_penjualan' ||
                                                                              $this->uri->segment(1) == 'info_adjustment' ||
                                                                              $this->uri->segment(1) == 'info_retur' ||
                                                                              $this->uri->segment(1) == 'info_registrasi_keluar' ||
                                                                              $this->uri->segment(1) == 'info_piutang_pasien' ||
                                                                              $this->uri->segment(1) == 'info_order_piutang' ||
                                                                              $this->uri->segment(1) == 'info_laba_rugi'
                                                                              ? ' mm-active' : '' ?>>">
                <i class="fas fa-book"></i>
                <span key="t-dashboards">Laporan</span>
              </a>
              <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?= site_url('info_tindakan') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_tindakan' ? 'class="mm-active"' : '' ?>>Info Tindakan</a></li>
                <li><a href="<?= site_url('info_soap') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_soap' ? 'class="mm-active"' : '' ?>>Info Catatan Pasien</a></li>
                <li><a href="<?= site_url('info_pembelian') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_pembelian' ? 'class="mm-active"' : '' ?>>Info Pembelian</a></li>
                <li><a href="<?= site_url('info_penjualan') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_penjualan' ? 'class="mm-active"' : '' ?>>Info Penjualan</a></li>
                <li><a href="<?= site_url('info_adjustment') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_adjustment' ? 'class="mm-active"' : '' ?>>Info Adjustment</a></li>
                <li><a href="<?= site_url('info_retur') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_retur' ? 'class="mm-active"' : '' ?>>Info Retur Pembelian</a></li>
                <li><a href="<?= site_url('info_registrasi_keluar') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_registrasi_keluar' ? 'class="mm-active"' : '' ?>>Info Registrasi Keluar</a></li>
                <li><a href="<?= site_url('info_piutang_pasien') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_piutang_pasien' ? 'class="mm-active"' : '' ?>>Info Piutang Pasien</a></li>
                <li><a href="<?= site_url('info_order_piutang') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_order_piutang' ? 'class="mm-active"' : '' ?>>Info Order Piutang</a></li>
                <li><a href="<?= site_url('info_laba_rugi') ?>" key="t-default" <?= $this->uri->segment(1) == 'info_laba_rugi' ? 'class="mm-active"' : '' ?>>Info Laba Rugi (On Progress)</a></li>
              </ul>
            </li>
            <?php if ($this->fungsi->user_login()->level == 1) { ?>
              <li class="menu-title" key="t-menu">MASTER DATA</li>
              <li class="<?= $this->uri->segment(1) == 'rm' ||
                            $this->uri->segment(1) == 'layanan' ||
                            $this->uri->segment(1) == 'jaminan' ||
                            $this->uri->segment(1) == 'karcis' ||
                            $this->uri->segment(1) == 'satgas' ||
                            $this->uri->segment(1) == 'pegawai' ||
                            // $this->uri->segment(1) == 'komponen' ||
                            $this->uri->segment(1) == 'rekapcetak' ||
                            $this->uri->segment(1) == 'tarif' ||
                            $this->uri->segment(1) == 'bank_group' ||
                            $this->uri->segment(1) == 'bank'
                            ? ' mm-active' : '' ?>">
                <a href="javascript: void(0);" class="waves-effect has-arrow <?= $this->uri->segment(1) == 'rm' ||
                                                                                $this->uri->segment(1) == 'layanan' ||
                                                                                $this->uri->segment(1) == 'jaminan' ||
                                                                                $this->uri->segment(1) == 'karcis' ||
                                                                                $this->uri->segment(1) == 'satgas' ||
                                                                                $this->uri->segment(1) == 'pegawai' ||
                                                                                // $this->uri->segment(1) == 'komponen' ||
                                                                                $this->uri->segment(1) == 'rekapcetak' ||
                                                                                $this->uri->segment(1) == 'tarif' ||
                                                                                $this->uri->segment(1) == 'bank_group' ||
                                                                                $this->uri->segment(1) == 'bank'
                                                                                ? ' mm-active' : '' ?>">
                  <i class="fas fa-database"></i>
                  <span key="t-dashboards">Master Data Billing</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                  <li><a href="<?= site_url('rm') ?>" key="t-default" <?= $this->uri->segment(1) == 'rm' ? 'class="mm-active"' : '' ?>>Rekam Medis</a></li>
                  <li><a href="<?= site_url('layanan') ?>" key="t-default" <?= $this->uri->segment(1) == 'layanan' ? 'class="mm-active"' : '' ?>>Layanan</a></li>
                  <li><a href="<?= site_url('jaminan') ?>" key="t-default" <?= $this->uri->segment(1) == 'jaminan' ? 'class="mm-active"' : '' ?>>Jaminan</a></li>
                  <li><a href="<?= site_url('karcis') ?>" key="t-default" <?= $this->uri->segment(1) == 'karcis' ? 'class="mm-active"' : '' ?>>Karcis</a></li>
                  <li><a href="<?= site_url('satgas') ?>" key="t-default" <?= $this->uri->segment(1) == 'satgas' ? 'class="mm-active"' : '' ?>>Satuan Tugas</a></li>
                  <li><a href="<?= site_url('pegawai') ?>" key="t-default" <?= $this->uri->segment(1) == 'pegawai' ? 'class="mm-active"' : '' ?>>Pegawai</a></li>
                  <!-- <li><a href="<?= site_url('komponen') ?>" key="t-default" <?= $this->uri->segment(1) == 'komponen' ? 'class="mm-active"' : '' ?>>Komponen Tarif</a></li> -->
                  <li><a href="<?= site_url('rekapcetak') ?>" key="t-default" <?= $this->uri->segment(1) == 'rekapcetak' ? 'class="mm-active"' : '' ?>>Rekap Cetak</a></li>
                  <li><a href="<?= site_url('tarif') ?>" key="t-default" <?= $this->uri->segment(1) == 'tarif' ? 'class="mm-active"' : '' ?>>Tarif</a></li>
                  <li><a href="<?= site_url('bank_group') ?>" key="t-default" <?= $this->uri->segment(1) == 'bank_group' ? 'class="mm-active"' : '' ?>>Bank Group</a></li>
                  <li><a href="<?= site_url('bank') ?>" key="t-default" <?= $this->uri->segment(1) == 'bank' ? 'class="mm-active"' : '' ?>>Bank</a></li>
                </ul>
              </li>
              <li class="<?= $this->uri->segment(1) == 'golongan' ||
                            $this->uri->segment(1) == 'group' ||
                            $this->uri->segment(1) == 'satuan' ||
                            $this->uri->segment(1) == 'distributor' ||
                            $this->uri->segment(1) == 'etiket' ||
                            $this->uri->segment(1) == 'barang' ||
                            $this->uri->segment(1) == 'repack'
                            ? ' mm-active' : '' ?>">
                <a href="javascript: void(0);" class="waves-effect has-arrow <?= $this->uri->segment(1) == 'golongan' ||
                                                                                $this->uri->segment(1) == 'group' ||
                                                                                $this->uri->segment(1) == 'satuan' ||
                                                                                $this->uri->segment(1) == 'distributor' ||
                                                                                $this->uri->segment(1) == 'etiket' ||
                                                                                $this->uri->segment(1) == 'barang' ||
                                                                                $this->uri->segment(1) == 'repack'
                                                                                ? ' mm-active' : '' ?>">
                  <i class="fas fa-database"></i>
                  <span key="t-dashboards">Master Data Farmasi</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                  <li><a href="<?= site_url('golongan') ?>" key="t-default" <?= $this->uri->segment(1) == 'golongan' ? 'class="mm-active"' : '' ?>>Golongan</a></li>
                  <li><a href="<?= site_url('group') ?>" key="t-default" <?= $this->uri->segment(1) == 'group' ? 'class="mm-active"' : '' ?>>Group</a></li>
                  <li><a href="<?= site_url('satuan') ?>" key="t-default" <?= $this->uri->segment(1) == 'satuan' ? 'class="mm-active"' : '' ?>>Satuan</a></li>
                  <li><a href="<?= site_url('distributor') ?>" key="t-default" <?= $this->uri->segment(1) == 'distributor' ? 'class="mm-active"' : '' ?>>Distributor</a></li>
                  <li><a href="<?= site_url('etiket') ?>" key="t-default" <?= $this->uri->segment(1) == 'etiket' ? 'class="mm-active"' : '' ?>>Etiket</a></li>
                  <li><a href="<?= site_url('barang') ?>" key="t-default" <?= $this->uri->segment(1) == 'barang' ? 'class="mm-active"' : '' ?>>Barang</a></li>
                  <li><a href="<?= site_url('repack') ?>" key="t-default" <?= $this->uri->segment(1) == 'repack' ? 'class="mm-active"' : '' ?>>Repack</a></li>
                </ul>
              </li>

              <li class="menu-title" key="t-menu">SETTINGS</li>
              <li class="<?= $this->uri->segment(1) == 'user' ||
                            $this->uri->segment(1) == 'parameter'
                            ? ' mm-active' : '' ?>">
                <a href="javascript: void(0);" class="waves-effect has-arrow <?= $this->uri->segment(1) == 'user' ||
                                                                                $this->uri->segment(1) == 'parameter'
                                                                                ? ' mm-active' : '' ?>>">
                  <i class="fas fa-cogs"></i>
                  <span key="t-dashboards">Parameter</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                  <li><a href="<?= site_url('user') ?>" key="t-default" <?= $this->uri->segment(1) == 'user' ? 'class="mm-active"' : '' ?>>User</a></li>
                  <li><a href="<?= site_url('parameter') ?>" key="t-default" <?= $this->uri->segment(1) == 'parameter' ? 'class="mm-active"' : '' ?>>Info Aplikasi</a></li>
                </ul>
              </li>

            <?php } ?>
          </ul>
        </div>
        <!-- Sidebar -->
      </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/plugins/libs/jquery/jquery.min.js"></script>

    <!-- Tiny js -->
    <script src="<?= base_url() ?>assets/plugins/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- High Charts Pie -->
    <script src="<?= base_url() ?>assets/plugins/highcharts-pie/highcharts.js"></script>
    <script src="<?= base_url() ?>assets/plugins/highcharts-pie/exporting.js"></script>
    <script src="<?= base_url() ?>assets/plugins/highcharts-pie/export-data.js"></script>
    <script src="<?= base_url() ?>assets/plugins/highcharts-pie/accessibility.js"></script>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">
          <div class="loading overlay">
            <div class="loadingio-spinner-pulse-hlwb4mznyl">
              <div class="ldio-hp31j4zrxq5">
                <div></div>
                <div></div>
                <div></div>
              </div>
            </div>
          </div>
          <!-- start page title -->
          <?= $contents ?>
          <!-- end page title -->

        </div> <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <script>
                document.write(new Date().getFullYear())
              </script> © Elite Coding.
            </div>
            <div class="col-sm-6">
              <div class="text-sm-right d-none d-sm-block">
                Design & Develop by Elite Coding
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->




  <script src="<?= base_url() ?>assets/plugins/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/metismenu/metisMenu.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/simplebar/simplebar.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/node-waves/waves.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/libs/select2/js/select2.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>

  <!-- form advanced init -->
  <script src="<?= base_url() ?>assets/plugins/js/pages/form-advanced.init.js"></script>

  <!-- Required datatable js -->
  <script src="<?= base_url() ?>assets/plugins/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

  <!-- Buttons examples -->
  <script src="<?= base_url() ?>assets/plugins/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/pdfmake/build/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

  <!-- Responsive examples -->
  <script src="<?= base_url() ?>assets/plugins/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

  <!-- Datatable init js -->
  <script src="<?= base_url() ?>assets/plugins/js/pages/datatables.init.js"></script>

  <!-- fontawesome icons init -->
  <script src="<?= base_url() ?>assets/plugins/js/pages/fontawesome.init.js"></script>

  <!-- Sweet Alert 2 -->
  <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

  <!-- form advanced init -->
  <script src="<?= base_url() ?>assets/plugins/js/pages/form-advanced.init.js"></script>

  <!-- Summernote js -->
  <script src="<?= base_url() ?>assets/plugins/libs/summernote/summernote-bs4.min.js"></script>

  <!-- init js -->
  <script src="<?= base_url() ?>assets/plugins/js/pages/form-editor.init.js"></script>

  <!-- loading js -->
  <script src="<?= base_url() ?>assets/plugins/js/loading.js"></script>

  <script src="<?= base_url() ?>assets/plugins/libs/parsleyjs/parsley.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/js/pages/form-validation.init.js"></script>

  <script src="<?= base_url() ?>assets/plugins/js/app.js"></script>

  <script>
    var success = $('#success').data('success')
    var danger = $('#danger').data('danger')
    var info = $('#info').data('info')
    var warning = $('#warning').data('warning')
    if (success) {
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: success,
        showClass: {
          popup: 'animate__animated animate__zoomInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__zoomOutDown'
        }
      })
    }
    if (danger) {
      Swal.fire({
        icon: 'error',
        title: 'Deleted',
        text: danger,
        showClass: {
          popup: 'animate__animated animate__zoomInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__zoomOutDown'
        }
      })
    }
    if (info) {
      Swal.fire({
        icon: 'info',
        title: 'Info',
        text: info,
        showClass: {
          popup: 'animate__animated animate__zoomInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__zoomOutDown'
        }
      })
    }
    if (warning) {
      Swal.fire({
        icon: 'warning',
        title: 'Peringatan',
        text: warning,
        showClass: {
          popup: 'animate__animated animate__zoomInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__zoomOutDown'
        }
      })
    }

    $(document).on('click', '#btn-hapus', function(e) {
      e.preventDefault();
      var link = $(this).attr('href');

      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00a65a',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        showClass: {
          popup: 'animate__animated animate__bounceIn'
        },
        hideClass: {
          popup: 'animate__animated animate__backOutDown'
        }
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    })
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#table1').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'colvis', 'copy', 'excel', 'pdf', 'print'
        ],
        columnDefs: [{
          "targets": [0, -1],
          "className": 'text-center',
          "orderable": false
        }, ],
      });
    });

    function nl2br(string) {
      return string.replace(/\n/g, '<br/>').replace(/\r/g, '<br/>').replace(/\r\n/g, '<br/>');
    }
  </script>

  <script>
    $(document).ready(function() {
      $('#table2').DataTable({
        columnDefs: [{
            "targets": [-1],
            "className": 'text-center',
            "orderable": false
          },
          {
            "targets": [0, -1],
            "orderable": false
          },
        ],
      })
    })
  </script>

  <script>
    $(function() {
      $('.select2').select2()
    })

    function currencyFormat(nilai) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
      }).format(parseInt(nilai))
    }

    function dateFormat(tanggal) {
      var date = new Date(tanggal);
      var dd = String(date.getDate()).padStart(2, '0');
      var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = date.getFullYear();
      return dd + '/' + mm + '/' + yyyy;
    }
  </script>

</body>

</html>