<h1>Населенные пункты</h1><div class="add-item get-modal" data-type="insert" data-id="1">Добавить</div>
<form class="form-inline select-form">
	<div class="select-box active" data-add-pid='1' data-select-box="0">
		<select name="countries" data-id="" class="form-control select-item" id='countries-list' placeholder="Страна">
			<?php foreach ($countryList['data'] as $value) { ?>
			<option data-id="<?= $value['id'] ?>" class="select-item" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="select-box" data-select-box="1" >
		<input type="text" autocomplete="off" name="regions" data-id="" data-pid="" class="form-control select" data-parent="country" data-type="regions" id='regions-input' mylist="regions-list" placeholder="Регион">
		<ul class="myautocomplete" id="regions-list">

		</ul>
	</div>

	<div class="select-box" data-select-box="2" position-last="1">
  		<button type="button" class="btn btn-default select-button" data-parent="region" data-type="settlements">Поиск</button>
	</div>
	<div class="select-box select-box-result">
  		<input type="text" autocomplete="off" name="settlements-filtr" class="form-control select-result" id='settlements-filtr-input' placeholder="Фильтр результата">
	</div>
</form>
	<div class="body-list" data-range="0"></div>