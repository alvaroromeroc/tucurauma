<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="categories index large-9 medium-8 columns content">
    <h3><?= __('Categorías') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category', ['label'=>'Categoría']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('description', ['label'=>'Descripción']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('icon', ['label'=>'Icono']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('featured', ['label'=>'Destacada']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><?= h($category->category) ?></td>
                <td><?= h($category->description) ?></td>
                <td><?= h($category->icon) ?></td>
                <td><?= $this->Number->format($category->featured) ?></td>
                <td class="actions">
                    <?= $this->Html->image('view.png', ['alt' => 'view', 'url' => ['action' => 'view', $category->id]]); ?>
                    <?= $this->Html->image('edit.png', ['alt' => 'edit', 'url' => ['action' => 'edit', $category->id]]); ?>
                    <?= $this->Form->postLink($this->Html->image("delete.png",["alt" => __('Delete')]),
                        ['action' => 'delete', $category->id],
                        ['escape' => false, 'confirm' => __('Está seguro de borrar la categoría # {0}?', $category->id)])
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
