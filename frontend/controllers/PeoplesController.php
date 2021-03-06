<?php

namespace frontend\controllers;

use common\models\Peoples;
use common\models\PhoneNumber;
use frontend\actions\UpdateAction;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\rest\IndexAction;

/**
 * PeoplesController implements the CRUD actions for Peoples model.
 */
class PeoplesController extends ActiveController
{
    public $modelClass = Peoples::class;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'prepareDataProvider' => function(IndexAction $action, $filter) {
                return new ActiveDataProvider([
                    'query' => Peoples::find()->groupBy(Peoples::tableName() . '.id')->joinWith(PhoneNumber::relationName()),
                    'pagination' => [
                        'pageSize' => 10
                    ],
                ]);
            },
        ];
        $actions['update'] = [
            'class' => UpdateAction::class,
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'scenario' => $this->updateScenario,
        ];

        return $actions;
    }
}
