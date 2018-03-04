<?php
	
	namespace app\models\admin;

	use yii\base\Model;

	class ValidatorAlterarPost extends Model{

		public $titulo;
		public $texto;

		public function rules(){
			return [
				[['titulo', 'texto'], 'required', 'message' => 'Campo obrigatório.']
			];
		}
	}