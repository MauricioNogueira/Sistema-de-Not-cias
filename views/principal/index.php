<?php
	$this->title = "World News";
?>

<section class="container">
	<div id="tela-noticias">
		<div class="row">
			<?php if($noticias != null): ?>
				<?php foreach($noticias as $noticia): ?>
					<div class="col m6 l6 s12">
						<div class="card">
							<div class="card-image waves-effect waves-block waves-light">
								<img style="width: 100%; height: 250px;" src="<?= $noticia['imagem'] ?>" class="activator">
							</div>
							<div class="card-content">
								<span class="card-title activator grey-text text-darken-4"><?= (strlen($noticia['titulo']) < 25) ? $noticia['titulo'] : substr($noticia['titulo'], 0, 22).'...' ?><i class="material-icons right">more_vert</i></span>
								<p><a href="/principal/noticia/<?= $noticia['id'] ?>">Detalhes</a></p>
								<p>Autor: <?= $noticia['usuario']['nome_usuario'] ?></p>
								<p>Publicado em: <?= $noticia['data_publicacao'] ?></p>
							</div>
							<div class="card-reveal">
								<span class="card-title grey-text text-darken-4"><?= $noticia['titulo'] ?><i class="material-icons right">close</i></span>
								<p style="text-align: justify;"><?= (strlen($noticia['texto']) < 300) ? $noticia['texto'] : substr($noticia['texto'], 0, 300).'...' ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<h4 class="info-noticias">Não há notícias cadastradas</h4>
			<?php endif; ?>
		</div>
	</div>
</section>