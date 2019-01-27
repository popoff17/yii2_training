<?php
namespace backend\controllers; 

use Yii;
use yii\web\Controller;
use yii\swiftmailer\Mailer;
/**
 * Site controller
 */
class TestController extends Controller
{
	public function behaviors($new_rules = [])
	{
		var_dump(
			Yii::$app->mailer->compose('layouts/html')
			->setFrom('popoff17@yandex.ru')
			->setTo("popoff17@yandex.ru")
			->setSubject("subject")
			->send()
			);
		die;
		
		
	}
	
}
