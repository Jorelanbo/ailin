<?php

namespace common\models\data;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $name
 * @property integer $age
 * @property integer $sex
 * @property string $identify_num
 * @property string $address
 * @property integer $status
 * @property integer $check_in_time
 * @property integer $updated_at
 */
class Employee extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'timemap' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'check_in_time',
                'updatedAtAttribute' => 'updated_at',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'age', 'sex', 'identify_num', 'address', 'status'], 'required'],
            [['age', 'sex', 'status', 'check_in_time', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['identify_num'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'age' => Yii::t('backend', 'Age'),
            'sex' => Yii::t('backend', 'Sex'),
            'identify_num' => Yii::t('backend', 'Identify Num'),
            'address' => Yii::t('backend', 'Address'),
            'status' => Yii::t('backend', 'Status'),
            'check_in_time' => Yii::t('backend', 'Check In Time'),
            'updated_at' => Yii::t('backend', 'Updated At'),
        ];
    }

    /**
     * @return string
     */
    public function getSex()
    {
        switch ($this->sex){
            case 1:
                return Yii::t('backend', 'Man');
            case 2:
                return Yii::t('backend', 'Woman');
            default:
                return Yii::t('backend', 'Else');
        }
    }

    /**
     * @return array
     */
    public static function getSexList()
    {
        return [
            1 => '男',
            2 => '女',
            3 => '其他',
        ];
    }

    /**
     * @inheritdoc
     * @return EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeQuery(get_called_class());
    }
}
