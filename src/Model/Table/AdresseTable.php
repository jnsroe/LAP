<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adresse Model
 *
 * @method \App\Model\Entity\Adresse newEmptyEntity()
 * @method \App\Model\Entity\Adresse newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Adresse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adresse get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adresse findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Adresse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adresse[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adresse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adresse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adresse[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Adresse[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Adresse[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Adresse[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AdresseTable extends Table
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

        $this->setTable('adresse');
        $this->setDisplayField('id');
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
            ->scalar('Straße')
            ->maxLength('Straße', 45)
            ->requirePresence('Straße', 'create')
            ->notEmptyString('Straße');

        $validator
            ->integer('Hausnummer')
            ->requirePresence('Hausnummer', 'create')
            ->notEmptyString('Hausnummer');

        return $validator;
    }
}
