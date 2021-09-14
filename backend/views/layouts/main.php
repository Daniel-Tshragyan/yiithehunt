<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <!DOCTYPE html>

    <body class="hold-transition sidebar-mini layout-fixed">
    <?php $this->beginBody() ?>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">




        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= Url::to(['/city'])?>" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Cities</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Url::to(['/user'])?>" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Users</p>
                    </a>
                </li>
                    <?php
                    echo '
                                    <li class="nav-item ">'
                        .Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                        .Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        .Html::endForm().';
                                        
                                    </li>';
                    ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!---->
    <!--<header>-->
    <!--    --><?php
    //    NavBar::begin([
    //        'brandLabel' => Yii::$app->name,
    //        'brandUrl' => Yii::$app->homeUrl,
    //        'options' => [
    //            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
    //        ],
    //    ]);
    //    $menuItems = [
    //        ['label' => 'Home', 'url' => ['/site/index']],
    //    ];
    //    if (Yii::$app->user->isGuest) {
    //        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    //    } else {
    //        $menuItems[] = '<li>'
    //            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
    //            . Html::submitButton(
    //                'Logout (' . Yii::$app->user->identity->username . ')',
    //                ['class' => 'btn btn-link logout']
    //            )
    //            . Html::endForm()
    //            . '</li>';
    //    }
    //    echo Nav::widget([
    //        'options' => ['class' => 'navbar-nav'],
    //        'items' => $menuItems,
    //    ]);
    //    NavBar::end();
    //    ?>
    <!--</header>-->

    <main role="main" class="flex-shrink-0">
        <div class="container"  style="width:82%;margin:0 auto;margin-right: 0;padding-top:15px">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
