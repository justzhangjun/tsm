<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skll_type_distribution_v".
 *
 * @property integer $Skill_Type_ID
 * @property string $Skill_Type_Name
 * @property string $Experience
 */
class SkllTypeDistributionV extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skll_type_distribution_v';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Skill_Type_ID'], 'required'],
            [['Skill_Type_ID'], 'integer'],
            [['Experience'], 'number'],
            [['Skill_Type_Name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Skill_Type_ID' => 'Skill  Type  ID',
            'Skill_Type_Name' => 'Skill  Type  Name',
            'Experience' => 'Experience',
        ];
    }
}
