<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lookups */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Lookups',
]) . $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lookups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lookups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
