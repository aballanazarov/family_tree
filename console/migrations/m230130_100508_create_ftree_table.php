<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ftree}}`.
 */
class m230130_100508_create_ftree_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tree}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string('255')->notNull()->comment("Полное имя человека"),
            'birthday' => $this->integer()->null()->comment("День рождения человека"),
            'death_date' => $this->integer()->null()->comment("День рождения человека"),
            'spouse_name' => $this->string('255')->null()->comment("Полное имя супруг(а)"),
            'spouse_birthday' => $this->integer()->null()->comment("День рождения супруг(а)"),
            'spouse_death_date' => $this->integer()->null()->comment("День рождения человека"),
            'parent_id' => $this->integer()->null()->comment("Родительский идентификатор"),
            'author' => $this->integer()->null()->comment("Автор"),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
        ]);

        $this->addForeignKey('fk-tree-parent_id', '{{%tree}}', 'parent_id', '{{%tree}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-tree-parent_id', '{{%tree}}');
        $this->dropTable('{{%tree}}');
    }
}
