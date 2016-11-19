<form class="edit-item" data-id="<?= $id ?>">
	<div class="form-group">
		<input type="text" class="form-control" name="name" placeholder="Название" <?php if (isset($item)) { ?>value="<?= $item['data'][0]['name'] ?>"<?php } ?>>
	</div>
	<?php if ($cont == 'companies') { ?>
	<div class="form-group">
		<select name="types" data-id="" class="form-control select" id='types-list' data-type='types' placeholder="Тип">
			<?php foreach ($typesList['data'] as $value) { ?>
			<option data-id="<?= $value['id'] ?>" value="<?= $value['id'] ?>" <?php if (isset($item) && $value['id'] == $item['data'][0]['type']) { ?> selected <?php } ?>><?= $value['name'] ?></option>
			<?php } ?> 
		</select>
	</div>
	<?php } ?>
	
	<div class="form-group">
		<button type="button" class="btn btn-default save-form" data-cont="<?= $cont ?>" data-type="<?= $type ?>">Сохранить</button>
	</div>
	
</form>