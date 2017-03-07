<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill_type_distribution_v".
 *
 * @property integer $Skill_Type_ID
 * @property string $Skill_Type_Name
 * @property string $Experience
 */
class SkillTypeDistributionV extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill_type_distribution_v';
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
