<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?= $this->renderSection('title') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <link rel="icon" href="favicon.ico">    
     <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script> 
    
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="/assets/css/main.07a59de7b920cd76b874.css" rel="stylesheet"></head>
<body>
<div class="app-container app-theme-gray">
        <div class="app-main">
            <div class="app-sidebar-wrapper">
                <div class="app-sidebar sidebar-shadow">
                
                    <div class="app-header__logo">
                    <button class="btn btn-primary"><?= $_SESSION['session_level']; ?></button>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                        </button>
                    </div>
                    <div class="scrollbar-sidebar scrollbar-container">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Menu</li>
                                <li >
                                    <a href="#">
                                        <i class="metismenu-icon bi bi-speedometer"></i>
                                        Dashboards
                                        <i class="metismenu-state-icon bi bi-arrow-up caret-left"></i>
                                    </a>
                                    <ul >
            
            
                                        <li><a href="/dashboard">Analytics</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon bi bi-clipboard-data"></i>
                                        Data Menu (User Role)
                                        <i class="metismenu-state-icon bi bi-arrow-up caret-left"></i>
                                    </a>
                                    <ul>
                                    <li>
                                            <a href="/dashboard/wilayah">
                                                <i class="metismenu-icon">
                                                </i>Wilayah
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/user">
                                                <i class="metismenu-icon">
                                                </i>Data User/Pegawai
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/tindakan">
                                                <i class="metismenu-icon">
                                                </i>Tindakan/Penanganan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/obat">
                                                <i class="metismenu-icon">
                                                </i>Obat
                                            </a>
                                        </li>
                                        <li>
                                            <!-- <a href="/dashboard/diagnosa">
                                                <i class="metismenu-icon">
                                                </i>Diagnosa
                                            </a> -->
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon bi bi-file-person"></i>
                                        Transaksi
                                        <i class="metismenu-state-icon bi bi-arrow-up caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="/dashboard/daftarPasien">
                                                <i class="metismenu-icon">
                                                </i>Daftar Pasien
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/tindakanPasien">
                                                <i class="metismenu-icon"></i>
                                                Tindakan/Penanganan Pasien
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/pembayaran">
                                                <i class="metismenu-icon"></i>
                                                Pembayaran
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-sidebar-overlay d-none animated fadeIn"></div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="header-mobile-wrapper">
                        <div class="app-header__logo">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template" class="logo-src"></a>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-sidebar-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                            <div class="app-header__menu">
                            <span>
                                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                    <span class="btn-icon-wrapper">
                                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                                    </span>
                                </button>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="app-header">
                        <div class="page-title-heading">
                        Aplikasi Sistem Informasi Klinik 
                        </div>
                        <div class="app-header-right">
                            <div class="header-btn-lg pr-0">
                            </div>
                            <div class="header-btn-lg pr-0">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="btn-group">
                                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                                    <img width="42" class="rounded" src="/assets/images/avatars/8.jpg" alt="">
                                                    <i class="bi bi-menu-up ml-2 opacity-8"></i>
                                                </a>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                                    <div class="dropdown-menu-header">
                                                        <div class="dropdown-menu-header-inner bg-info">
                                                            <div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city4.jpg');"></div>
                                                            <div class="menu-header-content text-left">
                                                                <div class="widget-content p-0">
                                                                
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <img width="42" class="rounded-circle" src="/assets/images/avatars/8.jpg" alt="">
                                                                        </div>
                                                                        <div class="widget-content-left">
                                                                            <div class="widget-heading"><?= $_SESSION['email'] ?>
                                                                            </div>
                                                                            <div class="widget-subheading opacity-8"><?= $_SESSION['session_level'] ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-right mr-2">
                                                                            <a href="/logout" class="btn-pill btn-shadow btn-shine btn btn-focus">Logout
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    </div>
                        <div class="app-header-overlay d-none animated fadeIn"></div>
                    </div>
                    <div class="app-inner-layout app-inner-layout-page">
                        <div class="app-inner-bar">
                
                            <div class="app-inner-layout__content">
                                <div class="tab-content">
                                    
                                    <?= $this->renderSection('content') ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="">
                            <div class="app-footer__inner">
                                
                                <div class="app-footer-right">
                                    <ul class="header-megamenu nav">
                                        <li class="nav-item">
                                             Aplikasi Sistem Informasi Klinik                                           
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script type="text/javascript" src="/assets/scripts/main.07a59de7b920cd76b874.js"></script></body>
</html>
