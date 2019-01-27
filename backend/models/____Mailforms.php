<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mailforms}}".
 *
 * @property integer $id
 * @property string $key
 * @property string $title
 * @property string $email
 * @property string $phones
 * @property string $request_text_ok
 * @property string $request_text_error
 * @property string $template
 * @property string $form_fields
 */
class Mailforms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mailforms}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'title', 'email', 'phones', 'request_text_ok', 'request_text_error', 'template'], 'required'],
            [['template'], 'string'],
            [['key', 'title', 'email', 'phones', 'request_text_ok', 'request_text_error'], 'string', 'max' => 255],
            [['key'], 'unique'],
            [['form_fields'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Ключ (псевдоним) формы',
            'title' => 'Название формы',
            'email' => 'E-mail адреса получателей',
            'phones' => 'Телефоны для смс-уведомлений',
            'request_text_ok' => 'Текст ответа при успешной отправке',
            'request_text_error' => 'Текст ответа при ошибке',
            'template' => 'Шаблон письма',
            'form_fields' => 'Поля формы',
        ];
    }
	
    public function beforeSave()
    {
        if (parent::beforeSave($insert))
        {
//			$this->form_fields = implode(",",$this->form_fields);
        }
        return false;
    }
	
	
}
