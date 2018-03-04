<?php
	$this->title = $noticia['titulo'];
?>

<section class="container">
	<div>
		<div>
			<h3 align="center"><?= $noticia['titulo'] ?></h3>
			<p align="center"><img align="center" height="300" width="700" class="responsive-img" src="../../<?= $noticia['imagem'] ?>"></p>
		</div>
		<div>
			<p align="justify" style="text-indent: 3em;"><?= $noticia['texto'] ?></p>
		</div>
		<div style="margin-top: 20px;">
			<p><strong>Autor: <?= $noticia['usuario']['nome_usuario'] ?></strong></p>
			<p><strong>Publicado em: <?= $noticia['data_publicacao'] ?></strong></p>
			<a style="float: right;" class="btn-floating btn-large waves-effect waves-light red" href="/principal"><i class="material-icons">reply</i></a>
		</div>
	</div>

</section>