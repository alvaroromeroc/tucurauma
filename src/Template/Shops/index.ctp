<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shop[]|\Cake\Collection\CollectionInterface $shops
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Tiendas') ?></li>
        <li><?= $this->Html->link(__('Listado Tiendas'), ['controller' => 'Shops', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Tiendas'), ['controller' => 'Shops', 'action' => 'add']) ?> </li>    
        <li class="heading"><?= __('Productos') ?></li>
        <li><?= $this->Html->link(__('Listado Productos'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Producto'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li class="heading"><?= __('Categorías') ?></li>
        <li><?= $this->Html->link(__('Listado Categorías'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Categoría'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shops index large-9 medium-8 columns content">
    <h3><?= __('Tiendas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categories_id', ['label'=>'Categoría']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', ['label'=>'Nombre']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('featured', ['label'=>'Destacado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', ['label'=>'Activo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', ['label'=>'Creado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', ['label'=>'Modificado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('header') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hits') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shops as $shop): ?>
            <tr>
                <td><?= $this->Number->format($shop->id) ?></td>
                <td><?= $shop->has('category') ? $this->Html->link($shop->category->category, ['controller' => 'Categories', 'action' => 'view', $shop->category->id]) : '' ?></td>
                <td><?= h($shop->name) ?></td>
                <td><?= $this->Number->format($shop->featured) ?></td>
                <td><?= $this->Number->format($shop->active) ?></td>
                <td><?= h($shop->created) ?></td>
                <td><?= h($shop->modified) ?></td>
                <td><?= h($shop->header) ?></td>
                <td><?= h($shop->logo) ?></td>
                <td><?= $this->Number->format($shop->hits) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shop->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shop->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shop->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shop->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}},  {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
