<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zahlungsmoeglichkeiten Model
 *
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten newEmptyEntity()
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten get($primaryKey, $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Zahlungsmoeglichkeiten[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ZahlungsmoeglichkeitenTable extends Table
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

        $this->setTable('zahlungsmoeglichkeiten');
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
