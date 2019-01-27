<?php

namespace frontend\controllers;

use Yii;
use app\models\Events;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\MainController;

/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends MainController
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
        $dataProvider = new ActiveDataProvider([
            'query' => Events::find(),
        ]);
		$events = array_values($dataProvider->getModels());
        if(Yii::$app->request->get('ajax')){
			return $this->renderPartial('index', [
				'events' => $events,
			]);
		}
		return $this->render('index', [
            'events' => $events,
        ]);
    }

    public function actionView($alias)
    {
		$event = (new \yii\db\Query())
			->select('*')
			->from('{{%events}}')
			->where(['alias' => $alias])
			->one();
		Yii::$app->view->title = $event['title']; 
		if(!$event){
			Yii::$app->view->title = '404'; 
			return $this->render('/site/error', []);
		}
		if(Yii::$app->request->get('ajax')){
			return $this->renderPartial('view', [
				'event' => $event,
			]);
		}
		return $this->render('view', [
			'event' => $event,
		]);
    }

    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
