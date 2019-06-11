<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Productos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shops_id', ['label'=>'Tienda']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('product', ['label'=>'Producto']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('price', ['label'=>'Precio']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', ['label'=>'Activo']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('image', ['label'=>'Imagen']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_size', ['label'=>'Peso Imagen']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= $product->has('shop') ? $this->Html->link($product->shop->name, ['controller' => 'Shops', 'action' => 'view', $product->shop->id]) : '' ?></td>
                <td><?= h($product->product) ?></td>
                <td><?= $this->Number->format($product->price) ?></td>
                <td><?= $this->Number->format($product->active) ?></td>
                <td><?= h($product->image) ?></td>
                <td><?= $this->Number->format($product->image_size) ?></td>
                <td class="actions">
                    <?= $this->Html->image('view.png', ['alt' => 'view', 'url' => ['action' => 'view', $product->id]]); ?>
                    <?= $this->Html->image('edit.png', ['alt' => 'edit', 'url' => ['action' => 'edit', $product->id]]); ?>
                    <?= $this->Form->postLink($this->Html->image("delete.png",["alt" => __('Delete')]),
                        ['action' => 'delete', $product->id],
                        ['escape' => false, 'confirm' => __('Está seguro de borrar el producto # {0}?', $product->id)])
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
