<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\helpers\Json;

$this->title = 'sss';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-skill-percent-report">    
<?php
    //$employeeskills = Json::encode($employeeskills);
    //echo $arr_employeeskills;
    foreach($employeeskills as $es)
    {
        $arr_employeeskills[] = array($es["Skill_Type_Name"],intval($es["Experience"]));
    }
    //$arr_employeeskills = json_encode($arr); 
    echo Highcharts::widget([
        'options' => [
            'title' => [
                'text' => 'Skill Type Distribution',
            ],
            'credits' => [
                'enabled' => false
            ],
            'tooltip'=>[
                'pointFormat'=>'{series.name}: <b>{point.percentage:.1f}%</b>'
            ],
            'plotOptions' => [
                'pie' => [
                    'allowPointSelect'=> true,
                    'cursor'=> 'pointer',
                    'dataLabels'=> [
                    'enabled'=> true,
                    'color'=> '#000000',
                    'connectorColor'=> '#000000',
                    'format'=> '<b>{point.name}</b>: {point.percentage:.1f} %'
                    ]
                ]
            ],
            'series' => [
                [
                    'type' => 'pie',
                    'name' => 'Skill Type',
                    'data' => $arr_employeeskills,
                ],
            ],
        ]
    ]);
?>
</div>
