<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\data\Employee;

/* @var $this yii\web\View */
/* @var $searchModel common\models\data\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Employee');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create Employee'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '<div class="table-box" style="overflow-x: auto;margin-bottom: -5px;">{items}</div><div class="row"><div class="col-sm-6">{summary}</div><div class="col-sm-6">{pager}</div></div>',
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => Yii::t('backend', 'Serial'),
                'contentOptions' => ['class' => 'text-center'],
            ],
            //'id',
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($model){
                    return Html::a($model->name, ['view', 'id' => $model->id]);
                },
            ],
            'age',
            [
                'attribute' => 'sex',
                'filter' => Employee::getSexList(),
                'filterInputOptions' => ['class' => 'form-control', 'id' => null, 'prompt'=>Yii::t('backend', 'All')],
                'value' => function($model){
                    return $model->getSex();
                }
            ],
            'identify_num',
            // 'address',
            // 'status',
            // 'check_in_time:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
