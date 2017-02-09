<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Водители';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать водителя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?> <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'name',
            'surname',

            [
                'attribute' => 'cars',
                'format' => 'raw',
                'value' => function ($model) {
                    $list = [];
                    /** @var $model \app\models\Users */
                    foreach($model->cars as $car)
                    {
                        /** @var $car \app\models\Cars */
                        Yii::info($model->cars);

                        $list[] = Html::tag('li', Html::a($car->model.' '.$car->id,
                            ['/cars/view', 'id' => $car->id]));
                    }
                    return Html::tag('ul', implode('', $list));
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
