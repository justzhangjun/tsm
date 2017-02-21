<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Skill;

/**
 * SkillSearch represents the model behind the search form about `app\models\Skill`.
 */
class SkillSearch extends Skill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Skill_Type_ID'], 'integer'],
            [['Skill_Name', 'Description', 'Status', 'Create_Date', 'Created_By', 'Update_Date', 'Updated_By'], 'safe'],
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
        $query = Skill::find();

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
            'Skill_Type_ID' => $this->Skill_Type_ID,
            'Create_Date' => $this->Create_Date,
            'Update_Date' => $this->Update_Date,
        ]);

        $query->andFilterWhere(['like', 'Skill_Name', $this->Skill_Name])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Created_By', $this->Created_By])
            ->andFilterWhere(['like', 'Updated_By', $this->Updated_By]);

        return $dataProvider;
    }
}
