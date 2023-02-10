<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tree}}`.
 */
class m230130_100508_create_tree_table extends Migration
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
            'author_id' => $this->integer()->notNull()->comment("Автор"),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
        ]);

        $this->addForeignKey('fk-tree-parent_id', '{{%tree}}', 'parent_id', '{{%tree}}', 'id', 'CASCADE');
        $this->addForeignKey('fk-tree-author_id', '{{%tree}}', 'author_id', '{{%user}}', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-tree-parent_id', '{{%tree}}');
        $this->dropForeignKey('fk-tree-author_id', '{{%tree}}');
        $this->dropTable('{{%tree}}');
    }
}
