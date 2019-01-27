<?php

namespace frontend\controllers;

use Yii;
use app\models\Mailforms;
use app\models\MailformsFields;
use app\models\MailformsResults;
use app\models\MailformsResultsValues;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MailformsController implements the CRUD actions for Mailforms model.
 */
class MailformsController extends Controller
{
	
	public $social = [];
	public $concerts = [];
	public $settings_seo = [];
	
    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => Mailforms::find(),
        ]);
        return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}
	
    public function actionSendMessage()
    {	
		$post = Yii::$app->request->post();
		if($post["control"] != ""){
			die("control error!");
		}
		if($post && $post["control"] == ""){
			$form = (new \yii\db\Query())
				->select('*')
				->from('{{%mailforms}}')
				->where(['key' => $post["mailform"]])
				->limit(1)
				->one();
			$fields = (new \yii\db\Query())
				->select('name')
				->from('{{%mailforms_fields}}')
				->where(['id' => explode(',', $form['form_fields'])])
				->all();
			foreach($post as $key=>$value){
				$form['template'] = str_replace("#".$key, $value, $form['template']);
			}
			$message = Yii::$app->mailer->compose('layouts/html')
				->setFrom(Yii::$app->params['mailforms_output_email']) //емейл отправителя
				->setTo($form['email'])
				->setSubject('Сообщение из формы "'.$form['title'].'"')
				->setHtmlBody($form['template'])
				->send();
		}
		if($message){
			//Фиксируем результат
			$result = new MailformsResults();
			$result->form_id = 1;
			$result->time = time();
			$result->user = Yii::$app->user->id;
			$result->save();
			//Заносим данные результата
			if($result->id){
				foreach($post as $key=>$value){
					if(
						$key != Yii::$app->request->csrfParam && 
						$key != "control" &&
						$key != "mailform"
						){
						$res_val = new MailformsResultsValues();
						$res_val->result_id = $result->id;
						$res_val->field_name = $key;
						$res_val->field_value = $value;
						$res_val->save();
					}
				}
			}
			die("ok");
		}else{
			die("error send message");
		}
    }

}
