<form class="edit-item" data-id="<?= $id ?>">
	<div class="form-group">
		<input type="text" class="form-control" name="name" placeholder="Название" <?php if (isset($item)) { ?>value="<?= $item['data'][0]['name'] ?>"<?php } ?>>
	</div>
	<?php if ($cont == 1 || $cont == 2) { ?>
	<div class="form-group">
		<input type="text" class="form-control" name="sname" placeholder="Тип" <?php if (isset($item)) { ?>value="<?= $item['data'][0]['sname'] ?>"<?php } ?>>
	</div>
	<?php } ?>
	<?php if ($cont == 1) { ?>
	<div class="form-group">
		<select name="countries" data-id="" class="form-control select" id='countries-list' data-type='countries' placeholder="Страна">
			<?php foreach ($countryList['data'] as $value) { ?>
			<option data-id="<?= $value['id'] ?>" value="<?= $value['id'] ?>" <?php if (isset($item) && $value['id'] == $item['data'][0]['country']) { ?> selected <?php } ?>><?= $value['name'] ?></option>
			<?php } ?> 
		</select>
	</div>
	<?php } ?>
	<?php if ($cont == 2) { ?>
	<div class="form-group">
		<input type="text" autocomplete="off" name="regions" data-id="<?php if (isset($item_parents['data'][0]['id'])) { ?><?= $item_parents['data'][0]['id'] ?><?php } ?>" data-pid="<?php if (isset($item_parents)) { ?><?= $item_parents['data'][0]['country'] ?><?php } ?>" class="form-control select" data-type="regions" data-parent="country" id='regions-input' mylist="regions-listF" placeholder="Регион" <?php if (isset($item_parents['data'][0]['name'])) { ?>value="<?= $item_parents['data'][0]['name'] ?>"<?php } ?>>
		<ul class="myautocomplete" id="regions-listF">
		</ul>
	</div>
	<?php } ?>
	<?php if ($cont == 3) { ?>
	<div class="form-group">
		<input type="text" autocomplete="off" name="settlements" data-id="<?php if (isset($item_parents['data'][0]['id'])) { ?><?= $item_parents['data'][0]['id'] ?><?php } ?>" data-pid="<?php if (isset($item_parents)) { ?><?= $item_parents['data'][0]['region'] ?><?php } ?>" class="form-control select" data-type="settlements" data-parent="region" id='settlements-input' mylist="settlements-listF" placeholder="Населенный пункт" <?php if (isset($item_parents['data'][0]['name'])) { ?>value="<?= $item_parents['data'][0]['name'] ?>"<?php } ?>>
		<ul class="myautocomplete" id="settlements-listF">

		</ul>
	</div>
	<?php } ?>
	<?php if ($cont == 4) { ?>
	<div class="form-group">
		<input type="text" autocomplete="off" name="streets" data-id="<?php if (isset($item_parents['data'][0]['id'])) { ?><?= $item_parents['data'][0]['id'] ?><?php } ?>" class="form-control select" data-type="streets" data-parent="settlement" id='streets-input' mylist="streets-list" placeholder="Улица" <?php if (isset($item_parents[0]['data']['name'])) { ?>value="<?= $item_parents[0]['data']['name'] ?>"<?php } ?>>
		<ul class="myautocomplete" id="streets-list">
			<?php foreach ($list_parents['data'] as $value) { ?>
			<li data-id="<?= $value['id'] ?>"><?= $value['name'] ?></li>
			<?php } ?>
		</ul>
	</div>
	<div class="form-group">
	<input type="text" autocomplete="off" name="coordinate-x" class="form-control" data-type="coordinate-x" id='coordinate-x' placeholder="Координаты по X" <?php if (isset($coordinates)) { ?>value="<?= $item['data'][0]['longitude'] ?>"<?php } ?>>
	</div>
	<div class="form-group">
		<input type="text" autocomplete="off" name="coordinate-x" class="form-control" data-type="coordinate-y" id='coordinate-y' placeholder="Координаты по Y" <?php if (isset($coordinates)) { ?>value="<?= $item['data'][0]['latitude'] ?>"<?php } ?>>
	</div>
	<?php } ?>
	<div class="form-group">
		<button type="button" class="btn btn-default save-form" data-cont="<?= $cont ?>" data-type="<?= $type ?>">Сохранить</button>
	</div>
	
</form>