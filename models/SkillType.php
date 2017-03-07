<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill_type".
 *
 * @property integer $ID
 * @property string $Skill_Type_Name
 * @property string $Description
 * @property integer $Status
 * @property string $Create_Date
 * @property integer $Created_By
 * @property string $Update_Date
 * @property integer $Updated_By
 *
 * @property EmployeeSkill[] $employeeSkills
 * @property Skill[] $skills
 * @property Lookups $status
 */
class SkillType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Skill_Type_Name', 'Description'], 'required'],
            [['Status', 'Created_By', 'Updated_By'], 'integer'],
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Skill_Type_Name'], 'string', 'max' => 50],
            [['Description'], 'string', 'max' => 500],
            [['Status'], 'exist', 'skipOnError' => true, 'targetClass' => Lookups::className(), 'targetAttribute' => ['Status' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Skill_Type_Name' => 'Skill  Type  Name',
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
        return $this->hasMany(EmployeeSkill::className(), ['Skill_Type_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skill::className(), ['Skill_Type_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Lookups::className(), ['ID' => 'Status']);
    }
}
