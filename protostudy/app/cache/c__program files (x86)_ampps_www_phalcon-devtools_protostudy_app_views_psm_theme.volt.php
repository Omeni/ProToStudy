<h1 class="theme-title"><?= $theme_name ?></h1>
<?php if (isset($theme)) { ?>
	<?php foreach ($theme as $value) { ?>
		<div class="article-block" id="#article-<?= $value['id'] ?>">
			<h2 class="article-title"><?= $value['name'] ?></h2>
			<div class="article-body">
				<p>
					<?= $value['text'] ?>
				</p>
			</div>
		</div>

	<?php } ?>
<?php } ?>
<?php if ($quest != 0) { ?>
<form class="question" data-article="<?= $quest['article_id'] ?>">
<h2><?= $quest['text'] ?></h2>
<div class="radio">
<?php foreach ($ansvers as $value) { ?>
	<div class="form-group">
	  <label>
	    <input type="radio" name="ansver" id="ansver-<?= $value['id'] ?>" value="<?= $value['status'] ?>" >
	    <?= $value['text'] ?>
	  </label>
	</div>
<?php } ?>
</div>
<div class="form-group">
	<button type="button" class="btn btn-default">Ответить</button>
</div>
  
</form>
<?php } ?>