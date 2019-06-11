<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Título') ?></th>
            <td><?= h($tag->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($tag->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($tag->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Tiendas Etiquetadas') ?></h4>
        <?php if (!empty($tag->shops)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Categoría Id') ?></th>
                <th scope="col"><?= __('Tienda') ?></th>
                <th scope="col"><?= __('Hits') ?></th>
                <th scope="col"><?= __('Activo') ?></th>
                <th scope="col"><?= __('Destacado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->shops as $shops): ?>
            <tr>
                <td><?= h($shops->id) ?></td>
                <td><?= h($shops->categories_id) ?></td>
                <td><?= h($shops->name) ?></td>
                <td><?= h($shops->hits) ?></td>
                <td><?= h($shops->active) ?></td>
                <td><?= h($shops->featured) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Shops', 'action' => 'view', $shops->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Shops', 'action' => 'edit', $shops->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Shops', 'action' => 'delete', $shops->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shops->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
