{% if List['data'] is defined %}
	{% if range == 0 %}
		<table class="{{cont}} head-list table">
			<tbody>
				<th>id</th>
				<th>Название</th>
				<th></th>
				<th></th>
			</tbody>
		</table>
		<div class="block-item-list">
		<table class="{{cont}} list table">
			<tbody class="item-list">
	{% endif %}
			{% for value in List['data'] %}
				<tr>
					<td class="id">{{ value['id'] }}</td>
					<td class="name">{{ value['name'] }}</td>
					<td class="update get-modal" data-type='update' data-id="{{ value['id'] }}">Редактировать</td>
					<td class="delete" data-type='delete' data-id="{{ value['id'] }}">Удалить</td>
				</tr>
			{% endfor %}
{% if range == 0 %}
			<tbody>
		</table>
		</div>
{% endif %}

{% endif %}
