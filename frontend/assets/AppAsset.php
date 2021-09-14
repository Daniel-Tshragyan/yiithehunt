<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/line-icons.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.css',
        'css/slicknav.min.css',
        'css/animate.css',
        'css/main.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/jquery-min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/color-switcher.js',
        'js/owl.carousel.min.js',
        'js/jquery.slicknav.js',
        'js/jquery.counterup.min.js',
        'js/waypoints.min.js',
        'js/form-validator.min.js',
        'js/contact-form-script.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
