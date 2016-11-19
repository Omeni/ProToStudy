<h1>Районы</h1><div class="add-item get-modal" data-type="insert" data-id="0">Добавить</div>
<form class="form-inline select-form">
	<div class="select-box active" data-add-pid='1' data-select-box="0">
		<select name="countries" data-id="" class="form-control select-item" id='countries-list' placeholder="Страна">
			{% for value in countryList['data'] %}
			<option data-id="{{ value['id'] }}" class="select-item" value="{{ value['id'] }}">{{ value['name'] }}</option>
			{% endfor %}
		</select>
	</div>
	<div class="select-box" data-select-box="1" >
		<input type="text" autocomplete="off" name="regions" data-id="" data-pid="" class="form-control select" data-parent="country" data-type="regions" id='regions-input' mylist="regions-list" placeholder="Регион">
		<ul class="myautocomplete" id="regions-list">

		</ul>
	</div>

	<div class="select-box" data-select-box="2" position-last="1">
  		<button type="button" class="btn btn-default select-button" data-parent="region" data-type="areas">Поиск</button>
	</div>
	<div class="select-box select-box-result">
  		<input type="text" autocomplete="off" name="areas-filtr" class="form-control select-result" id='areas-filtr-input' placeholder="Фильтр результата">
	</div>
</form>
<ul class="myautocomplete" id="coutries-list">

</ul>
	<div class="body-list" data-range="0"></div>