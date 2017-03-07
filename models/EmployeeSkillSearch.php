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
    public $skill_type_name;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Employee_ID', 'Skill_Type_ID', 'Skill_ID', 'Experience', 'Level', 'Status', 'Created_By', 'Updated_By'], 'integer'],
            [['skill_type_name','Create_Date', 'Update_Date'], 'safe'],
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
        $query->joinWith(['skillType']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
            'attributes'=>[
                'skill_type_name'=>[
                    'asc'=>['skill_type.Skill_Type_Name'=>SORT_ASC],
                    'desc'=>['skill_type.Skill_Type_Name'=>SORT_DESC],
                    'label'=>'skill_type.Skill_Type_Name'
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
            'ID' => $this->ID,
            'Employee_ID' => $this->Employee_ID,
            'Skill_Type_ID' => $this->Skill_Type_ID,
            'Skill_ID' => $this->Skill_ID,
            'Experience' => $this->Experience,
            'Level' => $this->Level,
            'Status' => $this->Status,
            'Create_Date' => $this->Create_Date,
            'Created_By' => $this->Created_By,
            'Update_Date' => $this->Update_Date,
            'Updated_By' => $this->Updated_By,
        ]);*/
        
        $query->andFilterWhere(['like', 'skill_type.Skill_Type_Name', $this->skill_type_name]);

        return $dataProvider;
    }
}
