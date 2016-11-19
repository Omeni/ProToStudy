<h1>Страны </h1><div class="add-item get-modal" data-type='insert' data-id="0">Добавить</div>
<div class="body-list">
<table class="country head-list table">
{% if countryList['data'] is defined %}
	<tbody>
		<th>id</th>
		<th>Название</th>
		<th></th>
		<th></th>
	</tbody>
</table>
<div class="block-item-list">
<table class="country list table">
	{% for value in countryList['data'] %}
		<tr>
			<td class="id">{{ value['id'] }}</td>
			<td class="name">{{ value['name'] }}</td>
			<td class="update get-modal" data-type='update' data-id="{{ value['id'] }}">Редактировать</td>
			<td class="delete" data-type='delete' data-id="{{ value['id'] }}">Удалить</td>
		</tr>
	{% endfor %}
{% endif %}
</table>
</div>
</div>