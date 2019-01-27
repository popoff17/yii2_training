<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%gallery}}".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $image
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gallery}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title'], 'required'],
            [['alias', 'title', 'image', 'date'], 'string', 'max' => 255],
			[['image'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Псевдоним',
            'title' => 'Название альбома',
            'image' => 'Обложка альбома',
            'date' => 'Дата альбома',
        ];
    }
}
