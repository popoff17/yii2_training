<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SettingsSeo */

$this->title = 'Создать настройку SEO';
$this->params['breadcrumbs'][] = ['label' => 'Настройки SEO', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-seo-create">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="col-md-10">	
		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список настроек', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать настройку', ['create'], ['class' => 'btn btn-success']) ?></p>
	</div>

</div>
