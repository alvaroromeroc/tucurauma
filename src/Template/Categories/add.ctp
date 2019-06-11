<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Nueva Categoría') ?></legend>
        <?php
            echo $this->Form->control('category', ['label'=>'Categoría']);
            echo $this->Form->control('description', ['label'=>'Descripción']);
            echo $this->Form->control('icon', ['label'=>'Icono']);
            echo $this->Form->select('featured', [
                '1' => 'Destacado',
                '0' => 'No Destacado',
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Aceptar')) ?>
    <?= $this->Form->end() ?>
</div>
