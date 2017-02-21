<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeSkillSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-skill-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Employee_ID') ?>

    <?= $form->field($model, 'Skill_Type_ID') ?>

    <?= $form->field($model, 'Skill_ID') ?>

    <?= $form->field($model, 'Experience') ?>

    <?php // echo $form->field($model, 'Level') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Create_Date') ?>

    <?php // echo $form->field($model, 'Created_By') ?>

    <?php // echo $form->field($model, 'Update_Date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
