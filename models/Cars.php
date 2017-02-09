<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property integer $id
 * @property string $model
 * @property integer $color
 *
 * @property CarUser[] $carUsers
 * @property Users[] $users
 *
 */
class Cars extends \yii\db\ActiveRecord
{
    const COLOR_RED     = 1;
    const COLOR_BLUE    = 2;
    const COLOR_BLACK   = 3;
    const COLOR_YELLOW  = 4;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'color', 'users'], 'required'],
            [['color'], 'integer'],
            [['model'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'model' => 'Модель',
            'color' => 'Цвет',
            'users' => 'Водители',
        ];
    }

    public function getColors()
    {
        return [
            self::COLOR_RED     =>'Красный',
            self::COLOR_BLUE    =>'Голубой',
            self::COLOR_BLACK   =>'Черный',
            self::COLOR_YELLOW  =>'Желтый',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarUsers()
    {
        return $this->hasMany(CarUser::className(), ['car_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['id'=>'user_id'])
            ->viaTable('car_user', ['car_id'=>'id']);
    }

    public function setUsers($ids)
    {
        foreach($ids as $user_id)
        {
            $car_user = new CarUser([
                'car_id' =>$this->id,
                'user_id' =>$user_id
            ]);
            $car_user->save();
        }
    }
}
