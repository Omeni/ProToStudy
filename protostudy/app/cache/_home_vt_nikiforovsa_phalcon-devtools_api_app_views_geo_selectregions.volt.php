<table class="regions list table">
<?php if (isset($regionsList->data)) { ?>
	<tbody>
		<th>id</th>
		<th>Название</th>
		<th></th>
		<th></th>
	</tbody>
	<?php foreach ($regionsList->data as $value) { ?>
		<tr>
			<td class="id"><?= $value->id ?></td>
			<td class="name"><?= $value->name ?></td>
			<td class="update get-modal" data-type='update' data-id='<?= $value->id ?>'>Редактировать</td>
			<td class="delete get-modal" data-type='delete' data-id='<?= $value->id ?>'>Удалить</td>
		</tr>
	<?php } ?>
<?php } ?>
</table>
