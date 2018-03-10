<?php

use yii\db\Migration;

/**
 * Handles the creation of table `userprofile`.
 */
class m180129_133957_create_userprofile_table extends Migration
{
    /**
     * @inheritdoc
     */
     const USERPROFILE_TABLE = '{{%userprofile}}';
     const USER_TABLE = '{{%user}}';
    
    public function up()
    {
        $this->createTable('userprofile', [
            'userprofile_id' => $this->primaryKey(),
             'dob' =>  $this->string(164)->Null(),
            'address' => $this->string(464)->notNull(),
            'country' =>  $this->string(64)->notNull(),
            'state' => $this->string(64)->notNull(),
            'city' => $this->string(64)->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);
        
        
         $this->createIndex(
            'idx-userprofile-user_id',
            self::USERPROFILE_TABLE,
            'user_id'
                 
        );

        $this->addForeignKey(
            'fk-userprofile-user_id',
            self::USERPROFILE_TABLE,
            'user_id',
            self::USER_TABLE,
            'id',
            'CASCADE'
        );
        
        
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        
      $this->dropForeignKey(
             'fk-userprofile-user_id',
            self::USERPROFILE_TABLE
        );  
        
       
        $this->dropTable('userprofile');
    }
}
