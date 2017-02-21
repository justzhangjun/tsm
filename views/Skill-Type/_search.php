<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SkillTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skill-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Skill_Type_Name') ?>

    <?= $form->field($model, 'Description') ?>

    <?= $form->field($model, 'Status') ?>

    <?= $form->field($model, 'Create_Date') ?>

    <?php // echo $form->field($model, 'Created_By') ?>

    <?php // echo $form->field($model, 'Update_Date') ?>

    <?php // echo $form->field($model, 'Updated_By') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
