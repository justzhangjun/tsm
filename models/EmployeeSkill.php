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
 * @property integer $Status
 * @property string $Create_Date
 * @property integer $Created_By
 * @property string $Update_Date
 * @property integer $Updated_By
 *
 * @property Employee $employee
 * @property Lookups $level
 * @property SkillType $skillType
 * @property Skill $skill
 * @property Lookups $status
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
            [['Employee_ID', 'Skill_Type_ID', 'Skill_ID', 'Experience', 'Level', 'Status', 'Created_By', 'Updated_By'], 'integer'],
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Employee_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['Employee_ID' => 'ID']],
            [['Level'], 'exist', 'skipOnError' => true, 'targetClass' => Lookups::className(), 'targetAttribute' => ['Level' => 'ID']],
            [['Skill_Type_ID'], 'exist', 'skipOnError' => true, 'targetClass' => SkillType::className(), 'targetAttribute' => ['Skill_Type_ID' => 'ID']],
            [['Skill_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Skill::className(), 'targetAttribute' => ['Skill_ID' => 'ID']],
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
            'Employee_ID' => 'Employee  ID',
            'Skill_Type_ID' => 'Skill  Type  ID',
            'Skill_ID' => 'Skill  ID',
            'Experience' => 'Experience',
            'Level' => 'Level',
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
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['ID' => 'Employee_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Lookups::className(), ['ID' => 'Level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillType()
    {
        return $this->hasOne(SkillType::className(), ['ID' => 'Skill_Type_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkill()
    {
        return $this->hasOne(Skill::className(), ['ID' => 'Skill_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Lookups::className(), ['ID' => 'Status']);
    }
}
