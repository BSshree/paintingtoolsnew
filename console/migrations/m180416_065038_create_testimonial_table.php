<?php

use yii\db\Migration;

/**
 * Handles the creation of table `testimonial`.
 */
class m180416_065038_create_testimonial_table extends Migration
{
    /**
     * @inheritdoc
     */
     const TESTIMONIAL_TABLE = '{{%testimonial}}';

    public function up()
    {
        $this->createTable(self::TESTIMONIAL_TABLE, [
            'test_id' => $this->primaryKey(),
            'statement' => $this->text(700)->notNull(),
            'name' => $this->text(970)->Null(),
            'created_at' => $this->integer(11)->defaultValue(0),
            'updated_at' => $this->integer(11)->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(self::TESTIMONIAL_TABLE);
    }
}
