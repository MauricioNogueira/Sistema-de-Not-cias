<?php
	use yii\widgets\ActiveForm;
	$this->title = 'Login';
?>

<section class="container">

	<div id="form">
		<div class="header-login">
			<h4 align="center">Login</h4>
		</div>
		<div class="body-login">
			<?php $form = ActiveForm::begin() ?>
			<?= $form->field($validator, 'cpf')->label('Login')->textInput(['id' => 'cpf', 'onKeypress' => "formatoCpf('cpf')", 'maxlength' => '14']) ?>
			<?= $form->field($validator, 'password')->label('Senha')->input('password') ?>
			<button class="waves-effect waves-light btn green">Entrar</button>
			<?php ActiveForm::end() ?>
		</div>
	</div>
	
</section>