<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SkillType;

/**
 * SkillTypeSearch represents the model behind the search form about `app\models\SkillType`.
 */
class SkillTypeSearch extends SkillType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Status', 'Created_By', 'Updated_By'], 'integer'],
            [['Skill_Type_Name', 'Description', 'Create_Date', 'Update_Date'], 'safe'],
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
        $query = SkillType::find();

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
            'Status' => $this->Status,
            'Create_Date' => $this->Create_Date,
            'Created_By' => $this->Created_By,
            'Update_Date' => $this->Update_Date,
            'Updated_By' => $this->Updated_By,
        ]);

        $query->andFilterWhere(['like', 'Skill_Type_Name', $this->Skill_Type_Name])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
}
