<h1>Гео позиционирование компании </h1><div class="add-item fixed-item-call" data-type='insert'>Фиксировать</div>
<form class="form-inline fixed-cont select-form">
	<div class="select-box active" data-select-box="0">
		<select name="countries" data-id="" data-controller="geo" class="form-control select-item" id='countries-list' placeholder="Страна">
			<?php foreach ($countryList['data'] as $value) { ?>
			<option data-id="<?= $value['id'] ?>" class="select-item" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="select-box" data-select-box="1"  data-add-pid='1' >
		<input type="text" autocomplete="off" data-controller="geo" name="regions" data-id="" data-pid="" class="form-control select" data-parent="country" data-type="regions" id='regions-input' mylist="regions-list" placeholder="Регион">
		<ul class="myautocomplete" id="regions-list">

		</ul>
	</div>

	<div class="select-box" data-select-box="2" >
		<input type="text" autocomplete="off" data-controller="geo" name="settlements" data-id="" data-pid="" class="form-control select" data-parent="region" data-type="settlements" id='settlements-input' mylist="settlements-list" placeholder="Населенный пункт">
		<ul class="myautocomplete" id="settlements-list">

		</ul>
	</div>

  	<div class="select-box select-box-result active">
		<select name="types" data-id="" class="form-control select-item" id='types-list' placeholder="Типы правовой формы ">
		<option data-id="0" class="select-item" value="0">Все</option>
			<?php foreach ($typesList['data'] as $value) { ?>
			<option data-id="<?= $value['id'] ?>" class="select-item" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="select-box select-box-result active">
  		<select name="companies" data-id="" class="form-control select-item" id='companies-list' placeholder="Компании ">
			<option data-id="0" class="select-item" value="0">Все</option>
			<?php foreach ($companiesList['data'] as $value) { ?>
			<option data-id="<?= $value['id'] ?>" class="select-item" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
			<?php } ?>
		</select>
	</div>
</form>
<div class="body-list">
	<table class="companies head-list table">
		<tbody>
			<th style="width:20%;">Компания</th>
			<th style="width:10%;">Типы правовой формы</th>
			<th style="width:20%;">Страна</th>
			<th style="width:20%;">Регион</th>
			<th style="width:20%;">Населенный пункт</th>
			<th style="width:110px;"></th>
		</tbody>
	</table>
	<div class="block-item-list">
		<table class="list table">
			<tbody class="item-list">
			<?php foreach ($xrefsList as $value) { ?>
				<tr>
					<td style="width:20%;" class="name" data-company-id="<?= $value['company'] ?>"><?= $value['scompany'] ?></td>
					<td style="width:10%;" class="type" data-type-id="<?= $value['type'] ?>"><?= $value['stype'] ?></td>
					<td style="width:20%;" class="country" data-country-id="<?= $value['country'] ?>"><?= $value['scountry'] ?></td>
					<td style="width:20%;" class="region" data-region-id="<?= $value['region'] ?>"><?= $value['sregion'] ?></td>
					<td style="width:20%;" class="settlement" data-settlement-id="<?= $value['settlement'] ?>"><?= $value['ssettlement'] ?></td>
					<td style="width:110px;" class="delete" data-type='delete' data-id="<?= $value['id'] ?>">Удалить</td>
				</tr>
			<?php } ?>
			<tbody>
		</table>
	</div>
</div>