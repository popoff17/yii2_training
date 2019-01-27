<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%gallery_items}}".
 *
 * @property integer $id
 * @property integer $gallery_id
 * @property string $thumb_image
 * @property string $image
 *
 * @property Gallery $gallery
 */
class GalleryItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gallery_items}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id', 'thumb_image', 'image'], 'required'],
            [['gallery_id'], 'integer'],
            [['thumb_image', 'image'], 'string', 'max' => 255],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_id' => 'ИД галереи',
            'thumb_image' => 'Уменьшенное изображение',
            'image' => 'Оригинальное изображение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }
}
