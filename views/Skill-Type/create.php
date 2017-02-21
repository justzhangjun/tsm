<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SkillType */

$this->title = 'Create Skill Type';
$this->params['breadcrumbs'][] = ['label' => 'Skill Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
