<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\data\Employee */

$this->title = Yii::t('backend', 'Update')
    . Yii::t('backend', '{modelClass}: ',
    ['modelClass' => Yii::t('backend', 'Employee'),])
    . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Employee'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
