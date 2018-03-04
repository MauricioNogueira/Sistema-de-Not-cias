<?php

use yii\db\Migration;

/**
 * Class m180227_155630_init_rbac
 */
class m180227_155630_init_rbac extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = \Yii::$app->authManager;

        $cadastrarAdmin = $auth->createPermission('cadastrarAdmin');
        $cadastrarAdmin->description = 'Cadastrar novo administrador';
        $auth->add($cadastrarAdmin);

        $excluirUsuario = $auth->createRole('excluir-usuario');
        $excluirUsuario->description = 'Excluir Usuario';
        $auth->add($excluirUsuario);

        $superAdmin = $auth->createRole('superAdmin');
        $auth->add($superAdmin);
        $auth->addChild($superAdmin, $cadastrarAdmin);
        $auth->addChild($superAdmin, $excluirUsuario);

        $auth->assign($superAdmin, 1);
    }

    public function down()
    {
        $auth = \Yii::$app->authManager;

        $auth->removeAll();
    }
    
}
