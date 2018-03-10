<?php

use yii\db\Migration;

/**
 * Handles the creation of table `faq`.
 */
class m180207_070633_create_faq_table extends Migration
{
    /**
     * @inheritdoc
     */
     const FAQ_TABLE = '{{%faq}}';

    public function up()
    {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable(self::FAQ_TABLE, [
            'faq_id' => $this->primaryKey(),
            'question' => $this->text(700)->notNull(),
            'answer' => $this->text(970)->Null(),
            'created_at' => $this->integer(11)->defaultValue(0),
            'updated_at' => $this->integer(11)->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
         $this->dropTable(self::FAQ_TABLE);
    }
}
