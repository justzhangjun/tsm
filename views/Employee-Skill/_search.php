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

    <?= $form->field($model, 'skill_type_name') ?>

    <?= $form->field($model, 'Skill_ID') ?>

    <?= $form->field($model, 'Experience') ?>

    <?= $form->field($model, 'Level') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
