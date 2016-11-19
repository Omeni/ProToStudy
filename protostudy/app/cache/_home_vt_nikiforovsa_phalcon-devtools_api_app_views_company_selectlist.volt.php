<?php if (isset($List['data'])) { ?>
	<?php if ($range == 0) { ?>
		<table class="companies head-list table">
			<tbody>
				<th <?php if ($cont == 'units') { ?> style="width:17%;"<?php } ?>>Название</th>
				<?php if ($cont == 'company') { ?>
				<th>Типы правовой формы</th>
				<?php } elseif ($cont == 'units') { ?>
				<th style="width:13%;">Страна</th>
				<th style="width:17%;">Регион</th>
				<th style="width:17%;">Населенный пункт</th>
				<th style="width:17%;">Компания</th>
				<?php } ?>
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
					<td class="name" <?php if ($cont == 'units') { ?> style="width:17%;"<?php } ?>><?= $value['name'] ?></td>
					<?php if ($cont == 'company') { ?>
					<td class="type" data-type-id="<?= $value['type'] ?>"><?= $value['stype'] ?></td>
					<?php } elseif ($cont == 'units') { ?>
					<td style="width:13%;" class="country" data-country-id="<?= $value['country'] ?>"><?= $value['scountry'] ?></td>
					<td style="width:17%;" class="region" data-region-id="<?= $value['region'] ?>"><?= $value['sregion'] ?></td>
					<td style="width:17%;" class="settlement" data-settlement-id="<?= $value['settlement'] ?>"><?= $value['ssettlement'] ?></td>
					<td style="width:17%;" class="company" data-company-id="<?= $value['company'] ?>"><?= $value['scompany'] ?></td>
					<?php } ?>
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
