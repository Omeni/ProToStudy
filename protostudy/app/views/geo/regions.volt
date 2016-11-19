<h1>Регионы</h1><div class="add-item get-modal" data-type="insert" data-id="0">Добавить</div>
<form class="form-inline select-form">
  <div class="select-box active" data-select-box="0">
		<select name="countries" data-id="" class="form-control select-item" id='countries-list' placeholder="Страна">
			{% for value in countryList['data'] %}
			<option data-id="{{ value['id'] }}" class="select-item" value="{{ value['id'] }}">{{ value['name'] }}</option>
			{% endfor %}
		</select>
	</div>
	<div class="select-box" data-select-box="1" position-last="1">
  		<button type="button" class="btn btn-default select-button active" data-parent="country" data-type="regions">Поиск</button>
	</div>
	<div class="select-box select-box-result">
  		<input type="text" autocomplete="off" name="regions-filtr" class="form-control select-result" id='regions-filtr-input' placeholder="Фильтр результата">
	</div>
</form>
<ul class="myautocomplete" id="coutries-list">

</ul>
	<div class="body-list" data-range="0"></div>