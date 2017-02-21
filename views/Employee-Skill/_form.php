<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeSkill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-skill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Employee_ID')->textInput() ?>

    <?= $form->field($model, 'Skill_Type_ID')->textInput() ?>

    <?= $form->field($model, 'Skill_ID')->textInput() ?>

    <?= $form->field($model, 'Experience')->textInput() ?>

    <?= $form->field($model, 'Level')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Create_Date')->textInput() ?>

    <?= $form->field($model, 'Created_By')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Update_Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
