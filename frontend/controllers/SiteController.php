<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\controllers\MainController;

class SiteController extends MainController
{
    public function actionIndex()
    {
		$index_content = (new \yii\db\Query())
			->select('*')
			->from('{{%pages}}')
			->where(['alias' => "index"])
			->one();

		if(Yii::$app->request->get('ajax')){
			return $this->renderPartial('index', [
				'index_content' => $index_content,
			]);
		}
        return $this->render('index', [
            'index_content' => $index_content,
        ]);
    }

}
