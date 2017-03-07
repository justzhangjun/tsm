<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $ID
 * @property integer $User_ID
 * @property string $Employee_Name
 * @property integer $Employee_Type
 * @property string $Title
 * @property string $Department
 * @property integer $Total_Experience
 * @property string $Last_Company
 * @property integer $Status
 * @property string $Create_Date
 * @property integer $Created_By
 * @property string $Update_Date
 * @property integer $Updated_By
 *
 * @property Lookups $status
 * @property User $user
 * @property EmployeeSkill[] $employeeSkills
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_ID', 'Employee_Name', 'Employee_Type', 'Title', 'Department', 'Total_Experience', 'Last_Company'], 'required'],
            [['User_ID', 'Employee_Type', 'Total_Experience', 'Status', 'Created_By', 'Updated_By'], 'integer'],
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Employee_Name', 'Title', 'Last_Company'], 'string', 'max' => 50],
            [['Department'], 'string', 'max' => 500],
            [['Status'], 'exist', 'skipOnError' => true, 'targetClass' => Lookups::className(), 'targetAttribute' => ['Status' => 'ID']],
            [['User_ID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['User_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'User_ID' => 'User  ID',
            'Employee_Name' => 'Employee  Name',
            'Employee_Type' => 'Employee  Type',
            'Title' => 'Title',
            'Department' => 'Department',
            'Total_Experience' => 'Total  Experience',
            'Last_Company' => 'Last  Company',
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
    public function getStatus()
    {
        return $this->hasOne(Lookups::className(), ['ID' => 'Status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['ID' => 'User_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeSkills()
    {
        return $this->hasMany(EmployeeSkill::className(), ['Employee_ID' => 'ID']);
    }
}
