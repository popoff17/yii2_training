<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $active
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
	public $password_confirm; //поле подтверждения пароля
	public $role; //поле роли пользователя
	public $action; //что мы делаем?
					//	create - создаем пользователя
					//	update - обновляем информацию
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'name', 'auth_key', 'password_hash', 'password_confirm', 'email', 'created_at', 'updated_at', 'role'], 'required'],
            [['status', 'active', 'created_at'], 'integer'],
            [['username', 'name', 'password_hash', 'password_confirm', 'email'], 'string', 'max' => 255],
            [['username'], 'unique', 'message' => 'Имя пользователя занято'],
            [['email'], 'unique', 'message' => 'E-mail занят'],
            [['password_reset_token'], 'unique'],
			['password_hash', 'compare', 'compareAttribute' => 'password_confirm', 'operator' => '==', 'message' => 'Пароли должны совпадать'],
            [['action'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин пользователя',
            'name' => 'Имя пользователя',
            'auth_key' => 'Ключ авторизации',
            'password_hash' => 'Пароль',
            'password_confirm' => 'Повтор пароля',
            'password_reset_token' => 'Токен сброса пароля',
            'email' => 'E-mail пользователя',
            'status' => 'Статус',
            'active' => 'Акстивность',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
            'role' => 'Роль пользователя',
            'action' => 'Действие',
        ];
    }
	
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
        {
			switch($this->action){
				case "create":
					if($this->password_hash)
					{
						$this->password_hash = Yii::$app->getSecurity()->generatePasswordHash( $this->password_hash );
						$this->password_confirm = NULL;
						return true;
					}
					break;
				case "update":
					return true;
					break;
				case "updatePass":
					if($this->password_hash)
					{
						$this->password_hash = Yii::$app->getSecurity()->generatePasswordHash( $this->password_hash );
						$this->password_confirm = NULL;
						return true;
					}
					return true;
					break;
				default:
					return true;
					break;
			}
        }
        return false;
    }
	
    public function afterSave($insert, $changedAttributes)
    {
		switch($this->action){
			case "create":
				$auth = Yii::$app->authManager;
				$auth->revokeAll($this->primaryKey); //на всякий случай удаляем права у пользователя. да, юзер только что создан, но на всякий
				Yii::$app->authManager->assign( Yii::$app->authManager->getRole($this->role), $this->primaryKey); // Назначаем новое право
				break;
			case "update":
				$auth = Yii::$app->authManager;
				$auth->revokeAll($this->primaryKey); //на всякий случай удаляем права у пользователя. да, юзер только что создан, но на всякий
				Yii::$app->authManager->assign( Yii::$app->authManager->getRole($this->role), $this->primaryKey); // Назначаем новое право
				break;
			case "updatePass":
				break;
			default:
				break;
		}
		return true;
    }
	
	public function deleteAssignment($id)
	{
		$auth = Yii::$app->authManager;
		$auth->revokeAll($id);
		return true;
	}
	
}