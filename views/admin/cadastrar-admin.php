<?php
	use yii\widgets\ActiveForm;

	$this->title = 'Cadastrar Administrador';
?>

<section class="container">
	<h2 align="center">Cadastrar Admin</h2>

	<div>
		<?php $form = ActiveForm::begin() ?>
		<div class="row">
			<div class="col s12 m12">
				<?= $form->field($model, 'nome_usuario')->label('Nome') ?>
			</div>
			<div class="col s12 m4">
				<?= $form->field($model, 'data_nascimento')->label('Data de nascimento')->input('date') ?>
			</div>
			<div class="col s12 m4">
				<?= $form->field($model, 'rg')->label('RG')->textInput(['maxlength' => 8]) ?>
			</div>
			<div class="col s12 m4">
				<?= $form->field($model, 'cpf')->label('CPF')->textInput(['onKeypress' => "formatoCpf('cpfC')", 'id'=>'cpfC', 'maxlength' => 14]) ?>
			</div>
			<div class="col s12 m6">
				<?= $form->field($model, 'password')->label('Senha')->input('password') ?>
			</div>
			<div class="col s12 m6">
				<?= $form->field($model, 'password_repeat')->label('Confirmar Senha')->input('password') ?>
			</div>
		</div>
		<button class="waves-effect waves-light btn green">Cadastrar</button>
		<?php $form->end() ?>
	</div>
</section>