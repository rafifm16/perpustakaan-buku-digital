<?php
/**
 * Template pager bergaya Bootstrap 5.
 * @var CodeIgniter\Pager\PagerRenderer $pager
 */
?>
<?php if ($pager->getPageCount() > 1): ?>
<nav aria-label="Page navigation">
    <ul class="pagination">

        <?php if ($pager->hasPreviousPage()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPreviousPage() ?>">&laquo; Sebelumnya</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">&laquo; Sebelumnya</span>
            </li>
        <?php endif; ?>

        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
            </li>
        <?php endforeach; ?>

        <?php if ($pager->hasNextPage()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNextPage() ?>">Selanjutnya &raquo;</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Selanjutnya &raquo;</span>
            </li>
        <?php endif; ?>

    </ul>
</nav>
<?php endif; ?>
