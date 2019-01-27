<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%settings_seo}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $value
 */
class SettingsSeo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settings_seo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias', 'value'], 'required'],
            [['value'], 'string'],
            [['title', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название настройки',
            'alias' => 'алиас',
            'value' => 'Значение',
        ];
    }
}
