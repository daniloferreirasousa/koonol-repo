<div class="container">
	<h1>Meus Anúncios</h1>

	<a href="<?=BASE_URL;?>anuncios/adicionar" class="btn btn-info">Adicionar Anúncio</a>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Titulo</th>
				<th>Descrição</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		<?php
			foreach($anuncios as $anuncio):
		?>
		<tr>
			<td>
				<?php if(!empty($anuncio['url'])): ?>
				<img src="<?=BASE_URL;?>assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" border="0" />
				<?php else: ?>
				<img src="<?=BASE_URL;?>assets/images/default.jpg" height="50" border="0" />
				<?php endif; ?>
			</td>
			<td><?= $anuncio['titulo']; ?></td>
			<td><?=$anuncio['descricao'];?></td>
			<td>R$ <?= number_format($anuncio['valor'], 2); ?></td>
			<td>
				<a href="<?=BASE_URL;?>anuncios/editar/?id=<?= $anuncio['id']; ?>" class="btn btn-default">Editar</a>
				<a href="<?=BASE_URL;?>anuncios/excluir/?id=<?= $anuncio['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este anúncio?')">Excluir</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>