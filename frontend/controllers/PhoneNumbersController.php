<?php

namespace frontend\controllers;

use common\models\Peoples;
use common\models\PhoneNumber;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\rest\IndexAction;

/**
 * PeoplesController implements the CRUD actions for Peoples model.
 */
class PhoneNumbersController extends ActiveController
{

    public $modelClass = PhoneNumber::class;

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors()
        );
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'prepareDataProvider' => function(IndexAction $action, $filter) {
                return new ActiveDataProvider([
                    'query' => PhoneNumber::find()->joinWith(Peoples::relationName()),
                    'pagination' => [
                        'pageSize' => 10
                    ],
                    'sort' => [
                        'attributes' => [
                            'number' => [
                                'asc' => ['number' => SORT_ASC],
                                'desc' => ['number' => SORT_DESC],
                                'default' => SORT_ASC
                            ],
                        ],
                    ],
                ]);
            },
        ];
        return $actions;
    }
}
