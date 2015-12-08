<?php
namespace app\assets;

use yii\web\AssetBundle;

class MapAsset extends AssetBundle
{
	public $basePath = '@webroot/js/Maps';
	public $baseUrl = '@web/js/Maps';
	
	public $js = [
		'https://maps.googleapis.com/maps/api/js',
		'http://www.google.com/jsapi',
		'createInfoWindow.js',
		'createMarker.js',
		'getIcon.js',
		'initializeMap.js',
		'updateLocZoom.js'
	];
	
	public $css = [
		'infoWindow.css'
	];
	
	public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}