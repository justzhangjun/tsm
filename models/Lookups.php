<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookups".
 *
 * @property integer $ID
 * @property string $Lookup_Type
 * @property string $Lookup_Value
 * @property integer $Status
 * @property string $Create_Date
 * @property integer $Created_By
 * @property string $Update_Date
 * @property integer $Updated_By
 *
 * @property Employee[] $employees
 * @property EmployeeSkill[] $employeeSkills
 * @property EmployeeSkill[] $employeeSkills0
 * @property Skill[] $skills
 * @property SkillType[] $skillTypes
 * @property User[] $users
 */
class Lookups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Status', 'Created_By', 'Updated_By'], 'integer'],
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Lookup_Type', 'Lookup_Value'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Lookup_Type' => 'Lookup  Type',
            'Lookup_Value' => 'Lookup  Value',
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
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['Status' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeSkills()
    {
        return $this->hasMany(EmployeeSkill::className(), ['Level' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeSkills0()
    {
        return $this->hasMany(EmployeeSkill::className(), ['Status' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skill::className(), ['Status' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillTypes()
    {
        return $this->hasMany(SkillType::className(), ['Status' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['Status' => 'ID']);
    }
}
