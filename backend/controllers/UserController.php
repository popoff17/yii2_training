<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use app\models\User;
use app\models\AuthItem;
use app\models\AuthAssignment;
use app\models\SearchUser;
use app\models\AuthRule;
use common\controllers\BackendController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BackendController
{

    public function behaviors($new_rules = [])
    {
        return parent::behaviors(
								[[
									//'actions' => ['index'],
									'allow' => true,
									'roles' => ['admin'],
								], 
								[
									'allow' => false,
									'roles' => ['manager'],
								]]
		);
    }
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {	
        $searchModel = new SearchUser();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$model = new User();
		$authItem = new AuthItem;
		$errors = false;
		foreach($authItem::find()->all() as $item){
			$authItemArr[$item->attributes['name']] = $item->attributes['name'];
		}
		
        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}else{
				$errors = $model->errors;
			}
        }
		return $this->render('create', [
			'authItemArr' => $authItemArr,
			'authItem' => $authItem,
			'model' => $model,
			'errors' => $errors,
		]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatePass($id)
    {
        $model = $this->findModel($id);
		$authItem = new AuthItem;
		$authAssignment = new AuthAssignment;
		$errors = false;
		$authItemArr = $authItem->selectAllForDropDownList();
		foreach($authItemArr as $item)
		{
			if($item == $authAssignment->findOne(['user_id' => $id])['item_name']) //находим роль пользователя, чтобы установить в выпадающем списке в качестве значения
			{
				$model->role = $item;
			}
		}
        if ($model->load(Yii::$app->request->post())){
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			} else {
				$errors = $model->errors;
			}
		}
		return $this->render('updatePass', [
			'model' => $model,
			'errors' => $errors,
		]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$authItem = new AuthItem;
		$authAssignment = new AuthAssignment;
		$errors = false;
		$authItemArr = $authItem->selectAllForDropDownList();
		foreach($authItemArr as $item)
		{
			if($item == $authAssignment->findOne(['user_id' => $id])['item_name']) //находим роль пользователя, чтобы установить в выпадающем списке в качестве значения
			{
				$model->role = $item;
			}
		}
		$model->password_confirm = $model->password_hash; //пересохраняем пароль. Поле пароль обязательно для заполнения, но его нет в форме. 
        if ($model->load(Yii::$app->request->post())){
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			} else {
				$errors = $model->errors;
			}
		}
		return $this->render('update', [
			'model' => $model,
			'errors' => $errors,
			'authItemArr' => $authItemArr,
		]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$this->findModel($id)->delete();
		$this->findModel($id)->deleteAssignment($id);
        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
