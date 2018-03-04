<?php
	use yii\widgets\ActiveForm;

	$this->title = "Nova postagem";
?>

<section class="container">
	<h1 align="center">Nova postagem</h1>

	<div>
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
		<?= $form->field($model, 'titulo')->label('Título principal') ?>
		<?= $form->field($model, 'texto')->label('Descrição')->textarea(['class' => 'materialize-textarea', 'id' => 'textareaId']) ?>
		<?= $form->field($model, 'imagem')->fileInput(['class' => ''])->label('') ?>
		<button class="waves-effect waves-light btn green">Publicar</button>
		<?php $form->end() ?>
	</div>
</section>