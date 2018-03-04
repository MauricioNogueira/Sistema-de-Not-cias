<?php

	namespace app\models\admin;

	use yii\base\Model;
	use app\components\CpfValidator;

	class ValidatorCadastrar extends Model{
		public $nome_usuario;
		public $data_nascimento;
		public $rg;
		public $cpf;
		public $password;
		public $password_repeat;

		public function rules(){
			return [
				[['nome_usuario', 'data_nascimento', 'rg', 'cpf', 'password', 'password_repeat'], 'required', 'message' => 'Campo obrigatório.'],
				['cpf', 'string', 'length' => 14, 'notEqual' => 'CPF incompleto.'],
				['cpf', 'unique', 'targetClass' => 'app\models\Usuario', 'message' => 'CPF já está cadastrado.'],
				['rg', 'string', 'length' => 8, 'notEqual' => 'RG está incompleto.'],
				['cpf', CpfValidator::className()],
				['password', 'compare', 'message' => 'Senha não coincide']
			];
		}
	}