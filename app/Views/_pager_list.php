<?php
use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination text-center justify-content-center">

        <li class="page-item">
            <a class="page-link" href="<?= str_replace('index.php/', '', $pager->getFirst()) ?>" aria-label="<?= lang('Pager.first') ?>">
                <span aria-hidden="true"><?= lang('Pager.first') ?></span>
            </a>
        </li>

		<?php foreach ($pager->links() as $link) : ?>
			<li <?= $link['active'] ? 'class="page-item active"' : 'class="page-item"' ?>>
				<a href="<?= str_replace('index.php/', '', $link['uri']) ?>" class="page-link">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

        <li class="page-item">
            <a class="page-link" href="<?= str_replace('index.php/', '', $pager->getLast()) ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><?= lang('Pager.last') ?></span>
            </a>
        </li>
	</ul>
</nav>
