<h1>Компании </h1><div class="add-item get-modal" data-type='insert' data-id="0">Добавить</div>
<form class="form-inline select-form">
  	<div class="select-box select-box-result active">
		<select name="types" data-id="" class="form-control select-item" id='types-list' placeholder="Типы правовой формы ">
			<option data-id="0" class="select-item" value="0">Все</option>
			{% for value in typesList['data'] %}
			<option data-id="{{ value['id'] }}" class="select-item" value="{{ value['id'] }}">{{ value['name'] }}</option>
			{% endfor %}
		</select>
	</div>
	<div class="select-box select-box-result active">
  		<input type="text" autocomplete="off" name="companies-filtr" class="form-control select-result" id='companies-filtr-input' placeholder="Фильтр результата">
	</div>
</form>
<div class="body-list">
{% if companiesList['data'] is defined %}
<table class="companies head-list table">
	<tbody>
		<th>Название</th>
		<th>Типы правовой формы</th>
		<th></th>
		<th></th>
	</tbody>
</table>
<div class="block-item-list">
<table class="companies list table">
	{% for value in companiesList['data'] %}
		<tr>
			<td class="name">{{ value['name'] }}</td>
			<td class="type" data-type-id="{{ value['type'] }}">{{ value['stype'] }}</td>
			<td class="update get-modal" data-type='update' data-id="{{ value['id'] }}">Редактировать</td>
			<td class="delete" data-type='delete' data-id="{{ value['id'] }}">Удалить</td>
		</tr>
	{% endfor %}
</table>
{% endif %}
</div>
</div>