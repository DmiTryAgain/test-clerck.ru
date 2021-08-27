<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phone_numbers".
 *
 * @property int $id
 * @property string $number Номер телефона
 * @property int $category Категория
 * @property string|null $description Комментарий к номеру телефона
 * @property int|null $people_id id человека
 * @property string|null $created_at Дата создания
 * @property string|null $updated_at Дата обновления
 *
 * @property Peoples $people
 */
class PhoneNumber extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phone_numbers';
    }

    public static function relationName(): string
    {
        return 'phoneNumbers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'people_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['number', 'description'], 'string', 'max' => 255],
            [['number'], 'getFormatPhone'],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => Peoples::class, 'targetAttribute' => ['people_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер телефона',
            'category' => 'Категория',
            'description' => 'Комментарий к номеру телефона',
            'people_id' => 'id человека',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }

    public function updateAttributes($attributes)
    {
        return [
            'number',
            'category',
            'description',
            'people_id',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeoples()
    {
        return $this->hasOne(Peoples::class, ['id' => 'people_id']);
    }

    public function getFormatPhone($attribute) {
        $phone = $this->{$attribute};
        preg_match(
            '/\+?(\d{1,4})\s*\(?(\d{3,5})\)?\s*(\d{3})[\s-]?(\d{2})[\s-]?(\d{2})/',
            $phone,
            $matches
        );
        if (count($matches) !== 6) {
            $this->addError($attribute, 'Некорректный формат телефона');
            return;
        }
        array_shift($matches);

        $phone = sprintf('+%s(%s)%s-%s-%s', ...$matches);

        $this->{$attribute} = $phone;
    }
}
