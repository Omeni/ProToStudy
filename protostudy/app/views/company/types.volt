<h1>Типы правовой формы </h1><div class="add-item get-modal" data-type='insert' data-id="0">Добавить</div>
<div class="body-list">
<table class="types head-list table">
{% if typesList['data'] is defined %}
	<tbody>
		<th>id</th>
		<th>Название</th>
		<th></th>
		<th></th>
	</tbody>
</table>
<div class="block-item-list">
<table class="types list table">
	{% for value in typesList['data'] %}
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