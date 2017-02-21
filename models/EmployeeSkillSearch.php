<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmployeeSkill;

/**
 * EmployeeSkillSearch represents the model behind the search form about `app\models\EmployeeSkill`.
 */
class EmployeeSkillSearch extends EmployeeSkill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Employee_ID', 'Skill_Type_ID', 'Skill_ID', 'Experience', 'Level'], 'integer'],
            [['Status', 'Create_Date', 'Created_By', 'Update_Date'], 'safe'],
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
        $query = EmployeeSkill::find();

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
            'Employee_ID' => $this->Employee_ID,
            'Skill_Type_ID' => $this->Skill_Type_ID,
            'Skill_ID' => $this->Skill_ID,
            'Experience' => $this->Experience,
            'Level' => $this->Level,
            'Create_Date' => $this->Create_Date,
            'Update_Date' => $this->Update_Date,
        ]);

        $query->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Created_By', $this->Created_By]);

        return $dataProvider;
    }
}
