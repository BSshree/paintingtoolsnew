<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $faq_id
 * @property string $question
 * @property string $answer
 * @property int $created_at
 * @property int $updated_at
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $phone;
    
    
    
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question','answer'], 'required'],
            [['question', 'answer'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'faq_id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
