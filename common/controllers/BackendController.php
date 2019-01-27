<?php

namespace common\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class BackendController extends Controller
{
	private static $_allowUnicode = false;
	
	
    public function behaviors($new_rules = [])
    {	
		$rules = [
					[
						'actions' => ['index', 'create', 'view', 'update', 'delete'],
						'allow' => true,
						'roles' => ['manager'],
					],
					[
                        'actions' => ['error', 'logout', 'login'],
                        'allow' => true,
                    ],
					
                ];
		$rules = array_merge($new_rules, $rules);
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $rules,
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
	
	public function beforeAction($action)
	{
		if (parent::beforeAction($action)) {
			if ($action->id=='error') {// change layout for error action
				if(Yii::$app->user->isGuest) {
					$this->layout ='no_auth';
				}
			}
			return true;
		} else {
			return false;
		}
	}

	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
	
	
	/* Поднять вверх */
	public function moveUp($id, $model){
		$dataProvider=new CActiveDataProvider($model, array(
			'pagination'=>false,
			'criteria'=>array(
				'order'=>'ord DESC',
				'limit'=>-1,
			),
		));
		if($id && $dataProvider){
			$v = array();
			foreach( $dataProvider->getData() as $it ){
				$v[ $it->id ] = $it->ord;
			}
			if( array_key_exists( $id, $v )){
				asort( $v );
				$lpos = 0;
				$up_arr = array();
				$c = 0;                
				foreach( $v as $new_id => $new_pos ){
					$c++;
					$up_arr[ $new_id ] = $c;
						if($flag==true){
							$up_arr[ $new_id ] = $c-1;
							$up_arr[ $lpos ] = $c;
							$flag = false;
						}
						if( $new_id == $id ){
							$flag = true;
							$lpos = $new_id;
						}
				}   
				foreach($up_arr as $index => $value){
					if($index == $value){
						continue;
					}
					$q2 = Yii::app()->db->createCommand()->update($model->tableName() ,array(
						'ord'=>$value,
					),'id=:id',array(':id'=>$index));
				}
			}
		}
	}
	
	/* Опустить вниз */
	public function moveDown($id, $model){
		$dataProvider=new CActiveDataProvider($model, array(
			'pagination'=>false,
			'criteria'=>array(
				'order'=>'ord DESC',
				'limit'=>-1,
			),
		));
		if($id && $model){
			$v = array();
			foreach( $dataProvider->getData() as $it ){
				$v[ $it->id ] = $it->ord;
			}
			
			if( array_key_exists( $id, $v )){
				asort( $v );
				$lpos = 0;
				$up_arr = array();
				$c = 0;                
				foreach( $v as $new_id => $new_pos ){
					$c++;
					$up_arr[ $new_id ] = $c;
                    if( $new_id != $id ){
                        $lpos = $new_id;
                    }else{
                        $up_arr[ $new_id ] = $c-1;
                        $up_arr[ $lpos ] = $c;
                    }
				}   
				foreach($up_arr as $index => $value){
					$q2 = Yii::app()->db->createCommand()->update($model->tableName() ,array(
						'ord'=>$value,
					),'id=:id',array(':id'=>$index));
				}
			}
		}
	}
	
	/**
	 * Обрабатывает загруженное изображение, проверяя его параметры, и копирует в указанную директорию
	 * @param array $source Массив из $_FILES[`имя`], или аналогичный. 
	 * Должен содержать поля 'name', 'type', 'tmp_name', 'error', 'size'
	 * @param string $path Директория в которую будет записан файл
	 * @param int $width Фиксированная ширина. Изображение с другой шириной будет отклонено. 
	 * @param int $height Фиксированная высота. Изображение с другой высотой будет отклонено.
	 * @param bool $resize Если ширина и/или высота изображения не соответствует требуемым, 
	 * то его размер будет изменен до указанных значений. Если фиксированна только ширина или высота,
	 * то другой параметр будет изменятся пропорционально.
	 * @param int $resizeQuality Значение от 0 до 100 определяет качество пережатого изображения. 
	 * Чем выше значение, тем лучше качество и больше размер.
	 * @return string Имя загруженного изображения
	 */
	public static function upload( $source, $field_name, $folder, $path, $width = 0, $height = 0, $resize = false, $resizeQuality = 95,$is_crop = true, $source_name = '', $source_tmp_name = '', $multiple = false, $key='', $watermark=false){
		if($height <= 0 || $width <= 0 ){
			$resize = false;
		}
		$orig_path = $path;
		//$path = realpath(Yii::$app->basePath).'/../frontend/web/uploads/'.$folder.'/';
		/* $path = '/'; */
		$path = $path.$folder.'/';
		// Инициализируем переменные
		$v 			= array();		
		$hash 		= substr( md5( uniqid( microtime() )), 1, 16 );    			
        if($multiple){
			$tmp_name 	= self::parseCleanValue( $source['tmp_name'][$key]);
			$src_name 	= self::parseCleanValue( $source['name'][$key]);
		}else{
			$tmp_name 	= self::parseCleanValue( $source['tmp_name'] );
			$src_name 	= self::parseCleanValue( $source['name'] );
		}
        // Проверяем что файл загружен корректно
	    if( is_uploaded_file( $tmp_name )){
	        $v['image'] = $hash . strrchr( strtolower( $src_name ), '.' );
	        if( ! copy( $tmp_name, $path . $v['image'] ))
	        	return false;
	    }else{
			return false;
		}
        $full_path = $path . $v['image'];
        // Определяем размеры и тип изображения
        list( $real_width, $real_height, $type ) = getimagesize( $full_path );
        switch( $type ){
            case 1 : $res = imagecreatefromgif(  $full_path ); break;
            case 2 : $res = imagecreatefromjpeg( $full_path ); break;
            case 3 : {
                $res = imagecreatefrompng(  $full_path );
                imagealphablending( $res, true); //PNGFIX
                }
			break;
            default: 
            	@unlink( $full_path );
            	throw new CHttpException("Этот тип изображения '{$src_name}' не поддерживается.");
        }           

        if( $resize ){
	        // Если размеры не соответствуют, то мы можем пережать картинку
	        // для этого рассчитываем новые размеры
	        if( $width > 0 and $height > 0 ){ // Фиксированные ширина и высота
	        	$new_height = $height;
	        	$new_width  = $width;
	        }elseif( $width == 0 and $height > 0 ){ // Фиксированная высота
				if ($height>$real_height) { $height=$real_height;}
	        	$new_width  = intval(( $height / $real_height ) * $real_width );
	        	$new_height = $height;
	        }elseif( $width > 0 and $height == 0){ // Фиксированная ширина
				if ($width>$real_width) { $width=$real_width;}
	        	$new_height = intval(( $width / $real_width ) * $real_height );
	        	$new_width  = $width;
	        }elseif( $width == 0 and $height == 0){ //original
				$new_width = $width;
				$new_height = $height;
			}
			
	        if( $new_height != $real_height or $new_width != $real_width ){
		        $t_res = imagecreatetruecolor( $new_width, $new_height );
				//PNGFIX
				if ($type==3){
					imagealphablending($t_res, false );
					imagesavealpha($t_res, true );
				}
            if ($width>0 && $height>0) {
					$color = imagecolorallocatealpha ($t_res, 255, 255, 255, 0);
					imagefill ($t_res, 0, 0, $color);
					$origin_x = $origin_y = 0;
					$final_height = $real_height * ($new_width / $real_width);
					if (!$is_crop) {
						if ($final_height > $new_height) {
								$origin_x = $new_width / 2;
								$new_width = $real_width * ($new_height / $real_height);
								$origin_x = round ($origin_x - ($new_width / 2));
						} else {
								$origin_y = $new_height / 2;
								$new_height = $final_height;
								$origin_y = round ($origin_y - ($new_height / 2));
						}
					} else {
						$origin_x = $origin_y = 0;
					}
					$src_x = $src_y = 0;
					$src_w = $real_width;
					$src_h = $real_height;

					$cmp_x = $real_width / $new_width;
					$cmp_y = $real_height / $new_height;
					// calculate x or y coordinate and width or height of source
					if ($cmp_x > $cmp_y) {
						$src_w = round ($real_width / $cmp_x * $cmp_y);
						$src_x = round (($real_width - ($real_width / $cmp_x * $cmp_y)) / 2);
					} else if ($cmp_y > $cmp_x) {
						$src_h = round ($real_height / $cmp_y * $cmp_x);
						$src_y = round (($real_height - ($real_height / $cmp_y * $cmp_x)) / 2);
					}   
					
					if (imagecopyresampled ($t_res, $res, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h)) {
						@unlink( $full_path );
						$imagers = array( 1 => 'imagegif', 2 => 'imagejpeg', 3 => 'imagepng' );
											//compression level for png should be from 0 to 9;
											//some servers may not have zlib.so we just drop this param
						if ($type==3  && $resize){
							if( ! $imagers[ $type ](  $t_res, $full_path/*, $resizeQuality*/ ))
								throw new CHttpException("Не удалось создать уменьшенное изображение '{$src_name}'.");
						}elseif( ! $imagers[ $type ](  $t_res, $full_path, $resizeQuality ))
							throw new CHttpException("Не удалось создать уменьшенное изображение '{$src_name}'.");									
					}else{
						@unlink( $full_path );            					
						throw new CHttpException("Не удалось уменьшить изображение '{$src_name}'.");				
					}
                } else {
					if( imagecopyresampled( $t_res, $res, 0, 0, 0, 0, $new_width, $new_height, $real_width, $real_height )){
						@unlink( $full_path );
						$imagers = array( 1 => 'imagegif', 2 => 'imagejpeg', 3 => 'imagepng' );
											//compression level for png should be from 0 to 9;
											//some servers may not have zlib.so we just drop this param
						if ($type==3  && $resize){
							if( ! $imagers[ $type ](  $t_res, $full_path/*, $resizeQuality*/ ))
								throw new CHttpException("Не удалось создать уменьшенное изображение '{$src_name}'.");
						}elseif( ! $imagers[ $type ](  $t_res, $full_path, $resizeQuality ))
								throw new CHttpException("Не удалось создать уменьшенное изображение '{$src_name}'.");									
					}else{
						@unlink( $full_path );            					
						throw new CHttpException("Не удалось уменьшить изображение '{$src_name}'.");				
					}      	
				}
	        }
        }else{
			/*
	        // Если размеры не соответствуют, то удаляем файл 
	        // и поорождаем исключение
	        //-----------------------------------------------
			if( ( $width  > 0 and $width  != $real_width  ) or
				( $height > 0 and $height != $real_height ) ) {
					@unlink( $full_path );
					throw new CHttpException("Размеры изображения '{$src_name}' не соответствуют указанным");
			} */
        }
		if($watermark){
			//$v['image'] = self::watermark_image(Yii::app()->basePath.'/..'.$orig_path.$v['image'], Yii::app()->basePath.'/..'.$orig_path."1".$v['image'], $orig_path);
			$v['image'] = self::watermark_image(
													Yii::app()->basePath.'/..'.$orig_path.$v['image'], 
													$orig_path
												);
		}
		return $v['image'];
	}

		function watermark_image($image, $orig_path){
			$image_path = Yii::app()->basePath.'/..'."/watermark.png";
			list( $owidth, $oheight, $type ) = getimagesize( $image );
			switch( $type ){
				case 1 : $img_src = imagecreatefromgif($image); break;
				case 2 : $img_src = imagecreatefromjpeg($image); break;
				case 3 : $img_src = imagecreatefrompng($image); break;
				default: $img_src = imagecreatefromjpeg($image); break;
			}
			$watermark = imagecreatefrompng($image_path);
			list($w_width, $w_height) = getimagesize($image_path);
			$pos_x = $owidth - ($owidth/2)- ($w_width/2);
			$pos_y = $oheight - ($oheight/2) - ($w_height/2);
			
			$repeat_x = intval($owidth/($w_width+100));
			$repeat_y = intval($oheight/($w_height+100));
			for($x=0; $x<=$repeat_x; $x++){
				for($y=0; $y<=$repeat_y; $y++){
					imagecopy($img_src, $watermark, $x*($w_width+100), $y*($w_height+100), 0, 0, $w_width, $w_height);
				}
			}
			
			//imagecopy($img_src, $watermark, $pos_x+100, $pos_y+100, 0, 0, $w_width, $w_height);
			
			
			imagejpeg($img_src, $image, 100);
			imagedestroy($img_src);
			return str_replace($orig_path,"",str_replace(Yii::app()->basePath.'/..',"",$image));
		}


	/* file upload */
	public static function upload_file( $source, $path){
		$path = realpath(Yii::app()->basePath.'/..'.$path).'/';
		// Инициализируем переменные
		$v 			= array();		
		$hash 		= substr( md5( uniqid( microtime() )), 1, 16 );    			
        $tmp_name 	= self::parseCleanValue( array_shift($source['tmp_name']) );
        $src_name 	= self::parseCleanValue( array_shift ($source['name']) );
        // Проверяем что файл загружен корректно
	    if( is_uploaded_file( $tmp_name )){
	        $v['file'] = $hash . strrchr( strtolower( $src_name ), '.' );
	        if( ! copy( $tmp_name, $path . $v['file'] ))
	        	return false;
	    }else{
			return false;
		}
        $full_path = $path . $v['file'];
		return $v['file'];
	}

	
	/**
	 * "Очищает" значение входящей переменной от того чего там быть не должно
	 * @param string $val Значение
	 * @return string Очищенное значение
	 */
    public static function parseCleanValue( $val ){
    	if( $val == "" ) {
    		return "";
    	}
    	$val = str_replace( "&#032;"		, " "			  , $val );
    	$val = str_replace( "&#8238;"		, ''			  , $val );
    	$val = str_replace( "&"				, "&amp;"         , $val );
    	$val = str_replace( "<!--"			, "&#60;&#33;--"  , $val );
    	$val = str_replace( "-->"			, "--&#62;"       , $val );
    	$val = preg_replace( "/<script/i"	, "&#60;script"   , $val );
    	$val = str_replace( ">"				, "&gt;"          , $val );
    	$val = str_replace( "<"				, "&lt;"          , $val );
    	$val = str_replace( '"'				, "&quot;"        , $val );
    	$val = str_replace( "\n"			, "<br />"        , $val ); 
    	$val = str_replace( "$"				, "&#036;"        , $val );
    	$val = str_replace( "\r"			, ""              , $val ); 
    	$val = str_replace( "!"				, "&#33;"         , $val );
    	$val = str_replace( "'"				, "&#39;"         , $val ); 
		if( self::$_allowUnicode ){
			$val = preg_replace("/&amp;#([0-9]+);/s", "&#\\1;", $val );
			$val = preg_replace( "/&#(\d+?)([^\d;])/i", "&#\\1;\\2", $val );
		}
    	return $val;
    }
	
	
	
	
	
}
