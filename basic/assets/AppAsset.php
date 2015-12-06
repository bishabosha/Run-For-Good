<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/offcanvas.css'
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
        'js/bootstrap.min.js',
        'js/ie10.js',
        'js/bootstrap-datepicker.js',
        'js/app.js',
        'js/Chart.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
