<?php

namespace frontend\controllers;

use Yii;
use app\models\Video;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\MainController;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends MainController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
		$videos = (new \yii\db\Query())
			->select('*')
			->from('{{%video}}')
			->orderBy(['date' => SORT_DESC])
			->all();
		foreach($videos as $video){
			$years[] = substr($video["date"], -4);
		}
		$years = array_unique($years);
		if(Yii::$app->request->get('ajax')){
			return $this->renderPartial('index', [
				'videos' => $videos,
				'years' => $years,
			]);
		}
        return $this->render('index', [
            'videos' => $videos,
            'years' => $years,
        ]);
    }

}
