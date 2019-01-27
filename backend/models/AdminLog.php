<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%admin_log}}".
 *
 * @property integer $id
 * @property string $action
 * @property string $user
 * @property integer $time
 */
class AdminLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['action', 'user', 'time'], 'required'],
            [['time'], 'integer'],
            [['action', 'user'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'action' => 'Действие',
            'user' => 'Пользователь',
            'time' => 'Дата и время',
        ];
    }
}
