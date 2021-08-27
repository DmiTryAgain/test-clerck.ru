<?php

namespace console\controllers;

use common\models\GameBalance;
use yii\console\Controller;

class GameController extends Controller
{
    public function actionIndex(string $left = '', string $right = '')
    {
        $this->stdout((new GameBalance)->balance($left, $right) . PHP_EOL);
    }
}