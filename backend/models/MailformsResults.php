<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mailforms_results}}".
 *
 * @property integer $id
 * @property integer $form_id
 * @property integer $time
 * @property integer $user
 *
 * @property Mailforms $form
 * @property MailformsResultsValues[] $mailformsResultsValues
 */
class MailformsResults extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mailforms_results}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['form_id', 'time'], 'required'],
            [['form_id', 'time', 'user'], 'integer'],
            [['form_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mailforms::className(), 'targetAttribute' => ['form_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'form_id' => 'ИД формы',
            'time' => 'Дата и время записи',
            'user' => 'Пользователь',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm()
    {
        return $this->hasOne(Mailforms::className(), ['id' => 'form_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailformsResultsValues()
    {
        return $this->hasMany(MailformsResultsValues::className(), ['result_id' => 'id']);
    }
}
