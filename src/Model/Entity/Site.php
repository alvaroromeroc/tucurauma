<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Site Entity
 *
 * @property int $id
 * @property int $categories_id
 * @property string $name
 * @property string|null $alias
 * @property float $lat
 * @property float $lng
 * @property string $adress
 * @property string $description
 * @property string $schedule
 * @property string|null $phone
 * @property string|null $whatsapp
 * @property string|null $facebook
 * @property string|null $instagram
 * @property int|null $hits
 * @property int|null $active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $featured
 * @property string|null $header
 * @property string|null $header_dir
 * @property int|null $header_size
 * @property string|null $header_type
 * @property string|null $logo
 * @property string|null $logo_dir
 * @property int|null $logo_size
 * @property string|null $logo_type
 *
 * @property \App\Model\Entity\Category $category
 */
class Site extends Entity
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
        'categories_id' => true,
        'name' => true,
        'alias' => true,
        'lat' => true,
        'lng' => true,
        'adress' => true,
        'description' => true,
        'schedule' => true,
        'phone' => true,
        'whatsapp' => true,
        'facebook' => true,
        'instagram' => true,
        'hits' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'featured' => true,
        'header' => true,
        'header_dir' => true,
        'header_size' => true,
        'header_type' => true,
        'logo' => true,
        'logo_dir' => true,
        'logo_size' => true,
        'logo_type' => true,
        'category' => true
    ];
}
