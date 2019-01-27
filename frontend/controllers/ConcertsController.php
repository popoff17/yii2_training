<?php

namespace frontend\controllers;

use Yii;
use app\models\Concerts;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\MainController;

/**
 * ConcertsController implements the CRUD actions for Concerts model.
 */
class ConcertsController extends MainController
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

    /**
     * Lists all Concerts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Concerts::find(),
			'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);
		$concerts = array_values($dataProvider->getModels());
        if(Yii::$app->request->get('ajax')){
			return $this->renderPartial('index', [
				'concerts' => $concerts,
			]);
		}
		return $this->render('index', [
            'concerts' => $concerts,
        ]);
    }

    /**
     * Displays a single Concerts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($alias)
    {
		$concert = (new \yii\db\Query())
			->select('*')
			->from('{{%concerts}}')
			->where(['alias' => $alias])
			->one();
		Yii::$app->view->title = $concert['title']; 
		if(!$concert){
			Yii::$app->view->title = '404'; 
			return $this->render('/site/error', []);
		}
		if(Yii::$app->request->get('ajax')){
			return $this->renderPartial('view', [
				'concert' => $concert,
			]);
		}
		return $this->render('view', [
			'concert' => $concert,
		]);
    }
    /**
     * Finds the Concerts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Concerts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Concerts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
