<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shop $shop
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
<div class="shops view large-9 medium-8 columns content">
    <h3><?= h($shop->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $shop->has('category') ? $this->Html->link($shop->category->category, ['controller' => 'Categories', 'action' => 'view', $shop->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($shop->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($shop->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= h($shop->adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($shop->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Schedule') ?></th>
            <td><?= h($shop->schedule) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($shop->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Whatsapp') ?></th>
            <td><?= h($shop->whatsapp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facebook') ?></th>
            <td><?= h($shop->facebook) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Instagram') ?></th>
            <td><?= h($shop->instagram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Header') ?></th>
            <td><?= h($shop->header) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Header Dir') ?></th>
            <td><?= h($shop->header_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Header Type') ?></th>
            <td><?= h($shop->header_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($shop->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo Dir') ?></th>
            <td><?= h($shop->logo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo Type') ?></th>
            <td><?= h($shop->logo_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($shop->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($shop->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($shop->lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hits') ?></th>
            <td><?= $this->Number->format($shop->hits) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($shop->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Featured') ?></th>
            <td><?= $this->Number->format($shop->featured) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Header Size') ?></th>
            <td><?= $this->Number->format($shop->header_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo Size') ?></th>
            <td><?= $this->Number->format($shop->logo_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($shop->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($shop->modified) ?></td>
        </tr>
    </table>
</div>
