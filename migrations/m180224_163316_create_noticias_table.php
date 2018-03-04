<?php

use yii\db\Migration;

/**
 * Handles the creation of table `noticias`.
 * Has foreign keys to the tables:
 *
 * - `usuarios`
 */
class m180224_163316_create_noticias_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('noticias', [
            'id' => $this->primaryKey(),
            'usuario_id' => $this->integer()->notNull(),
            'titulo' => $this->string()->notNull(),
            'texto' => $this->text()->notNull(),
            'imagem' => $this->string()->notNull(),
            'data_publicacao' => $this->date()->notNull()
        ]);

        // creates index for column `usuario_id`
        $this->createIndex(
            'idx-noticias-usuario_id',
            'noticias',
            'usuario_id'
        );

        // add foreign key for table `usuarios`
        $this->addForeignKey(
            'fk-noticias-usuario_id',
            'noticias',
            'usuario_id',
            'usuarios',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `usuarios`
        $this->dropForeignKey(
            'fk-noticias-usuario_id',
            'noticias'
        );

        // drops index for column `usuario_id`
        $this->dropIndex(
            'idx-noticias-usuario_id',
            'noticias'
        );

        $this->dropTable('noticias');
    }
}
