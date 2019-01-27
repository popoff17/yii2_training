<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%events}}".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $short_text
 * @property string $text
 * @property string $date
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%events}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'short_text', 'text', 'date'], 'required'],
            [['text'], 'string'],
            [['alias', 'title'], 'string', 'max' => 255],
            [['short_text'], 'string', 'max' => 512],
            [['date'], 'string', 'max' => 50],
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
            'title' => 'Заголовок',
            'short_text' => 'Краткий текст',
            'text' => 'Полный текст',
            'date' => 'Дата',
        ];
    }
}
