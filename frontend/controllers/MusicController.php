<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\MainController;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class MusicController extends MainController
{
	
	public $client_id = "a093a435";
	public $group_id = "492314";
	public $group_name_string = "the+maugleez";
    /**
     * @inheritdoc
     */
    public function behaviors()
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

    public function actionIndex($album_id=null)
    {
		$albums_get = json_decode(file_get_contents("https://api.jamendo.com/v3.0/artists/albums/?client_id={$this->client_id}&format=jsonpretty&id={$this->group_id}"));
		if($albums_get->headers->status=="success"){
			$albums = $albums_get->results[0]->albums;
			if($album_id){
				$tracks_get = json_decode(file_get_contents("https://api.jamendo.com/v3.0/artists/tracks/?client_id={$this->client_id}&format=jsonpretty&order=track_name_desc&name={$this->group_name_string}&id={$this->group_id}&album_id={$album_id}"));
				$tracks = $tracks_get->results[0]->tracks;
			}else{
						$tracks_get = json_decode(file_get_contents("https://api.jamendo.com/v3.0/artists/tracks/?client_id={$this->client_id}&format=jsonpretty&order=track_name_desc&name={$this->group_name_string}&id={$this->group_id}&album_id={$albums[0]->id}"));
						$tracks = $tracks_get->results[0]->tracks;
			}
			
			
			if(Yii::$app->request->get('ajax')){
				return $this->renderPartial('index', [
					'albums' => $albums,
					'tracks' => $tracks,
				]);
			}
			return $this->render('index', [
				'albums' => $albums,
				'tracks' => $tracks,
			]);
		}else{
			Yii::$app->view->title = '404'; 
			return $this->render('/site/error', []);
		}
    }
	
	//return $this->actionLogin();

}
