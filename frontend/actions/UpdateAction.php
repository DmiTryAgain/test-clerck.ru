<?php

namespace frontend\actions;

use common\models\BaseModel;
use Yii;
use yii\base\Model;
use yii\rest\Action;
use yii\web\HttpException;
use yii\web\ServerErrorHttpException;


class UpdateAction extends Action
{
    public $scenario = Model::SCENARIO_DEFAULT;

    /**
     * @param $id
     * @return BaseModel
     * @throws ServerErrorHttpException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException
     * @throws HttpException
     */
    public function run($id)
    {
        /* @var $model BaseModel */
        $model = $this->findModel($id);

        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }

        $model->scenario = $this->scenario;
        $this->validateRequestAttrs($model, Yii::$app->getRequest()->getBodyParams());

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        return $model;
    }

    protected function validateRequestAttrs(BaseModel $model, $params): void
    {
        $attrs = array_keys($params);
        $modelAttrs = $model->updatableAttributes();

        if (Yii::$app->getRequest()->isPut) {
            $noUseAttrs = array_diff($modelAttrs, $attrs);
            if (count($noUseAttrs)) {
                throw new HttpException(400, 'Переданы не все параметры.');
            }
        }
    }
}
