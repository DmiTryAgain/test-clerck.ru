<?php

namespace common\models;

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
 *
 * @property PhoneNumber[] $phoneNumbers
 */
class Peoples extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
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