<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Все автомобили', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить машину?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'model',
            [
                'attribute'=>'color',
                'value' => $model->getColors()[$model->color],
            ],

            [
                'attribute' => 'users',
                'format' => 'raw',
                'value' => function ($model) {
                    $list = [];
                    /** @var $model \app\models\Cars */
                    foreach($model->users as $user)
                    {
                        /** @var $user \app\models\Users */
                        $list[] = Html::tag('li', Html::a($user->name.' '.$user->surname,
                            ['/users/view', 'id' => $user->id]));
                    }
                    return Html::tag('ul', implode('', $list));
                },
            ],
        ],

    ]) ?>

</div>
