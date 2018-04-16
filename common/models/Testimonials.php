<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "testimonials".
 *
 * @property int $test_id
 * @property string $statement
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 */
class Testimonials extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testimonials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statement'], 'required'],
            [['statement', 'name'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'test_id' => 'ID',
            'statement' => 'Text',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
