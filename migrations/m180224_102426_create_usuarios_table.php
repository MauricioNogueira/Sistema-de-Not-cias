<?php

use yii\db\Migration;

/**
 * Handles the creation of table `usuarios`.
 */
class m180224_102426_create_usuarios_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usuarios', [
            'id' => $this->primaryKey(),
            'nome_usuario' => $this->string()->notNull(),
            'data_nascimento' => $this->date()->notNull(),
            'rg' => $this->string()->notNull(),
            'cpf' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
        ]);

        $this->insert('usuarios',[
            'nome_usuario' => 'Fulano da Silva',
            'data_nascimento' => '1990-03-15',
            'rg' => '12121212-0',
            'cpf' => '755.184.420-17',
            'password' => \Yii::$app->getSecurity()->generatePasswordHash('123')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usuarios');
    }
}
