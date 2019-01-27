<?php

namespace frontend\controllers;

use Yii;
use app\models\Gallery;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\MainController;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends MainController
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
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Gallery::find(),
        ]);
		$galleryes = array_values($dataProvider->getModels());
		if(Yii::$app->request->get('ajax')){
			return $this->renderPartial('index', [
				'galleryes' => $galleryes,
			]);
		}
        return $this->render('index', [
            'galleryes' => $galleryes,
        ]);
    }

    public function actionView($alias)
    {
		$gallery = (new \yii\db\Query())
			->select('*')
			->from('{{%gallery}}')
			->where(['alias' => $alias])
			->one();
		Yii::$app->view->title = $gallery['title']; 
		if(!$gallery){
			Yii::$app->view->title = '404'; 
			return $this->render('/site/error', []);
		}
		$items = (new \yii\db\Query())
			->select('*')
			->from('{{%gallery_items}}')
			->where(['gallery_id' => $gallery['id']])
			->all();
		if(Yii::$app->request->get('ajax')){
			return $this->renderPartial('view', [
				'gallery' => $gallery,
				'items' => $items,
			]);
		}
        return $this->render('view', [
            'gallery' => $gallery,
            'items' => $items,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
