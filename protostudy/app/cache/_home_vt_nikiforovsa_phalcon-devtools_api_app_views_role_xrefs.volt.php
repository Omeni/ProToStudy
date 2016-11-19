<h1>Роли для подразделений</h1><div class="add-item fixed-role-call" data-type='insert'>Фиксировать</div>
<form class="form-inline select-form">
	<div class="select-group active" data-group='1'>
		<div class="select-box select-box-result active">
			<select name="companies" data-id="" class="form-control select-item" id='companies-list' placeholder="Компании">
				<option data-id="0" class="select-item" value="0">Все</option>
				<?php foreach ($companiesList['data'] as $value) { ?>
				<option data-id="<?= $value['id'] ?>" class="select-item" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
				<?php } ?>
			</select>
		</div>
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
	  		<button type="button" class="btn btn-default pre-select-button" data-parent="settlement" data-type="streets">Фильтр</button>
		</div>	
	</div>
	<div class="select-group last-select-group" data-group='2'>
		<div class="select-box select-box-result active">
			<select name="units" data-id="" class="form-control pre-select-box-result" id='units-list' placeholder="Подразделения">
			</select>
		</div>
		<div class="select-box select-box-result active">
			<select name="roles" data-id="" class="form-control select-item" id='roles-list' placeholder="Роли">
				<option data-id="0" class="select-item" value="0">Все</option>
				<?php foreach ($rolesList['data'] as $value) { ?>
				<option data-id="<?= $value['id'] ?>" class="select-item" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="select-box select-box-result active">
			<select name="types_role" data-id="" class="form-control select-item" id='types-role-list' placeholder="Тип видимости">
				<option data-id="0" class="select-item" value="0">Все</option>
				<?php foreach ($typesRoleList['data'] as $value) { ?>
				<option data-id="<?= $value['id'] ?>" class="select-item" value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
				<?php } ?>
			</select>
		</div>

	</div>

	
</form>
<div class="body-list">

</div>
