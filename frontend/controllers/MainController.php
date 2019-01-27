<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * ConcertsController implements the CRUD actions for Concerts model.
 */
class MainController extends Controller
{
	public $social = [];
	public $concerts = [];
	public $settings_seo = [];
	
	public function init(){
		
		$socials = (new \yii\db\Query())
			->select('*')
			->from('{{%social}}')
			->all();
		foreach($socials as $s){
			$this->social[$s['title']] = $s['link'];
		}
		
		$this->concerts = (new \yii\db\Query())
			->select('*')
			->from('{{%concerts}}')
			->orderBy(['id' => SORT_DESC])
			->limit(3)
			->all();
			
		$settings_seo = (new \yii\db\Query())
			->select('*')
			->from('{{%settings_seo}}')
			->all();
		foreach($settings_seo as $seo){
			$this->settings_seo[$seo['alias']] = $seo['value'];
		}
	}
}
