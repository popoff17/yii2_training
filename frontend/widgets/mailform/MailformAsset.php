<?php
namespace frontend\widgets\mailform;
use yii\web\AssetBundle;
class MailformAsset extends AssetBundle
{
	public $sourcePath = '@frontend/widgets/mailform/assets';
	public $css = [
		'css/mailforms.css'
	];
	
	public $js = [
    	'js/mailforms.js'
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}