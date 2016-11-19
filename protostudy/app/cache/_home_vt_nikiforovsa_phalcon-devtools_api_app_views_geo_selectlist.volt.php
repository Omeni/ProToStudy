<?php if (isset($List['data'])) { ?>
	<?php if ($range == 0) { ?>
		<table class="<?= $cont ?> head-list table">
			<tbody>
				<th>id</th>
				<th>Название</th>
				<th></th>
				<th></th>
			</tbody>
		</table>
		<div class="block-item-list">
		<table class="<?= $cont ?> list table">
			<tbody class="item-list">
	<?php } ?>
			<?php foreach ($List['data'] as $value) { ?>
				<tr>
					<td class="id"><?= $value['id'] ?></td>
					<td class="name"><?= $value['name'] ?></td>
					<td class="update get-modal" data-type='update' data-id="<?= $value['id'] ?>">Редактировать</td>
					<td class="delete" data-type='delete' data-id="<?= $value['id'] ?>">Удалить</td>
				</tr>
			<?php } ?>
<?php if ($range == 0) { ?>
			<tbody>
		</table>
		</div>
<?php } ?>

<?php } ?>
