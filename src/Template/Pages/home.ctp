<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Curauma Editor</title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">

<header class="row">
    <div class="header-title">
        <h1>Tu Curauma</h1>
    </div>
</header>

<div class="row">
    <div class="columns large-12 text-center">
        <h3 class="more">Editor</h3>
    </div>
    <hr/>
</div>

<div class="row">
    <div class="columns large-3">
        <h3>Tiendas</h3>
        <ul>
            <li class=""><a target="_blank" href="shops">Ver tiendas</a></li>
            <li class=""><a target="_blank" href="shops/add">Agregar</a></li>
        </ul>
    </div>
    <div class="columns large-3">
        <h3>Productos</h3>
        <ul>
            <li class=""><a target="_blank" href="products">Ver Productos</a></li>
            <li class=""><a target="_blank" href="products/add">Agregar</a></li>
        </ul>
    </div>
    <div class="columns large-3">
        <h3>Categorías</h3>
        <ul>
            <li class=""><a target="_blank" href="categories">Ver Categorías</a></li>
            <li class=""><a target="_blank" href="categories/add">Agregar</a></li>
        </ul>
    </div>
    <div class="columns large-3">
        <h3>Tags</h3>
        <ul>
            <li class=""><a target="_blank" href="tags">Ver Tags</a></li>
            <li class=""><a target="_blank" href="tags/add">Agregar</a></li>
        </ul>
    </div>
</div>



</body>
</html>
