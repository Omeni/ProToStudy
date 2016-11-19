<form class="edit-item" data-id="{{id}}">
	<div class="form-group">
		<input type="text" class="form-control" name="name" placeholder="Название" {% if item is defined %}value="{{item['data'][0]['name']}}"{% endif %}>
	</div>
	{% if cont is 1 or cont is 2 %}
	<div class="form-group">
		<input type="text" class="form-control" name="sname" placeholder="Тип" {% if item is defined %}value="{{item['data'][0]['sname']}}"{% endif %}>
	</div>
	{% endif %}
	{% if cont is 1 %}
	<div class="form-group">
		<select name="countries" data-id="" class="form-control select" id='countries-list' data-type='countries' placeholder="Страна">
			{% for value in countryList['data'] %}
			<option data-id="{{ value['id'] }}" value="{{ value['id'] }}" {% if item is defined and value['id'] is item['data'][0]['country'] %} selected {% endif %}>{{ value['name'] }}</option>
			{% endfor %} 
		</select>
	</div>
	{% endif %}
	{% if cont is 2 %}
	<div class="form-group">
		<input type="text" autocomplete="off" name="regions" data-id="{% if item_parents['data'][0]['id'] is defined %}{{item_parents['data'][0]['id']}}{% endif %}" data-pid="{% if item_parents is defined %}{{ item_parents['data'][0]['country'] }}{% endif %}" class="form-control select" data-type="regions" data-parent="country" id='regions-input' mylist="regions-listF" placeholder="Регион" {% if item_parents['data'][0]['name'] is defined %}value="{{item_parents['data'][0]['name']}}"{% endif %}>
		<ul class="myautocomplete" id="regions-listF">
		</ul>
	</div>
	{% endif %}
	{% if cont is 3 %}
	<div class="form-group">
		<input type="text" autocomplete="off" name="settlements" data-id="{% if item_parents['data'][0]['id'] is defined %}{{item_parents['data'][0]['id']}}{% endif %}" data-pid="{% if item_parents is defined %}{{ item_parents['data'][0]['region'] }}{% endif %}" class="form-control select" data-type="settlements" data-parent="region" id='settlements-input' mylist="settlements-listF" placeholder="Населенный пункт" {% if item_parents['data'][0]['name'] is defined %}value="{{item_parents['data'][0]['name']}}"{% endif %}>
		<ul class="myautocomplete" id="settlements-listF">

		</ul>
	</div>
	{% endif %}
	{% if cont is 4 %}
	<div class="form-group">
		<input type="text" autocomplete="off" name="streets" data-id="{% if item_parents['data'][0]['id'] is defined %}{{item_parents['data'][0]['id']}}{% endif %}" class="form-control select" data-type="streets" data-parent="settlement" id='streets-input' mylist="streets-list" placeholder="Улица" {% if item_parents[0]['data']['name'] is defined %}value="{{item_parents[0]['data']['name']}}"{% endif %}>
		<ul class="myautocomplete" id="streets-list">
			{% for value in list_parents['data'] %}
			<li data-id="{{ value['id'] }}">{{ value['name'] }}</li>
			{% endfor %}
		</ul>
	</div>
	<div class="form-group">
	<input type="text" autocomplete="off" name="coordinate-x" class="form-control" data-type="coordinate-x" id='coordinate-x' placeholder="Координаты по X" {% if coordinates is defined %}value="{{item['data'][0]['longitude']}}"{% endif %}>
	</div>
	<div class="form-group">
		<input type="text" autocomplete="off" name="coordinate-x" class="form-control" data-type="coordinate-y" id='coordinate-y' placeholder="Координаты по Y" {% if coordinates is defined %}value="{{item['data'][0]['latitude']}}"{% endif %}>
	</div>
	{% endif %}
	<div class="form-group">
		<button type="button" class="btn btn-default save-form" data-cont="{{ cont }}" data-type="{{ type }}">Сохранить</button>
	</div>
	
</form>