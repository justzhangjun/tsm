<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SkillType */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Skill Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-type-view">

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
            'Skill_Type_Name',
            'Description',
            'Status',
            'Create_Date',
            'Created_By',
            'Update_Date',
            'Updated_By',
        ],
    ]) ?>

</div>
