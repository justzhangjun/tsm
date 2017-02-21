<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SkillTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Skill Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Skill Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Skill_Type_Name',
            'Description',
            'Status',
            'Create_Date',
            // 'Created_By',
            // 'Update_Date',
            // 'Updated_By',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
