<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mailforms_results_values}}".
 *
 * @property integer $id
 * @property integer $result_id
 * @property string $field_name
 * @property string $field_value
 *
 * @property MailformsFields $fieldName
 * @property MailformsResults $result
 */
class MailformsResultsValues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mailforms_results_values}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['result_id', 'field_name', 'field_value'], 'required'],
            [['result_id'], 'integer'],
            [['field_value'], 'string'],
            [['field_name'], 'string', 'max' => 255],
            //[['field_name'], 'exist', 'skipOnError' => true, 'targetClass' => MailformsFields::className(), 'targetAttribute' => ['field_name' => 'name']],
            //[['result_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailformsResults::className(), 'targetAttribute' => ['result_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'result_id' => 'ИД результата',
            'field_name' => 'Имя поля',
            'field_value' => 'Значение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldName()
    {
        return $this->hasOne(MailformsFields::className(), ['name' => 'field_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResult()
    {
        return $this->hasOne(MailformsResults::className(), ['id' => 'result_id']);
    }
}
