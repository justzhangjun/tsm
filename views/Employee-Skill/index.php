<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSkillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Employee Skills');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-skill-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Employee Skill'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'employee.Employee_Name',
            ['label'=>'Employee Name', 'attribute' => 'employee_name',  'value' => 'employee.Employee_Name' ],
            //'skillType.Skill_Type_Name',
            ['label'=>'Skill Type Name', 'attribute' => 'skill_type_name',  'value' => 'skillType.Skill_Type_Name' ],
            ['label'=>'Skill Name', 'attribute' => 'skill_name',  'value' => 'skill.Skill_Name' ],
            //'skill.Skill_Name',            
            ['label'=>'Level Name', 'attribute' => 'level_name',  'value' => 'level.Lookup_Value' ],
            'Experience',
            //'level.Lookup_Value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
