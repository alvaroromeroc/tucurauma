<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
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
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Shop') ?></th>
            <td><?= $product->has('shop') ? $this->Html->link($product->shop->name, ['controller' => 'Shops', 'action' => 'view', $product->shop->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= h($product->product) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($product->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($product->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Dir') ?></th>
            <td><?= h($product->image_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Type') ?></th>
            <td><?= h($product->image_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($product->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Size') ?></th>
            <td><?= $this->Number->format($product->image_size) ?></td>
        </tr>
    </table>
</div>
