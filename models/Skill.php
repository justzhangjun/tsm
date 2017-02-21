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
 * @property string $Status
 * @property string $Create_Date
 * @property string $Created_By
 * @property string $Update_Date
 * @property string $Updated_By
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
            [['Skill_Type_ID'], 'integer'],
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Skill_Name', 'Created_By', 'Updated_By'], 'string', 'max' => 50],
            [['Description'], 'string', 'max' => 500],
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
}
