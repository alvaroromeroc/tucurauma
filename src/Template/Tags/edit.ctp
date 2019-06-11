<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="tags form large-9 medium-8 columns content">
    <?= $this->Form->create($tag) ?>
    <fieldset>
        <legend><?= __('Editar Etiqueta') ?></legend>
        <?php
            echo $this->Form->control('title',['label'=>'Título']);
            echo $this->Form->control('shops._ids', ['options' => $shops, 'label'=>'Tiendas']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
