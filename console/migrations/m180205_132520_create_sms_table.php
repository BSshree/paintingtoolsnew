<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sms`.
 */
class m180205_132520_create_sms_table extends Migration {

    /**
     * @inheritdoc
     */
    const SMS_TABLE = '{{%sms}}';

    public function up() {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable(self::SMS_TABLE, [
            'id' => $this->primaryKey(),
            'invoice_no' => $this->string(50)->notNull()->unique(),
            'amount' => $this->decimal(10,2)->notNull(),
            'receipt_data' => $this->string(970)->Null(),
            'created_at' => $this->integer()->defaultValue(0),
            'updated_at' => $this->integer()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable(self::SMS_TABLE);
    }

}
