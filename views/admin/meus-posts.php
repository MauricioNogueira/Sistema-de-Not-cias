<?php
	use yii\widgets\LinkPager;

	$this->title = 'Minhas publicações';
?>

<section class="container">
	<h2 align="center">Minhas publicações</h2>
	<table class="striped">
		<thead>
			<tr>
				<th>Título</th>
				<th>Data da publicação</th>
				<td>Ação</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($noticias as $noticia): ?>
			<tr>
				<td><?= $noticia['titulo'] ?></td>
				<td><?= $noticia['data_publicacao'] ?></td>
				<td>
					<a style="margin-bottom: 5px;" class="waves-effect waves-light btn green" href="/admin/alterar-noticia/<?= $noticia['id'] ?>">Alterar</a>
					<button style="display: none;">
						<form method="get" action="/admin/excluir-noticia/<?= $noticia['id'] ?>">
							<button style="margin-top: 0; margin-bottom: 5px;" class="waves-effect waves-light btn red">Excluir</button>
						</form>
					</button>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?= LinkPager::widget(['pagination' => $pagination]) ?>
</section>