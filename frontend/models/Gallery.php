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
 *
 * @property GalleryItems[] $galleryItems
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
            [['alias', 'title', 'image'], 'required'],
            [['alias', 'title', 'image'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryItems()
    {
        return $this->hasMany(GalleryItems::className(), ['gallery_id' => 'id']);
    }
}
