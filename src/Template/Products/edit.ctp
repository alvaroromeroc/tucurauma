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
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editar Producto') ?></legend>
        <?php
            echo $this->Form->control('shops_id', ['options' => $shops, 'label'=>'Tienda']);
            echo $this->Form->control('product', ['label'=>'Nombre de Producto']);
            echo $this->Form->control('description', ['label'=>'Descripción']);
            echo $this->Form->control('price', ['label'=>'Precio']);
            echo $this->Form->select('active', [
                '0' => 'Desactivado',
                '1' => 'Activo',
            ]);            echo $this->Form->control('image',['type' => 'file', 'label'=>'Imagen']);
            /*echo $this->Form->control('image_dir');
            echo $this->Form->control('image_size');
            echo $this->Form->control('image_type');*/
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
