<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Peoples */

$this->title = 'Create Peoples';
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peoples-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
