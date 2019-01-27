<?php

namespace backend\controllers; 

use Yii;
use app\models\Gallery;
use app\models\GalleryItems;
use yii\data\ActiveDataProvider;
use common\controllers\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends BackendController
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

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Gallery::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
		$items = (new \yii\db\Query())
			->select('*')
			->from('{{%gallery_items}}')
			->where(['gallery_id' => $id])
			->all();
		
        return $this->render('view', [
            'model' => $this->findModel($id),
            'items' => $items,
        ]);
    }

    public function actionCreate()
    {
        $model = new Gallery();
        if ($model->load(Yii::$app->request->post())){
			if($_FILES['new_image']){
				$folder = "/uploads/gallery/";
				$upload_file = self::upload($_FILES["new_image"], "new_image", $folder, realpath(Yii::$app->basePath).'/../frontend/web', 800, 400, true);
				$model->image = $folder.$upload_file;
			}
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionLoadItems()
    {
		$count = count($_FILES["gallery_images"]["name"]);
		if($count){
			for($i=0; $i<$count; $i++){
				$model = new GalleryItems();
				$folder = "/uploads/gallery/";
				$upload_file = self::upload($_FILES["gallery_images"], "gallery_images", $folder, realpath(Yii::$app->basePath).'/../frontend/web', 0,  0,  false, 95, false, '', '', true, $i);
				$thumb_upload_file = self::upload($_FILES["gallery_images"], "gallery_images", $folder, realpath(Yii::$app->basePath).'/../frontend/web', 400,  300,  true, 95, true, '', '', true, $i);
				$model->thumb_image = $folder.$thumb_upload_file;
				$model->image = $folder.$upload_file;
				$model->gallery_id = Yii::$app->request->post("gallery_id");
				$model->save();
			}
		}
		return $this->redirect(['view', 'id' => Yii::$app->request->post("gallery_id")]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			if($_FILES['new_image']){
				$folder = "/uploads/gallery/";
				$folder_del = "/uploads/gallery";
				$upload_file = self::upload($_FILES["new_image"], "new_image", $folder, realpath(Yii::$app->basePath).'/../frontend/web', 800, 400, true);
				if($upload_file){
				@unlink(realpath(Yii::$app->basePath).'/../frontend/web'.$model->image);
					$model->image = $folder.$upload_file;
				}
			}
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
    public function actionDelitem()
    {
		$id = Yii::$app->request->post('id');
		if($id){
			$item = (new \yii\db\Query())
				->select('*')
				->from('{{%gallery_items}}')
				->where(['id' => $id])
				->one();
			@unlink(realpath(Yii::$app->basePath).'/../frontend/web'.$item['thumb_image']);
			@unlink(realpath(Yii::$app->basePath).'/../frontend/web'.$item['image']);
			GalleryItems::findOne($id)->delete();
			die('ok');
		}
    }

    public function actionDelete($id)
    {
		@unlink(realpath(Yii::$app->basePath).'/../frontend/web'.$this->findModel($id)->image);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
