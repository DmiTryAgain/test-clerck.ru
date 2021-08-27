<?php

namespace common\models;

use yii\base\Model;

class GameBalance extends Model
{
    private const WEIGHT_EXCLAMATION_MARK = 2;
    private const WEIGHT_QUESTION_MARK = 3;

    public function balance(string $left = '', string $right = '')
    {
        if (!$this->checkValidData($left) || !$this->checkValidData($right)){
            return 'invalid data';
        }
        $leftWeight = $this->countSymbolsWeight($left);
        $rightWeight = $this->countSymbolsWeight($right);
        if ($leftWeight > $rightWeight){
            return 'left';
        }
        if ($rightWeight > $leftWeight){
            return 'right';
        }

        return 'balance';
    }

    protected function checkValidData($data)
    {
        return !preg_match('/[^?!]+/', $data, $matches);
    }

    protected function countSymbolsWeight($data): int
    {
        $len = strlen($data);
        $countQuestion = $len - strlen(str_replace('?', '', $data));
        $countExclamation = $len - strlen(str_replace('!', '', $data));

        return $countQuestion * self::WEIGHT_QUESTION_MARK + $countExclamation * self::WEIGHT_EXCLAMATION_MARK;
    }
}