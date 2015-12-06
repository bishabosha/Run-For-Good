<?php
namespace app\assets;

use yii\web\AssetBundle;

class MapGlobals extends AssetBundle
{
	public $basePath = '@webroot/js/Maps';
	public $baseUrl = '@web/js/Maps';
	
	public $js = [
		'mapInit.js'
	];
	
	public $jsOptions = ['position' => \yii\web\View::POS_END];
}