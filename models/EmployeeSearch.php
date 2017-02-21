<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `app\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'User_ID', 'Employee_Type', 'Total_Experience'], 'integer'],
            [['Employee_Name', 'Title', 'Department', 'Last_Company', 'Status', 'Create_Date', 'Created_By', 'Update_Date', 'Updated_By'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Employee::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'User_ID' => $this->User_ID,
            'Employee_Type' => $this->Employee_Type,
            'Total_Experience' => $this->Total_Experience,
            'Create_Date' => $this->Create_Date,
            'Update_Date' => $this->Update_Date,
        ]);

        $query->andFilterWhere(['like', 'Employee_Name', $this->Employee_Name])
            ->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Department', $this->Department])
            ->andFilterWhere(['like', 'Last_Company', $this->Last_Company])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Created_By', $this->Created_By])
            ->andFilterWhere(['like', 'Updated_By', $this->Updated_By]);

        return $dataProvider;
    }
}
