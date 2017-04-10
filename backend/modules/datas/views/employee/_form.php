<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\data\Employee;

/* @var $this yii\web\View */
/* @var $model common\models\data\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<p>
    <?= Html::a('<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> '.Yii::t('backend', 'Cancel'), ['index'], ['class' => 'btn btn-default btn-rounded return']) ?>
</p>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'sex')->dropDownList(Employee::getSexList()) ?>

    <?= $form->field($model, 'identify_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
