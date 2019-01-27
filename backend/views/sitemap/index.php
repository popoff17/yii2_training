<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Карта сайта';
$this->params['breadcrumbs'][] = $this->title;
//Функция для построения меню
function echo_menu($sitemap, $parent = 0)
{
	foreach($sitemap as $item){ 
		if($item['parent'] == $parent){
			$html .= '<div class="item list-group-item level'.$parent.'" data-key="1"><a href="/sitemap/view?id='.$item['id'].'">'.$item['title'].'</a></div>';
			if($item['childs'] != NULL){
				$html .= echo_menu($item['childs'], $item['id']);
			}
		}
	}
	return $html;
}
?>
<div class="sitemap-index">
	<div class="col-md-10">	
		<h1><?= Html::encode($this->title) ?></h1>
		<div id="w1" class="list-view">
			<? if($sitemap){ ?>
				<? echo echo_menu($sitemap, 0); ?>
			<? } ?>
		
		</div>
	</div>
	<div class="col-md-2">		
		<p><?= Html::a('Создать пункт меню', ['create'], ['class' => 'btn btn-success']) ?></p>
		<br/>
		<br/>
		<br/>
		<p><?= Html::a('Сформировать новую карту сайта', ['createsitemap'], ['class' => 'btn btn-success']) ?></p>
	</div>
</div>
