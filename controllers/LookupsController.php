<?php

namespace app\controllers;

use Yii;
use app\models\Lookups;
use app\models\LookupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LookupsController implements the CRUD actions for Lookups model.
 */
class LookupsController extends Controller
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
     * Lists all Lookups models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LookupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lookups model.
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
     * Creates a new Lookups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lookups();

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
     * Updates an existing Lookups model.
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
     * Deletes an existing Lookups model.
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
     * Finds the Lookups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lookups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lookups::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
