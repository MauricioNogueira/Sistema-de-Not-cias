<?php
	use yii\widgets\LinkPager;

	$this->title = 'Usuários cadastrados';
?>

<section class="container">
	<h2 align="center">Tabela de usuários</h2>
	<table class="striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Data de nascimento</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuarios as $usuario): ?>
			<tr>
				<td><?= $usuario['nome_usuario'] ?></td>
				<td><?= $usuario['data_nascimento'] ?></td>
				<td>
					<button style="display: none;">
						<form action="/admin/excluir-usuario/<?= $usuario['id'] ?>" method="get">
							<button style="margin-top: 0;" class="waves-effect waves-light btn red">Excluir</button>
						</form>
					</button>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?= LinkPager::widget(['pagination' => $pagination]) ?>
</section>