<form class="edit-item" data-id="<?= $id ?>">
	<div class="form-group">
		<input type="text" class="form-control" name="name" placeholder="Название" <?php if (isset($item)) { ?>value="<?= $item['data'][0]['name'] ?>"<?php } ?>>
	</div>
	
	<div class="form-group">
		<button type="button" class="btn btn-default save-form" data-cont="<?= $cont ?>" data-type="<?= $type ?>">Сохранить</button>
	</div>
	
</form>