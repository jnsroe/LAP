<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fahrrad Model
 *
 * @method \App\Model\Entity\Fahrrad newEmptyEntity()
 * @method \App\Model\Entity\Fahrrad newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fahrrad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fahrrad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fahrrad findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fahrrad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fahrrad[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fahrrad|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fahrrad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fahrrad[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fahrrad[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fahrrad[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fahrrad[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FahrradTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('fahrrad');
        $this->setDisplayField('Name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('Name')
            ->maxLength('Name', 45)
            ->requirePresence('Name', 'create')
            ->notEmptyString('Name');

        return $validator;
    }
}
