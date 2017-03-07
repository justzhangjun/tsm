<?php

namespace app\controllers;

use Yii;
use app\models\EmployeeSkill;
use app\models\EmployeeSkillSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\SkillTypeDistributionV;

/**
 * EmployeeSkillController implements the CRUD actions for EmployeeSkill model.
 */
class EmployeeSkillController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EmployeeSkill models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSkillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeeSkill model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EmployeeSkill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployeeSkill();

        if ($model->load(Yii::$app->request->post())) {
            $model->Status = Yii::$app->params['active'];
            $model->Create_Date = date(Yii::$app->params['time-format']);
            $model->Created_By = Yii::$app->user->identity->ID;
            $model->Update_Date = date(Yii::$app->params['time-format']);
            $model->Updated_By = Yii::$app->user->identity->ID;
        if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                return $this->render('create', [
                'model' => $model,
            ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EmployeeSkill model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->Update_Date = date(Yii::$app->params['time-format']);
            $model->Updated_By = Yii::$app->user->identity->ID;
            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->ID]);
            }
            else
            {
                return $this->render('update', [
                'model' => $model,
            ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EmployeeSkill model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 'inactive';
        $model->Update_Date = date(Yii::$app->params['time-format']);
        $model->Updated_By = Yii::$app->user->identity->ID;            
        if($model->save())
        {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the EmployeeSkill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmployeeSkill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmployeeSkill::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    public function actionPercentReport()
    {
        $employeeskills = SkillTypeDistributionV::find()->all();
        return $this->render('percent-report', [
            'employeeskills' => $employeeskills,
        ]);
    }
}
