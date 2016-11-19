<form class="edit-item" data-id="{{id}}">
	<div class="form-group">
		<input type="text" class="form-control" name="name" placeholder="Название" {% if item is defined %}value="{{item['data'][0]['name']}}"{% endif %}>
	</div>
	{% if cont is 'companies' %}
	<div class="form-group">
		<select name="types" data-id="" class="form-control select" id='types-list' data-type='types' placeholder="Тип">
			{% for value in typesList['data'] %}
			<option data-id="{{ value['id'] }}" value="{{ value['id'] }}" {% if item is defined and value['id'] is item['data'][0]['type'] %} selected {% endif %}>{{ value['name'] }}</option>
			{% endfor %} 
		</select>
	</div>
	{% endif %}
	
	<div class="form-group">
		<button type="button" class="btn btn-default save-form" data-cont="{{ cont }}" data-type="{{ type }}">Сохранить</button>
	</div>
	
</form>