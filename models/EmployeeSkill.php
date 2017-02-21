<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee_skill".
 *
 * @property integer $ID
 * @property integer $Employee_ID
 * @property integer $Skill_Type_ID
 * @property integer $Skill_ID
 * @property integer $Experience
 * @property integer $Level
 * @property string $Status
 * @property string $Create_Date
 * @property string $Created_By
 * @property string $Update_Date
 */
class EmployeeSkill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Employee_ID', 'Skill_Type_ID', 'Skill_ID', 'Experience', 'Level'], 'required'],
            [['Employee_ID', 'Skill_Type_ID', 'Skill_ID', 'Experience', 'Level'], 'integer'],
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Status'], 'string', 'max' => 10],
            [['Created_By'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Employee_ID' => 'Employee  ID',
            'Skill_Type_ID' => 'Skill  Type  ID',
            'Skill_ID' => 'Skill  ID',
            'Experience' => 'Experience',
            'Level' => 'Level',
            'Status' => 'Status',
            'Create_Date' => 'Create  Date',
            'Created_By' => 'Created  By',
            'Update_Date' => 'Update  Date',
        ];
    }
}
