<?php

	namespace app\models\admin;

	use yii\base\Model;

	class ValidatorPost extends Model{

		public $titulo;
		public $texto;
		public $imagem;

		public function rules(){
			return [
				[['titulo', 'texto', 'imagem'], 'required', 'message' => 'Campo obrigatório'],
				['imagem', 'image', 'extensions' => 'png, jpg', 'wrongExtension' => 'Somente imagens do tipo: PNG ou JPG']
			];
		}
	}