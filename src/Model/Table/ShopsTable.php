<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;

/**
 * Shops Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\Shop get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shop newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Shop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shop|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shop|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shop[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shop findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShopsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('shops');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Tags');

        $this->belongsTo('Categories', [
            'foreignKey' => 'categories_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'header' => [
                'fields' => [
                    'dir' => 'header_dir',
                    'size' => 'header_size',
                    'type' => 'header_type'
                ],
                'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                    return strtolower("header.jpg");
                },
                'path' => 'webroot{DS}images{DS}tiendas{DS}{primaryKey}{DS}',
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo("header.jpg", PATHINFO_EXTENSION);

                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(400, 200);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();

                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                        ->thumbnail($size, $mode)
                        ->save($tmp);

                    // Now return the original *and* the thumbnail
                    return [
                        $data['tmp_name'] => "header.jpg",
                        $tmp => 'thumbnail-' . "header.jpg",
                    ];
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field}
                    ];
                },
                'keepFilesOnDelete' => false
            ],
            'logo' => [
                'fields' => [
                    'dir' => 'logo_dir',
                    'size' => 'logo_size',
                    'type' => 'logo_type'
                ],
                'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                    return strtolower("logo.jpg");
                },
                'path' => 'webroot{DS}images{DS}tiendas{DS}{primaryKey}{DS}',
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo("logo.jpg", PATHINFO_EXTENSION);

                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(90, 90);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();

                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                        ->thumbnail($size, $mode)
                        ->save($tmp);

                    // Now return the original *and* the thumbnail
                    return [
                        $data['tmp_name'] => "logo.jpg",
                        $tmp => 'thumbnail-' . "logo.jpg",
                    ];
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field}
                    ];
                },
                'keepFilesOnDelete' => false
            ]
        ]);
    }

    public function beforeSave($event, $entity, $options)
    {
        $sluggedName = Text::slug(strtolower($entity->name));
        // trim slug to maximum length defined in schema
        $entity->alias = substr($sluggedName, 0, 240);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

/*        $validator
            ->scalar('alias')
            ->maxLength('alias', 250)
            ->allowEmpty('alias');*/

        $validator
            ->decimal('lat')
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        $validator
            ->decimal('lng')
            ->requirePresence('lng', 'create')
            ->notEmpty('lng');

        $validator
            ->scalar('address')
            ->maxLength('address', 250)
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('description')
            ->maxLength('description', 500)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('schedule')
            ->maxLength('schedule', 100)
            ->requirePresence('schedule', 'create')
            ->notEmpty('schedule');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 15)
            ->allowEmpty('phone');

        $validator
            ->scalar('whatsapp')
            ->maxLength('whatsapp', 15)
            ->allowEmpty('whatsapp');

        $validator
            ->scalar('facebook')
            ->maxLength('facebook', 100)
            ->allowEmpty('facebook');

        $validator
            ->scalar('instagram')
            ->maxLength('instagram', 100)
            ->allowEmpty('instagram');

        $validator
            ->integer('hits')
            ->allowEmpty('hits');

        $validator
            ->allowEmpty('active');

        $validator
            ->allowEmpty('featured');

        $validator
        //    ->scalar('header')
        //    ->maxLength('header', 250)
            ->allowEmpty('header');

        /*$validator
            ->scalar('header_dir')
            ->maxLength('header_dir', 250)
            ->allowEmpty('header_dir');

        $validator
            ->integer('header_size')
            ->allowEmpty('header_size');

        $validator
            ->scalar('header_type')
            ->maxLength('header_type', 250)
            ->allowEmpty('header_type');*/

        $validator
        //    ->scalar('logo')
        //    ->maxLength('logo', 250)
            ->allowEmpty('logo');

        /*$validator
            ->scalar('logo_dir')
            ->maxLength('logo_dir', 250)
            ->allowEmpty('logo_dir');

        $validator
            ->integer('logo_size')
            ->allowEmpty('logo_size');

        $validator
            ->scalar('logo_type')
            ->maxLength('logo_type', 250)
            ->allowEmpty('logo_type');*/

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['categories_id'], 'Categories'));

        return $rules;
    }
}
