<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Station Model
 *
 * @property \App\Model\Table\AdresseTable&\Cake\ORM\Association\BelongsTo $Adresse
 *
 * @method \App\Model\Entity\Station newEmptyEntity()
 * @method \App\Model\Entity\Station newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Station[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Station get($primaryKey, $options = [])
 * @method \App\Model\Entity\Station findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Station patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Station[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Station|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Station saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Station[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Station[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Station[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Station[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StationTable extends Table
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

        $this->setTable('station');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Adresse', [
            'foreignKey' => 'Adresse_id',
            'joinType' => 'INNER',
        ]);
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['Adresse_id'], 'Adresse'), ['errorField' => 'Adresse_id']);

        return $rules;
    }
}
