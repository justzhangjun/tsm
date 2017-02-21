<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'User_ID')->textInput() ?>

    <?= $form->field($model, 'Employee_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Employee_Type')->textInput() ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Total_Experience')->textInput() ?>

    <?= $form->field($model, 'Last_Company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Create_Date')->textInput() ?>

    <?= $form->field($model, 'Created_By')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Update_Date')->textInput() ?>

    <?= $form->field($model, 'Updated_By')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
