<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $shops_id
 * @property string $product
 * @property string $description
 * @property int $price
 * @property int|null $active
 * @property string|null $image
 * @property string|null $image_dir
 * @property int|null $image_size
 * @property string|null $image_type
 *
 * @property \App\Model\Entity\Shop $shop
 */
class Product extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'shops_id' => true,
        'product' => true,
        'description' => true,
        'price' => true,
        'active' => true,
        'image' => true,
        'image_dir' => true,
        'image_size' => true,
        'image_type' => true,
        'shop' => true
    ];
}
