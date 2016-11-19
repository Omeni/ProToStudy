<form class="question" data-article="{{quest['article_id']}}" data-try="{{try}}">
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