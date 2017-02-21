<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'User_ID',
            'Employee_Name',
            'Employee_Type',
            'Title',
            // 'Department',
            // 'Total_Experience',
            // 'Last_Company',
            // 'Status',
            // 'Create_Date',
            // 'Created_By',
            // 'Update_Date',
            // 'Updated_By',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
