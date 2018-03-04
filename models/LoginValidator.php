<?php

	namespace app\models;

	use yii\base\Model;
	use app\components\CpfValidator;

	class LoginValidator extends Model{
		public $cpf;
		public $password;

		public function rules(){
			return [
				[['cpf', 'password'], 'required', 'message' => 'Campo obrigatório.'],
				['cpf', 'string', 'length' => 14, 'notEqual' => 'CPF incompleto.'],
				['cpf', CpfValidator::className()],
				['password', 'conferirPassword']
			];
		}

		public function conferirPassword(){
			$usuario = Usuario::findOne(['cpf' => $this->cpf]);
			// echo ($usuario == null) ? 'Sim' : 'Não';
			// die();
			if($usuario == null || !\Yii::$app->getSecurity()->validatePAssword($this->password, $usuario->password)){
				$this->addError('password', 'Login ou senha inválido.');
			}
		}
	}