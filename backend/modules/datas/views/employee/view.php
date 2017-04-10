<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\data\Employee */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Employee'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> '.Yii::t('backend', 'Return'), ['index'], ['class' => 'btn btn-success btn-rounded return']) ?>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'age',
            [
                'attribute' => 'sex',
                'value' => $model->getSex(),
            ],
            'identify_num',
            'address',
            'status',
            [
                'attribute' => 'check_in_time',
                'value' => Yii::$app->formatter->asDatetime($model->check_in_time, 'yyyy-MM-dd HH:mm:ss'),
            ],
            [
                'attribute' => 'updated_at',
                'value' => Yii::$app->formatter->asDatetime($model->updated_at, 'yyyy-MM-dd HH:mm:ss'),
            ]
        ],
    ]) ?>

</div>
