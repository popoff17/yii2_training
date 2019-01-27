<?php

namespace backend\controllers; 

use Yii;
use app\models\Sitemap;
use yii\data\ActiveDataProvider;
use common\controllers\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SitemapController implements the CRUD actions for Sitemap model.
 */
class MenuController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors($new_rules = [])
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
     * Lists all Sitemap models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Sitemap;
		$sitemap = $model->find()->All();
		$this->actionChilds($sitemap);

        return $this->render('index', [
            'sitemap' => $sitemap,
        ]);
    }
	
	public function actionChilds($arr, $parent_id = 0)
	{
			//Условия выхода из рекурсии
			if(empty($arr[$parent_id])) {
				return null;
			}
			//перебираем в цикле массив и выводим на экран
			for($i = 0; $i < count($arr[$parent_id]);$i++) {
				echo '<li><a href="?category_id='.$arr[$parent_id][$i]['id'].
							'&parent_id='.$parent_id.'">'
							.$arr[$parent_id][$i]['title'].'</a>';
				//рекурсия - проверяем нет ли дочерних категорий
				view_cat($arr,$arr[$parent_id][$i]['id']);
				echo '</li>';
			}	
	}

    /**
     * Displays a single Sitemap model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sitemap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sitemap();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sitemap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$this->saveSitemap();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sitemap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sitemap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sitemap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function saveSitemap()
	{
        $sitemap = new Sitemap;
		var_dump(file_get_contents("../../common/includes/sitemap.php") );
		foreach($sitemap->find()->all() as $item){
			var_dump($item['alias']);
		}
		die;
	}
	
    protected function findModel($id)
    {
        if (($model = Sitemap::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
