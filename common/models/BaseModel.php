<?php

namespace common\models;

use common\models\Interfaces\ActiveRecordRelationInterface;
use yii\db\ActiveRecord;

abstract class BaseModel extends ActiveRecord implements ActiveRecordRelationInterface
{
    public function updatableAttributes(): array
    {
        return array_diff($this->attributes(), array_keys($this->getPrimaryKey(true)));
    }
}