<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSkillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Skills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-skill-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee Skill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Employee_ID',
            'Skill_Type_ID',
            'Skill_ID',
            'Experience',
            // 'Level',
            // 'Status',
            // 'Create_Date',
            // 'Created_By',
            // 'Update_Date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
