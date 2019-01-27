<?php

namespace backend\controllers; 

use Yii;
use app\models\Mailforms;
use app\models\MailformsResults;
use yii\data\ActiveDataProvider;
use common\controllers\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MailformsResultsController implements the CRUD actions for MailformsResults model.
 */
class MailformsResultsController extends BackendController
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
     * Lists all MailformsResults models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Mailforms::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFormList($id)
    {
         $dataProvider = new ActiveDataProvider([
            'query' => MailformsResults::find()
        ]); 
		
		$form = (new \yii\db\Query())
			->select('*')
			->from('{{%mailforms}}')
			->where(['id' => $id])
			->limit(1)
			->one();
        return $this->render('form-list', [
            'form' => $form,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MailformsResults model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$result = (new \yii\db\Query())
			->select('*')
			->from('{{%mailforms_results}} as res')
			->leftJoin('{{%mailforms}} as form', 'res.form_id=form.id')
			->where('form_id=:form_id', array(':form_id'=>$id))
			->one();
		$result_values = (new \yii\db\Query())
			->select('*')
			->from('{{%mailforms_results_values}} as val')
			->leftJoin('{{%mailforms_fields}} as fields', 'val.field_name=fields.name')
			->where('result_id=:result_id', array(':result_id'=>$id))
			->all();
		
        return $this->render('view', [
            'result' => $result,
            'result_values' => $result_values,
        ]);
    }

    /**
     * Creates a new MailformsResults model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MailformsResults();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MailformsResults model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MailformsResults model.
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
     * Finds the MailformsResults model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MailformsResults the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MailformsResults::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
