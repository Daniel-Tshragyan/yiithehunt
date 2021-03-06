<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\models\User;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

    <html lang="<?= Yii::$app->language ?>">
    <head>
        <!-- Required meta tags -->
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

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
    //        ['label' => 'About', 'url' => ['/site/about']],
    //        ['label' => 'Contact', 'url' => ['/site/contact']],
    //    ];
    //    if (Yii::$app->user->isGuest) {
    //        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
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
    <header id="home" class="hero-area">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
            <div class="container">
                <div class="theme-header clearfix">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <span class="lni-menu"></span>
                            <span class="lni-menu"></span>
                            <span class="lni-menu"></span>
                        </button>
                        <a href="index.html" class="navbar-brand">
                            <?=Html::img(Yii::getAlias('@web').'/img/logo.png') ?>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="main-navbar">
                        <ul class="navbar-nav mr-auto w-100 justify-content-end">
                            <li class="nav-item">
                                <a href="<?=Url::to(['/post'])?>" class="nav-link">Posts</a>
                            </li>
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" href="contact.html">-->
<!--                                    Contact-->
<!--                                </a>-->
<!--                            </li>-->
                            <?php
                                if (Yii::$app->user->isGuest) {
                                    echo '
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="'. Url::to(['site/login']).'">Sign In</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="'.Url::to(['user/candidate-reg']).'">Registration as candidate</a></li>
                                            <li><a class="dropdown-item" href="'.Url::to(['user/company-reg']).'">Registration as company</a></li>
                                        </ul>
                                    </li>';
                                } else {
                                    echo '
                                    <li class="nav-item dropdown">'
                                        .Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                                     .Html::submitButton(
                                        'Logout (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'btn btn-link logout']
                                    )
                                     .Html::endForm().';
                                        
                                    </li>';

                                    if (Yii::$app->user->identity->role == User::ROLE_COMPANY) {
                                        echo '
                                        <li class="button-group">
                                            <a href="post-job.html" class="button btn btn-common">Post a Job</a>
                                        </li>';
                                    }
                                }
                            ?>



                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-menu" data-logo="assets/img/logo-mobile.png"></div>
        </nav>
        <!-- Navbar End -->

        <div class="container">
            <div class="row space-100">
                <div class="col-lg-7 col-md-12 col-xs-12">
                    <div class="contents">
                        <h2 class="head-title">Find the  <br> job that fits your life</h2>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non.</p>
                        <div class="job-search-form">
                            <form>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-xs-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Job Title or Company Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-xs-12">
                                        <div class="form-group">
                                            <div class="search-category-container">
                                                <label class="styled-select">
                                                    <select>
                                                        <option value="none">Locations</option>
                                                        <option value="none">New York</option>
                                                        <option value="none">California</option>
                                                        <option value="none">Washington</option>
                                                        <option value="none">Birmingham</option>
                                                        <option value="none">Chicago</option>
                                                        <option value="none">Phoenix</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <i class="lni-map-marker"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-xs-12">
                                        <button type="submit" class="button"><i class="lni-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="intro-img">
                        <?= Html::img(Yii::getAlias('@web').'/img/intro.png')?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer>
        <!-- Footer Area Start -->
        <section class="footer-Content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <div class="widget">
                            <div class="footer-logo"><?= Html::img(Yii::getAlias('@web').'/img/logo-footer.png')?></div>
                            <div class="textwidget">
                                <p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">Quick Links</h3>
                            <ul class="menu">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">License</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                            <ul class="menu">
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Refferal Terms</a></li>
                                <li><a href="#">Product License</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">Subscribe Now</h3>
                            <p>Sed consequat sapien faus quam bibendum convallis.</p>
                            <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
                                <div class="form-group is-empty">
                                    <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Enter Email..." required="">
                                    <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-envelope"></i></button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <ul class="mt-3 footer-social">
                                <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                                <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer area End -->

        <!-- Copyright Start  -->
        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-info text-center">
                            <p>Designed and Developed by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
