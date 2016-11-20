<h1 class="theme-title">{{theme_name}}</h1>
{% if theme is defined %}
	{% for value in theme %}
		<div class="article-block" id="article-{{ value['id'] }}">
			<h2 class="article-title">{{ value['name'] }}</h2>
			<div class="article-body">
				<p>
					{{ value['text'] }}
				</p>
			</div>
		</div>

	{% endfor %}
{% endif %}
<div class="block-question">
	{% if quest != 0 %}
	<form class="question" data-article="{{quest['article_id']}}" data-try="0">
		<h2>{{quest['text']}}</h2>
		<div class="radio">
		{% for value in ansvers %}
			<div class="form-group">
			  <label>
			    <input type="radio" name="ansver" id="ansver-{{value['id']}}" value="{{value['id']}}" >
			    {{value['text']}}
			  </label>
			</div>
		{% endfor %}
		</div>
		<div class="form-group">
			<button type="button" data-quest="{{quest['id']}}" class="btn answer-select btn-default">Ответить</button>
		</div>
	  
	</form>
	{% endif %}	
</div>
