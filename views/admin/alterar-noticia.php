<?php
	use yii\widgets\ActiveForm;

	$this->title = 'Alterar Notícia';
?>

<section class="container">
	<h3 align="center">Alterar notícia</h3>
	<div>
		<?php $form = ActiveForm::begin() ?>
		<?= $form->field($model, 'titulo')->label('Título')->textInput(['value' => $noticia['titulo']]) ?>
		<?= $form->field($model, 'texto')->label('Descrição')->textarea(['class' => 'materialize-textarea', 'value' => $noticia['texto']]) ?>
		<button class="waves-effect waves-light btn green">Alterar</button>
		<?php $form->end() ?>
	</div>
</section>