<?php
namespace app\assets;

use yii\web\AssetBundle;

class ChartAsset extends AssetBundle
{
	public $basePath = '@webroot/js/';
	public $baseUrl = '@web/js/';
	
	public $js = [
        'jquery.min.js',
        'Chart.min.js',
		'charts.js'
	];
	
	public $jsOptions = ['position' => \yii\web\View::POS_END];
}