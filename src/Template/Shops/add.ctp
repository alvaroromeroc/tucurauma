<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shop $shop
 */
?>
<div class="shops form large-9 medium-8 columns content">
    <?= $this->Form->create($shop, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Nueva Tienda') ?></legend>
        <?php
            echo $this->Form->control('categories_id', ['options' => $categories, 'label'=>'Categoría']);
            echo $this->Form->control('name', ['label'=>'Nombre']);
            //echo $this->Form->control('alias');
            echo $this->Form->control('lat', ['label'=>'Latitud']);
            echo $this->Form->control('lng', ['label'=>'Longitud']);
            echo $this->Form->control('address', ['label'=>'Dirección']);
            echo $this->Form->control('description', ['label'=>'Descripción']);
            echo $this->Form->control('schedule', ['label'=>'Horario']);
            echo $this->Form->control('phone', ['label'=>'Teléfono']);
            echo $this->Form->control('whatsapp');
            echo $this->Form->control('facebook');
            echo $this->Form->control('instagram');
            echo $this->Form->select('active', [
                '0' => 'Desactivado',
                '1' => 'Activo',
            ]);
            echo $this->Form->select('featured', [
                '0' => 'No Destacado',
                '1' => 'Destacado',
            ]);
            //echo $this->Form->control('header', ['type' => 'file', 'label'=>'Imagen Header']);
            //echo $this->Form->control('logo', ['type' => 'file', 'label'=>'Imagen Logo']);
            echo $this->Form->control('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Aceptar')) ?>
    <?= $this->Form->end() ?>
</div>
