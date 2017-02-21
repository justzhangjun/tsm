<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'User_ID') ?>

    <?= $form->field($model, 'Employee_Name') ?>

    <?= $form->field($model, 'Employee_Type') ?>

    <?= $form->field($model, 'Title') ?>

    <?php // echo $form->field($model, 'Department') ?>

    <?php // echo $form->field($model, 'Total_Experience') ?>

    <?php // echo $form->field($model, 'Last_Company') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Create_Date') ?>

    <?php // echo $form->field($model, 'Created_By') ?>

    <?php // echo $form->field($model, 'Update_Date') ?>

    <?php // echo $form->field($model, 'Updated_By') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
