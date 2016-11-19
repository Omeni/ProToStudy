{% if List is defined %}
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
			{% for value in List %}
				<tr>
					<td style="width:20%;" class="name" data-company-id="{{ value['company'] }}">{{ value['scompany'] }}</td>
					<td style="width:10%;" class="type" data-type-id="{{ value['type'] }}">{{ value['stype'] }}</td>
					<td style="width:20%;" class="country" data-country-id="{{ value['country'] }}">{{ value['scountry'] }}</td>
					<td style="width:20%;" class="region" data-region-id="{{ value['region'] }}">{{ value['sregion'] }}</td>
					<td style="width:20%;" class="settlement" data-settlement-id="{{ value['settlement'] }}">{{ value['ssettlement'] }}</td>
					<td style="width:110px;" class="delete" data-type='delete' data-id="{{ value['id'] }}">Удалить</td>
				</tr>
			{% endfor %}
			<tbody>
		</table>
		</div>

{% endif %}
