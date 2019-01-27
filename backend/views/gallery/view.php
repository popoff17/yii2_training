<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Фотогалерея', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-view">
	<div class="col-md-10">	
    <h1>Галерея: <?= Html::encode($this->title) ?></h1>
	<table id="w0" class="table table-striped table-bordered detail-view">
		<tbody>
			<tr>
				<th>ID</th>
				<td><?= $model->id?></td>
			</tr>
			<tr>
				<th>Псевдоним</th>
				<td><?= $model->alias?></td>
			</tr>
			<tr>
				<th>Название альбома</th>
				<td><?= $model->title?></td>
			</tr>
			<tr>
				<th>Обложка альбома</th>
				<td><img src="<?= Yii::$app->params['frontend_url'].$model->image?>" width="200"/></td>
			</tr>
		</tbody>
	</table>
	<br/>
	<br/>
	<br/>
	<hr/>
	<div id="items_form">
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], "action"=>"/gallery/load-items"]) ?>
			<p>Загрузка изображений галлереи</p>
			<?= Html::fileInput ( "gallery_images[]", "", ["id"=>"gallery-album", "multiple"=>"true"] ) ?>
			<div style="display:none;">
				<?= Html::hiddenInput("gallery_id", $model->id) ?>
			</div>
			<br/>
			<?= Html::submitButton("Загрузить изображения", ['class' => 'btn btn-primary']) ?>
		<?php ActiveForm::end(); ?>
	</div>
	<? if($items){ ?>
		<div class="col-md-12 gallery_items">
		<? foreach($items as $item){ ?>
			<div class="col-md-3 gallery_item">
				<div class="delete" data-id="<?= $item['id']?>">x</div>
				<img src="<?= Yii::$app->params['frontend_url'].$item['thumb_image']?>" />
			</div>
		<? } ?>
		</div>
	<? }?>
	
	</div>
	<div class="col-md-2">	
		<p><?= Html::a('Список фотоальбомов', ['index'], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Создать фотоальбом', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><?= Html::a('Изменить фотоальбом', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?></p>
		<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Действительно удалить фотоальбом?',
				'method' => 'post',
			],
		]) ?></p>
	</div>
	<div class="clearfix"></div>
</div>
