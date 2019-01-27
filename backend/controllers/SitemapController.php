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
class SitemapController extends BackendController
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
    public function actionIndex($action="")
    {
        $model = new Sitemap;
		$items = $model->find()->All();
		$i=0;
		foreach($items as $item){
			$arr[$i]['id'] = $item->id;
			$arr[$i]['parent'] = $item->parent;
			$arr[$i]['alias'] = $item->alias;
			$arr[$i]['menu'] = $item->menu;
			$arr[$i]['title'] = $item->title;
			$arr[$i]['template'] = $item->template;
			$i++;
		}
		$sitemap = $this->actionChilds($arr);
		if($action == "createSitemap"){
			return $sitemap;
		}
        return $this->render('index', [
            'sitemap' => $sitemap,
        ]);
    }
	// рекурсивный метод для формирования массива карты сайта
	public function actionChilds($array, $parent_id = 0) //формирование массива для многоуровневого дерева сайта
	{
		for($i=0; $i<count($array); $i++){
			if($array[$i]['parent'] == $parent_id)
			{
				$array[$i]['childs'] = $this->actionChilds($array, $array[$i]['id']);
				$result[] = $array[$i];
			}
		}
			return $result;
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
        $model = new Sitemap;
		$items = $model->find()->All();
		$i=0;
		foreach($items as $item){
			$arr[$i]['id'] = $item->id;
			$arr[$i]['parent'] = $item->parent;
			$arr[$i]['alias'] = $item->alias;
			$arr[$i]['menu'] = $item->menu;
			$arr[$i]['title'] = $item->title;
			$arr[$i]['template'] = $item->template;
			$i++;
		}
		$sitemap = $this->actionChilds($arr);
		
        return $this->render('index', [
            'sitemap' => $sitemap,
        ]);
    }


    public function actionCreatesitemap()
    {
			
            echo $this->echo_menu($this->actionIndex("createSitemap"), 0);
    }
	
	//функция для построения дерева
	function echo_menu($sitemap, $parent = 0)
	{
		foreach($sitemap as $item){ 
			if($item['parent'] == $parent){
				$html .= '<div class="item list-group-item level'.$parent.'" data-key="1"><a href="/sitemap/view?id='.$item['id'].'">'.$item['title'].'</a></div>';
				if($item['childs'] != NULL){
					$html .= $this->echo_menu($item['childs'], $item['id']);
				}
			}
		}
		return $html;
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
