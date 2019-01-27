<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mailforms_fields}}".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $placeholder
 * @property string $value
 */
class MailformsFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mailforms_fields}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'placeholder', 'value'], 'required'],
            [['type', 'name', 'placeholder', 'value'], 'string', 'max' => 255],
            /* [['type'], 'unique'], */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип поля',
            'name' => 'Имя поля',
            'placeholder' => 'Плейсхолдер',
            'value' => 'Значение',
        ];
    }
}
