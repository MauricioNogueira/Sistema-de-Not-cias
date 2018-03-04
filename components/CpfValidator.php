<?php
	
	namespace app\components;

	use yii\validators\Validator;

	class CpfValidator extends Validator{

		public function validateAttribute($model, $attribute){
			$cpf = $model->cpf;
			$strings = explode('-', $cpf);
			$digitos = explode('.', $strings[0]);

			$digitos = $digitos[0].$digitos[1].$digitos[2];
			$primeiro = 0;
			$segundo = 0;

			for($i = 0, $v = 10;$i < 9;$i++, $v--){
				$primeiro = $primeiro + ($digitos[$i] * $v);
			}

			$primeiro = $primeiro%11;

			if($primeiro < 2){
				$primeiro = 0;
			}else{
				$primeiro = 11-$primeiro;
			}

			$digitos = $digitos.$primeiro;

			for($i = 0, $v = 11;$i < 10;$i++, $v--){
				$segundo = $segundo + ($digitos[$i] * $v);
			}

			$segundo = $segundo%11;

			if($segundo < 2){
				$segundo = 0;
			}else{
				$segundo = 11-$segundo;
			}

			$string = $digitos.$segundo;
			$string2 = $strings[0].$strings[1];
			$string2 = explode('.', $string2);
			$string2 = $string2[0].$string2[1].$string2[2];

			if(!($string == $string2) || ($cpf == '111.111.111-11') || ($cpf == '222.222.222-22') || ($cpf == '333.333.333-33') || ($cpf == '444.444.444-44') || ($cpf == '555.555.555-55') || ($cpf == '666.666.666-66') || ($cpf == '777.777.777-77') || ($cpf == '888.888.888-88') || ($cpf == '999.999.999-99') || ($cpf == '000.000.000-00')){
				$this->addError($model, $attribute, 'CPF inválido');
			}
		}
	}