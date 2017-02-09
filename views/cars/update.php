<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */

$this->title = 'Редактирование автомобиля: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Все автомобили', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Автомобиль '.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="cars-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
