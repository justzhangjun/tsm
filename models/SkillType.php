<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill_type".
 *
 * @property integer $ID
 * @property string $Skill_Type_Name
 * @property string $Description
 * @property string $Status
 * @property string $Create_Date
 * @property string $Created_By
 * @property string $Update_Date
 * @property string $Updated_By
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
            [['Create_Date', 'Update_Date'], 'safe'],
            [['Skill_Type_Name', 'Created_By', 'Updated_By'], 'string', 'max' => 50],
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
            'Skill_Type_Name' => 'Skill  Type  Name',
            'Description' => 'Description',
            'Status' => 'Status',
            'Create_Date' => 'Create  Date',
            'Created_By' => 'Created  By',
            'Update_Date' => 'Update  Date',
            'Updated_By' => 'Updated  By',
        ];
    }
}
