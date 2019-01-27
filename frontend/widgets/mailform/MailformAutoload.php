<?
namespace frontend\widgets\mailform;
use frontend\widgets\mailform\MailformAsset;
use yii\helpers\Html;
use yii\web\View;
use Yii;

/* 
* В виджете я не использую компонент ActiveForm 
* Потому что нет модели
* для простоты использую просто Html::tag
*/

class MailformAutoload extends \yii\bootstrap\Widget {
	public $model;
	public $mailform = "";
	public $pre_id = "form";
	public $submit_label = "Отправить";
	public $hiddens = [];
	
	public function init() {
		parent::init();
		$view = Yii::$app->getView();
		$this->registerAssets();
	}
	public function run() {
		if($this->mailform != ""){
			//получаем форму
			$form = (new \yii\db\Query())
				->select('*')
				->from('{{%mailforms}}')
				->where(['key' => $this->mailform])
				->limit(1)
				->one();
			//получаем поля формы
			$fields = (new \yii\db\Query())
				->select('*')
				->from('{{%mailforms_fields}}')
				->where(['id' => explode(',', $form['form_fields'])])
				->all();
			$content = "";
			//Перебор полей
			foreach($fields as $field){
				$input = Html::input($field['type'], $field['name'], "", ['id' => $this->pre_id.$form['key'].$field['name'], 'class'=>'form-field', 'placeholder' => $field['placeholder']]);
				$output .= Html::tag('div', $input,['class' => 'field-wrapper']);
			}
			//перебор скрытых полей
			$hidden_inputs = "";
			$hidden_inputs .= Html::input("hidden", Yii::$app->request->csrfParam, Yii::$app->request->getCsrfToken(), ['class'=>'form-hidden_field' ]);
			$hidden_inputs .= Html::input("hidden", "mailform", $this->mailform, ['class'=>'form-hidden_field' ]);
			$hidden_inputs .= Html::input("hidden", "control", "", ['class'=>'form-hidden_field' ]);
			$output .= Html::tag('div', $hidden_inputs,['class' => 'hidden_field-wrapper']);
			
			
			$submit = Html::submitInput ( $label = $this->submit_label, $options = [] );
			$output .= Html::tag('div', $submit,['id' => 'field-wrapper']);
			$output .= Html::tag('div', "Идет отправка",['class' => 'form-loader']);
			$output .= Html::tag('div', "",['class' => 'form-result']);
			
			$form = Html::tag('form', $output,['class' => 'form mailform', 'action' => '/mailforms/send-message/', 'method' => 'post']);
			$html = Html::tag('div', $form,['class' => 'form-wrapper']);
		}
		return $html;
	}
	
	public function registerAssets()
	{
		$view = $this->getView();
		MailformAsset::register($view);
	}
	
}