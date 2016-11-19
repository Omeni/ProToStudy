<h1>Улицы</h1><div class="add-item get-modal" data-type="insert" data-id="0">Добавить</div>
<form class="form-inline select-form">
	<div class="select-box active" data-select-box="0">
		<select name="countries" data-id="" class="form-control select-item" id='countries-list' placeholder="Страна">
			<?php foreach ($countryList['data'] as $value) { ?>
			<option data-id="<?= $value['id'] ?>" class="select-item" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="select-box" data-select-box="1"  data-add-pid='1' >
		<input type="text" autocomplete="off" name="regions" data-id="" data-pid="" class="form-control select" data-parent="country" data-type="regions" id='regions-input' mylist="regions-list" placeholder="Регион">
		<ul class="myautocomplete" id="regions-list">

		</ul>
	</div>

	<div class="select-box" data-select-box="2" >
		<input type="text" autocomplete="off" name="settlements" data-id="" data-pid="" class="form-control select" data-parent="region" data-type="settlements" id='settlements-input' mylist="settlements-list" placeholder="Населенный пункт">
		<ul class="myautocomplete" id="settlements-list">

		</ul>
	</div>

	<div class="select-box" data-select-box="3" position-last="1">
  		<button type="button" class="btn btn-default select-button" data-parent="settlement" data-type="streets">Поиск</button>
	</div>
	<div class="select-box select-box-result">
  		<input type="text" autocomplete="off" name="streets-filtr" class="form-control select-result" id='streets-filtr-input' placeholder="Фильтр результата">
	</div>
</form>
	<div class="body-list" data-range="0"></div>