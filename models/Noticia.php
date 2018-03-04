<?php

	namespace app\models;

	use yii\db\ActiveRecord;
	use yii\web\UploadedFile;

	class Noticia extends ActiveRecord{

		public $file;

		public static function tableName(){
			return 'noticias';
		}

		public function getUsuario(){
			return $this->hasOne('app\models\Usuario', ['id' => 'usuario_id']);
		}

		public function upload($file){
			if($this->validate()){
				$this->file = $file;

				$this->file->saveAs('imagens/'.$this->file->baseName.'.'.$this->file->extension);
				return true;
			}

			return false;
		}
	}