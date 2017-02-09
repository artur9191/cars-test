<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 *
 * @property CarUser[] $carUsers
 * @property Cars[] $cars
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'cars' =>'Автомобили'
        ];
    }

    public static function getUsers()
    {
        /** @var Users[] $users */
        $users = self::find()->all();

        $list = [];
        foreach($users as $user)
        {
            $list += [$user->id => $user->name.' '.$user->surname];
        }
        return $list;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarUsers()
    {
        return $this->hasMany(CarUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return
           $this->hasMany(Cars::className(), ['cars_id'=>'id'])
           ->viaTable('car_user', ['user_id'=>'id']);
            //['id'=>1,  'model'=>'1',   'color'=>1,]

    }
}
