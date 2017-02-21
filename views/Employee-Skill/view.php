<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeSkill */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Employee Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-skill-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Employee_ID',
            'Skill_Type_ID',
            'Skill_ID',
            'Experience',
            'Level',
            'Status',
            'Create_Date',
            'Created_By',
            'Update_Date',
        ],
    ]) ?>

</div>
