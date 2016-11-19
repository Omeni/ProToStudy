<?php if (isset($List['data'])) { ?>
		<table class="unit-role head-list table">
			<tbody>
				<th style="width:30%;">Подразделение</th>
				<th style="width:30%;">Типы видимости</th>
				<th style="width:30%;">Роль</th>
				<th></th>
			</tbody>
		</table>
		<div class="block-item-list">
		<table class="list table">
			<tbody class="item-list">
			<?php foreach ($List['data'] as $value) { ?>
				<tr>
					<td class="unit" style="width:30%;"><?= $value['sunit'] ?></td>
					<td class="type" data-type-id="<?= $value['type'] ?>" style="width:30%;"><?= $value['stype'] ?></td>
					<td class="role" style="width:30%;" data-role-id="<?= $value['role'] ?>"><?= $value['srole'] ?></td>
					<td class="delete" data-type='delete' data-id="<?= $value['id'] ?>">Удалить</td>
				</tr>
			<?php } ?>
			<tbody>
		</table>
		</div>

<?php } ?>
