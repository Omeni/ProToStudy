<h1>Роли </h1><div class="add-item get-modal" data-type='insert' data-id="0">Добавить</div>
<form class="form-inline select-form">
	<div class="select-box select-box-result active">
  		<input type="text" autocomplete="off" name="roles-filtr" class="form-control select-result" id='companies-filtr-input' placeholder="Фильтр результата">
	</div>
</form>
<div class="body-list">
<?php if (isset($List['data'])) { ?>
<table class="roles head-list table">
	<tbody>
		<th>Название</th>
		<th></th>
		<th></th>
	</tbody>
</table>
<div class="block-item-list">
<table class="companies list table">
	<?php foreach ($List['data'] as $value) { ?>
		<tr>
			<td class="name"><?= $value['name'] ?></td>
			<td class="update get-modal" data-type='update' data-id="<?= $value['id'] ?>">Редактировать</td>
			<td class="delete" data-type='delete' data-id="<?= $value['id'] ?>">Удалить</td>
		</tr>
	<?php } ?>
</table>
<?php } ?>
</div>
</div>