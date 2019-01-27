<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MailformsResults */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Входящие сообщения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $result['title'];
$this->params['breadcrumbs'][] =  date("d-m-Y H:m:i", $result['time']);
?>
<div class="mailforms-results-view">
	<div class="col-md-10">	
		<h1>Форма <b><?= $result['title']?></b>, <?= date("d-m-Y H:m:i", $result['time'])?></h1>
		<table id="w0" class="table table-striped table-bordered detail-view">
			<tbody>
				<tr>
					<th>ID</th>
					<td>1</td>
				</tr>
				<tr>
					<th>Дата и время</th>
					<td><?= date("d-m-Y H:m:i", $result['time'])?></td>
				</tr>
				<tr>
					<th>Пользователь</th>
					<td><?= $result['user']?></td>
				</tr>
				<tr>
					<th>Форма</th>
					<td>
						<?= $result['title'] ?>
					</td>
				</tr>
				<tr>
					<th>Данные формы</th>
					<td>
						<? foreach($result_values as $value){?>
							<b><?= $value["placeholder"]; ?></b> - <?= $value['field_value']?><br/>
						<? } ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-2">	
		<? if(Yii::$app->user->id != $model->id){?>
			<p><?= Html::a('Удалить', ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data' => [
					'confirm' => 'Действительно удалить пользователя?',
					'method' => 'post',
				],
			]) ?></p>
		<?}?>
	</div>
	<div class="clearfix"></div>
</div>
