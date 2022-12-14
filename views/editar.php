<div class="container">
	<h1>Meus Anúncios - Editar Anúncio</h1>
	<form method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="categoria">Categoria:</label>
			<select name="categoria" id="categoria" class="form-control">
				<?php
				foreach($cats as $cat):
				?>
				<option value="<?= $cat['id']; ?>" <?= ($id_categoria==$cat['id'])?'selected="selected"':''; ?>><?=($cat['nome']); ?></option>
				<?php
				endforeach;
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="titulo">Titulo:</label>
			<input type="text" name="titulo" id="titulo" class="form-control" value="<?= $titulo; ?>" />
		</div>
		<div class="form-group">
			<label for="valor">Valor:</label>
			<input type="text" name="valor" id="valor" class="form-control" value="<?= $valor; ?>" />
		</div>
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea class="form-control" name="descricao"><?= $descricao; ?></textarea>
		</div>
		<div class="form-group">
			<label for="estado">Estado de Conservação:</label>
			<select name="estado" id="estado" class="form-control">
				<option value="0" <?= ($estado=='0')?'selected="selected"':''; ?>>Ruim</option>
				<option value="1" <?= ($estado=='1')?'selected="selected"':''; ?>>Bom</option>
				<option value="2" <?= ($estado=='2')?'selected="selected"':''; ?>>Ótimo</option>
			</select>
		</div>
		<div class="form-group">
			<label for="add_foto">Fotos do anúncio:</label>
			<input type="file" name="fotos[]" multiple /><br/>

			<div class="panel panel-default">
				<div class="panel-heading">Fotos do Anúncio</div>
				<div class="panel-body">
					<?php foreach($info['fotos'] as $foto): ?>
					<div class="foto_item">
						<img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0" /><br/>
						<a href="excluir-foto.php?id=<?php echo $foto['id']; ?>" class="btn btn-default">Excluir Imagem</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<input type="submit" value="Salvar" class="btn btn-default" />
	</form>

</div>