<?php

namespace frontend\controllers;

use Yii;
use app\models\Pages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\MainController;

/**
 * PagesController implements the CRUD actions for Pages model.
 */
class PagesController extends MainController
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
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect('/', 302);
    }

    /**
     * Displays a single Pages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($alias)
    {
		$page = (new \yii\db\Query())
			->select('*')
			->from('{{%pages}}')
			->where(['alias' => $alias])
			->one();
		Yii::$app->view->title = $page['title']; 
		if(!$page){
			Yii::$app->view->title = '404'; 
			return $this->render('/site/error', []);
		}
		if(Yii::$app->request->get('ajax')){
			return $this->renderPartial('view', [
				'page' => $page,
			]);
		}
		return $this->render('view', [
			'page' => $page,
		]);
    }


    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
