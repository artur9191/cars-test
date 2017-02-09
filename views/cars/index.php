<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Машины';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать автомобиль', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'model',
            [
                'attribute'=>'color',
                'format'=>'raw',
                'value' => function($model)
                {
                    /** @var $model \app\models\Cars */
                    return $model->getColors()[$model->color];
                }
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
