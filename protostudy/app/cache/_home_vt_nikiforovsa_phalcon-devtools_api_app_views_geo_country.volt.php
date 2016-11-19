<h1>Страны </h1><div class="add-item get-modal" data-type='insert' data-id="0">Добавить</div>
<table class="country list table">
<?php if (isset($countryList['data'])) { ?>
	<tbody>
		<th>id</th>
		<th>Название</th>
		<th></th>
		<th></th>
	</tbody>
	<?php foreach ($countryList['data'] as $value) { ?>
		<tr>
			<td class="id"><?= $value['id'] ?></td>
			<td class="name"><?= $value['name'] ?></td>
			<td class="update get-modal" data-type='update' data-id="<?= $value['id'] ?>">Редактировать</td>
			<td class="delete get-modal" data-type='delete' data-id="<?= $value['id'] ?>">Удалить</td>
		</tr>
	<?php } ?>
<?php } ?>
</table>
