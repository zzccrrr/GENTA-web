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
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-xxl-4 col-lg-6 col-md-12 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <!-- LOGO -->
                                <div class="brand-logo">
                                    <?= $this->Html->image('/assets/images/genta-logo1.png', ['alt' => 'GENTA Icon']) ?>
                                </div>
                                <?= $this->Flash->render() ?>
                                <?= $this->fetch('content') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JS -->
        <?=
            $this->Html->script([
                // JS VENDOR
                '/assets/vendors/js/vendor.bundle.base',
                // JS
                '/assets/js/off-canvas',
                '/assets/js/hoverable-collapse',
                '/assets/js/misc'
            ])
        ?>
    </body>
</html>