<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill".
 *
 * @property integer $ID
 * @property string $Skill_Name
 * @property integer $Skill_Type_ID
 * @property string $Description
 * @property integer $Status
 * @property string $Create_Date
 * @property integer $Created_By
 * @property string $Update_Date
 * @property integer $Updated_By
 *
 * @property EmployeeSkill[] $employeeSkills
 * @property Lookups $status
 * @property SkillType $skillType
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Skill_Name', 'Skill_Type_ID', 'Description'], 'required'],
            [['Skill_Type_ID', 'Status', 'Created_By', 'Updated_By'], 'integer'],
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Skill_Name'], 'string', 'max' => 50],
            [['Description'], 'string', 'max' => 500],
            [['Status'], 'exist', 'skipOnError' => true, 'targetClass' => Lookups::className(), 'targetAttribute' => ['Status' => 'ID']],
            [['Skill_Type_ID'], 'exist', 'skipOnError' => true, 'targetClass' => SkillType::className(), 'targetAttribute' => ['Skill_Type_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Skill_Name' => 'Skill  Name',
            'Skill_Type_ID' => 'Skill  Type  ID',
            'Description' => 'Description',
            'Status' => 'Status',
            'Create_Date' => 'Create  Date',
            'Created_By' => 'Created  By',
            'Update_Date' => 'Update  Date',
            'Updated_By' => 'Updated  By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeSkills()
    {
        return $this->hasMany(EmployeeSkill::className(), ['Skill_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Lookups::className(), ['ID' => 'Status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillType()
    {
        return $this->hasOne(SkillType::className(), ['ID' => 'Skill_Type_ID']);
    }
}
