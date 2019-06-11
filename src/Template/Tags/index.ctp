<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="tags index large-9 medium-8 columns content">
    <h3><?= __('Etiquetas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title',['label'=>'Título']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created',['label'=>'Creado']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tag): ?>
            <tr>
                <td><?= h($tag->title) ?></td>
                <td><?= h($tag->created) ?></td>
                <td class="actions">
                    <?= $this->Html->image('view.png', ['alt' => 'view', 'url' => ['action' => 'view', $tag->id]]); ?>
                    <?= $this->Html->image('edit.png', ['alt' => 'edit', 'url' => ['action' => 'edit', $tag->id]]); ?>
                    <?= $this->Form->postLink($this->Html->image("delete.png",["alt" => __('Delete')]),
                        ['action' => 'delete', $tag->id],
                        ['escape' => false, 'confirm' => __('Está seguro de borrar la etiqueta # {0}?', $tag->id)])
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
