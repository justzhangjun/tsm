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
 * @property string $Status
 * @property string $Create_Date
 * @property string $Created_By
 * @property string $Update_Date
 * @property string $Updated_By
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
            [['User_ID', 'Employee_Type', 'Total_Experience'], 'integer'],
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Employee_Name', 'Title', 'Last_Company', 'Created_By', 'Updated_By'], 'string', 'max' => 50],
            [['Department'], 'string', 'max' => 500],
            [['Status'], 'string', 'max' => 10],
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
}
