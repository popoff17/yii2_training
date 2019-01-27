<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%sitemap}}".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $template
 * @property integer $ord
 */
class Sitemap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sitemap}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'template', 'ord'], 'required'],
            [['template'], 'string'],
            [['ord'], 'integer'],
            [['alias', 'title'], 'string', 'max' => 255],
            [['alias'], 'unique'],
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
            'title' => 'Заголовок страницы',
            'template' => 'Шаблон',
            'ord' => 'Порядок',
        ];
    }
}
