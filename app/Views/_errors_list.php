<?php if (isset($errors) && $errors !== []) : ?>
	<div class="errors fs-6" role="alert">
		<ul class="alert alert-warning">
		<?php foreach ($errors as $error) : ?>
			<li style="list-style-type: none; margin: 0; padding: 0;"><?= esc($error) ?></li>
		<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>