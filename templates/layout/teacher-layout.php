<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META TAGS -->
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>GENTA</title>

        <!-- CSS -->
        <?= 
            $this->Html->css([
                // CSS VENDOR
                '/assets/vendors/mdi/css/materialdesignicons.min',
                '/assets/vendors/css/vendor.bundle.base',
                '/assets/vendors/css/dataTables.bootstrap5.min',
                '/assets/vendors/css/responsive.bootstrap5.min',
                // STYLES
                '/assets/css/style',
                '/assets/css/custom',
            ])
        ?>

        <!-- ICONS -->
        <?= $this->Html->meta('genta-logo1.png', '/assets/images/genta-logo1.png', ['type' => 'icon']) ?>
    </head>
    <body>
        <div class="container-scroller">
            <!-- UPPER NAVIGATION TAB -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <!-- DEFAULT LOGO -->
                    <?=
                        $this->Html->link(
                            $this->Html->image('/assets/images/genta-logo0.png', ['alt' => 'logo']),
                            ['controller' => 'Dashboard', 'action' => 'index', 'prefix' => 'Teacher'],
                            ['escape' => false, 'class' => 'navbar-brand brand-logo']
                        )
                    ?>
                    <!-- MINI LOGO -->
                    <?=
                        $this->Html->link(
                            $this->Html->image('/assets/images/logo-mini.svg', ['alt' => 'logo']),
                            ['controller' => 'Dashboard', 'action' => 'index', 'prefix' => 'Teacher'],
                            ['escape' => false, 'class' => 'navbar-brand brand-logo-mini']
                        )
                    ?>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item d-none d-lg-block full-screen-link">
                            <a class="nav-link">
                                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <div class="container-fluid page-body-wrapper">
                <!-- SIDEBAR NAVIGATION TAB -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                            <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'profile', 'prefix' => 'Teacher']) ?>" class="nav-link">
                                <div class="nav-profile-image">
                                    <?= $this->Html->image('/assets/images/faces-clipart/pic-1.png', ['alt' => 'profile']) ?>
                                </div>
                                <div class="nav-profile-text d-flex flex-column">
                                    <span class="font-weight-bold mb-2"><?= $this->Identity->get('full_name') ?></span>
                                    <span class="text-secondary text-small">Professor</span>
                                </div>
                                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index', 'prefix' => 'Teacher']) ?>">
                                <span class="menu-title">Dashboard</span>
                                <i class="mdi mdi-home menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'students', 'prefix' => 'Teacher']) ?>">
                                <span class="menu-title">Students</span>
                                <i class="mdi mdi-account-multiple menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'questions', 'prefix' => 'Teacher']) ?>">
                                <span class="menu-title">Quiz</span>
                                <i class="mdi mdi-file-document menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'profile', 'prefix' => 'Teacher']) ?>">
                                <span class="menu-title">Profile</span>
                                <i class="mdi mdi-account menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $this->Url->build(['controller' => '../Users', 'action' => 'logout']) ?>">
                                <span class="menu-title">Log out</span>
                                <i class="mdi mdi-logout-variant menu-icon"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- PAGE CONTENT -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <!-- BREADCRUMBS -->
                        <div class="page-header">
                            <h3 class="page-title">
                                <span class="page-title-icon bg-gradient-primary text-white me-2">
                                    <i class="mdi mdi-home"></i>
                                </span> GENTA
                            </h3>
                        </div>

                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div>

                    <!-- FOOTER -->
                    <footer class="footer">
                        <div class="container-fluid d-flex justify-content-between">
                            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © GENTA <?= date('Y') ?></span>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        <!-- JS -->
        <?=
            $this->Html->script([
                // JQUERY
                '/assets/js/jquery',
                '/assets/js/jquery.cookie',
                // JS VENDOR
                '/assets/vendors/js/vendor.bundle.base',
                '/assets/vendors/chart.js/Chart.min',
                '/assets/vendors/js/jquery.dataTables.min',
                '/assets/vendors/js/dataTables.bootstrap5.min',
                '/assets/vendors/js/dataTables.responsive.min',
                '/assets/vendors/js/responsive.bootstrap5.min',
                // JS
                '/assets/js/off-canvas',
                '/assets/js/hoverable-collapse',
                '/assets/js/misc',
                '/assets/js/script'
            ])
        ?>
    </body>
</html>