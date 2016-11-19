
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