<?php

namespace common\models\Interfaces;

interface ActiveRecordRelationInterface
{
    public static function relationName(): string;
}