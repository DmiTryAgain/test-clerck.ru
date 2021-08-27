<?php

namespace common\models;

use DateTime;
use Yii;

/**
 * This is the model class for table "peoples".
 *
 * @property int $id
 * @property string $last_name Фамилия
 * @property string $first_name Имя
 * @property string|null $middle_name Отчество
 * @property string|null $description Описание контакта
 * @property string|null $created_at Дата создания
 * @property string|null $updated_at Дата обновления
 * @property string|null $fullName Полное имя
 *
 * @property PhoneNumber[] $phoneNumbers
 */
class Peoples extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peoples';
    }

    public static function relationName(): string
    {
        return 'peoples';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['last_name', 'first_name'], 'required'],
            [['last_name', 'first_name', 'middle_name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'description' => 'Описание контакта',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    public function updateAttributes($attributes)
    {
        return [
            'last_name',
            'first_name',
            'middle_name',
            'description',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'last_name',
            'first_name',
            'middle_name',
            'description',
            'created_at',
            'updated_at',
            'phoneNumbers'
        ];
    }

    public function beforeSave($insert)
    {
        $this->updated_at = (new DateTime())->format('Y-m-d H:i:s');
        return parent::beforeSave($insert);
    }

    /**
     * Gets query for [[PhoneNumbers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class, ['people_id' => 'id']);
    }
}
